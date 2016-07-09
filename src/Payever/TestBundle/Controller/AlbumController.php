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
        // replace this example code with whatever you need
        return $this->render('PayeverTestBundle:Default:index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    
    /**
     * @Route("/albums/count_images/{amount}", name="get_albums_by_images_count")
     */
    public function getByImagesCountAction($amount)
    {
        /** @var \Payever\TestBundle\Repository\AlbumRepository $albumRepository */
        $albumRepository = $this->getDoctrine()->getRepository('PayeverTestBundle:Album');
        $items = $albumRepository->getByImagesCount($amount);
        
        foreach ($items as $item) {
            $result[] = $item["album"]->toJson();
        }
        
        return new JsonResponse(array(
            'items' => $result
        ));
    }

    /**
     * @Route("/albums/show/{albumId}/{page}", name="get_album_images")
     */
    public function getAlbumImagesAction($albumId, $page = 1)
    {
        /** @var \Payever\TestBundle\Repository\ImageRepository $imageRepository */
        $imageRepository = $this->getDoctrine()->getRepository('PayeverTestBundle:Image');
        $query = $imageRepository->getAlbumImagesQuery($albumId, $page);

        /** @var \Knp\Component\Pager\Paginator $paginator */
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $page,
            Album::MAX_IMAGES_PER_PAGE
        );
        
        foreach ($pagination->getItems() as $item) {
            $result[] = $item->toJson();
        }

        return new JsonResponse(array(
            'items' => $result
        ));
    }
}
