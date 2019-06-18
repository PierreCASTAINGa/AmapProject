<?php

namespace App\Controller\Frontend;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/categorie")
 */
class CategorieController extends AbstractController
{
    /**
     * @Route("/", name="categorie_index", methods="GET")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('frontend/categorie/index.html.twig', [
            'categories' => $categorieRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="categorie_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('categorie_index');
        }

        return $this->render('frontend/categorie/new.html.twig', [
            'categorie' => $categorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_show", methods="GET")
     */
    public function show(Categorie $categorie): Response
    {
        return $this->render('frontend/categorie/show.html.twig', [
            'categorie' => $categorie
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categorie_edit", methods="GET|POST")
     */
    public function edit(Request $request, Categorie $categorie): Response
    {
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorie_index');

            // return $this->redirectToRoute('categorie_edit', [
            //     'id' => $categorie->getId()
            // ]);
        }

        return $this->render('frontend/categorie/edit.html.twig', [
            'categorie' => $categorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_delete", methods="DELETE")
     */
    public function delete(Request $request, Categorie $categorie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorie->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorie);
            $em->flush();
        }

        return $this->redirectToRoute('categorie_index');
    }
}
