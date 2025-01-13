<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250113172035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77D8228AFF');
        $this->addSql('DROP INDEX IDX_661D5B77D8228AFF ON order_mission');
        $this->addSql('ALTER TABLE order_mission DROP valid_by_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_mission ADD valid_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77D8228AFF FOREIGN KEY (valid_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_661D5B77D8228AFF ON order_mission (valid_by_id)');
    }
}
