<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 27/08/2018
 * Time: 17:54
 */

namespace App\Controller\Admin;

use App\Entity\Conference;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ConferenceController extends Controller
{
    public function addConferenceAction(Request $request) {
        //récuperation data
        return $this->render('Admin/addConference.html.twig');
    }

    public function addBDDConferenceAction(Request $request) {
        //instanciation Objet
        $conference = new Conference();

        //Récuperation + objet fait
        $point_cardinal = $_POST['point_cardinal'];
        $name = $_POST['name'];

        //maj objet
        $conference->setPointCardinal($point_cardinal);
        $conference->setLibelleConference($name);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($conference);
        $entityManager->flush();
        $this->addFlash('success', 'Votre conference a bien été enregistrée.');

        //renvoyer sur la liste
        return $this->forward($this->routeToControllerName('addConference'));
    }

    private function routeToControllerName($routename) {
        $routes = $this->get('router')->getRouteCollection();
        return $routes->get($routename)->getDefaults()['_controller'];
    }
}