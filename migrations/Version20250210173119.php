<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250210173119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_mission DROP FOREIGN KEY FK_567F57F68BAC62AF');
        $this->addSql('DROP INDEX IDX_567F57F68BAC62AF ON bon_mission');
        $this->addSql('ALTER TABLE bon_mission DROP city_id');
        $this->addSql('ALTER TABLE detail_bon_mission DROP FOREIGN KEY FK_39743AA78BAC62AF');
        $this->addSql('DROP INDEX IDX_39743AA78BAC62AF ON detail_bon_mission');
        $this->addSql('ALTER TABLE detail_bon_mission DROP city_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_bon_mission ADD city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE detail_bon_mission ADD CONSTRAINT FK_39743AA78BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_39743AA78BAC62AF ON detail_bon_mission (city_id)');
        $this->addSql('ALTER TABLE bon_mission ADD city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bon_mission ADD CONSTRAINT FK_567F57F68BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_567F57F68BAC62AF ON bon_mission (city_id)');
    }
}
