<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 05/09/2018
 * Time: 12:07
 */

namespace App\Entity;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="CategorieTransfer")
 * @ORM\Entity()
 */
class CategorieTransfer
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
    function setLibelle(string $libelle) {
        $this->libelle = $libelle;
    }

}