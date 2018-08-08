<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 02/08/2018
 * Time: 14:19
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function indexAction()
    {
        $number = random_int(0, 100);
        //echo getcwd() . "\n";
        //die("bonjour");
        return $this->render('base.html.twig', array(
            'number' => $number,
        ));
    }
}