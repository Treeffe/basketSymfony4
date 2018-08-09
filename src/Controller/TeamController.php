<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 09/08/2018
 * Time: 10:46
 */

namespace App\Controller;
use App\Entity\Team;

use App\Form\addTeamForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends Controller
{
    public function ListTeamAction()
    {
        $teams = $this->getDoctrine()
            ->getRepository(Team::class)
            ->findAll();

        return $this->render('team/teams.html.twig', array('teams' => $teams ));
    }

    public function addTeamAction(Request $request) {
        // 1) build the form
        $team = new Team();
        $form = $this->createForm(addTeamForm::class, $team);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 4) save the Team!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($team);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'Votre équipe à bien été enregistrée.');
            //return $this->redirectToRoute('login');
        }
        return $this->render('team/addTeam.html.twig', ['form' => $form->createView(), 'mainNavRegistration' => true, 'title' => 'Ajout Equipe']);
    }
}