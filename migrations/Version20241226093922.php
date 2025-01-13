<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241226093922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail ADD order_mission_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93DB653C5 FOREIGN KEY (order_mission_id) REFERENCES order_mission (id)');
        $this->addSql('CREATE INDEX IDX_2E067F93DB653C5 ON detail (order_mission_id)');
        $this->addSql('ALTER TABLE order_mission ADD user_id INT DEFAULT NULL, ADD expense_id INT DEFAULT NULL, ADD type_expense_id INT DEFAULT NULL, ADD emeteur_id INT DEFAULT NULL, ADD journee_id INT DEFAULT NULL, ADD valid_by_id INT DEFAULT NULL, ADD is_active TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77F395DB7B FOREIGN KEY (expense_id) REFERENCES expense (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77EE960D5E FOREIGN KEY (type_expense_id) REFERENCES type_expense (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77C8791E35 FOREIGN KEY (emeteur_id) REFERENCES emeteur (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77CF066148 FOREIGN KEY (journee_id) REFERENCES journee (id)');
        $this->addSql('ALTER TABLE order_mission ADD CONSTRAINT FK_661D5B77D8228AFF FOREIGN KEY (valid_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_661D5B77A76ED395 ON order_mission (user_id)');
        $this->addSql('CREATE INDEX IDX_661D5B77F395DB7B ON order_mission (expense_id)');
        $this->addSql('CREATE INDEX IDX_661D5B77EE960D5E ON order_mission (type_expense_id)');
        $this->addSql('CREATE INDEX IDX_661D5B77C8791E35 ON order_mission (emeteur_id)');
        $this->addSql('CREATE INDEX IDX_661D5B77CF066148 ON order_mission (journee_id)');
        $this->addSql('CREATE INDEX IDX_661D5B77D8228AFF ON order_mission (valid_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F93DB653C5');
        $this->addSql('DROP INDEX IDX_2E067F93DB653C5 ON detail');
        $this->addSql('ALTER TABLE detail DROP order_mission_id');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77A76ED395');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77F395DB7B');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77EE960D5E');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77C8791E35');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77CF066148');
        $this->addSql('ALTER TABLE order_mission DROP FOREIGN KEY FK_661D5B77D8228AFF');
        $this->addSql('DROP INDEX IDX_661D5B77A76ED395 ON order_mission');
        $this->addSql('DROP INDEX IDX_661D5B77F395DB7B ON order_mission');
        $this->addSql('DROP INDEX IDX_661D5B77EE960D5E ON order_mission');
        $this->addSql('DROP INDEX IDX_661D5B77C8791E35 ON order_mission');
        $this->addSql('DROP INDEX IDX_661D5B77CF066148 ON order_mission');
        $this->addSql('DROP INDEX IDX_661D5B77D8228AFF ON order_mission');
        $this->addSql('ALTER TABLE order_mission DROP user_id, DROP expense_id, DROP type_expense_id, DROP emeteur_id, DROP journee_id, DROP valid_by_id, DROP is_active');
    }
}
