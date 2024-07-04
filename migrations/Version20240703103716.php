<?php
//
//declare(strict_types=1);
//
//namespace DoctrineMigrations;
//
//use Doctrine\DBAL\Schema\Schema;
//use Doctrine\Migrations\AbstractMigration;
//
///**
// * Auto-generated Migration: Please modify to your needs!
// */
//final class Version20240703103716 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, raison_sociale VARCHAR(255) DEFAULT NULL, forme_juridique VARCHAR(255) DEFAULT NULL, activite VARCHAR(255) DEFAULT NULL, siege_sociale VARCHAR(255) DEFAULT NULL, adresse_postale VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, site_internet VARCHAR(255) DEFAULT NULL, code_commerce VARCHAR(255) DEFAULT NULL, numero_compte_contribuable VARCHAR(255) DEFAULT NULL, regime_fiscale VARCHAR(255) DEFAULT NULL, numero_tele_declarant VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('DROP TABLE societe');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) DEFAULT NULL, CHANGE date date VARCHAR(255) DEFAULT NULL');
//    }
//}
