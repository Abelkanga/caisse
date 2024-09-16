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
//final class Version20240916142439 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE appro_caisse (id INT AUTO_INCREMENT NOT NULL, journee_id INT DEFAULT NULL, caisse_emettrice_id INT NOT NULL, caisse_receptrice_id INT NOT NULL, user_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, montant VARCHAR(255) DEFAULT NULL, status VARCHAR(255) NOT NULL, reference VARCHAR(255) DEFAULT NULL, objet VARCHAR(255) DEFAULT NULL, uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_C12B0312CF066148 (journee_id), INDEX IDX_C12B0312495F4718 (caisse_emettrice_id), INDEX IDX_C12B0312BE06C2E7 (caisse_receptrice_id), INDEX IDX_C12B0312A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('ALTER TABLE appro_caisse ADD CONSTRAINT FK_C12B0312CF066148 FOREIGN KEY (journee_id) REFERENCES journee (id)');
//        $this->addSql('ALTER TABLE appro_caisse ADD CONSTRAINT FK_C12B0312495F4718 FOREIGN KEY (caisse_emettrice_id) REFERENCES caisse (id)');
//        $this->addSql('ALTER TABLE appro_caisse ADD CONSTRAINT FK_C12B0312BE06C2E7 FOREIGN KEY (caisse_receptrice_id) REFERENCES caisse (id)');
//        $this->addSql('ALTER TABLE appro_caisse ADD CONSTRAINT FK_C12B0312A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
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
//        $this->addSql('ALTER TABLE appro_caisse DROP FOREIGN KEY FK_C12B0312CF066148');
//        $this->addSql('ALTER TABLE appro_caisse DROP FOREIGN KEY FK_C12B0312495F4718');
//        $this->addSql('ALTER TABLE appro_caisse DROP FOREIGN KEY FK_C12B0312BE06C2E7');
//        $this->addSql('ALTER TABLE appro_caisse DROP FOREIGN KEY FK_C12B0312A76ED395');
//        $this->addSql('DROP TABLE appro_caisse');
//        $this->addSql('ALTER TABLE societe CHANGE forme_juridique forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE journee CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
//        $this->addSql('ALTER TABLE caisse ADD last_solde NUMERIC(10, 2) DEFAULT NULL, CHANGE plafond plafond NUMERIC(10, 2) NOT NULL, CHANGE responsable responsable VARCHAR(255) DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT NULL');
//        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_USERNAME ON user');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON user (full_name)');
//        $this->addSql('ALTER TABLE recu_caisse ADD journal_caisse_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE recu_caisse ADD CONSTRAINT FK_ADA5DC4A95D9453A FOREIGN KEY (journal_caisse_id) REFERENCES journal_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_ADA5DC4A95D9453A ON recu_caisse (journal_caisse_id)');
//    }
//}
