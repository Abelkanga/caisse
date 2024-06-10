<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240610163811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bonapprovisionnement CHANGE date date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE depense ADD category VARCHAR(255) DEFAULT NULL, CHANGE uuid uuid VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE bonapprovisionnement CHANGE date date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE depense DROP category, CHANGE uuid uuid VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
