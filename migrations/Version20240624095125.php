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
//final class Version20240624095125 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE billetage ADD bonapprovisionnement_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE billetage ADD CONSTRAINT FK_83E6E9FA1715AECD FOREIGN KEY (bonapprovisionnement_id) REFERENCES bonapprovisionnement (id)');
//        $this->addSql('CREATE INDEX IDX_83E6E9FA1715AECD ON billetage (bonapprovisionnement_id)');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE billetage DROP FOREIGN KEY FK_83E6E9FA1715AECD');
//        $this->addSql('DROP INDEX IDX_83E6E9FA1715AECD ON billetage');
//        $this->addSql('ALTER TABLE billetage DROP bonapprovisionnement_id');
//        $this->addSql('ALTER TABLE fdb CHANGE objet objet VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
//    }
//}
