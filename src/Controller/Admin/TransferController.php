<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 05/09/2018
 * Time: 14:40
 */

namespace App\Controller\Admin;

use App\Entity\CategorieTransfer;
use App\Entity\Joueur;
use App\Entity\Team;
use App\Entity\Transfer;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class TransferController extends Controller
{
    /**
     * @Route("/admin/addTransfer", name="addTransfer")
     */
    public function addConferenceAction(Request $request) {
        //récuperation data
        $categories = $this->getDoctrine()
            ->getRepository(CategorieTransfer::class)
            ->findAll();

        $teams = $this->getDoctrine()
            ->getRepository(Team::class)
            ->findAll();

        $joueurs = $this->getDoctrine()
            ->getRepository(Joueur::class)
            ->findAll();


        return $this->render('Admin/addTransferForm.html.twig', array('categories' => $categories, 'teams' => $teams, 'joueurs'=> $joueurs ));
    }

    /**
     * @Route("/admin/addTransferBDD", name="addTransferBDD")
     */
    public function addBDDConferenceAction(Request $request) {
        //instanciation Objet
        $transfer = new Transfer();

        //Récuperation + objet fait


        //maj objet
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist();
        $entityManager->flush();
        $this->addFlash('success', 'Votre conference a bien été enregistrée.');

        //renvoyer sur la liste
        return $this->forward($this->routeToControllerName('addTransfer'));
    }

    private function routeToControllerName($routename) {
        $routes = $this->get('router')->getRouteCollection();
        return $routes->get($routename)->getDefaults()['_controller'];
    }
}