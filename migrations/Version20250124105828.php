<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250124105828 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F93BF2BFC3');
//        $this->addSql('ALTER TABLE detail CHANGE fdb_id fdb_id INT NOT NULL');
//        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93BF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE detail_mission DROP FOREIGN KEY FK_F7A872E9DB653C5');
//        $this->addSql('ALTER TABLE detail_mission ADD CONSTRAINT FK_F7A872E9DB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE journal_caisse ADD libell�e VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE journal_caisse DROP libell�e');
//        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F93BF2BFC3');
//        $this->addSql('ALTER TABLE detail CHANGE fdb_id fdb_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93BF2BFC3 FOREIGN KEY (fdb_id) REFERENCES fdb (id)');
//        $this->addSql('ALTER TABLE detail_mission DROP FOREIGN KEY FK_F7A872E9DB653C5');
//        $this->addSql('ALTER TABLE detail_mission ADD CONSTRAINT FK_F7A872E9DB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
    }
}
