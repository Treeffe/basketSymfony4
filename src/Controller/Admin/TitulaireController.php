<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 14/09/2018
 * Time: 15:58
 */

namespace App\Controller\Admin;


use App\Entity\Joueur;
use App\Entity\Team;

use App\Entity\Titulaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class TitulaireController extends Controller
{
    /**
     * @Route("/admin/addTitulaire", name="addTitulaire")
     */
    public function addTitulaireAction(Request $request) {
        //récuperation data

        $joueurs = $this->getDoctrine()
            ->getRepository(joueur::class)
            ->findAll();

        $teams = $this->getDoctrine()
            ->getRepository(Team::class)
            ->findAll();

        return $this->render('Admin/addTitulaireForm',
            array( 'joueurs' => $joueurs, 'teams' => $teams ));
    }

    /**
     * @Route("/admin/addTitulaireBDD", name="addTitulaireBDD")
     */
    public function addTitulaireBDDAction(Request $request) {
        //récuperation data
        $titulaire = new Titulaire();

        $team = $this->getDoctrine()
            ->getRepository(Team::class)
            ->find($_POST['teamId']);

        $joueur = $this->getDoctrine()
            ->getRepository(Joueur::class)
            ->find($_POST['joueurId']);

        $titulaire->setJoueur($joueur);
        $titulaire->setTeam($team);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($titulaire);
        $entityManager->flush();
        // ... do any other work - like sending them an email, etc
        // maybe set a "flash" success message for the user
        $this->addFlash('success', 'Votre titulaire à bien été enregistré.');

        return $this->forward($this->routeToControllerName('addTitulaire'));
    }

    private function routeToControllerName($routename) {
        $routes = $this->get('router')->getRouteCollection();
        return $routes->get($routename)->getDefaults()['_controller'];
    }
}