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
//final class Version20240701170215 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE bonapprovisionnement ADD emeteur_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A4690520C8791E35 FOREIGN KEY (emeteur_id) REFERENCES emeteur (id)');
//        $this->addSql('CREATE INDEX IDX_A4690520C8791E35 ON bonapprovisionnement (emeteur_id)');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) DEFAULT NULL, CHANGE date date VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A4690520C8791E35');
//        $this->addSql('DROP INDEX IDX_A4690520C8791E35 ON bonapprovisionnement');
//        $this->addSql('ALTER TABLE bonapprovisionnement DROP emeteur_id');
//    }
//}
