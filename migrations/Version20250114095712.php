<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250114095712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification ADD order_mission_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CADB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
        $this->addSql('CREATE INDEX IDX_BF5476CADB653C5 ON notification (order_mission_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CADB653C5');
        $this->addSql('DROP INDEX IDX_BF5476CADB653C5 ON notification');
        $this->addSql('ALTER TABLE notification DROP order_mission_id');
    }
}
