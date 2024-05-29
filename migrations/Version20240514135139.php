<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240514135139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE caisse (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, intitulé VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, soldedispo INT NOT NULL, plafond TINYINT(1) NOT NULL, gerant VARCHAR(255) NOT NULL, INDEX IDX_B2A353C8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE detail (id INT AUTO_INCREMENT NOT NULL, operation_id INT DEFAULT NULL, fdb_id INT DEFAULT NULL, designationproduit VARCHAR(255) NOT NULL, quantite INT NOT NULL, price INT NOT NULL, montant INT NOT NULL, INDEX IDX_2E067F9344AC3583 (operation_id), INDEX IDX_2E067F93BF2BFC3 (fdb_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE fdb (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, numero_fiche_besoin VARCHAR(20) NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', objet VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, destinataire VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, signature VARCHAR(255) NOT NULL, INDEX IDX_1136C057A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE operation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, caisse_id INT DEFAULT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', type VARCHAR(255) NOT NULL, montant VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, modepaie VARCHAR(255) NOT NULL, INDEX IDX_1981A66DA76ED395 (user_id), INDEX IDX_1981A66D27B4FEBF (caisse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('ALTER TABLE caisse ADD CONSTRAINT FK_B2A353C8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
//        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F9344AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id)');
//        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93BF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
//        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C057A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
//        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
//        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D27B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE caisse DROP FOREIGN KEY FK_B2A353C8A76ED395');
//        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F9344AC3583');
//        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F93BF2BFC3');
//        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C057A76ED395');
//        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DA76ED395');
//        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D27B4FEBF');
//        $this->addSql('DROP TABLE caisse');
//        $this->addSql('DROP TABLE detail');
//        $this->addSql('DROP TABLE fdb');
//        $this->addSql('DROP TABLE operation');
//        $this->addSql('DROP TABLE user');
//        $this->addSql('DROP TABLE messenger_messages');
    }
}
