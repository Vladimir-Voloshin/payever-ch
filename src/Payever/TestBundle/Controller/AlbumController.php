<?php

namespace Payever\TestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Payever\TestBundle\Entity\Album as Album;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class AlbumController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('PayeverTestBundle:Default:index.html.twig', []);
    }
    
    /**
     * @Route("/albums/", name="get_albums")
     */
    public function getAlbumsAction(Request $request)
    {
        /** @var \Payever\TestBundle\Repository\AlbumRepository $albumRepository */
        $albumRepository = $this->getDoctrine()->getRepository('PayeverTestBundle:Album');
        foreach ($albumRepository->findAll() as $album){
            $result[] = $album->toJson();
        }
        return new JsonResponse($result);
    }   
    
    /**
     * @Route("/albums/count_images/{amount}", name="get_albums_by_images_count")
     */
    public function getByImagesCountAction(Request $request, $amount)
    {
//        if(!$request->isXmlHttpRequest()){
//            
//        }
        /** @var \Payever\TestBundle\Repository\AlbumRepository $albumRepository */
        $albumRepository = $this->getDoctrine()->getRepository('PayeverTestBundle:Album');
        
        return new JsonResponse(array(
            'items' => $albumRepository->getByImagesCount($amount)
        ));
    }

    /**
     * @Route("/albums/show/{albumId}/{page}", name="get_album_images")
     */
    public function getAlbumImagesAction(Request $request, $albumId, $page = 1)
    {
        /** @var \Payever\TestBundle\Repository\ImageRepository $imageRepository */
        $imageRepository = $this->getDoctrine()->getRepository('PayeverTestBundle:Image');

        return new JsonResponse(array(
            'items' => $imageRepository->getAlbumImagesQuery($albumId, $page, $this->get('knp_paginator'))
        ));
    }
}
