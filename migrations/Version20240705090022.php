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
//final class Version20240705090022 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE bonapprovisionnement ADD nom_banque VARCHAR(255) DEFAULT NULL, ADD nom_caisse VARCHAR(255) DEFAULT NULL, ADD numero_bon VARCHAR(255) DEFAULT NULL, ADD nom_tiers VARCHAR(255) DEFAULT NULL, ADD echeance DATETIME DEFAULT NULL, CHANGE user_id user_id INT NOT NULL, CHANGE date date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', CHANGE modepaie modepaie VARCHAR(255) NOT NULL, CHANGE montanttotal montanttotal DOUBLE PRECISION NOT NULL, CHANGE status status VARCHAR(255) NOT NULL, CHANGE uuid uuid VARCHAR(255) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) DEFAULT NULL, CHANGE date date VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE bonapprovisionnement DROP nom_banque, DROP nom_caisse, DROP numero_bon, DROP nom_tiers, DROP echeance, CHANGE user_id user_id INT DEFAULT NULL, CHANGE date date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', CHANGE modepaie modepaie VARCHAR(255) DEFAULT NULL, CHANGE montanttotal montanttotal DOUBLE PRECISION DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL, CHANGE uuid uuid VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
//    }
//}
