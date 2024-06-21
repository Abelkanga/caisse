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
//final class Version20240610161024 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE bonapprovisionnement CHANGE date date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
//        $this->addSql('ALTER TABLE depense ADD date DATETIME DEFAULT NULL');
//        $this->addSql('ALTER TABLE fdb CHANGE date date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', CHANGE objet objet VARCHAR(255) NOT NULL');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE fdb CHANGE date date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', CHANGE objet objet VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE bonapprovisionnement CHANGE date date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\'');
//        $this->addSql('ALTER TABLE depense DROP date');
//    }
//}
