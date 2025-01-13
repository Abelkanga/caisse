<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241226075518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_mission ADD order_mission_id INT DEFAULT NULL, ADD caisse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bon_mission ADD CONSTRAINT FK_567F57F6DB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
        $this->addSql('ALTER TABLE bon_mission ADD CONSTRAINT FK_567F57F627B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('CREATE INDEX IDX_567F57F6DB653C5 ON bon_mission (order_mission_id)');
        $this->addSql('CREATE INDEX IDX_567F57F627B4FEBF ON bon_mission (caisse_id)');
        $this->addSql('ALTER TABLE journal_caisse ADD bon_mission_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412DE2486D3A FOREIGN KEY (bon_mission_id) REFERENCES bon_mission (id)');
        $this->addSql('CREATE INDEX IDX_69FB412DE2486D3A ON journal_caisse (bon_mission_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412DE2486D3A');
        $this->addSql('DROP INDEX IDX_69FB412DE2486D3A ON journal_caisse');
        $this->addSql('ALTER TABLE journal_caisse DROP bon_mission_id');
        $this->addSql('ALTER TABLE bon_mission DROP FOREIGN KEY FK_567F57F6DB653C5');
        $this->addSql('ALTER TABLE bon_mission DROP FOREIGN KEY FK_567F57F627B4FEBF');
        $this->addSql('DROP INDEX IDX_567F57F6DB653C5 ON bon_mission');
        $this->addSql('DROP INDEX IDX_567F57F627B4FEBF ON bon_mission');
        $this->addSql('ALTER TABLE bon_mission DROP order_mission_id, DROP caisse_id');
    }
}
