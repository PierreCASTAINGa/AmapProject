<?php

namespace App\Controller\Frontend;

use App\Entity\User;
use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\Producteur;
use App\Entity\SuperCategorie;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontendController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    
    public function index() {

        return $this->redirectToRoute('panier');
    }

    /**
     * @Route("/panier", name="panier")
     */
     public function panier()
    {

        $listSuperCategory = $this->getDoctrine()
                                  ->getRepository(SuperCategorie::class)
                                  ->findAll();

        $listCategory = $this->getDoctrine()
                             ->getRepository(Categorie::class)
                             ->findAll();

        $listProduct = $this->getDoctrine()
                            ->getRepository(Produit::class)
                            ->findAll();

        // $listProductor = $this->getDoctrine()
        //                       ->getRepository(Producteur::class)
        //                       ->findAll();

        return $this->render('frontend/panier.html.twig', [
            'section_title' => 'Votre panier',
            'listeSuperCategorie' => $listSuperCategory,
            'listCategory' => $listCategory,
            'produit' => $listProduct,
            // 'producteur' => $listProductor
        ]);
    }

    /**
     * @route("/contrats", name="mes_contrats")
     */
    public function contrat() {

        $listProduct = $this->getDoctrine()
        ->getRepository(Produit::class)
        ->findAll();

        return $this->render('frontend/contrats.html.twig', [
            'section_title' => 'Gérer mes contrats',
            'produit' => $listProduct
        ]);
    }

    /**
     * @route("/commande", name="ma_commande")
     */
    public function commande() {

        $listProduct = $this->getDoctrine()
                            ->getRepository(Produit::class)
                            ->findAll();
        
        return $this->render('frontend/commande.html.twig', [
            'section_title' => 'Valider ma commande'
        ]);
    }

    /**
     * @route("/contrats_a_valider", name="contrats_a_valider")
     */
    public function contrat_a_valider() {

        return $this->render('frontend/contratsavalider.html.twig', [
            'section_title' => 'Mes contrats à valider'
        ]);
    }


    /**
     * @Route("/produits", name="produits")
     */
    public function produit()
    {
        $listCategory = $this->getDoctrine()
                             ->getRepository(Categorie::class)
                             ->findAll();

        $listProduct = $this->getDoctrine()
                             ->getRepository(Produit::class)
                             ->findAll();

        return $this->render('frontend/produit.html.twig', [
            'section_title' => 'Vos produits',
            'listeCategorie' => $listCategory,
            'listeProduit' => $listProduct
        ]);
    }

    /**
     * @Route("/showProduit/{id}", name="showProduit")
     */
    
     public function showProduit($id) {

        $pdt = $this->getDoctrine()
                    ->getRepository(Produit::class)
                    ->findBy(['categorieid' => $id]);

        return $this->render('frontend/commande.html.twig', [
            'section_title' => 'Formulaire de commande',
            'produit' => $pdt
        ]);
    }

    /**
     * @Route("/hello-world",
     * name="helloworld",
     * methods={"GET"})  //vérifier que la requête soit un GET
     */
    public function helloworld()
    {
        // $request = Request::createFromGlobals();
        // $request->getMethod();

        return new Response(
            '<html><body><h1>Hello World</h1></body></html>'
        );
    }

    /**
     * @Route("/hello-world/{name}", name="helloname")
     */
    public function helloname($name)
    {
        $request = Request::createFromGlobals();
        $request->getMethod();

        return new Response(
            '<html><body><h1>Hello '.$name.'</h1></body></html>'
        );
    }

    /**
 * @Route("/Pierre", name="Pierre")
 */
public function pier() 
{
    dd("ok");
    return new Response("<html><body><p>ola</p></body></html>");
}
}

