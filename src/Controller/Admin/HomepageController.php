<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/** @Route("/admin") */
class HomepageController extends Controller {

    /**
     * @Route("/")
     */
    public function adminIndexAction() {
        return $this->render('Admin/base.html.twig', ['mainNavAdmin' => true, 'title' => 'Espace Admin']);
    }

}