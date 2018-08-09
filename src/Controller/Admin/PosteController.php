<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 09/08/2018
 * Time: 17:41
 */

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Form\addPosteForm;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PosteController extends Controller
{
    public function addPosteAction(Request $request) {
        // 1) build the form
        $poste = new Post();
        $form = $this->createForm(addPosteForm::class, $poste);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 4) save the Team!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($poste);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'Votre poste a été enregistrée.');
            //return $this->redirectToRoute('login');
        }
        return $this->render('Admin/addPoste.html.twig', ['form' => $form->createView(), 'mainNavRegistration' => true, 'title' => 'Ajout Poste']);
    }
}