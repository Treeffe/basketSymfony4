<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 31/08/2018
 * Time: 17:05
 */

namespace App\Entity;


use App\Entity\Stadium;
use App\Entity\History;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="Joueur")
 * @ORM\Entity()
 */
class Joueur
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
    function getName() {
        return $this->name;
    }
    function setName($name) {
        $this->name = $name;
    }

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $lastname;
    function getLastname() {
        return $this->lastname;
    }
    function setLastname($lastname) {
        $this->lastname = $lastname;
    }



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bio;
    function getBio() {
        return $this->bio;
    }
    function setBio($bio) {
        $this->bio = $bio;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateNaissance;
    function getDateNaissance() {
        return $this->dateNaissance;
    }
    function setDateNaissance($dateNaissance) {
        $newformat =new \DateTime($dateNaissance);
        $this->dateNaissance = $newformat;
    }

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $photo;
    function getPhoto() {
        return $this->photo;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $titulaire;
    function getTitulaire() {
        return $this->titulaire;
    }

    function setTitulaire($titulaire) {
        $this->titulaire = $titulaire;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroMaillot;
    function getNumeroMaillot() {
        return $this->numeroMaillot;
    }
    function setNumeroMaillot($numeroMaillot) {
        $this->numeroMaillot = $numeroMaillot;
    }

    /**
     * @ORM\Column(type="decimal" , precision=5, scale=2)
     */
    private $taille;
    function getTaille() {
        return $this->taille;
    }
    function setTaille($taille) {
        $this->taille = $taille;
    }

    /**
     * @ManyToOne(targetEntity="Stat")
     * @ORM\JoinColumn(name="Stat", referencedColumnName="id")
     **/
    private $stat;
    function getstat() {
        return $this->stat;
    }
    function setStat(Stat $stat) {
        $this->stat = $stat;
    }

    /**
     * @ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="Post", referencedColumnName="id")
     **/
    private $post;
    function getPost() {
        return $this->post;
    }
    function setPost(Post $post) {
        $this->post = $post;
    }

    /**
     * @ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="Team", referencedColumnName="id")
     **/
    private $team;
    function getTeam() {
        return $this->team;
    }
    function setTeam(Team $team) {
        $this->team = $team;
    }
}