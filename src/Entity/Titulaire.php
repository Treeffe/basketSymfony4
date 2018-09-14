<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 14/09/2018
 * Time: 15:27
 */

namespace App\Entity;

use App\Entity\Team;
use App\Entity\Joueur;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="Titulaire")
 * @ORM\Entity()
 */
class Titulaire
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
     * @ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumn(name="joueur", referencedColumnName="id")
     **/
    private $joueur;
    function getJoueur() {
        return $this->joueur;
    }
    function setJoueur( $joueur) {
        $this->joueur = $joueur;
    }

    /**
     * @ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="team", referencedColumnName="id")
     **/
    private $team;
    function getTeam() {
        return $this->team;
    }
    function setTeam(Team $team) {
        $this->team = $team;
    }
}