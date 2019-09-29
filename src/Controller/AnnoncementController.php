<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnoncementController extends AbstractController
{
    /**
     * @Route(
     *     "/annonce/{page}",
     *     name="AnnonceController",
     *     defaults={"page"=1},
     *     requirements={"id" = "\d+"}
     * )
     */
    public function index( int $page)

    {
        return new Response('Hello'.$page.'!');
    }
}
