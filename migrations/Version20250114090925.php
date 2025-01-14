<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250114090925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F93DB653C5');
//        $this->addSql('DROP INDEX IDX_2E067F93DB653C5 ON detail');
//        $this->addSql('ALTER TABLE detail DROP order_mission_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE detail ADD order_mission_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93DB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
//        $this->addSql('CREATE INDEX IDX_2E067F93DB653C5 ON detail (order_mission_id)');
    }
}
