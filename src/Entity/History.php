<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 09/08/2018
 * Time: 15:11
 */

namespace App\Entity;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="History")
 * @ORM\Entity()
 */
class History
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
     * @ORM\Column(type="string", length=50)
     */
    private $title;
    function getTitle() {
        return $this->title;
    }
    function setTitle($title) {
        $this->title = $title;
    }

    private $listFaitsMarquants;
    function getListFaitsMarquants() {
        return $this->listFaitsMarquants;
    }
    function setListFaitsMarquants($listFaitsMarquants) {
        $this->listFaitsMarquants = $listFaitsMarquants;
    }

    private $listJoueurLegend;
    function getListJoueurLegend() {
        return $this->listJoueurLegend;
    }
    function setListJoueurLegend($listJoueurLegend) {
        $this->listJoueurLegend = $listJoueurLegend;
    }
}