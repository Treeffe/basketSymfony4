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

use App\Form\addCategorieTransfer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class TransferController extends Controller
{
    /**
     * @Route("/admin/addTransfer", name="addTransfer")
     */
    public function addTransfer(Request $request) {
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
    public function addTransferBDDn(Request $request) {
        //instanciation Objet
        $transfer = new Transfer();

        //Récuperation + objet fait
        $categoryId = $_POST['categoryId'];
        $teamAchatId = $_POST['teamAcheteuseId'];
        $teamVendeuseId = $_POST['teamVendeuseId'];
        $joueurId = $_POST['joueurId'];
        $prix = $_POST['prix'];
        $date = $_POST['date'];

        $category = $this->getDoctrine()
            ->getRepository(CategorieTransfer::class)
            ->find($categoryId);

        $teamAchat = $this->getDoctrine()
            ->getRepository(Team::class)
            ->find($teamAchatId);

        $teamVend = $this->getDoctrine()
            ->getRepository(Team::class)
            ->find($teamVendeuseId);

        $joueur = $this->getDoctrine()
            ->getRepository(Joueur::class)
            ->find($joueurId);

        $transfer->setTeamVendeuse($teamVend);
        $transfer->setTeamAcheteuse($teamAchat);
        $transfer->setCategory($category);
        $transfer->setJoueur($joueur);
        $transfer->setPrix($prix);
        $transfer->setDate($date);

        //maj objet
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($transfer);
        $entityManager->flush();
        $this->addFlash('success', 'Votre transfert a bien été enregistré.');

        //renvoyer sur la liste
        return $this->forward($this->routeToControllerName('addTransfer'));
    }

    private function routeToControllerName($routename) {
        $routes = $this->get('router')->getRouteCollection();
        return $routes->get($routename)->getDefaults()['_controller'];
    }
}