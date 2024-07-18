<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240717161232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE banque CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE billetage CHANGE balance balance VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bon_caisse CHANGE uuid uuid VARCHAR(255) DEFAULT NULL, CHANGE reference reference VARCHAR(255) DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL, CHANGE beneficiaire beneficiaire VARCHAR(255) DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bonapprovisionnement CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE reference reference VARCHAR(255) DEFAULT NULL, CHANGE porteur porteur VARCHAR(255) DEFAULT NULL, CHANGE destinataire destinataire VARCHAR(255) DEFAULT NULL, CHANGE check_number check_number VARCHAR(255) DEFAULT NULL, CHANGE nom_banque nom_banque VARCHAR(255) DEFAULT NULL, CHANGE nom_caisse nom_caisse VARCHAR(255) DEFAULT NULL, CHANGE numero_bon numero_bon VARCHAR(255) DEFAULT NULL, CHANGE nom_tiers nom_tiers VARCHAR(255) DEFAULT NULL, CHANGE echeance echeance DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE caisse CHANGE responsable responsable VARCHAR(255) DEFAULT NULL, CHANGE soldedispo soldedispo NUMERIC(10, 2) DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT NULL, CHANGE last_solde last_solde NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE depense CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE total total NUMERIC(10, 2) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE emeteur CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE contact contact VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE expense CHANGE code code VARCHAR(255) DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL, CHANGE autre autre VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE fdb CHANGE departement departement VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE total total NUMERIC(10, 2) DEFAULT NULL, CHANGE beneficiaire beneficiaire VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE fonction CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE journal_caisse CHANGE date date DATETIME DEFAULT NULL, CHANGE num_piece num_piece VARCHAR(255) DEFAULT NULL, CHANGE intitule intitule VARCHAR(255) DEFAULT NULL, CHANGE entree entree VARCHAR(255) DEFAULT NULL, CHANGE sortie sortie VARCHAR(255) DEFAULT NULL, CHANGE solde solde VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE journee CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE close_at close_at DATETIME DEFAULT NULL, CHANGE debit debit NUMERIC(10, 2) DEFAULT NULL, CHANGE credit credit NUMERIC(10, 2) DEFAULT NULL, CHANGE solde solde NUMERIC(10, 2) DEFAULT NULL, CHANGE last_solde last_solde NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE societe CHANGE raison_sociale raison_sociale VARCHAR(255) DEFAULT NULL, CHANGE forme_juridique forme_juridique TINYTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', CHANGE activite activite VARCHAR(255) DEFAULT NULL, CHANGE siege_sociale siege_sociale VARCHAR(255) DEFAULT NULL, CHANGE adresse_postale adresse_postale VARCHAR(255) DEFAULT NULL, CHANGE ville ville VARCHAR(255) DEFAULT NULL, CHANGE pays pays VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE site_internet site_internet VARCHAR(255) DEFAULT NULL, CHANGE code_commerce code_commerce VARCHAR(255) DEFAULT NULL, CHANGE numero_compte_contribuable numero_compte_contribuable VARCHAR(255) DEFAULT NULL, CHANGE regime_fiscale regime_fiscale VARCHAR(255) DEFAULT NULL, CHANGE numero_tele_declarant numero_tele_declarant VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE forme forme LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE siege_social siege_social VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tiers CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE titre titre VARCHAR(255) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE type_expense CHANGE code code VARCHAR(255) DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', CHANGE contact contact VARCHAR(255) DEFAULT NULL, CHANGE pseudo pseudo VARCHAR(255) DEFAULT NULL, CHANGE fonction fonction VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tiers CHANGE name name VARCHAR(255) DEFAULT \'NULL\', CHANGE titre titre VARCHAR(255) DEFAULT \'NULL\', CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE billetage CHANGE balance balance VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE banque CHANGE name name VARCHAR(255) DEFAULT \'NULL\', CHANGE code code VARCHAR(255) DEFAULT \'NULL\', CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE societe CHANGE raison_sociale raison_sociale VARCHAR(255) DEFAULT \'NULL\', CHANGE forme_juridique forme_juridique LONGTEXT DEFAULT \'NULL\' COLLATE `utf8mb4_bin` COMMENT \'(DC2Type:json)\', CHANGE activite activite VARCHAR(255) DEFAULT \'NULL\', CHANGE siege_sociale siege_sociale VARCHAR(255) DEFAULT \'NULL\', CHANGE adresse_postale adresse_postale VARCHAR(255) DEFAULT \'NULL\', CHANGE ville ville VARCHAR(255) DEFAULT \'NULL\', CHANGE pays pays VARCHAR(255) DEFAULT \'NULL\', CHANGE telephone telephone VARCHAR(255) DEFAULT \'NULL\', CHANGE email email VARCHAR(255) DEFAULT \'NULL\', CHANGE site_internet site_internet VARCHAR(255) DEFAULT \'NULL\', CHANGE code_commerce code_commerce VARCHAR(255) DEFAULT \'NULL\', CHANGE numero_compte_contribuable numero_compte_contribuable VARCHAR(255) DEFAULT \'NULL\', CHANGE regime_fiscale regime_fiscale VARCHAR(255) DEFAULT \'NULL\', CHANGE numero_tele_declarant numero_tele_declarant VARCHAR(255) DEFAULT \'NULL\', CHANGE date date DATETIME DEFAULT \'NULL\', CHANGE forme forme LONGTEXT DEFAULT \'NULL\' COMMENT \'(DC2Type:array)\', CHANGE siege_social siege_social VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE journee CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\', CHANGE close_at close_at DATETIME DEFAULT \'NULL\', CHANGE debit debit NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE credit credit NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE solde solde NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE last_solde last_solde NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE journal_caisse CHANGE date date DATETIME DEFAULT \'NULL\', CHANGE num_piece num_piece VARCHAR(255) DEFAULT \'NULL\', CHANGE intitule intitule VARCHAR(255) DEFAULT \'NULL\', CHANGE entree entree VARCHAR(255) DEFAULT \'NULL\', CHANGE sortie sortie VARCHAR(255) DEFAULT \'NULL\', CHANGE solde solde VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE caisse CHANGE responsable responsable VARCHAR(255) DEFAULT \'NULL\', CHANGE soldedispo soldedispo NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE code code VARCHAR(255) DEFAULT \'NULL\', CHANGE last_solde last_solde NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE fdb CHANGE departement departement VARCHAR(255) DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE total total NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE beneficiaire beneficiaire VARCHAR(255) DEFAULT \'NULL\', CHANGE date date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin` COMMENT \'(DC2Type:json)\', CHANGE contact contact VARCHAR(255) DEFAULT \'NULL\', CHANGE pseudo pseudo VARCHAR(255) DEFAULT \'NULL\', CHANGE fonction fonction VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE type_expense CHANGE code code VARCHAR(255) DEFAULT \'NULL\', CHANGE name name VARCHAR(255) DEFAULT \'NULL\', CHANGE status status VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE bonapprovisionnement CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE reference reference VARCHAR(255) DEFAULT \'NULL\', CHANGE porteur porteur VARCHAR(255) DEFAULT \'NULL\', CHANGE destinataire destinataire VARCHAR(255) DEFAULT \'NULL\', CHANGE check_number check_number VARCHAR(255) DEFAULT \'NULL\', CHANGE nom_banque nom_banque VARCHAR(255) DEFAULT \'NULL\', CHANGE nom_caisse nom_caisse VARCHAR(255) DEFAULT \'NULL\', CHANGE numero_bon numero_bon VARCHAR(255) DEFAULT \'NULL\', CHANGE nom_tiers nom_tiers VARCHAR(255) DEFAULT \'NULL\', CHANGE echeance echeance DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE depense CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE total total NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE date date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE expense CHANGE code code VARCHAR(255) DEFAULT \'NULL\', CHANGE name name VARCHAR(255) DEFAULT \'NULL\', CHANGE status status VARCHAR(255) DEFAULT \'NULL\', CHANGE autre autre VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE fonction CHANGE name name VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE bon_caisse CHANGE uuid uuid VARCHAR(255) DEFAULT \'NULL\', CHANGE reference reference VARCHAR(255) DEFAULT \'NULL\', CHANGE status status VARCHAR(255) DEFAULT \'NULL\', CHANGE beneficiaire beneficiaire VARCHAR(255) DEFAULT \'NULL\', CHANGE type type VARCHAR(255) DEFAULT \'NULL\', CHANGE code code VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE emeteur CHANGE name name VARCHAR(255) DEFAULT \'NULL\', CHANGE contact contact VARCHAR(255) DEFAULT \'NULL\'');
    }
}
