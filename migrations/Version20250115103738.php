<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250115103738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_mission ADD journee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77CF066148 FOREIGN KEY (journee_id) REFERENCES journee (id)');
        $this->addSql('CREATE INDEX IDX_661D5B77CF066148 ON order_mission (journee_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77CF066148');
        $this->addSql('DROP INDEX IDX_661D5B77CF066148 ON order_mission');
        $this->addSql('ALTER TABLE order_mission DROP journee_id');
    }
}
