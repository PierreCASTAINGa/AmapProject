<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\SuperCategorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager)

    {

        $jos_categorie = array(
            array('Id' => '1','Nom_categorie' => 'Légumes BIO','Produits' => 'Légumes de saison','NbCheques' => '5','NbChequesFixe' => '0','Remarque' => 'Cette année Francelyne prendra 60 contrats légumes maximum. Démarrage des livraisons le jeudi 31 mai.
          Vous avez la possibilité pour ce contrat de prendre 1 à 2 semaines de congés : 1 semaine de congé entre juin et mi octobre et 1 semaine entre mi-octobre et fin février.
          Retirez alors 1 ou 2 semaines au contrat et ne payez que 37 ou 36 semaines au lieu de 38 (38 semaines sur une année complète, 2 saisons).
          
          Liste des légumes distribués la saison dernière: basilic, ciboulette, coriandre, persil, thym, aubergine, betterave, blette, carotte, céleri branche, chou broco, chou de Bruxelles,chou cabus, chou chinois, chou fleur chou kale, chou roma, chou vert, concombre, courge, courgette, courgette ronde, cresson, échalote, épinard, fenouil, fève, haricot, jeunes pousses, mâche
          mesclun, navet, oignon cons, oignon frais, oseille, panais, pastèque, patate, patate nouvelle, pâtisson, physalis, piment doux, piment fort, poireau, pois, poivron, poivron corno, radis noir
          radis rose, roquette, salade, tomate cerise, tomate divers, tomate ronde.
          
          
          
          
          ','Actif' => '0','conge_possible' => '1'),
            array('Id' => '2','Nom_categorie' => 'Lait, yaourts, fromage blanc BIO','Produits' => 'Du lait, des yaourts et fromage blanc','NbCheques' => '3','NbChequesFixe' => '0','Remarque' => 'Livraison du lait en vrac : Venir avec votre bouteille donnée en début de saison-Rapporter les pots et couvercles des yaourts et fromage blanc à chaque livraison','Actif' => '1','conge_possible' => '0'),
            array('Id' => '3','Nom_categorie' => 'Oeufs BIO','Produits' => 'Oeufs BIO','NbCheques' => '4','NbChequesFixe' => '0','Remarque' => 'Moyens (entre 53 et 63 g) - Il est IMPERATIF que chaque Amapien apporte sa boite à oeufs.
          NOUVEAUTE : Conserve de poule en gelée aromatisée au thym - bocal de 750g','Actif' => '1','conge_possible' => '0'),
            array('Id' => '4','Nom_categorie' => 'Poulets BIO et conserves poulets','Produits' => 'Poulets + conserves','NbCheques' => '3','NbChequesFixe' => '0','Remarque' => 'RAPPORTER les bocaux vides des conserves à chaque livraison. Notre producteur doit procéder à un vide sanitaire. Il y aura seulement 3 livraisons de poulets sur cette saison d\'octobre à décembre.','Actif' => '1','conge_possible' => '0'),
            array('Id' => '5','Nom_categorie' => 'Colis de porc et salaisons','Produits' => 'Colis de porc et salaisons','NbCheques' => '3','NbChequesFixe' => '0','Remarque' => 'RAPPORTER les bocaux vides des conserves à chaque livraison','Actif' => '1','conge_possible' => '0'),
            array('Id' => '6','Nom_categorie' => 'Tomme de brebis','Produits' => 'Tommes de brebis','NbCheques' => '2','NbChequesFixe' => '0','Remarque' => '','Actif' => '1','conge_possible' => '0'),
            array('Id' => '7','Nom_categorie' => 'Fromage de chèvre & brebis','Produits' => 'Fromage de chèvre et brebis','NbCheques' => '3','NbChequesFixe' => '0','Remarque' => 'Afin de limiter le coût des emballages pour le producteur, il est IMPORTANT de rapporter les emballages des yaourts, faisselles, caillés à chaque livraison
          ','Actif' => '1','conge_possible' => '0'),
            array('Id' => '8','Nom_categorie' => 'Pains BIO','Produits' => 'Pains','NbCheques' => '6','NbChequesFixe' => '0','Remarque' => 'Important : Il est conseillé de venir à chaque distribution avec un torchon ou un sac à pain en tissu.
          23 semaines de livraison dont inclus 2 jours de congés : 3 janvier + 1 jour volant.','Actif' => '1','conge_possible' => '0'),
            array('Id' => '9','Nom_categorie' => 'Colis veau et steaks hachés de veau BIO  ','Produits' => 'Colis de veau - steaks hachés de veau - conserves axoa ','NbCheques' => '2','NbChequesFixe' => '0','Remarque' => 'Possibilité de faire 2 chèques par colis de veau. A rapporter les bocaux vides des conserves à chaque livraison','Actif' => '1','conge_possible' => '0'),
            array('Id' => '10','Nom_categorie' => 'Pommes, Kiwis BIO, Jus de fruits BIO','Produits' => 'Pommes, Kiwis, Jus de fruits','NbCheques' => '2','NbChequesFixe' => '0','Remarque' => 'A rapporter les bouteilles vides et pour limiter les poches plastiques apporter un contenant pour les pommes.
          Commande Kiwis : minimum 10 par livraison','Actif' => '1','conge_possible' => '0'),
            array('Id' => '11','Nom_categorie' => 'Colis de poissons','Produits' => 'Colis de poissons','NbCheques' => '3','NbChequesFixe' => '1','Remarque' => 'RAPPORTER les bocaux et bouteilles vides à chaque livraison.
          IMPORTANT : Nous partageons la livraison de poissons avec l\'Amap de Billère. La distribution sur Lons se fait de 19h à 19h30.
          Mode de paiement obligatoire : 1 chèque par livraison  ','Actif' => '1','conge_possible' => '0'),
            array('Id' => '12','Nom_categorie' => 'Champignons de Madiran BIO','Produits' => 'Champignons de Madiran','NbCheques' => '4','NbChequesFixe' => '0','Remarque' => 'Pour éviter une augmentation des prix, il est IMPERATIF de rapporter la cagette à chaque livraison.
          Possibilité d\'indiquer au dos des chèques les dates d\'encaissement.','Actif' => '1','conge_possible' => '0'),
            array('Id' => '13','Nom_categorie' => 'Farines BIO','Produits' => 'Farines de haricots','NbCheques' => '2','NbChequesFixe' => '0','Remarque' => '','Actif' => '1','conge_possible' => '0'),
            array('Id' => '14','Nom_categorie' => 'Huiles, Conserves haricots maïs cuisinés','Produits' => 'Huiles de colza et tournesol, conserve haricots cuisinés','NbCheques' => '1','NbChequesFixe' => '0','Remarque' => 'Production en conventionnel charte agri durable les huiles sont issues d\'une 1ère pression à froid.
          IMPORTANT : Livraison en vrac, venir avec votre bouteille de 1 litre à chaque livraison.
          Haricots maïs cuisinés au naturel, rapporter les bocaux vides à chaque livraison
          ','Actif' => '1','conge_possible' => '0'),
            array('Id' => '15','Nom_categorie' => 'Pêches Roussane & Nectar de pêches','Produits' => 'Pêches Roussane','NbCheques' => '2','NbChequesFixe' => '0','Remarque' => 'Pêches Roussane de Monein "Ces belles pêches dites Roussanes reposaient sur un lit de feuilles de vigne, leur couleur d\'un jaune intense était relevé par des teintes délicatement rosées et frappées d\'un rouge vif ou vineux du côté de l\'insolation" Extrait  du compte-rendu de la société d\'horticulture des Basses-Pyrénées, 1885. 
          IMPORTANT : rapporter les cagettes à chaque livraison. Les dates de livraisons seront précisées en fonction de la maturité des fruits et de la météo.','Actif' => '0','conge_possible' => '0'),
            array('Id' => '16','Nom_categorie' => 'Haricots maïs frais','Produits' => 'Haricots maïs','NbCheques' => '1','NbChequesFixe' => '0','Remarque' => 'Haricots maïs cultivés sur la commune de Larreule. Cahier des charges contrôlé par Agrocert : pas de désherbant, pas d\'insecticide.','Actif' => '0','conge_possible' => '0'),
            array('Id' => '17','Nom_categorie' => 'Miel et pain d\'épices','Produits' => 'Miel et pain d\'épices','NbCheques' => '2','NbChequesFixe' => '0','Remarque' => 'Rapporter les pots vides à chaque livraison','Actif' => '1','conge_possible' => '0'),
            array('Id' => '18','Nom_categorie' => 'Truites, Saumons','Produits' => 'Truites, Saumons, Rillettes','NbCheques' => '3','NbChequesFixe' => '0','Remarque' => 'L\'alimentation des truites est issue de l\'agriculture biologique.
          Afin de limiter les poches plastiques, nous vous demandons de venir avec un contenant pour récupérer vos produits.
          NOUVEAUTÉ  : Truite de 1 kg (4 personnes) - NOUVEAUTE : Les truites sont livrées vidées.','Actif' => '1','conge_possible' => '0'),
            array('Id' => '19','Nom_categorie' => 'Colis Boeuf et Steaks hachés BIO','Produits' => 'Boeuf,steaks hachés, conserves BIO','NbCheques' => '2','NbChequesFixe' => '0','Remarque' => 'CHANGEMENT DE PRODUCTEUR. François GAILLICOU est installé en BIO depuis 2003. Il est entièrement autonome en fourrage, céréales et protéagineux.
          Ses produits proviennent de bœufs et non pas de vaches. Tous les bœufs sont nés et élevés à la ferme. La viande de bœuf est plus goûteuse. 
          Le nombre de chèque est fixé à 2 maximum dont le premier sera encaissé 1 mois avant la livraison.
          ','Actif' => '1','conge_possible' => '0'),
            array('Id' => '20','Nom_categorie' => 'Vin BIO du Jurançon ','Produits' => 'Vins BIO du Jurançon ','NbCheques' => '2','NbChequesFixe' => '0','Remarque' => 'Vin issu de raisin élevé en bio-dynamie certifiée.','Actif' => '1','conge_possible' => '0'),
            array('Id' => '21','Nom_categorie' => 'Myrtilles BIO','Produits' => 'Myrtilles','NbCheques' => '1','NbChequesFixe' => '0','Remarque' => ' Certifiée par Ecocert, la plantation de myrtilles est BIO depuis 1995.Les myrtilles se ramassent à maturité à partir de mi-juin, sur une période de 6 semaines environ.La récolte se fait uniquement à la main. IMPORTANT : La date de livraison sera précisée en fonction de la maturité des fruits et de météo.','Actif' => '0','conge_possible' => '0'),
            array('Id' => '25','Nom_categorie' => 'Conserves canards gras','Produits' => 'Conserves canards','NbCheques' => '2','NbChequesFixe' => '0','Remarque' => 'IMPORTANT : Commande à faire avant le  26 OCTOBRE pour une livraison le 14 décembre. Possibilité de faire 2 chèques avec un premier encaissement par le producteur au mois de novembre.
          ','Actif' => '1','conge_possible' => '0'),
            array('Id' => '26','Nom_categorie' => 'Catégorie Test','Produits' => '','NbCheques' => '3','NbChequesFixe' => '0','Remarque' => '','Actif' => '0','conge_possible' => '0'),
            array('Id' => '27','Nom_categorie' => 'Agneau','Produits' => 'Agneau','NbCheques' => '1','NbChequesFixe' => '0','Remarque' => '','Actif' => '0','conge_possible' => '0'),
            array('Id' => '28','Nom_categorie' => 'AMAP Cotisation annuelle','Produits' => 'Cotisation annuelle','NbCheques' => '1','NbChequesFixe' => '1','Remarque' => 'Cotisation pour 12 mois soit 2 saisons (01/04/N au 31/03/N+1).
          Cette cotisation couvre nos frais de gestion, principalement l\'assurance, l\'hébergement du site.
          Chèque à faire au nom de "AMAP Lons"
          ','Actif' => '1','conge_possible' => '0'),
            array('Id' => '29','Nom_categorie' => 'Bières artisanales Béarnaises','Produits' => 'Bières','NbCheques' => '3','NbChequesFixe' => '0','Remarque' => 'Jean-Christophe Bert est installé sur Estialescq à côté d\'Oloron. La bière est brassée à partir de malt et de blé cultivé localement. Non filtrée, le léger dépôt au fond de la bouteille est naturel et n\'altère en rien la qualité.  IMPORTANT : rapporter les bouteilles vides lavées à chaque livraison.','Actif' => '1','conge_possible' => '0'),
            array('Id' => '30','Nom_categorie' => 'Cidre Béarnais et autres produits','Produits' => 'Cidre, vinaigre de cidre, gelée de cidre, apéritif','NbCheques' => '2','NbChequesFixe' => '0','Remarque' => 'Julien Hamelin et Audrey Labrouche ont créé la Cidrerie Béarnaise à Casteide-Cami en septembre 2016. Leur objectif est de maîtriser toutes les étapes de fabrication du produit : culture, ramassage, pressage, mise en bouteille et commercialisation. Pour le moment les pommes sont issues de vergers non traités ou en agriculture biologique en Normandie. Ils ont planté 1.5ha de verger de pommes à cidre au printemps 2018 sur le sol béarnais. Leur but est d\'atteindre 3ha de vergers. RAPPORTER les bouteilles et les pots vides à chaque livraison.','Actif' => '1','conge_possible' => '0'),
            array('Id' => '31','Nom_categorie' => 'Gelée Royale','Produits' => 'Gelée Royale - pot de 10g','NbCheques' => '1','NbChequesFixe' => '1','Remarque' => 'Clémentine possède une quarantaine de ruches et essaims installés en sédentaire sur les côteaux de Rontignon et sur le secteur sud de Pau. Elle achète des Reines et de la cire chez des apiculteurs pyrénéens BIO.  Pour les apports nécessaires en saison de production, utilisation du miel produit par les abeilles ou sucre BIO
          On peut consommer de la Gelée Royale en cure, de préférence, aux intersaisons (printemps et automne), toute l\'année... afin de faire le plein de vitamines, d\'oligoéléments et d\'antioxydants. 
          Un pot de 10g représente une cure de 2 à 3 semaines à raison d\'une à deux cuillères doses par jour (0.5 à 1g par dose) pour un adulte bien portant.
          IMPORTANT : à conserver au frigo entre +2° et +5° - DLC 18 mois pot fermé.','Actif' => '1','conge_possible' => '0'),
            array('Id' => '32','Nom_categorie' => 'Pâtes - Farines de blé ancien','Produits' => 'Pâtes au blé Poulard d\'Auverge ou  au Petit Epeautre','NbCheques' => '1','NbChequesFixe' => '0','Remarque' => 'La Société Coopérative d’Intérêt Collectif (SCIC) L’Odyssée d’ENGRAIN a été constituée mi-2013 pour créer un atelier de transformation de céréales à destination de l’alimentation humaine. De cette société est née un atelier de transformation collectif qui a vu le jour début 2014 avec pour première production des pâtes alimentaires fabriquées à base de Blé Poulard, variété ancienne de blé, et de Petit Epeautre, cultivés en agriculture biologique dans les fermes des producteurs du piémont pyrénéen. La conservation des pâtes est de 12 mois. La cuisson est de 3 à 5 mn selon les formes. N\'hésitez pas à vous regrouper pour partager les cartons de 5kg.','Actif' => '1','conge_possible' => '0'),
            array('Id' => '33','Nom_categorie' => 'Conserve Poule au Pot','Produits' => 'Poule au Pot','NbCheques' => '1','NbChequesFixe' => '0','Remarque' => 'Pas d\'ajout de viande de porc, bouillon préparé avec les carcasses. Rapporter les bocaux vides','Actif' => '1','conge_possible' => '0'),
            array('Id' => '34','Nom_categorie' => 'Raisins BIO','Produits' => 'Raisins de table BIO','NbCheques' => '2','NbChequesFixe' => '0','Remarque' => 'Il y a 5 variétés, les raisins seront livrés en fonction de la maturité (fin août à début octobre) et par ordre de précocité : Chasselas, Centennial (blanc sans pépin), Alfonse Lavallée (gros rouge), Exalta (blanc sans pépin) et Muscat de Hambourg (rouge). Le producteur estime qu\'il pourra fournir 2 livraisons de raisins blanc et 1 livraison de raisins rouge.','Actif' => '0','conge_possible' => '0')
          );

        
        foreach ($jos_categorie as $cat) {

            $categorie = new Categorie();

            $categorie->setId($cat['Id']);
            $categorie->setNom($cat['Nom_categorie']);
            $categorie->setNbCheque($cat['NbCheques']);
            $categorie->setNbChequeFixe($cat['NbChequesFixe']);
            $categorie->setRemarque($cat['Remarque']);
            $categorie->setActif($cat['Actif']);

            $manager->persist($categorie);
        }

        $manager->flush();
    }
}
