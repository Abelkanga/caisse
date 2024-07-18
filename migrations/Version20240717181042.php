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
//final class Version20240717181042 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE bonapprovisionnement ADD journee_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A4690520CF066148 FOREIGN KEY (journee_id) REFERENCES journee (id)');
//        $this->addSql('CREATE INDEX IDX_A4690520CF066148 ON bonapprovisionnement (journee_id)');
//        $this->addSql('ALTER TABLE fdb ADD journee_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C057CF066148 FOREIGN KEY (journee_id) REFERENCES journee (id)');
//        $this->addSql('CREATE INDEX IDX_1136C057CF066148 ON fdb (journee_id)');
//        $this->addSql('ALTER TABLE journee DROP bonapprovisionnement_id, DROP fdb_id, CHANGE caisse_id caisse_id INT NOT NULL, CHANGE started_at started_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE active active TINYINT(1) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE uuid uuid VARCHAR(255) NOT NULL');
//        $this->addSql('ALTER TABLE societe CHANGE forme_juridique forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE societe CHANGE forme_juridique forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE journee ADD bonapprovisionnement_id INT DEFAULT NULL, ADD fdb_id INT DEFAULT NULL, CHANGE caisse_id caisse_id INT DEFAULT NULL, CHANGE started_at started_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE active active TINYINT(1) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE uuid uuid VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C057CF066148');
//        $this->addSql('DROP INDEX IDX_1136C057CF066148 ON fdb');
//        $this->addSql('ALTER TABLE fdb DROP journee_id');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A4690520CF066148');
//        $this->addSql('DROP INDEX IDX_A4690520CF066148 ON bonapprovisionnement');
//        $this->addSql('ALTER TABLE bonapprovisionnement DROP journee_id');
//    }
//}
