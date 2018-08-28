<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 09/08/2018
 * Time: 10:31
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
 * @ORM\Table(name="Team")
 * @ORM\Entity()
 */
class Team
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
     * @ORM\Column(type="string", length=30)
     */
    private $location;
    public function getLocation() {
        return $this->location;
    }

    function setLocation($location) {
        $this->location = $location;
    }

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $dateCreation;
    public function getDateCreation() {
        return $this->dateCreation;
    }

    function setDateCreation($dateCreation) {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $positionanneePrec;
    public function getPositionanneePrec() {
        return $this->positionanneePrec;
    }

    function setPositionanneePrec($positionanneePrec) {
        $this->positionanneePrec = $positionanneePrec;
    }

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $surnom;
    public function getSurnom() {
        return $this->surnom;
    }

    function setSurnom($surnom) {
        $this->surnom = $surnom;
    }

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $proprietaire;
    public function getProprietaire() {
        return $this->proprietaire;
    }

    function setProprietaire($proprietaire) {
        $this->proprietaire = $proprietaire;
    }

    /**
     * @ManyToOne(targetEntity="Stadium")
     * @ORM\JoinColumn(name="stadium", referencedColumnName="id")
     **/
    private $stadium;
    public function getStadium() {
        return $this->stadium;
    }

    function setStadium($stadium) {
        $this->stadium = $stadium;
    }

    /**
     * @ManyToOne(targetEntity="History")
     * @ORM\JoinColumn(name="history", referencedColumnName="id")
     **/
    private $history;
    public function getHistory() {
        return $this->history;
    }

    function setHistory($history) {
        $this->history = $history;
    }

    public function __construct() {

    }


    /**
     * @ManyToOne(targetEntity="Conference")
     * @ORM\JoinColumn(name="conference", referencedColumnName="id")
     **/
    private $conference;
    public function getConference() {
        return $this->conference;
    }

    function setConference($conference) {
        $this->conference = $conference;
    }
}