<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108110317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_mission ADD produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bon_mission ADD CONSTRAINT FK_567F57F6F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_567F57F6F347EFB ON bon_mission (produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_mission DROP FOREIGN KEY FK_567F57F6F347EFB');
        $this->addSql('DROP INDEX IDX_567F57F6F347EFB ON bon_mission');
        $this->addSql('ALTER TABLE bon_mission DROP produit_id');
    }
}
