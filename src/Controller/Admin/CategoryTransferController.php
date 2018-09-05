<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 05/09/2018
 * Time: 14:36
 */

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\CategorieTransfer;

use App\Form\addCategorieTransfer;

class CategoryTransferController extends Controller
{
    /**
     * @Route("/admin/addCategoryTransfer", name="addCategoryTransfer")
     */
    public function addHistoryAction(Request $request) {
        // 1) build the form
        $categorie = new CategorieTransfer();
        $form = $this->createForm(addCategorieTransfer::class, $categorie);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 4) save the Team!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorie);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'Votre categorie a été enregistrée.');
            //return $this->redirectToRoute('login');
        }
        return $this->render('Admin/addCategorieTransfer.html.twig', ['form' => $form->createView(), 'mainNavRegistration' => true, 'title' => 'Ajout categorie transfert']);
    }
}