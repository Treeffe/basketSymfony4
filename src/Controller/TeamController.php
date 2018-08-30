<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 09/08/2018
 * Time: 10:46
 */

namespace App\Controller;
use App\Entity\Team;
use App\Entity\History;
use App\Entity\Stadium;
use App\Entity\Conference;

use App\Form\addTeamForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends Controller
{
    public function ListTeamConfAction()
    {
        $teams = $this->getDoctrine()
            ->getRepository(Team::class)
            ->findAll();

        $teamsWest = [];
        $teamsEast = [];

        foreach ($teams as $team)
        {
            if($team->getConference()->getPointCardinal() == "Est")
            {
                $teamsEast[] = $team;
            }
            else
            {
                $teamsWest[] = $team;
            }
        }

        return $this->render('team/teams.html.twig', array('teamsEast' => $teamsEast, 'teamsWest' => $teamsWest ));
    }

    public function addTeamAction(Request $request) {
        //récuperation data
        $stadiums = $this->getDoctrine()
            ->getRepository(Stadium::class)
            ->findAll();

        $histories = $this->getDoctrine()
            ->getRepository(History::class)
            ->findAll();

        $conferences = $this->getDoctrine()
            ->getRepository(Conference::class)
            ->findAll();

        return $this->render('Admin/addTeam.html.twig',
            array('stadiums' => $stadiums, 'histories' => $histories, 'conferences' => $conferences ));
    }

    public function addBDDTeamAction(Request $request) {
        //instanciation Objet
        $team = new Team();

        //Récuperation + objet fait
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $position = $_POST['position'];
        $date = $_POST['date'];
        $localisation = $_POST['localisation'];
        $proprietaire = $_POST['proprietaire'];

        //récupération donnée
        if(isset($_POST['historyId'])) {
            $history = $this->getDoctrine()
                ->getRepository(History::class)
                ->find($_POST['historyId']);
        }else{

        }

        if(isset($_POST['stadiumId'])){
            $stadium = $this->getDoctrine()
                ->getRepository(Stadium::class)
                ->find($_POST['stadiumId']);
        }
        else{

        }

        if(isset($_POST['conferenceId']))
        {
            $conference = $this->getDoctrine()
                ->getRepository(Conference::class)
                ->find($_POST['conferenceId']);
        }
        else{

        }

        $uploaddir = '/uploads/';
        $uploadfile = $uploaddir . basename($_FILES['logo']['name']);
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile)) {
            $team->setLogo($_FILES['logo']['name']);
        } else {
            $team->setLogo('uploads/nbaIcone.jpg');
        }

        //maj objet
        $team->setName($name);
        $team->setSurnom($surname);
        $team->setPositionanneePrec($position);
        $team->setDateCreation($date);
        $team->setLocation($localisation);
        $team->setHistory($history);
        $team->setConference($conference);
        $team->setProprietaire($proprietaire);
        $team->setStadium($stadium);

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($team);
        $entityManager->flush();
        $this->addFlash('success', 'Votre compte à bien été enregistré.');

        //renvoyer sur la liste
        return $this->forward($this->routeToControllerName('teams'));
    }

    public function findTeam(Request $request, $id) {
        //récuperation data
        $team = $this->getDoctrine()
            ->getRepository(Team::class)
            ->find($id);

        return $this->render('team/team.html.twig',
            array('team' => $team ));
    }

    private function routeToControllerName($routename) {
        $routes = $this->get('router')->getRouteCollection();
        return $routes->get($routename)->getDefaults()['_controller'];
    }
}