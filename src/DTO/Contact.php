<?php


namespace App\DTO;


use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    public $title;
    public $content;
    /**
     * @Assert\Email(checkMX=true)*/
    public $email;
}