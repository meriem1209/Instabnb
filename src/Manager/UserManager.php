<?php

namespace App\Manager;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager
{
    private $passwordEncoder;
    private $objectManager;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, ObjectManager $objectManager)
    {
        $this ->passwordEncoder =$passwordEncoder;
        $this->objectManager=$objectManager;
    }

    public function save (User $user): void
    {
        $encodedPassword= $this->passwordEncoder->encodePassword(
            $user,
            $user->getPassword()
        );

        $user->setPassword($encodedPassword);

        $this->objectManager    ->persist($user);
        $this->objectManager-> flush();



    }
}