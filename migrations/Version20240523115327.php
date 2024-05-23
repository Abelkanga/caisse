<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240523115327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fdb ADD caisse_id INT NOT NULL');
        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C05727B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('CREATE INDEX IDX_1136C05727B4FEBF ON fdb (caisse_id)');
        $this->addSql('ALTER TABLE user ADD caisse_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64927B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64927B4FEBF ON user (caisse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C05727B4FEBF');
        $this->addSql('DROP INDEX IDX_1136C05727B4FEBF ON fdb');
        $this->addSql('ALTER TABLE fdb DROP caisse_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64927B4FEBF');
        $this->addSql('DROP INDEX IDX_8D93D64927B4FEBF ON user');
        $this->addSql('ALTER TABLE user DROP caisse_id, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
