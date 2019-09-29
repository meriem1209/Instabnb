<?php
namespace App\Controller;

use App\ContactService;
use App\DTO\Add;
use App\Form\AddType;
use App\Manager\UserManagerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnnoncementControllerAdd extends AbstractController
{
    /**
     * @var UserManagerService
     */
    private $userManagerService;

    /**
     * AnnoncementControllerAdd constructor.
     * @param UserManagerService $userManagerService
     */

    public function __construct(UserManagerService $userManagerService)
    {
        $this->userManagerService = $userManagerService;
    }
    /**
     * @Route("/{_locale/add", name="add", requirements={"_locale"="fr|en"})
     */
    /**
    /**
     * @Route(
     *     "/{_locale}/add",
     *     name="add",
     *     methods={"GET", "POST"},

     * )
     */
    public function index(Request $request)

    {
        $add = new Add();
        $form=$this->createForm(AddType::class, $add);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->userManagerService->save($add);
            return $this->redirectToRoute('home');
        }

        return $this->render('style/annoncementAdd.html.twig', [
            'controller_name' => 'AnnoncementControllerAdd',
            'form'=>$form->createView(),
        ]);
    }
}