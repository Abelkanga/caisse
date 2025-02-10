<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250124145614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE journal_caisse ADD detail_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412DD8D003BB FOREIGN KEY (detail_id) REFERENCES detail (id)');
//        $this->addSql('CREATE INDEX IDX_69FB412DD8D003BB ON journal_caisse (detail_id)');
//        $this->addSql('ALTER TABLE order_mission CHANGE order_to order_to VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412DD8D003BB');
//        $this->addSql('DROP INDEX IDX_69FB412DD8D003BB ON journal_caisse');
//        $this->addSql('ALTER TABLE journal_caisse DROP detail_id');
//        $this->addSql('ALTER TABLE order_mission CHANGE order_to order_to VARCHAR(255) NOT NULL');
    }
}
