<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181221193723 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorie (id INT NOT NULL, super_categorie_id INT DEFAULT NULL, producteur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, nb_cheque INT NOT NULL, nb_cheque_fixe TINYINT(1) DEFAULT NULL, remarque LONGTEXT DEFAULT NULL, actif TINYINT(1) DEFAULT NULL, url_img VARCHAR(255) DEFAULT NULL, description_produits LONGTEXT DEFAULT NULL, INDEX IDX_497DD63498EB5807 (super_categorie_id), INDEX IDX_497DD634AB9BB300 (producteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE super_categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, url_img VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, roles VARCHAR(255) NOT NULL, groupe VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, cp VARCHAR(5) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, tel_fixe VARCHAR(10) DEFAULT NULL, tel_port1 VARCHAR(10) DEFAULT NULL, tel_port2 VARCHAR(10) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, actif TINYINT(1) DEFAULT NULL, identifiant VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, charte_acceptee TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, unite VARCHAR(50) DEFAULT NULL, quantite_min INT NOT NULL, prix DOUBLE PRECISION DEFAULT NULL, nb_cheque INT NOT NULL, nombre_de_distribution INT DEFAULT NULL, nombre_de_livraisons_restantes INT NOT NULL, periode_debut VARCHAR(50) DEFAULT NULL, periode_fin VARCHAR(50) DEFAULT NULL, actif TINYINT(1) DEFAULT NULL, periodicite VARCHAR(50) DEFAULT NULL, categorieid INT NOT NULL, INDEX IDX_29A5EC27BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producteur (id INT AUTO_INCREMENT NOT NULL, raison_sociale VARCHAR(255) NOT NULL, nom_responsable VARCHAR(255) NOT NULL, prenom_responsable VARCHAR(255) NOT NULL, adresse_producteur VARCHAR(255) DEFAULT NULL, cp_producteur VARCHAR(5) DEFAULT NULL, ville_producteur VARCHAR(255) DEFAULT NULL, tel_fixe_producteur VARCHAR(10) DEFAULT NULL, tel_port_producteur VARCHAR(10) DEFAULT NULL, actif TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD63498EB5807 FOREIGN KEY (super_categorie_id) REFERENCES super_categorie (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634AB9BB300 FOREIGN KEY (producteur_id) REFERENCES producteur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD63498EB5807');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634AB9BB300');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE super_categorie');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE producteur');
    }
}
