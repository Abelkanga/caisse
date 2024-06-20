<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240620110943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE billetage (id INT AUTO_INCREMENT NOT NULL, caisse_id INT DEFAULT NULL, b10000 INT DEFAULT NULL, b5000 INT DEFAULT NULL, b2000 INT DEFAULT NULL, b1000 INT DEFAULT NULL, b500 INT DEFAULT NULL, m500 INT DEFAULT NULL, m250 INT DEFAULT NULL, m200 INT DEFAULT NULL, m100 INT DEFAULT NULL, m50 INT DEFAULT NULL, m10 INT DEFAULT NULL, m5 INT DEFAULT NULL, balance VARCHAR(255) DEFAULT NULL, amount INT DEFAULT NULL, ecart INT DEFAULT NULL, check_balance INT DEFAULT NULL, check_amount INT DEFAULT NULL, check_ecart INT DEFAULT NULL, INDEX IDX_83E6E9FA27B4FEBF (caisse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE billetage ADD CONSTRAINT FK_83E6E9FA27B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE billetage DROP FOREIGN KEY FK_83E6E9FA27B4FEBF');
        $this->addSql('DROP TABLE billetage');
        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
