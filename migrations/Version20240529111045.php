<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240529111045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_caisse CHANGE uuid uuid VARCHAR(255) DEFAULT NULL, CHANGE reference reference VARCHAR(255) DEFAULT NULL, CHANGE status status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bonapprovisionnement CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE total total NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE caisse CHANGE responsable responsable VARCHAR(255) DEFAULT NULL, CHANGE soldedispo soldedispo NUMERIC(10, 2) DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE depense CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE fdb CHANGE departement departement VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE total total NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE journee CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE close_at close_at DATETIME DEFAULT NULL, CHANGE debit debit NUMERIC(10, 2) DEFAULT NULL, CHANGE credit credit NUMERIC(10, 2) DEFAULT NULL, CHANGE solde solde NUMERIC(10, 2) DEFAULT NULL, CHANGE last_solde last_solde NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE journee CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\', CHANGE close_at close_at DATETIME DEFAULT \'NULL\', CHANGE debit debit NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE credit credit NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE solde solde NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE last_solde last_solde NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE caisse CHANGE responsable responsable VARCHAR(255) DEFAULT \'NULL\', CHANGE soldedispo soldedispo NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE code code VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE fdb CHANGE departement departement VARCHAR(255) DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE total total NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE bonapprovisionnement CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE total total NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE depense CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE bon_caisse CHANGE uuid uuid VARCHAR(255) DEFAULT \'NULL\', CHANGE reference reference VARCHAR(255) DEFAULT \'NULL\', CHANGE status status VARCHAR(255) DEFAULT \'NULL\'');
    }
}
