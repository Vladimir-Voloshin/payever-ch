<?php

namespace Payever\TestBundle\Tests\Services;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Payever\TestBundle\Services\AlbumManagerService;
use Payever\TestBundle\Entity\Album;
use Payever\TestBundle\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

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

        // Now, mock the repository so it returns the mock of the employee
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
}
