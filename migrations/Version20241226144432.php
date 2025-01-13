<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241226144432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_mission ADD order_mission_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE detail_mission ADD CONSTRAINT FK_F7A872E9DB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
        $this->addSql('CREATE INDEX IDX_F7A872E9DB653C5 ON detail_mission (order_mission_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_mission DROP FOREIGN KEY FK_F7A872E9DB653C5');
        $this->addSql('DROP INDEX IDX_F7A872E9DB653C5 ON detail_mission');
        $this->addSql('ALTER TABLE detail_mission DROP order_mission_id');
    }
}
