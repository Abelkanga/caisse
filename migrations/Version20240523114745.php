<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240523114745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE caisse DROP FOREIGN KEY FK_B2A353C8A76ED395');
//        $this->addSql('ALTER TABLE caisse DROP FOREIGN KEY FK_B2A353C8BF2BFC3');
//        $this->addSql('DROP INDEX IDX_B2A353C8A76ED395 ON caisse');
//        $this->addSql('DROP INDEX IDX_B2A353C8BF2BFC3 ON caisse');
//        $this->addSql('ALTER TABLE caisse DROP user_id, DROP fdb_id, CHANGE plafond plafond VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caisse ADD user_id INT NOT NULL, ADD fdb_id INT DEFAULT NULL, CHANGE plafond plafond TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE caisse ADD CONSTRAINT FK_B2A353C8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE caisse ADD CONSTRAINT FK_B2A353C8BF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
        $this->addSql('CREATE INDEX IDX_B2A353C8A76ED395 ON caisse (user_id)');
        $this->addSql('CREATE INDEX IDX_B2A353C8BF2BFC3 ON caisse (fdb_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
