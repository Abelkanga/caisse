<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240516142734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE bonapprovisionnement (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, caisse_id INT DEFAULT NULL, date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', modepaie VARCHAR(255) NOT NULL, montanttotal DOUBLE PRECISION NOT NULL, nature VARCHAR(255) NOT NULL, INDEX IDX_A4690520A76ED395 (user_id), INDEX IDX_A469052027B4FEBF (caisse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A4690520A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
//        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A469052027B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
//        $this->addSql('ALTER TABLE detail ADD bonapprovisionnement_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F931715AECD FOREIGN KEY (bonapprovisionnement_id) REFERENCES bonapprovisionnement (id)');
//        $this->addSql('CREATE INDEX IDX_2E067F931715AECD ON detail (bonapprovisionnement_id)');
//        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F931715AECD');
        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A4690520A76ED395');
        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A469052027B4FEBF');
        $this->addSql('DROP TABLE bonapprovisionnement');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('DROP INDEX IDX_2E067F931715AECD ON detail');
        $this->addSql('ALTER TABLE detail DROP bonapprovisionnement_id');
    }
}
