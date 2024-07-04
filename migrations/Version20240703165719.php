<?php
//
//declare(strict_types=1);
//
//namespace DoctrineMigrations;
//
//use Doctrine\DBAL\Schema\Schema;
//use Doctrine\Migrations\AbstractMigration;
//
///**
// * Auto-generated Migration: Please modify to your needs!
// */
//final class Version20240703165719 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE forme (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL');
//        $this->addSql('ALTER TABLE societe ADD forme LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE forme_juridique forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('DROP TABLE forme');
//        $this->addSql('ALTER TABLE societe DROP forme, CHANGE forme_juridique forme_juridique VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) DEFAULT NULL, CHANGE date date VARCHAR(255) DEFAULT NULL');
//    }
//}
