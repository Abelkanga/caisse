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
//final class Version20240913194823 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, fdb_id INT DEFAULT NULL, bonapprovisionnement_id INT DEFAULT NULL, uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', message VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', unread TINYINT(1) DEFAULT NULL, permission VARCHAR(255) DEFAULT NULL, INDEX IDX_BF5476CAA76ED395 (user_id), INDEX IDX_BF5476CABF2BFC3 (fdb_id), INDEX IDX_BF5476CA1715AECD (bonapprovisionnement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
//        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CABF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
//        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA1715AECD FOREIGN KEY (bonapprovisionnement_id) REFERENCES bonapprovisionnement (id)');
//        $this->addSql('ALTER TABLE appro_caisse CHANGE status status VARCHAR(255) NOT NULL, CHANGE uuid uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
//        $this->addSql('ALTER TABLE caisse DROP last_solde, CHANGE responsable responsable VARCHAR(255) NOT NULL, CHANGE plafond plafond VARCHAR(255) NOT NULL, CHANGE code code VARCHAR(255) NOT NULL');
//        $this->addSql('ALTER TABLE journee CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
//        $this->addSql('ALTER TABLE recu_caisse DROP FOREIGN KEY FK_ADA5DC4A95D9453A');
//        $this->addSql('DROP INDEX IDX_ADA5DC4A95D9453A ON recu_caisse');
//        $this->addSql('ALTER TABLE recu_caisse DROP journal_caisse_id');
//        $this->addSql('ALTER TABLE societe CHANGE forme_juridique forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_USERNAME ON user');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON user (pseudo)');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA76ED395');
//        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CABF2BFC3');
//        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA1715AECD');
//        $this->addSql('DROP TABLE notification');
//        $this->addSql('ALTER TABLE societe CHANGE forme_juridique forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE journee CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
//        $this->addSql('ALTER TABLE caisse ADD last_solde NUMERIC(10, 2) DEFAULT NULL, CHANGE plafond plafond NUMERIC(10, 2) NOT NULL, CHANGE responsable responsable VARCHAR(255) DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT NULL');
//        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_USERNAME ON user');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON user (full_name)');
//        $this->addSql('ALTER TABLE recu_caisse ADD journal_caisse_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE recu_caisse ADD CONSTRAINT FK_ADA5DC4A95D9453A FOREIGN KEY (journal_caisse_id) REFERENCES journal_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_ADA5DC4A95D9453A ON recu_caisse (journal_caisse_id)');
//        $this->addSql('ALTER TABLE appro_caisse CHANGE status status VARCHAR(255) DEFAULT NULL, CHANGE uuid uuid BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
//    }
//}
