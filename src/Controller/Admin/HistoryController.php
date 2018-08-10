<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 10/08/2018
 * Time: 15:13
 */

namespace App\Controller\Admin;

use App\Entity\History;

use App\Form\addHistoryForm;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HistoryController extends Controller
{
    public function addHistoryAction(Request $request) {
        // 1) build the form
        $history = new History();
        $form = $this->createForm(addHistoryForm::class, $history);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 4) save the Team!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($history);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'Votre historique a été enregistré.');
            //return $this->redirectToRoute('login');
        }
        return $this->render('Admin/addHistory.html.twig', ['form' => $form->createView(), 'mainNavRegistration' => true, 'title' => 'Ajout Poste']);
    }
}