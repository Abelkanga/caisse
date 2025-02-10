<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250206154058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE journal_caisse ADD back_clash_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412D97CC8C0E FOREIGN KEY (back_clash_id) REFERENCES back_cash (id)');
        $this->addSql('CREATE INDEX IDX_69FB412D97CC8C0E ON journal_caisse (back_clash_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412D97CC8C0E');
        $this->addSql('DROP INDEX IDX_69FB412D97CC8C0E ON journal_caisse');
        $this->addSql('ALTER TABLE journal_caisse DROP back_clash_id');
    }
}
