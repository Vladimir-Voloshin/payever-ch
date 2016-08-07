<?php

namespace Payever\TestBundle\Tests\Services;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Payever\TestBundle\Services\AlbumManagerService;
use Payever\TestBundle\Entity\Album;
use Payever\TestBundle\Entity\Image;
use Payever\TestBundle\Repository\AlbumRepository;
use Payever\TestBundle\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\ORM\AbstractQuery;

class AlbumManagerTest extends WebTestCase
{
    public static $container;
    public static $paginator;
    public static $serializer;
    
    public static function setUpBeforeClass()
    {
        //start the symfony kernel
        $kernel = static::createKernel();
        $kernel->boot();

        //get the DI container
        self::$container = $kernel->getContainer();

        //now we can instantiate our service (if you want a fresh one for
        //each test method, do this in setUp() instead
        self::$paginator = self::$container->get('knp_paginator');
        self::$serializer = self::$container->get('serializer');
    }
    
    public function testGetAllAlbums()
    {
        for($i = 1; 5 >= $i; $i++){
            // First, mock the object to be used in the test
            $album = $this->createMock(Album::class);
            $albums[] = $album;
        }

        // Now, mock the repository so it returns the mock of the album
        $albumRepository = $this
            ->getMockBuilder(AlbumRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $albumRepository->expects($this->once())
            ->method('findAll')
            ->will($this->returnValue($albums));

        // Last, mock the EntityManager to return the mock of the repository
        $entityManager = $this
            ->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($albumRepository));

        $albumFatsManager = new AlbumManagerService($entityManager, self::$paginator, self::$serializer);
        $this->assertStringStartsWith('{"items":', $albumFatsManager->getAllAlbums());
    }

    public function testGetAlbumImages()
    {
        for($i = 1; 25 >= $i; $i++){
            // First, mock the object to be used in the test
            $image = $this->createMock(Image::class);
            $images[] = $image;
        }

        // Use the Abstract query, which has nearly all needed Methods as the Query.
        $query = $this
            ->getMockBuilder(AbstractQuery::class)
            ->setMethods(array('setParameter', 'getResult'))
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
        $query->expects($this->once())
            ->method('getResult')
            ->will($this->returnValue($images));

        $imageRepository = $this
            ->getMockBuilder(ImageRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $imageRepository->expects($this->once())
            ->method('getAlbumImagesQuery')
            ->will($this->returnValue($query));
        
        $entityManager = $this
            ->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($imageRepository));

        $albumFatsManager = new AlbumManagerService($entityManager, self::$paginator, self::$serializer);
        $this->assertStringStartsWith('{"items":', $albumFatsManager->getAlbumImages(1, 1));
    }
    
    
}
