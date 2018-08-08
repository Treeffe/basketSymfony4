<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 02/08/2018
 * Time: 14:19
 */

namespace App\Controller;

use App\Entity\Test;
use App\Entity\Test2;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $tests = $this->getDoctrine()
            ->getRepository(Test2::class)
            ->findAll();

        return $this->render('base.html.twig', array('tests' => $tests ));
    }
}