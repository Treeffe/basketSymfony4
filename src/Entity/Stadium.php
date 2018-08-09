<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 09/08/2018
 * Time: 15:29
 */

namespace App\Entity;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="Stadium")
 * @ORM\Entity()
 */
class Stadium
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
     * @ORM\Column(type="string", length=30)
     */
    private $name;
    public function getName() {
        return $this->name;
    }
    function setName($name) {
        $this->name = $name;
    }

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $adress;
    public function getAdress() {
        return $this->adress;
    }
    function setAdress($adress) {
        $this->adress = $adress;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $place;
    function getPLace() {
        return $this->place;
    }

    function setPlace($place) {
        $this->place = $place;
    }
}