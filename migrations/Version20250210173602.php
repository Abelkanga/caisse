<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250210173602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bon_mission ADD ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bon_mission ADD CONSTRAINT FK_567F57F6A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_567F57F6A73F0036 ON bon_mission (ville_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_mission DROP FOREIGN KEY FK_567F57F6A73F0036');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP INDEX IDX_567F57F6A73F0036 ON bon_mission');
        $this->addSql('ALTER TABLE bon_mission DROP ville_id');
    }
}
