<?php
namespace App\Controller;

use App\Entity\Annoncement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomePage extends AbstractController
{
    /**
     * @Route("/{_locale}", name="home", requirements={"_locale"="fr|en"})
     */
    /**
     * @Route(
     *     "/{_locale}",
     *     name="home"
     * )
     */
    public function index()

    {
        $annonces = $this->getDoctrine()->getManager();
        $tableau=$annonces->getRepository(Annoncement::class)->findByAnnonces(2);

        return $this->render('style/home.html.twig', [
            'controller_name' => 'HomePage',
            'tableau'=>$tableau
        ]);
    }
}
