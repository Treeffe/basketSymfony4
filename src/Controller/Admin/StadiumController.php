<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 10/08/2018
 * Time: 16:24
 */

namespace App\Controller\Admin;

use App\Entity\Stadium;

use App\Form\addStadiumForm;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class StadiumController extends Controller
{
    public function addStadiumAction(Request $request) {
        // 1) build the form
        $stadium = new Stadium();
        $form = $this->createForm(addStadiumForm::class, $stadium);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 4) save the Team!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stadium);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'Votre stade a été enregistré.');
            //return $this->redirectToRoute('login');
        }
        return $this->render('Admin/addStadium.html.twig', ['form' => $form->createView(), 'mainNavRegistration' => true, 'title' => 'Ajout Poste']);
    }
}