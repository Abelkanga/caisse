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
//final class Version20240916135647 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE appro_caisse DROP FOREIGN KEY FK_C12B031227B4FEBF');
//        $this->addSql('DROP INDEX IDX_C12B031227B4FEBF ON appro_caisse');
//        $this->addSql('ALTER TABLE appro_caisse ADD caisse_emettrice_id INT NOT NULL, ADD caisse_receptrice_id INT NOT NULL, DROP caisse_id, CHANGE status status VARCHAR(255) NOT NULL, CHANGE uuid uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
//        $this->addSql('ALTER TABLE appro_caisse ADD CONSTRAINT FK_C12B0312495F4718 FOREIGN KEY (caisse_emettrice_id) REFERENCES caisse (id)');
//        $this->addSql('ALTER TABLE appro_caisse ADD CONSTRAINT FK_C12B0312BE06C2E7 FOREIGN KEY (caisse_receptrice_id) REFERENCES caisse (id)');
//        $this->addSql('CREATE INDEX IDX_C12B0312495F4718 ON appro_caisse (caisse_emettrice_id)');
//        $this->addSql('CREATE INDEX IDX_C12B0312BE06C2E7 ON appro_caisse (caisse_receptrice_id)');
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
//        $this->addSql('ALTER TABLE societe CHANGE forme_juridique forme_juridique JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('ALTER TABLE journee CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
//        $this->addSql('ALTER TABLE caisse ADD last_solde NUMERIC(10, 2) DEFAULT NULL, CHANGE plafond plafond NUMERIC(10, 2) NOT NULL, CHANGE responsable responsable VARCHAR(255) DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT NULL');
//        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_USERNAME ON user');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON user (full_name)');
//        $this->addSql('ALTER TABLE recu_caisse ADD journal_caisse_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE recu_caisse ADD CONSTRAINT FK_ADA5DC4A95D9453A FOREIGN KEY (journal_caisse_id) REFERENCES journal_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_ADA5DC4A95D9453A ON recu_caisse (journal_caisse_id)');
//        $this->addSql('ALTER TABLE appro_caisse DROP FOREIGN KEY FK_C12B0312495F4718');
//        $this->addSql('ALTER TABLE appro_caisse DROP FOREIGN KEY FK_C12B0312BE06C2E7');
//        $this->addSql('DROP INDEX IDX_C12B0312495F4718 ON appro_caisse');
//        $this->addSql('DROP INDEX IDX_C12B0312BE06C2E7 ON appro_caisse');
//        $this->addSql('ALTER TABLE appro_caisse ADD caisse_id INT DEFAULT NULL, DROP caisse_emettrice_id, DROP caisse_receptrice_id, CHANGE status status VARCHAR(255) DEFAULT NULL, CHANGE uuid uuid BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
//        $this->addSql('ALTER TABLE appro_caisse ADD CONSTRAINT FK_C12B031227B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
//        $this->addSql('CREATE INDEX IDX_C12B031227B4FEBF ON appro_caisse (caisse_id)');
//    }
//}