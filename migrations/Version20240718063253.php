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
//final class Version20240718063253 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE journee DROP bonapprovisionnement_id, DROP fdb_id, CHANGE caisse_id caisse_id INT NOT NULL, CHANGE started_at started_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE active active TINYINT(1) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE uuid uuid VARCHAR(255) NOT NULL');
//        $this->addSql('ALTER TABLE societe CHANGE forme_juridique forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE user ADD caisse_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64927B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64927B4FEBF ON user (caisse_id)');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE societe CHANGE forme_juridique forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE journee ADD bonapprovisionnement_id INT DEFAULT NULL, ADD fdb_id INT DEFAULT NULL, CHANGE caisse_id caisse_id INT DEFAULT NULL, CHANGE started_at started_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE active active TINYINT(1) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE uuid uuid VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64927B4FEBF');
//        $this->addSql('DROP INDEX UNIQ_8D93D64927B4FEBF ON user');
//        $this->addSql('ALTER TABLE user DROP caisse_id, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//    }
//}
