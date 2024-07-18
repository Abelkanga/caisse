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
//final class Version20240725102434 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE billetage ADD user_id INT DEFAULT NULL, ADD date DATETIME DEFAULT NULL, ADD status VARCHAR(255) DEFAULT NULL, ADD reference VARCHAR(255) DEFAULT NULL, ADD confimre_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP check_balance, DROP check_amount, DROP check_ecart');
//        $this->addSql('ALTER TABLE billetage ADD CONSTRAINT FK_83E6E9FAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
//        $this->addSql('CREATE INDEX IDX_83E6E9FAA76ED395 ON billetage (user_id)');
//        $this->addSql('ALTER TABLE journee ADD billetage_id INT DEFAULT NULL, DROP bonapprovisionnement_id, DROP fdb_id, CHANGE caisse_id caisse_id INT NOT NULL, CHANGE started_at started_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE active active TINYINT(1) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE uuid uuid VARCHAR(255) NOT NULL');
//        $this->addSql('ALTER TABLE journee ADD CONSTRAINT FK_DC179AED18C73C5D FOREIGN KEY (billetage_id) REFERENCES billetage (id)');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_DC179AED18C73C5D ON journee (billetage_id)');
//        $this->addSql('ALTER TABLE societe CHANGE forme_juridique forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE billetage DROP FOREIGN KEY FK_83E6E9FAA76ED395');
//        $this->addSql('DROP INDEX IDX_83E6E9FAA76ED395 ON billetage');
//        $this->addSql('ALTER TABLE billetage ADD check_amount INT DEFAULT NULL, ADD check_ecart INT DEFAULT NULL, DROP date, DROP status, DROP reference, DROP confimre_at, CHANGE user_id check_balance INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE societe CHANGE forme_juridique forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE journee DROP FOREIGN KEY FK_DC179AED18C73C5D');
//        $this->addSql('DROP INDEX UNIQ_DC179AED18C73C5D ON journee');
//        $this->addSql('ALTER TABLE journee ADD fdb_id INT DEFAULT NULL, CHANGE caisse_id caisse_id INT DEFAULT NULL, CHANGE started_at started_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE active active TINYINT(1) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE uuid uuid VARCHAR(255) DEFAULT NULL, CHANGE billetage_id bonapprovisionnement_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//    }
//}
