<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 09/08/2018
 * Time: 16:11
 */

namespace App\Entity;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Table(name="Stat")
 * @ORM\Entity()
 */
class Stat
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
     * @ORM\Column(type="decimal" , precision=5, scale=2)
     */
    private $point;
    function getPoint() {
        return $this->point;
    }
    function setPoint($point) {
        $this->point = $point;
    }

    /**
     * @ORM\Column(type="decimal" , precision=5, scale=2)
     */
    private $essai;
    function getEssai() {
        return $this->essai;
    }
    function setEssai($essai) {
        $this->essai = $essai;
    }

    /**
     * @ORM\Column(type="decimal" , precision=5, scale=2)
     */
    private $rebond;
    function getRebond() {
        return $this->rebond;
    }
    function setRebond($rebond) {
        $this->rebond = $rebond;
    }

    /**
     * @ORM\Column(type="decimal" , precision=5, scale=2)
     */
    private $interception;
    function getInterception() {
        return $this->rebond;
    }
    function setInterception($interception) {
        $this->interception = $interception;
    }

    /**
     * @ORM\Column(type="decimal" , precision=5, scale=2)
     */
    private $passe;
    function getPasse() {
        return $this->passe;
    }
    function setPasse($passe) {
        $this->passe = $passe;
    }

    /**
     * @ORM\Column(type="decimal" , precision=5, scale=2)
     */
    private $contre;
    function getContre() {
        return $this->contre;
    }
    function setContre($contre) {
        $this->contre = $contre;
    }
}