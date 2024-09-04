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
//final class Version20240902091223 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE bon_caisse DROP FOREIGN KEY FK_A6DF2BF295D9453A');
//        $this->addSql('DROP INDEX IDX_A6DF2BF295D9453A ON bon_caisse');
//        $this->addSql('ALTER TABLE bon_caisse DROP journal_caisse_id');
//        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A469052095D9453A');
//        $this->addSql('DROP INDEX IDX_A469052095D9453A ON bonapprovisionnement');
//        $this->addSql('ALTER TABLE bonapprovisionnement DROP journal_caisse_id');
//        $this->addSql('ALTER TABLE caisse DROP FOREIGN KEY FK_B2A353C895D9453A');
//        $this->addSql('DROP INDEX IDX_B2A353C895D9453A ON caisse');
//        $this->addSql('ALTER TABLE caisse DROP journal_caisse_id');
//        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C05795D9453A');
//        $this->addSql('DROP INDEX IDX_1136C05795D9453A ON fdb');
//        $this->addSql('ALTER TABLE fdb DROP journal_caisse_id');
//        $this->addSql('ALTER TABLE journal_caisse ADD caisse_id INT DEFAULT NULL, ADD fdb_id INT DEFAULT NULL, ADD bonapprovisionnement_id INT DEFAULT NULL, ADD recu_caisse_id INT DEFAULT NULL, ADD bon_caisse_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412D27B4FEBF FOREIGN KEY (caisse_id) REFERENCES caisse (id)');
//        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412DBF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
//        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412D1715AECD FOREIGN KEY (bonapprovisionnement_id) REFERENCES bonapprovisionnement (id)');
//        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412D907D10FF FOREIGN KEY (recu_caisse_id) REFERENCES recu_caisse (id)');
//        $this->addSql('ALTER TABLE journal_caisse ADD CONSTRAINT FK_69FB412DB01D5004 FOREIGN KEY (bon_caisse_id) REFERENCES bon_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_69FB412D27B4FEBF ON journal_caisse (caisse_id)');
//        $this->addSql('CREATE INDEX IDX_69FB412DBF2BFC3 ON journal_caisse (fdb_id)');
//        $this->addSql('CREATE INDEX IDX_69FB412D1715AECD ON journal_caisse (bonapprovisionnement_id)');
//        $this->addSql('CREATE INDEX IDX_69FB412D907D10FF ON journal_caisse (recu_caisse_id)');
//        $this->addSql('CREATE INDEX IDX_69FB412DB01D5004 ON journal_caisse (bon_caisse_id)');
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
//        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412D27B4FEBF');
//        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412DBF2BFC3');
//        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412D1715AECD');
//        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412D907D10FF');
//        $this->addSql('ALTER TABLE journal_caisse DROP FOREIGN KEY FK_69FB412DB01D5004');
//        $this->addSql('DROP INDEX IDX_69FB412D27B4FEBF ON journal_caisse');
//        $this->addSql('DROP INDEX IDX_69FB412DBF2BFC3 ON journal_caisse');
//        $this->addSql('DROP INDEX IDX_69FB412D1715AECD ON journal_caisse');
//        $this->addSql('DROP INDEX IDX_69FB412D907D10FF ON journal_caisse');
//        $this->addSql('DROP INDEX IDX_69FB412DB01D5004 ON journal_caisse');
//        $this->addSql('ALTER TABLE journal_caisse DROP caisse_id, DROP fdb_id, DROP bonapprovisionnement_id, DROP recu_caisse_id, DROP bon_caisse_id');
//        $this->addSql('ALTER TABLE caisse ADD journal_caisse_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE caisse ADD CONSTRAINT FK_B2A353C895D9453A FOREIGN KEY (journal_caisse_id) REFERENCES journal_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_B2A353C895D9453A ON caisse (journal_caisse_id)');
//        $this->addSql('ALTER TABLE fdb ADD journal_caisse_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C05795D9453A FOREIGN KEY (journal_caisse_id) REFERENCES journal_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_1136C05795D9453A ON fdb (journal_caisse_id)');
//        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_USERNAME ON user');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON user (full_name)');
//        $this->addSql('ALTER TABLE bonapprovisionnement ADD journal_caisse_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A469052095D9453A FOREIGN KEY (journal_caisse_id) REFERENCES journal_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_A469052095D9453A ON bonapprovisionnement (journal_caisse_id)');
//        $this->addSql('ALTER TABLE bon_caisse ADD journal_caisse_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE bon_caisse ADD CONSTRAINT FK_A6DF2BF295D9453A FOREIGN KEY (journal_caisse_id) REFERENCES journal_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_A6DF2BF295D9453A ON bon_caisse (journal_caisse_id)');
//        $this->addSql('ALTER TABLE recu_caisse ADD journal_caisse_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE recu_caisse ADD CONSTRAINT FK_ADA5DC4A95D9453A FOREIGN KEY (journal_caisse_id) REFERENCES journal_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_ADA5DC4A95D9453A ON recu_caisse (journal_caisse_id)');
//    }
//}
