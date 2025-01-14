<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241025110625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appro_caisse (id INT AUTO_INCREMENT NOT NULL, journee_id INT DEFAULT NULL, caisse_emettrice_id INT NOT NULL, caisse_receptrice_id INT NOT NULL, user_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, montant VARCHAR(255) DEFAULT NULL, status VARCHAR(255) NOT NULL, reference VARCHAR(255) DEFAULT NULL, objet VARCHAR(255) DEFAULT NULL, uuid VARCHAR(255) NOT NULL, INDEX IDX_C12B0312CF066148 (journee_id), INDEX IDX_C12B0312495F4718 (caisse_emettrice_id), INDEX IDX_C12B0312BE06C2E7 (caisse_receptrice_id), INDEX IDX_C12B0312A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE billetage (id INT AUTO_INCREMENT NOT NULL, caisse_id INT DEFAULT NULL, bonapprovisionnement_id INT DEFAULT NULL, user_id INT DEFAULT NULL, journee_id INT DEFAULT NULL, b10000 INT DEFAULT NULL, b5000 INT DEFAULT NULL, b2000 INT DEFAULT NULL, b1000 INT DEFAULT NULL, b500 INT DEFAULT NULL, m500 INT DEFAULT NULL, m250 INT DEFAULT NULL, m200 INT DEFAULT NULL, m100 INT DEFAULT NULL, m50 INT DEFAULT NULL, m10 INT DEFAULT NULL, m5 INT DEFAULT NULL, balance VARCHAR(255) DEFAULT NULL, amount INT DEFAULT NULL, ecart INT DEFAULT NULL, date DATETIME DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, confimre_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', uuid BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_83E6E9FA27B4FEBF (caisse_id), INDEX IDX_83E6E9FA1715AECD (bonapprovisionnement_id), INDEX IDX_83E6E9FAA76ED395 (user_id), UNIQUE INDEX UNIQ_83E6E9FACF066148 (journee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bon_caisse (id INT AUTO_INCREMENT NOT NULL, caisse_id INT DEFAULT NULL, fdb_id INT DEFAULT NULL, depense_id INT DEFAULT NULL, bonapprovisionnement_id INT DEFAULT NULL, date DATETIME NOT NULL, montant NUMERIC(10, 2) NOT NULL, uuid VARCHAR(255) DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, beneficiaire VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, INDEX IDX_A6DF2BF227B4FEBF (caisse_id), INDEX IDX_A6DF2BF2BF2BFC3 (fdb_id), INDEX IDX_A6DF2BF241D81563 (depense_id), INDEX IDX_A6DF2BF21715AECD (bonapprovisionnement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bon_mission (id INT AUTO_INCREMENT NOT NULL, order_mission_id INT DEFAULT NULL, caisse_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, montant VARCHAR(255) DEFAULT NULL, uuid BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', reference VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, beneficiaire VARCHAR(255) DEFAULT NULL, total NUMERIC(10, 2) DEFAULT NULL, INDEX IDX_567F57F6DB653C5 (order_mission_id), INDEX IDX_567F57F627B4FEBF (caisse_id), INDEX IDX_567F57F6F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bonapprovisionnement (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, caisse_id INT DEFAULT NULL, emeteur_id INT DEFAULT NULL, tiers_id INT DEFAULT NULL, journee_id INT DEFAULT NULL, date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', modepaie VARCHAR(255) NOT NULL, montanttotal DOUBLE PRECISION NOT NULL, status VARCHAR(255) NOT NULL, uuid VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, porteur VARCHAR(255) DEFAULT NULL, destinataire VARCHAR(255) DEFAULT NULL, check_number VARCHAR(255) DEFAULT NULL, nom_banque VARCHAR(255) DEFAULT NULL, nom_caisse VARCHAR(255) DEFAULT NULL, numero_bon VARCHAR(255) DEFAULT NULL, nom_tiers VARCHAR(255) DEFAULT NULL, echeance DATETIME DEFAULT NULL, INDEX IDX_A4690520A76ED395 (user_id), INDEX IDX_A469052027B4FEBF (caisse_id), INDEX IDX_A4690520C8791E35 (emeteur_id), INDEX IDX_A469052068B77723 (tiers_id), INDEX IDX_A4690520CF066148 (journee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caisse (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, intitule VARCHAR(255) NOT NULL, plafond VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, soldedispo NUMERIC(10, 2) DEFAULT NULL, UNIQUE INDEX UNIQ_B2A353C8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depense (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, caisse_id INT DEFAULT NULL, expense_id INT DEFAULT NULL, type_expense_id INT DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, modepaie VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, uuid VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, total NUMERIC(10, 2) DEFAULT NULL, date DATETIME DEFAULT NULL, INDEX IDX_34059757A76ED395 (user_id), INDEX IDX_3405975727B4FEBF (caisse_id), INDEX IDX_34059757F395DB7B (expense_id), INDEX IDX_34059757EE960D5E (type_expense_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail (id INT AUTO_INCREMENT NOT NULL, fdb_id INT DEFAULT NULL, depense_id INT DEFAULT NULL, order_mission_id INT DEFAULT NULL, designationproduit VARCHAR(255) NOT NULL, quantite INT NOT NULL, price INT NOT NULL, montant INT NOT NULL, INDEX IDX_2E067F93BF2BFC3 (fdb_id), INDEX IDX_2E067F9341D81563 (depense_id), INDEX IDX_2E067F93DB653C5 (order_mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_bon_mission (id INT AUTO_INCREMENT NOT NULL, order_mission_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, bon_mission_id INT DEFAULT NULL, rubrique VARCHAR(255) DEFAULT NULL, quantite INT NOT NULL, price INT NOT NULL, montant INT NOT NULL, INDEX IDX_39743AA7DB653C5 (order_mission_id), INDEX IDX_39743AA7F347EFB (produit_id), INDEX IDX_39743AA7E2486D3A (bon_mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_mission (id INT AUTO_INCREMENT NOT NULL, order_mission_id INT DEFAULT NULL, full_name VARCHAR(255) DEFAULT NULL, fonction VARCHAR(255) DEFAULT NULL, service VARCHAR(255) DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, INDEX IDX_F7A872E9DB653C5 (order_mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emeteur (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expense (id INT AUTO_INCREMENT NOT NULL, type_expense_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, autre VARCHAR(255) DEFAULT NULL, INDEX IDX_2D3A8DA6EE960D5E (type_expense_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fdb (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, caisse_id INT DEFAULT NULL, expense_id INT DEFAULT NULL, type_expense_id INT DEFAULT NULL, emeteur_id INT DEFAULT NULL, journee_id INT DEFAULT NULL, valid_by_id INT DEFAULT NULL, numero_fiche_besoin VARCHAR(20) NOT NULL, destinataire VARCHAR(255) NOT NULL, departement VARCHAR(255) DEFAULT NULL, status VARCHAR(255) NOT NULL, uuid VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, total NUMERIC(10, 2) DEFAULT NULL, beneficiaire VARCHAR(255) DEFAULT NULL, date DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT NULL, INDEX IDX_1136C057A76ED395 (user_id), INDEX IDX_1136C05727B4FEBF (caisse_id), INDEX IDX_1136C057F395DB7B (expense_id), INDEX IDX_1136C057EE960D5E (type_expense_id), INDEX IDX_1136C057C8791E35 (emeteur_id), INDEX IDX_1136C057CF066148 (journee_id), INDEX IDX_1136C057D8228AFF (valid_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonction (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journal_caisse (id INT AUTO_INCREMENT NOT NULL, caisse_id INT DEFAULT NULL, fdb_id INT DEFAULT NULL, bonapprovisionnement_id INT DEFAULT NULL, recu_caisse_id INT DEFAULT NULL, bon_caisse_id INT DEFAULT NULL, appro_caisse_id INT DEFAULT NULL, order_mission_id INT DEFAULT NULL, bon_mission_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, num_piece VARCHAR(255) DEFAULT NULL, intitule VARCHAR(255) DEFAULT NULL, entree VARCHAR(255) DEFAULT NULL, sortie VARCHAR(255) DEFAULT NULL, solde VARCHAR(255) DEFAULT NULL, uuid BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_69FB412D27B4FEBF (caisse_id), INDEX IDX_69FB412DBF2BFC3 (fdb_id), INDEX IDX_69FB412D1715AECD (bonapprovisionnement_id), INDEX IDX_69FB412D907D10FF (recu_caisse_id), INDEX IDX_69FB412DB01D5004 (bon_caisse_id), INDEX IDX_69FB412DFE72186C (appro_caisse_id), INDEX IDX_69FB412DDB653C5 (order_mission_id), INDEX IDX_69FB412DE2486D3A (bon_mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journee (id INT AUTO_INCREMENT NOT NULL, caisse_id INT NOT NULL, last_journee_id INT DEFAULT NULL, started_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', active TINYINT(1) NOT NULL, close_at DATETIME DEFAULT NULL, debit NUMERIC(10, 2) DEFAULT NULL, credit NUMERIC(10, 2) DEFAULT NULL, solde NUMERIC(10, 2) DEFAULT NULL, last_solde NUMERIC(10, 2) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', uuid VARCHAR(255) NOT NULL, INDEX IDX_DC179AED27B4FEBF (caisse_id), UNIQUE INDEX UNIQ_DC179AED26720BA2 (last_journee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, fdb_id INT DEFAULT NULL, bonapprovisionnement_id INT DEFAULT NULL, approcaisse_id INT DEFAULT NULL, uuid VARCHAR(255) NOT NULL, message VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', unread TINYINT(1) DEFAULT NULL, permission VARCHAR(255) DEFAULT NULL, INDEX IDX_BF5476CAA76ED395 (user_id), INDEX IDX_BF5476CABF2BFC3 (fdb_id), INDEX IDX_BF5476CA1715AECD (bonapprovisionnement_id), INDEX IDX_BF5476CA19C8B436 (approcaisse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_mission (id INT AUTO_INCREMENT NOT NULL, fdb_id INT DEFAULT NULL, caisse_id INT DEFAULT NULL, user_id INT DEFAULT NULL, expense_id INT DEFAULT NULL, type_expense_id INT DEFAULT NULL, emeteur_id INT DEFAULT NULL, journee_id INT DEFAULT NULL, uuid BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', date DATETIME NOT NULL, reference VARCHAR(255) NOT NULL, gerant VARCHAR(255) NOT NULL, date_depart DATETIME DEFAULT NULL, date_retour DATETIME DEFAULT NULL, fonction VARCHAR(255) DEFAULT NULL, service VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, beneficiaire VARCHAR(255) DEFAULT NULL, montant VARCHAR(255) DEFAULT NULL, order_to VARCHAR(255) DEFAULT NULL, get_to VARCHAR(255) DEFAULT NULL, full_name VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) DEFAULT NULL, INDEX IDX_661D5B77BF2BFC3 (fdb_id), INDEX IDX_661D5B7727B4FEBF (caisse_id), INDEX IDX_661D5B77A76ED395 (user_id), INDEX IDX_661D5B77F395DB7B (expense_id), INDEX IDX_661D5B77EE960D5E (type_expense_id), INDEX IDX_661D5B77C8791E35 (emeteur_id), INDEX IDX_661D5B77CF066148 (journee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, type_produit VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recu_caisse (id INT AUTO_INCREMENT NOT NULL, caisse_id INT DEFAULT NULL, bonapprovisionnement_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, montant VARCHAR(255) DEFAULT NULL, uuid BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', reference VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, beneficiaire VARCHAR(255) DEFAULT NULL, INDEX IDX_ADA5DC4A27B4FEBF (caisse_id), INDEX IDX_ADA5DC4A1715AECD (bonapprovisionnement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, fonction_id INT DEFAULT NULL, raison_sociale VARCHAR(255) DEFAULT NULL, forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', activite VARCHAR(255) DEFAULT NULL, siege_sociale VARCHAR(255) DEFAULT NULL, adresse_postale VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, site_internet VARCHAR(255) DEFAULT NULL, code_commerce VARCHAR(255) DEFAULT NULL, numero_compte_contribuable VARCHAR(255) DEFAULT NULL, regime_fiscale VARCHAR(255) DEFAULT NULL, numero_tele_declarant VARCHAR(255) DEFAULT NULL, date DATETIME DEFAULT NULL, forme LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', siege_social VARCHAR(255) DEFAULT NULL, INDEX IDX_19653DBD57889920 (fonction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tiers (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_expense (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, emeteur_id INT DEFAULT NULL, full_name VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_active TINYINT(1) DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, pseudo VARCHAR(255) DEFAULT NULL, fonction VARCHAR(255) DEFAULT NULL, is_temporary TINYINT(1) DEFAULT NULL, is_responsable TINYINT(1) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, INDEX IDX_8D93D649C8791E35 (emeteur_id), UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (pseudo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appro_caisse ADD CONSTRAINT FK_C12B0312CF066148 FOREIGN KEY (journee_id) REFERENCES journee (id)');
        $this->addSql('ALTER TABLE appro_caisse ADD CONSTRAINT FK_C12B0312495F4718 FOREIGN KEY (caisse_emettrice_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE appro_caisse ADD CONSTRAINT FK_C12B0312BE06C2E7 FOREIGN KEY (caisse_receptrice_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE appro_caisse ADD CONSTRAINT FK_C12B0312A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE billetage ADD CONSTRAINT FK_83E6E9FA27B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE billetage ADD CONSTRAINT FK_83E6E9FA1715AECD FOREIGN KEY (bonapprovisionnement_id) REFERENCES bonapprovisionnement (id)');
        $this->addSql('ALTER TABLE billetage ADD CONSTRAINT FK_83E6E9FAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE billetage ADD CONSTRAINT FK_83E6E9FACF066148 FOREIGN KEY (journee_id) REFERENCES journee (id)');
        $this->addSql('ALTER TABLE bon_caisse ADD CONSTRAINT FK_A6DF2BF227B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE bon_caisse ADD CONSTRAINT FK_A6DF2BF2BF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
        $this->addSql('ALTER TABLE bon_caisse ADD CONSTRAINT FK_A6DF2BF241D81563 FOREIGN KEY (depense_id) REFERENCES depense (id)');
        $this->addSql('ALTER TABLE bon_caisse ADD CONSTRAINT FK_A6DF2BF21715AECD FOREIGN KEY (bonapprovisionnement_id) REFERENCES bonapprovisionnement (id)');
        $this->addSql('ALTER TABLE bon_mission ADD CONSTRAINT FK_567F57F6DB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
        $this->addSql('ALTER TABLE bon_mission ADD CONSTRAINT FK_567F57F627B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE bon_mission ADD CONSTRAINT FK_567F57F6F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A4690520A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A469052027B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A4690520C8791E35 FOREIGN KEY (emeteur_id) REFERENCES emeteur (id)');
        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A469052068B77723 FOREIGN KEY (tiers_id) REFERENCES tiers (id)');
        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A4690520CF066148 FOREIGN KEY (journee_id) REFERENCES journee (id)');
        $this->addSql('ALTER TABLE caisse ADD CONSTRAINT FK_B2A353C8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_3405975727B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757F395DB7B FOREIGN KEY (expense_id) REFERENCES expense (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757EE960D5E FOREIGN KEY (type_expense_id) REFERENCES type_expense (id)');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93BF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F9341D81563 FOREIGN KEY (depense_id) REFERENCES depense (id)');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93DB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
        $this->addSql('ALTER TABLE detail_bon_mission ADD CONSTRAINT FK_39743AA7DB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
        $this->addSql('ALTER TABLE detail_bon_mission ADD CONSTRAINT FK_39743AA7F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE detail_bon_mission ADD CONSTRAINT FK_39743AA7E2486D3A FOREIGN KEY (bon_mission_id) REFERENCES bon_mission (id)');
        $this->addSql('ALTER TABLE detail_mission ADD CONSTRAINT FK_F7A872E9DB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA6EE960D5E FOREIGN KEY (type_expense_id) REFERENCES type_expense (id)');
        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C057A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C05727B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C057F395DB7B FOREIGN KEY (expense_id) REFERENCES expense (id)');
        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C057EE960D5E FOREIGN KEY (type_expense_id) REFERENCES type_expense (id)');
        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C057C8791E35 FOREIGN KEY (emeteur_id) REFERENCES emeteur (id)');
        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C057CF066148 FOREIGN KEY (journee_id) REFERENCES journee (id)');
        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C057D8228AFF FOREIGN KEY (valid_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412D27B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412DBF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412D1715AECD FOREIGN KEY (bonapprovisionnement_id) REFERENCES bonapprovisionnement (id)');
        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412D907D10FF FOREIGN KEY (recu_caisse_id) REFERENCES recu_caisse (id)');
        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412DB01D5004 FOREIGN KEY (bon_caisse_id) REFERENCES bon_caisse (id)');
        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412DFE72186C FOREIGN KEY (appro_caisse_id) REFERENCES appro_caisse (id)');
        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412DDB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412DE2486D3A FOREIGN KEY (bon_mission_id) REFERENCES bon_mission (id)');
        $this->addSql('ALTER TABLE journee ADD CONSTRAINT FK_DC179AED27B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE journee ADD CONSTRAINT FK_DC179AED26720BA2 FOREIGN KEY (last_journee_id) REFERENCES journee (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CABF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA1715AECD FOREIGN KEY (bonapprovisionnement_id) REFERENCES bonapprovisionnement (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA19C8B436 FOREIGN KEY (approcaisse_id) REFERENCES appro_caisse (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77BF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B7727B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77F395DB7B FOREIGN KEY (expense_id) REFERENCES expense (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77EE960D5E FOREIGN KEY (type_expense_id) REFERENCES type_expense (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77C8791E35 FOREIGN KEY (emeteur_id) REFERENCES emeteur (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77CF066148 FOREIGN KEY (journee_id) REFERENCES journee (id)');
        $this->addSql('ALTER TABLE recu_caisse ADD CONSTRAINT FK_ADA5DC4A27B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE recu_caisse ADD CONSTRAINT FK_ADA5DC4A1715AECD FOREIGN KEY (bonapprovisionnement_id) REFERENCES bonapprovisionnement (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBD57889920 FOREIGN KEY (fonction_id) REFERENCES fonction (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C8791E35 FOREIGN KEY (emeteur_id) REFERENCES emeteur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appro_caisse DROP FOREIGN KEY FK_C12B0312CF066148');
        $this->addSql('ALTER TABLE appro_caisse DROP FOREIGN KEY FK_C12B0312495F4718');
        $this->addSql('ALTER TABLE appro_caisse DROP FOREIGN KEY FK_C12B0312BE06C2E7');
        $this->addSql('ALTER TABLE appro_caisse DROP FOREIGN KEY FK_C12B0312A76ED395');
        $this->addSql('ALTER TABLE billetage DROP FOREIGN KEY FK_83E6E9FA27B4FEBF');
        $this->addSql('ALTER TABLE billetage DROP FOREIGN KEY FK_83E6E9FA1715AECD');
        $this->addSql('ALTER TABLE billetage DROP FOREIGN KEY FK_83E6E9FAA76ED395');
        $this->addSql('ALTER TABLE billetage DROP FOREIGN KEY FK_83E6E9FACF066148');
        $this->addSql('ALTER TABLE bon_caisse DROP FOREIGN KEY FK_A6DF2BF227B4FEBF');
        $this->addSql('ALTER TABLE bon_caisse DROP FOREIGN KEY FK_A6DF2BF2BF2BFC3');
        $this->addSql('ALTER TABLE bon_caisse DROP FOREIGN KEY FK_A6DF2BF241D81563');
        $this->addSql('ALTER TABLE bon_caisse DROP FOREIGN KEY FK_A6DF2BF21715AECD');
        $this->addSql('ALTER TABLE bon_mission DROP FOREIGN KEY FK_567F57F6DB653C5');
        $this->addSql('ALTER TABLE bon_mission DROP FOREIGN KEY FK_567F57F627B4FEBF');
        $this->addSql('ALTER TABLE bon_mission DROP FOREIGN KEY FK_567F57F6F347EFB');
        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A4690520A76ED395');
        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A469052027B4FEBF');
        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A4690520C8791E35');
        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A469052068B77723');
        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A4690520CF066148');
        $this->addSql('ALTER TABLE caisse DROP FOREIGN KEY FK_B2A353C8A76ED395');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757A76ED395');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_3405975727B4FEBF');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757F395DB7B');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757EE960D5E');
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F93BF2BFC3');
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F9341D81563');
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F93DB653C5');
        $this->addSql('ALTER TABLE detail_bon_mission DROP FOREIGN KEY FK_39743AA7DB653C5');
        $this->addSql('ALTER TABLE detail_bon_mission DROP FOREIGN KEY FK_39743AA7F347EFB');
        $this->addSql('ALTER TABLE detail_bon_mission DROP FOREIGN KEY FK_39743AA7E2486D3A');
        $this->addSql('ALTER TABLE detail_mission DROP FOREIGN KEY FK_F7A872E9DB653C5');
        $this->addSql('ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA6EE960D5E');
        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C057A76ED395');
        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C05727B4FEBF');
        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C057F395DB7B');
        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C057EE960D5E');
        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C057C8791E35');
        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C057CF066148');
        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C057D8228AFF');
        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412D27B4FEBF');
        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412DBF2BFC3');
        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412D1715AECD');
        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412D907D10FF');
        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412DB01D5004');
        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412DFE72186C');
        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412DDB653C5');
        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412DE2486D3A');
        $this->addSql('ALTER TABLE journee DROP FOREIGN KEY FK_DC179AED27B4FEBF');
        $this->addSql('ALTER TABLE journee DROP FOREIGN KEY FK_DC179AED26720BA2');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA76ED395');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CABF2BFC3');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA1715AECD');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA19C8B436');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77BF2BFC3');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B7727B4FEBF');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77A76ED395');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77F395DB7B');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77EE960D5E');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77C8791E35');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77CF066148');
        $this->addSql('ALTER TABLE recu_caisse DROP FOREIGN KEY FK_ADA5DC4A27B4FEBF');
        $this->addSql('ALTER TABLE recu_caisse DROP FOREIGN KEY FK_ADA5DC4A1715AECD');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBD57889920');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C8791E35');
        $this->addSql('DROP TABLE appro_caisse');
        $this->addSql('DROP TABLE billetage');
        $this->addSql('DROP TABLE bon_caisse');
        $this->addSql('DROP TABLE bon_mission');
        $this->addSql('DROP TABLE bonapprovisionnement');
        $this->addSql('DROP TABLE caisse');
        $this->addSql('DROP TABLE depense');
        $this->addSql('DROP TABLE detail');
        $this->addSql('DROP TABLE detail_bon_mission');
        $this->addSql('DROP TABLE detail_mission');
        $this->addSql('DROP TABLE emeteur');
        $this->addSql('DROP TABLE expense');
        $this->addSql('DROP TABLE fdb');
        $this->addSql('DROP TABLE fonction');
        $this->addSql('DROP TABLE journal_caisse');
        $this->addSql('DROP TABLE journee');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE order_mission');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE recu_caisse');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE tiers');
        $this->addSql('DROP TABLE type_expense');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
