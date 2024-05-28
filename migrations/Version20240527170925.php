<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240527170925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bonapprovisionnement ADD bon_caisse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A4690520B01D5004 FOREIGN KEY (bon_caisse_id) REFERENCES bon_caisse (id)');
        $this->addSql('CREATE INDEX IDX_A4690520B01D5004 ON bonapprovisionnement (bon_caisse_id)');
        $this->addSql('ALTER TABLE depense ADD bon_caisse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757B01D5004 FOREIGN KEY (bon_caisse_id) REFERENCES bon_caisse (id)');
        $this->addSql('CREATE INDEX IDX_34059757B01D5004 ON depense (bon_caisse_id)');
        $this->addSql('ALTER TABLE fdb ADD bon_caisse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C057B01D5004 FOREIGN KEY (bon_caisse_id) REFERENCES bon_caisse (id)');
        $this->addSql('CREATE INDEX IDX_1136C057B01D5004 ON fdb (bon_caisse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C057B01D5004');
        $this->addSql('DROP INDEX IDX_1136C057B01D5004 ON fdb');
        $this->addSql('ALTER TABLE fdb DROP bon_caisse_id');
        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A4690520B01D5004');
        $this->addSql('DROP INDEX IDX_A4690520B01D5004 ON bonapprovisionnement');
        $this->addSql('ALTER TABLE bonapprovisionnement DROP bon_caisse_id');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757B01D5004');
        $this->addSql('DROP INDEX IDX_34059757B01D5004 ON depense');
        $this->addSql('ALTER TABLE depense DROP bon_caisse_id');
    }
}
