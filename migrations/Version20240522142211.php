<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240522142211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE caisse ADD fdb_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE caisse ADD CONSTRAINT FK_B2A353C8BF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
//        $this->addSql('CREATE INDEX IDX_B2A353C8BF2BFC3 ON caisse (fdb_id)');
//        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE caisse DROP FOREIGN KEY FK_B2A353C8BF2BFC3');
        $this->addSql('DROP INDEX IDX_B2A353C8BF2BFC3 ON caisse');
        $this->addSql('ALTER TABLE caisse DROP fdb_id');
    }
}
