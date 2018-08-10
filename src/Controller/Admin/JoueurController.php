<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 10/08/2018
 * Time: 10:26
 */

namespace App\Controller\Admin;


use App\Entity\History;
use App\Entity\Legende;
use App\Entity\Post;
use App\Entity\Stat;

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

        return $this->render('Joueur/addLegendeForm.html.twig', array('posts' => $posts, 'histories' => $histories ));
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

        $historyId = $_POST['historyId'];
        $history = $_POST['history'];
        $postId = $_POST['postId'];
        $post = $_POST['post'];

        $point = $_POST['point'];
        $contre = $_POST['contre'];
        $essai = $_POST['essai'];
        $intercept = $_POST['interception'];
        $rebond = $_POST['rebond'];
        $passe = $_POST['passe'];

        $legende->setName($name);
        $legende->setLastname($lastname);
        $legende->setNumeroMaillot($numero);
        $legende->setDateNaissance($date);
        $legende->setBio($bio);
        $legende->setPost($post);
        $legende->setHistory($history);

        $stat->setContre($contre);
        $stat->setEssai($essai);
        $stat->setInterception($intercept);
        $stat->setPasse($passe);
        $stat->setPoint($point);
        $stat->setRebond($rebond);

        $legende->setStat($stat);

        //Mise en base
        $entityManager = $this->getDoctrine()->getManager();

        //echo '<pre>';
        //var_dump($entityManager);
        //echo '</pre>';
        //die("bonjour");

        $entityManager->persist($legende);
        $entityManager->flush();
        // ... do any other work - like sending them an email, etc
        // maybe set a "flash" success message for the user
        $this->addFlash('success', 'Votre compte à bien été enregistré.');

        return addLegendeAction($request);
    }
}