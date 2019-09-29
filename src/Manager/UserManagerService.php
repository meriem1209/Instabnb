<?php


namespace App\Manager;


use App\Entity\Annoncement;
use App\Repository\AnnoncementRepository;
use Doctrine\Common\Persistence\ObjectManager;

class UserManagerService
{
    private $annoncement;
    private $objectManager;
    public function __construct(AnnoncementRepository $annoncement, ObjectManager $objectManager)
    {
        $this-> annoncement=$annoncement;
        $this-> objectManager=$objectManager;
    }


    public function save($add)
    {
        $a = new Annoncement($add);
        $this->objectManager->persist($a);
        $this->objectManager->flush();
    }
    public function find()
    {
        return $this->annoncement->findByAnnonces(200);
    }

}