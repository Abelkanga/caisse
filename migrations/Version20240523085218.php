<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240523085218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE journee (id INT AUTO_INCREMENT NOT NULL, caisse_id INT NOT NULL, started_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', active TINYINT(1) NOT NULL, close_at DATETIME DEFAULT NULL, debit NUMERIC(10, 2) DEFAULT NULL, credit NUMERIC(10, 2) DEFAULT NULL, solde NUMERIC(10, 2) DEFAULT NULL, last_solde NUMERIC(10, 2) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', uuid VARCHAR(255) NOT NULL, INDEX IDX_DC179AED27B4FEBF (caisse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE journee ADD CONSTRAINT FK_DC179AED27B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE bonapprovisionnement ADD status VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE depense ADD status VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE fdb ADD status VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE journee DROP FOREIGN KEY FK_DC179AED27B4FEBF');
        $this->addSql('DROP TABLE journee');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE fdb DROP status');
        $this->addSql('ALTER TABLE bonapprovisionnement DROP status');
        $this->addSql('ALTER TABLE depense DROP status');
    }
}
