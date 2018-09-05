<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 05/09/2018
 * Time: 12:07
 */

namespace App\Entity;

use App\Entity\Team;
use App\Entity\CategorieTransfer;
use App\Entity\Joueur;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="Transfer")
 * @ORM\Entity()
 */
class Transfer
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
     * @ORM\Column(type="integer")
     */
    private $prix;
    function getPrix() {
        return $this->prix;
    }
    function setPrix($prix) {
        $this->prix = $prix;
    }

    /**
     * @ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="TeamAcheteuse", referencedColumnName="id")
     **/
    private $teamAcheteuse;
    function getTeamAcheteuse() {
        return $this->teamAcheteuse;
    }
    function setTeamAcheteuse(Team $teamAcheteuse) {
        $this->teamAcheteuse = $teamAcheteuse;
    }

    /**
     * @ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="TeamVendeuse", referencedColumnName="id")
     **/
    private $teamVendeuse;
    function getTeamVendeuse() {
        return $this->teamVendeuse;
    }
    function setTeamVendeuse(Team $teamVendeuse) {
        $this->teamVendeuse = $teamVendeuse;
    }

    /**
     * @ManyToOne(targetEntity="CategorieTransfer")
     * @ORM\JoinColumn(name="CategorieTransfer", referencedColumnName="id")
     **/
    private $category;
    function getCategory() {
        return $this->category;
    }
    function setCategory(CategorieTransfer $category) {
        $this->category = $category;
    }

    /**
     * @ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumn(name="Joueur", referencedColumnName="id")
     **/
    private $joueur;
    function getJoueur() {
        return $this->joueur;
    }
    function setJoueur(Joueur $joueur ) {
        $this->joueur = $joueur;
    }
}