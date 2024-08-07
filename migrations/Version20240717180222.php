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
//final class Version20240717180222 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE journee DROP FOREIGN KEY FK_DC179AED1715AECD');
//        $this->addSql('ALTER TABLE journee DROP FOREIGN KEY FK_DC179AEDBF2BFC3');
//        $this->addSql('DROP INDEX IDX_DC179AED1715AECD ON journee');
//        $this->addSql('DROP INDEX IDX_DC179AEDBF2BFC3 ON journee');
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
//        $this->addSql('ALTER TABLE journee ADD CONSTRAINT FK_DC179AED1715AECD FOREIGN KEY (bonapprovisionnement_id) REFERENCES bonapprovisionnement (id)');
//        $this->addSql('ALTER TABLE journee ADD CONSTRAINT FK_DC179AEDBF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
//        $this->addSql('CREATE INDEX IDX_DC179AED1715AECD ON journee (bonapprovisionnement_id)');
//        $this->addSql('CREATE INDEX IDX_DC179AEDBF2BFC3 ON journee (fdb_id)');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//    }
//}
