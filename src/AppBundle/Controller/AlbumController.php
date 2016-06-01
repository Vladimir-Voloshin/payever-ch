<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AlbumController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    
    /**
     * @Route("/albums/count_images/{amount}", name="get_albums_by_images_count")
     */
    public function getByImagesCountAction($amount, Request $request)
    {
//        var_dump(__LINE__);die();
        /** @var \AppBundle\Repository\AlbumRepository $albumRepository */
        $albumRepository = $this->getDoctrine()->getRepository('AppBundle:Album');
        $items = $albumRepository->find(1);
        var_dump($items);die();
        return new JsonResponse(array(
            'items' => $items
        ));
    }
}
