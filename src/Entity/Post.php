<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 09/08/2018
 * Time: 16:44
 */

namespace App\Entity;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Table(name="Post")
 * @ORM\Entity()
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;
    function getLibelle() {
        return $this->libelle;
    }
    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $abrev;
    function getAbrev() {
        return $this->abrev;
    }
    function setAbrev($abrev) {
        $this->abrev = $abrev;
    }

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $position;
    function getPosition() {
        return $this->position;
    }
    function setPosition($position) {
        $this->position = $position;
    }
}