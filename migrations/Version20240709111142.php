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
//final class Version20240709111142 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE bonapprovisionnement ADD journal_caisse_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE bonapprovisionnement ADD CONSTRAINT FK_A469052095D9453A FOREIGN KEY (journal_caisse_id) REFERENCES journal_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_A469052095D9453A ON bonapprovisionnement (journal_caisse_id)');
//        $this->addSql('ALTER TABLE fdb ADD journal_caisse_id INT DEFAULT NULL, CHANGE objet objet VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL');
//        $this->addSql('ALTER TABLE fdb ADD CONSTRAINT FK_1136C05795D9453A FOREIGN KEY (journal_caisse_id) REFERENCES journal_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_1136C05795D9453A ON fdb (journal_caisse_id)');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE fdb DROP FOREIGN KEY FK_1136C05795D9453A');
//        $this->addSql('DROP INDEX IDX_1136C05795D9453A ON fdb');
//        $this->addSql('ALTER TABLE fdb DROP journal_caisse_id, CHANGE objet objet VARCHAR(255) DEFAULT NULL, CHANGE date date VARCHAR(255) DEFAULT NULL');
//        $this->addSql('ALTER TABLE bonapprovisionnement DROP FOREIGN KEY FK_A469052095D9453A');
//        $this->addSql('DROP INDEX IDX_A469052095D9453A ON bonapprovisionnement');
//        $this->addSql('ALTER TABLE bonapprovisionnement DROP journal_caisse_id');
//    }
//}
