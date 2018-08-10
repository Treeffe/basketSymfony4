<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 09/08/2018
 * Time: 15:19
 */

namespace App\Entity;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="FaitMarquant")
 * @ORM\Entity()
 */
class FaitMarquant
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
    private $posResume;
    function getPosResume() {
        return $this->posResume;
    }
    function setPosResume($posResume) {
        $this->posResume = $posResume;
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
     * @ManyToOne(targetEntity="History")
     * @ORM\JoinColumn(name="History", referencedColumnName="id")
     **/
    private $history;
    function getHistory() {
        return $this->history;
    }
    function setHistory(History $history) {
        $this->history = $history;
    }
}