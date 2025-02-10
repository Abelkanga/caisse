<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250204151417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_mission ADD valid_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bon_mission ADD CONSTRAINT FK_567F57F6D8228AFF FOREIGN KEY (valid_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_567F57F6D8228AFF ON bon_mission (valid_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_mission DROP FOREIGN KEY FK_567F57F6D8228AFF');
        $this->addSql('DROP INDEX IDX_567F57F6D8228AFF ON bon_mission');
        $this->addSql('ALTER TABLE bon_mission DROP valid_by_id');
    }
}
