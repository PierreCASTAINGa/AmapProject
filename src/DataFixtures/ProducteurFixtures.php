<?php

namespace App\DataFixtures;

use App\Entity\Producteur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProducteurFixtures extends Fixture
{
    public function load(ObjectManager $manager)


    {

        $jos_producteur = array(
            array('id_producteur' => '1211','raison_sociale' => 'Francelyne Empeyrou - Arruhat','nom_responsable' => 'Empeyrou - Arruhat','prenom_responsable' => 'Francelyne','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1211','id_categorie' => '1','actif' => '1'),
            array('id_producteur' => '1212','raison_sociale' => 'Philippe CLAVERIE','nom_responsable' => 'CLAVERIE','prenom_responsable' => 'Philippe ','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1212','id_categorie' => '2','actif' => '0'),
            array('id_producteur' => '1213','raison_sociale' => 'EARL PICAPOUT','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1213','id_categorie' => '3','actif' => '0'),
            array('id_producteur' => '1214','raison_sociale' => 'Michel CAMBAYOU','nom_responsable' => 'CAMBAYOU','prenom_responsable' => 'Michel','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1214','id_categorie' => '4','actif' => '1'),
            array('id_producteur' => '1214','raison_sociale' => 'Michel CAMBAYOU','nom_responsable' => 'CAMBAYOU','prenom_responsable' => 'Michel','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1214','id_categorie' => '5','actif' => '1'),
            array('id_producteur' => '1215','raison_sociale' => 'Jean Pierre et Martine LESTELLE','nom_responsable' => 'LESTELLE','prenom_responsable' => 'Jean Pierre et Martine','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1215','id_categorie' => '6','actif' => '1'),
            array('id_producteur' => '1216','raison_sociale' => 'La ferme de Lou Viens','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1216','id_categorie' => '7','actif' => '1'),
            array('id_producteur' => '1216','raison_sociale' => 'La ferme de Lou Viens','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1216','id_categorie' => '27','actif' => '1'),
            array('id_producteur' => '1217','raison_sociale' => 'Didier Lemonnier','nom_responsable' => 'Lemonnier','prenom_responsable' => 'Didier','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1217','id_categorie' => '8','actif' => '1'),
            array('id_producteur' => '1218','raison_sociale' => 'Sandrine BARUS "SCEA Myrtilles de Bournos"','nom_responsable' => 'BARUS','prenom_responsable' => 'Sandrine','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1218','id_categorie' => '9','actif' => '1'),
            array('id_producteur' => '1218','raison_sociale' => 'Sandrine BARUS "SCEA Myrtilles de Bournos"','nom_responsable' => 'BARUS','prenom_responsable' => 'Sandrine','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1218','id_categorie' => '21','actif' => '1'),
            array('id_producteur' => '1219','raison_sociale' => 'LOUIT','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1219','id_categorie' => '10','actif' => '1'),
            array('id_producteur' => '1220','raison_sociale' => 'Armement LAFARGUE','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1220','id_categorie' => '11','actif' => '1'),
            array('id_producteur' => '1221','raison_sociale' => 'CHÂTEAU LAPUYADE - SCEA CLOS MARIE-LOUISE','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1221','id_categorie' => '20','actif' => '1'),
            array('id_producteur' => '1223','raison_sociale' => 'SCEA Bioagricola','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1223','id_categorie' => '13','actif' => '1'),
            array('id_producteur' => '1224','raison_sociale' => 'Delicies de Momas','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1224','id_categorie' => '14','actif' => '1'),
            array('id_producteur' => '1225','raison_sociale' => 'Isabelle et Pascal LABASSE','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1225','id_categorie' => '15','actif' => '1'),
            array('id_producteur' => '1226','raison_sociale' => 'La Couveuse','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1226','id_categorie' => '16','actif' => '0'),
            array('id_producteur' => '1227','raison_sociale' => 'Jean-Jacques ARRIEULA','nom_responsable' => 'ARRIEULA','prenom_responsable' => 'Jean-Jacques','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1227','id_categorie' => '17','actif' => '1'),
            array('id_producteur' => '1228','raison_sociale' => 'Romain VEAU','nom_responsable' => 'VEAU','prenom_responsable' => 'Romain','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1228','id_categorie' => '18','actif' => '1'),
            array('id_producteur' => '1229','raison_sociale' => 'Chrystèle et Jean Barrère','nom_responsable' => 'Barrère','prenom_responsable' => 'Chrystèle et Jean','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1229','id_categorie' => '19','actif' => '0'),
            array('id_producteur' => '1232','raison_sociale' => 'Champignons du Madiran','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1232','id_categorie' => '12','actif' => '1'),
            array('id_producteur' => '1233','raison_sociale' => 'Jean et Viviane Lagrange','nom_responsable' => 'Lagrange','prenom_responsable' => 'Jean et Viviane Lagrange','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1233','id_categorie' => '25','actif' => '1'),
            array('id_producteur' => '1234','raison_sociale' => 'GAEC PIETOMETI','nom_responsable' => 'GAEC','prenom_responsable' => 'PIETOMETI','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1234','id_categorie' => '16','actif' => '0'),
            array('id_producteur' => '1235','raison_sociale' => 'Amap Lons','nom_responsable' => 'Raynaud','prenom_responsable' => 'Patrick','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1235','id_categorie' => '2','actif' => '0'),
            array('id_producteur' => '1235','raison_sociale' => 'Amap Lons','nom_responsable' => 'Raynaud','prenom_responsable' => 'Patrick','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1235','id_categorie' => '28','actif' => '1'),
            array('id_producteur' => '1236','raison_sociale' => 'EARL BISCAR','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1236','id_categorie' => '2','actif' => '1'),
            array('id_producteur' => '1237','raison_sociale' => 'Didier ARRAMON','nom_responsable' => 'ARRAMON','prenom_responsable' => 'Didier','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1237','id_categorie' => '16','actif' => '1'),
            array('id_producteur' => '1238','raison_sociale' => 'Gautier DESES','nom_responsable' => 'DESES','prenom_responsable' => 'Gautier','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1238','id_categorie' => '3','actif' => '1'),
            array('id_producteur' => '1239','raison_sociale' => 'Brasserie de l\'Arrec','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1239','id_categorie' => '29','actif' => '1'),
            array('id_producteur' => '1240','raison_sociale' => 'Cidrerie Béarnaise','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1240','id_categorie' => '30','actif' => '1'),
            array('id_producteur' => '1241','raison_sociale' => 'Clémentine PRADALIER','nom_responsable' => 'PRADALIER','prenom_responsable' => 'Clémentine','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1241','id_categorie' => '31','actif' => '1'),
            array('id_producteur' => '1242','raison_sociale' => 'SCIC L\'Odyssée d\'Engrains','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1242','id_categorie' => '32','actif' => '1'),
            array('id_producteur' => '1243','raison_sociale' => 'Brigitte LACADEE','nom_responsable' => 'LACADEE','prenom_responsable' => 'Brigitte','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1243','id_categorie' => '33','actif' => '1'),
            array('id_producteur' => '1244','raison_sociale' => 'Domaine LARROUDE','nom_responsable' => 'LARROUDE','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1244','id_categorie' => '34','actif' => '1'),
            array('id_producteur' => '1245','raison_sociale' => 'Ferme GAILLICOU','nom_responsable' => '','prenom_responsable' => '','adresse_producteur' => '','cp_producteur' => '','ville_producteur' => '','tel_fixe_producteur' => '','tel_port_producteur' => '','id_producteur' => '1245','id_categorie' => '19','actif' => '1')
          );

        foreach ($jos_producteur as $producteur) {

                $producter = new Producteur();

                $producter->setRaisonSociale($producteur['raison_sociale']);
                $producter->setNomResponsable($producteur['nom_responsable']);
                $producter->setPrenomResponsable($producteur['prenom_responsable']);
                $producter->setAdresseProducteur($producteur['adresse_producteur']);
                // $producter->setCpProducteur($producteur['cp_producteur']);
                $producter->setVilleProducteur($producteur['ville_producteur']);
                // $producter->setTelFixeProducteur($producteur['tel_fixe_producteur']);
                // $producter->setTelPortProducteur($producteur['tel_port_producteur']);
                $producter->setActif($producteur['actif']);

                $manager->persist($producter);
        }

            $manager->flush();
    }   
}