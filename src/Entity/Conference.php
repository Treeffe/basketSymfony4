<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 27/08/2018
 * Time: 17:40
 */

namespace App\Entity;


use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="Conference")
 * @ORM\Entity()
 */
class Conference
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
    private $pointCardinal;
    function getPointCardinal() {
        return $this->pointCardinal;
    }
    function setPointCardinal($pointCardinal) {
        $this->pointCardinal = $pointCardinal;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleConference;
    function getLibelleConference() {
        return $this->libelleConference;
    }
    function setLibelleConference($libelleConference) {
        $this->libelleConference = $libelleConference;
    }
}