<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 27/08/2018
 * Time: 17:54
 */

namespace App\Controller\Admin;

use App\Entity\Conference;

use App\Form\addConferenceForm;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ConferenceController extends Controller
{
    public function addConferenceAction(Request $request) {
        // 1) build the form
        $conference = new Conference();
        $form = $this->createForm(addConferenceForm::class, $conference);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 4) save the Team!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($conference);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'Votre conference a été enregistrée.');
            //return $this->redirectToRoute('login');
        }
        return $this->render('Admin/addConference.html.twig', ['form' => $form->createView(), 'mainNavRegistration' => true, 'title' => 'Ajout Poste']);
    }
}