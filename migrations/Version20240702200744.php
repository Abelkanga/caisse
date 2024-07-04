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
//final class Version20240702200744 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE caisse ADD user_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE caisse ADD CONSTRAINT FK_B2A353C8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
//        $this->addSql('CREATE INDEX IDX_B2A353C8A76ED395 ON caisse (user_id)');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE caisse DROP FOREIGN KEY FK_B2A353C8A76ED395');
//        $this->addSql('DROP INDEX IDX_B2A353C8A76ED395 ON caisse');
//        $this->addSql('ALTER TABLE caisse DROP user_id');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) DEFAULT NULL, CHANGE date date VARCHAR(255) DEFAULT NULL');
//    }
//}
