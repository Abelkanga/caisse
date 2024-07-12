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
//final class Version20240709105157 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE caisse ADD journal_caisse_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE caisse ADD CONSTRAINT FK_B2A353C895D9453A FOREIGN KEY (journal_caisse_id) REFERENCES journal_caisse (id)');
//        $this->addSql('CREATE INDEX IDX_B2A353C895D9453A ON caisse (journal_caisse_id)');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE caisse DROP FOREIGN KEY FK_B2A353C895D9453A');
//        $this->addSql('DROP INDEX IDX_B2A353C895D9453A ON caisse');
//        $this->addSql('ALTER TABLE caisse DROP journal_caisse_id');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) DEFAULT NULL, CHANGE date date VARCHAR(255) DEFAULT NULL');
//    }
//}
