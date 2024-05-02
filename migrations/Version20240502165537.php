<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502165537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bda (id INT AUTO_INCREMENT NOT NULL, caisse_id INT NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modepaie VARCHAR(255) NOT NULL, numerocheque VARCHAR(255) NOT NULL, montanttotal INT NOT NULL, nature VARCHAR(255) NOT NULL, INDEX IDX_8F36393127B4FEBF (caisse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caisse (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, intitulé VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, soldedispo INT NOT NULL, plafond TINYINT(1) NOT NULL, gerant VARCHAR(255) NOT NULL, INDEX IDX_B2A353C8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depense (id INT AUTO_INCREMENT NOT NULL, fdb_id INT NOT NULL, caisse_id INT NOT NULL, user_id INT NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', montant INT NOT NULL, categorie VARCHAR(255) NOT NULL, modepaie VARCHAR(255) NOT NULL, INDEX IDX_34059757BF2BFC3 (fdb_id), INDEX IDX_3405975727B4FEBF (caisse_id), INDEX IDX_34059757A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE edc (id INT AUTO_INCREMENT NOT NULL, caisse_id INT NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', solde INT NOT NULL, encaissement INT NOT NULL, decaissement INT NOT NULL, INDEX IDX_64774E9827B4FEBF (caisse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fdb (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, numéro_fdb VARCHAR(20) NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', objet VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, destinataire VARCHAR(255) NOT NULL, département VARCHAR(255) NOT NULL, signature VARCHAR(255) NOT NULL, INDEX IDX_1136C057A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bda ADD CONSTRAINT FK_8F36393127B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE caisse ADD CONSTRAINT FK_B2A353C8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757BF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_3405975727B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE edc ADD CONSTRAINT FK_64774E9827B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C057A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bda DROP FOREIGN KEY FK_8F36393127B4FEBF');
        $this->addSql('ALTER TABLE caisse DROP FOREIGN KEY FK_B2A353C8A76ED395');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757BF2BFC3');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_3405975727B4FEBF');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757A76ED395');
        $this->addSql('ALTER TABLE edc DROP FOREIGN KEY FK_64774E9827B4FEBF');
        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C057A76ED395');
        $this->addSql('DROP TABLE bda');
        $this->addSql('DROP TABLE caisse');
        $this->addSql('DROP TABLE depense');
        $this->addSql('DROP TABLE edc');
        $this->addSql('DROP TABLE fdb');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
