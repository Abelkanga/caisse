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
//final class Version20240610163441 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE bon_caisse CHANGE uuid uuid VARCHAR(255) DEFAULT NULL, CHANGE reference reference VARCHAR(255) DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE bonapprovisionnement CHANGE date date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', CHANGE updated_at updated_at DATETIME DEFAULT NULL');
//        $this->addSql('ALTER TABLE caisse CHANGE responsable responsable VARCHAR(255) DEFAULT NULL, CHANGE soldedispo soldedispo NUMERIC(10, 2) DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE depense ADD category VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE total total NUMERIC(10, 2) DEFAULT NULL');
//        $this->addSql('ALTER TABLE emeteur CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE contact contact VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE expense CHANGE code code VARCHAR(255) DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) NOT NULL, CHANGE departement departement VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE total total NUMERIC(10, 2) DEFAULT NULL, CHANGE beneficiaire beneficiaire VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE journee CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE close_at close_at DATETIME DEFAULT NULL, CHANGE debit debit NUMERIC(10, 2) DEFAULT NULL, CHANGE credit credit NUMERIC(10, 2) DEFAULT NULL, CHANGE solde solde NUMERIC(10, 2) DEFAULT NULL, CHANGE last_solde last_solde NUMERIC(10, 2) DEFAULT NULL');
//        $this->addSql('ALTER TABLE type_expense CHANGE code code VARCHAR(255) DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE user CHANGE contact contact VARCHAR(255) DEFAULT NULL, CHANGE pseudo pseudo VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE journee CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\', CHANGE close_at close_at DATETIME DEFAULT \'NULL\', CHANGE debit debit NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE credit credit NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE solde solde NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE last_solde last_solde NUMERIC(10, 2) DEFAULT \'NULL\'');
//        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
//        $this->addSql('ALTER TABLE caisse CHANGE responsable responsable VARCHAR(255) DEFAULT \'NULL\', CHANGE soldedispo soldedispo NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE code code VARCHAR(255) DEFAULT \'NULL\'');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) DEFAULT \'NULL\', CHANGE departement departement VARCHAR(255) DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE total total NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE beneficiaire beneficiaire VARCHAR(255) DEFAULT \'NULL\', CHANGE date date DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
//        $this->addSql('ALTER TABLE user CHANGE contact contact VARCHAR(255) DEFAULT \'NULL\', CHANGE pseudo pseudo VARCHAR(255) DEFAULT \'NULL\'');
//        $this->addSql('ALTER TABLE type_expense CHANGE code code VARCHAR(255) DEFAULT \'NULL\', CHANGE name name VARCHAR(255) DEFAULT \'NULL\', CHANGE status status VARCHAR(255) DEFAULT \'NULL\'');
//        $this->addSql('ALTER TABLE bonapprovisionnement CHANGE date date DATE DEFAULT \'NULL\' COMMENT \'(DC2Type:date_immutable)\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
//        $this->addSql('ALTER TABLE depense DROP category, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE total total NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE date date DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
//        $this->addSql('ALTER TABLE expense CHANGE code code VARCHAR(255) DEFAULT \'NULL\', CHANGE name name VARCHAR(255) DEFAULT \'NULL\', CHANGE status status VARCHAR(255) DEFAULT \'NULL\'');
//        $this->addSql('ALTER TABLE bon_caisse CHANGE uuid uuid VARCHAR(255) DEFAULT \'NULL\', CHANGE reference reference VARCHAR(255) DEFAULT \'NULL\', CHANGE status status VARCHAR(255) DEFAULT \'NULL\'');
//        $this->addSql('ALTER TABLE emeteur CHANGE name name VARCHAR(255) DEFAULT \'NULL\', CHANGE contact contact VARCHAR(255) DEFAULT \'NULL\'');
//    }
//}
