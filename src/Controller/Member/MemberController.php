<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 09/08/2018
 * Time: 11:13
 */

namespace App\Controller\Member;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/member") */
class MemberController extends Controller {

    /**
     * @Route("/")
     */
    public function memberIndexAction() {
        return $this->render('Member/base.html.twig', ['mainNavMember'=>true, 'title'=>'Espace Membre']);
    }

}