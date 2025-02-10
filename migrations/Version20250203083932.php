<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250203083932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE detail_bon_mission DROP FOREIGN KEY FK_39743AA7E2486D3A');
//        $this->addSql('ALTER TABLE detail_bon_mission ADD ville VARCHAR(255) DEFAULT NULL, CHANGE bon_mission_id bon_mission_id INT NOT NULL');
//        $this->addSql('ALTER TABLE detail_bon_mission ADD CONSTRAINT FK_39743AA7E2486D3A FOREIGN KEY (bon_mission_id) REFERENCES bon_mission (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE detail_bon_mission DROP FOREIGN KEY FK_39743AA7E2486D3A');
//        $this->addSql('ALTER TABLE detail_bon_mission DROP ville, CHANGE bon_mission_id bon_mission_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE detail_bon_mission ADD CONSTRAINT FK_39743AA7E2486D3A FOREIGN KEY (bon_mission_id) REFERENCES bon_mission (id)');
    }
}
