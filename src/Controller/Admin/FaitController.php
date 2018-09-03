<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 10/08/2018
 * Time: 16:48
 */

namespace App\Controller\Admin;

use App\Entity\FaitMarquant;
use App\Entity\History;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class FaitController extends Controller
{
    public function addFaitAction(Request $request) {
        //récuperation data
        $histories = $this->getDoctrine()
            ->getRepository(History::class)
            ->findAll();

        return $this->render('Admin/addFaitForm.html.twig', array('histories' => $histories ));
    }

    public function addBDDFaitAction(Request $request) {
        //instanciation Objet
        $faitMarquant = new FaitMarquant();


        //Récuperation + objet fait
        $libelle = $_POST['libelle'];
        $historyId = $_POST['historyId'];
        $entityManager = $this->getDoctrine()->getManager();
        $history = $this->getDoctrine()
            ->getRepository(History::class)
            ->find($historyId);
        $position = $_POST['pos_resume'];

        $faitMarquant->setLibelle($libelle);
        $faitMarquant->setPosResume($position);
        $faitMarquant->setHistory($history);

        //Mise en base
        $entityManager->persist($faitMarquant);
        $entityManager->flush();
        // ... do any other work - like sending them an email, etc
        // maybe set a "flash" success message for the user
        $this->addFlash('success', 'Votre compte à bien été enregistré.');

        return $this->forward($this->routeToControllerName('addFait'));
    }

    private function routeToControllerName($routename) {
        $routes = $this->get('router')->getRouteCollection();
        return $routes->get($routename)->getDefaults()['_controller'];
    }
}