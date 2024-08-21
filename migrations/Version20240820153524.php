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
//final class Version20240820153524 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE journee CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
//        $this->addSql('ALTER TABLE societe ADD fonction_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBD57889920 FOREIGN KEY (fonction_id) REFERENCES fonction (id)');
//        $this->addSql('CREATE INDEX IDX_19653DBD57889920 ON societe (fonction_id)');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBD57889920');
//        $this->addSql('DROP INDEX IDX_19653DBD57889920 ON societe');
//        $this->addSql('ALTER TABLE societe DROP fonction_id');
//        $this->addSql('ALTER TABLE journee CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
//    }
//}
