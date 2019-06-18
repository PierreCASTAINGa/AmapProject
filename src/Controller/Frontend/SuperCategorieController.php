<?php

namespace App\Controller\Frontend;

use App\Entity\SuperCategorie;
use App\Form\SuperCategorieType;
use App\Repository\SuperCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/superCategorie")
 */
class SuperCategorieController extends AbstractController
{
    /**
     * @Route("/", name="super_categorie_index", methods="GET")
     */
    public function index(SuperCategorieRepository $superCategorieRepository): Response
    {
        return $this->render('frontend/super_categorie/index.html.twig', [
            'super_categories' => $superCategorieRepository->findAll()    
        ]);
    }

    /**
     * @Route("/new", name="super_categorie_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $superCategorie = new SuperCategorie();
        $form = $this->createForm(SuperCategorieType::class, $superCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($superCategorie);
            $em->flush();

            return $this->redirectToRoute('super_categorie_index');
        }

        return $this->render('frontend/super_categorie/new.html.twig', [
            'super_categorie' => $superCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="super_categorie_show", methods="GET")
     */
    public function show(SuperCategorie $superCategorie): Response
    {
        return $this->render('frontend/super_categorie/show.html.twig', ['super_categorie' => $superCategorie]);
    }

    /**
     * @Route("/{id}/edit", name="super_categorie_edit", methods="GET|POST")
     */
    public function edit(Request $request, SuperCategorie $superCategorie): Response
    {
        $form = $this->createForm(SuperCategorieType::class, $superCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('super_categorie_edit', ['id' => $superCategorie->getId()]);
        }

        return $this->render('frontend/super_categorie/edit.html.twig', [
            'super_categorie' => $superCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="super_categorie_delete", methods="DELETE")
     */
    public function delete(Request $request, SuperCategorie $superCategorie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$superCategorie->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($superCategorie);
            $em->flush();
        }

        return $this->redirectToRoute('super_categorie_index');
    }
}
