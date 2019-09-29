<?php
namespace App\Controller;

use App\Manager\UserManagerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnnoncementControllerDetail extends AbstractController
{
    private $userManagerService;

    public function __construct(UserManagerService $userManagerService)
    {
        $this->userManagerService = $userManagerService;
    }
    /**
     * @Route("/{_locale/annonce/{id}/detail", name="detail", requirements={"_locale"="fr|en"})
     */
    /**
    /**
     * @Route(
     *     "/{_locale}/annonce/{id}/detail",

     *     name="detail",
     *     defaults={"id"=1},
     *     requirements={"id" = "\d+"}
     * )
     */
    public function index( int $id)

    {
        $tableau=$this->userManagerService->find();
        return $this->render('style/annoncementDetaill.html.twig', [
            'controller_name' => 'AnnoncementControllerDetail',
            'tableau'=>$tableau
        ]);

    }
}