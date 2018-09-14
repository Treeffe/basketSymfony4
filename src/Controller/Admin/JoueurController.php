<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 10/08/2018
 * Time: 10:26
 */

namespace App\Controller\Admin;


use App\Entity\History;
use App\Entity\Joueur;
use App\Entity\Legende;
use App\Entity\Post;
use App\Entity\Stat;
use App\Entity\Team;

use App\Form\addLegendeForm;

use App\Form\addPosteForm;
use App\Form\addStatForm;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class JoueurController extends Controller
{
    public function addLegendeAction(Request $request) {
        //récuperation data
        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();

        $histories = $this->getDoctrine()
            ->getRepository(History::class)
            ->findAll();

        $teams = $this->getDoctrine()
            ->getRepository(Team::class)
            ->findAll();

        return $this->render('Admin/addLegendeForm.html.twig',
            array('posts' => $posts, 'histories' => $histories, 'teams' => $teams ));
    }

    public function addBDDLegendeAction(Request $request) {
        //instanciation Objet
        $stat = new Stat();
        $legende = new Legende();

        //Récuperation + objet fait
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $numero = $_POST['numeroMaillot'];
        $date = $_POST['dateNaissance'];
        $bio = $_POST['bio'];
        $taille = $_POST['taille'];

        $teamId = $_POST['teamId'];
        $postId = $_POST['postId'];

        $point = $_POST['point'];
        $contre = $_POST['contre'];
        $essai = $_POST['essai'];
        $intercept = $_POST['interception'];
        $rebond = $_POST['rebond'];
        $passe = $_POST['passe'];



        $team = $this->getDoctrine()
            ->getRepository(Team::class)
            ->find($teamId);

        $post = $this->getDoctrine()
            ->getRepository(Post::class)
            ->find($postId);

        $legende->setName($name);
        $legende->setLastname($lastname);
        $legende->setNumeroMaillot($numero);
        $legende->setDateNaissance($date);
        $legende->setTeam($team);
        $legende->setDateNaissance($date);
        $legende->setTaille($taille);
        $legende->setBio($bio);
        $legende->setPost($post);

        $uploaddir = '/web/uploads/';
        $uploadfile = $uploaddir . basename($_FILES['logo']['name']);
        if (move_uploaded_file($_FILES['logo']['tmp_name'], getcwd().$uploadfile)) {
            $legende->setPhoto($_FILES['logo']['name']);
        } else {
            $legende->setPhoto('uploads/nbaIcone.jpg');
        }

        $stat->setContre($contre);
        $stat->setEssai($essai);
        $stat->setInterception($intercept);
        $stat->setPasse($passe);
        $stat->setPoint($point);
        $stat->setRebond($rebond);

        $legende->setStat($stat);

        //Mise en base
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($stat);

        //echo '<pre>';
        //var_dump($entityManager);
        //echo '</pre>';
        //die("bonjour");

        $legende->setStat($stat);
        $entityManager->persist($legende);
        $entityManager->flush();
        // ... do any other work - like sending them an email, etc
        // maybe set a "flash" success message for the user
        $this->addFlash('success', 'Votre joueur à bien été enregistré.');

        return $this->forward($this->routeToControllerName('addLegende'));
    }

    public function addJoueurAction(Request $request) {
        //récuperation data
        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();

        $teams = $this->getDoctrine()
            ->getRepository(Team::class)
            ->findAll();

        return $this->render('Admin/addJoueurForm.html.twig', array('posts' => $posts, 'teams' => $teams ));
    }

    public function addJoueurBDDAction(Request $request) {
        //instanciation Objet
        $stat = new Stat();
        $joueur = new Joueur();

        $date = $_POST['dateNaissance'];

        //Récuperation + objet fait
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $numero = $_POST['numeroMaillot'];

        $bio = $_POST['bio'];
        $taille = $_POST['taille'];

        $teamId = $_POST['teamId'];
        $postId = $_POST['postId'];

        $team = $this->getDoctrine()
            ->getRepository(Team::class)
            ->find($teamId);

        $poste = $this->getDoctrine()
            ->getRepository(Post::class)
            ->find($postId);

        $point = $_POST['point'];
        $contre = $_POST['contre'];
        $essai = $_POST['essai'];
        $intercept = $_POST['interception'];
        $rebond = $_POST['rebond'];
        $passe = $_POST['passe'];

        $titulaire ="";
        if(! isset($_POST['titulaire']))
        {
            $titulaire = "pas titulaire";
        }
        else
        {
            $titulaire = $_POST['titulaire'];
        }
        //die(var_dump($titulaire));
        $joueur->setTitulaire($titulaire);
        $joueur->setName($name);
        $joueur->setLastname($lastname);
        $joueur->setNumeroMaillot($numero);
        $joueur->setDateNaissance($date);
        $joueur->setTaille($taille);
        $joueur->setBio($bio);
        $joueur->setPost($poste);
        $joueur->setTeam($team);

        $stat->setContre($contre);
        $stat->setEssai($essai);
        $stat->setInterception($intercept);
        $stat->setPasse($passe);
        $stat->setPoint($point);
        $stat->setRebond($rebond);

        $uploaddir = '/web/uploads/';
        $uploadfile = $uploaddir . basename($_FILES['logo']['name']);
        if (move_uploaded_file($_FILES['logo']['tmp_name'], getcwd().$uploadfile)) {
            $joueur->setPhoto($_FILES['logo']['name']);
        } else {
            $joueur->setPhoto('uploads/nbaIcone.jpg');
        }

        //Mise en base
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($stat);

        //echo '<pre>';
        //var_dump($entityManager);
        //echo '</pre>';
        //die("bonjour");

        $joueur->setStat($stat);
        $entityManager->persist($joueur);
        $entityManager->flush();
        // ... do any other work - like sending them an email, etc
        // maybe set a "flash" success message for the user
        $this->addFlash('success', 'Votre joueur à bien été enregistré.');

        return $this->forward($this->routeToControllerName('addJoueur'));
    }

    private function routeToControllerName($routename) {
        $routes = $this->get('router')->getRouteCollection();
        return $routes->get($routename)->getDefaults()['_controller'];
    }
}