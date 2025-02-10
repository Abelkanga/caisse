<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250206093900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE back_cash (id INT AUTO_INCREMENT NOT NULL, caisse_id INT DEFAULT NULL, user_id INT DEFAULT NULL, bon_mission_id INT DEFAULT NULL, bon_caisse_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, montant INT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, INDEX IDX_CD0ED6F727B4FEBF (caisse_id), INDEX IDX_CD0ED6F7A76ED395 (user_id), INDEX IDX_CD0ED6F7E2486D3A (bon_mission_id), INDEX IDX_CD0ED6F7B01D5004 (bon_caisse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE back_cash ADD CONSTRAINT FK_CD0ED6F727B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE back_cash ADD CONSTRAINT FK_CD0ED6F7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE back_cash ADD CONSTRAINT FK_CD0ED6F7E2486D3A FOREIGN KEY (bon_mission_id) REFERENCES bon_mission (id)');
        $this->addSql('ALTER TABLE back_cash ADD CONSTRAINT FK_CD0ED6F7B01D5004 FOREIGN KEY (bon_caisse_id) REFERENCES bon_caisse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE back_cash DROP FOREIGN KEY FK_CD0ED6F727B4FEBF');
        $this->addSql('ALTER TABLE back_cash DROP FOREIGN KEY FK_CD0ED6F7A76ED395');
        $this->addSql('ALTER TABLE back_cash DROP FOREIGN KEY FK_CD0ED6F7E2486D3A');
        $this->addSql('ALTER TABLE back_cash DROP FOREIGN KEY FK_CD0ED6F7B01D5004');
        $this->addSql('DROP TABLE back_cash');
    }
}
