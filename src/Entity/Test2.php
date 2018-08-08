<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 08/08/2018
 * Time: 16:51
 */

namespace App\Entity;

use App\Entity\User;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * App\Entity\User
 *
 * @ORM\Table(name="Test2")
 * @ORM\Entity()
 */
class Test2
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     **/
    private $user;

    public function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getUser() {
        return $this->user;
    }

    function setUser(User $user) {
        $this->user = $user;
    }

    public function __construct() {

    }
}