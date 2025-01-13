<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241230114213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_bon_mission ADD order_mission_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE detail_bon_mission ADD CONSTRAINT FK_39743AA7DB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
        $this->addSql('CREATE INDEX IDX_39743AA7DB653C5 ON detail_bon_mission (order_mission_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_bon_mission DROP FOREIGN KEY FK_39743AA7DB653C5');
        $this->addSql('DROP INDEX IDX_39743AA7DB653C5 ON detail_bon_mission');
        $this->addSql('ALTER TABLE detail_bon_mission DROP order_mission_id');
    }
}
