<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200219161854 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE temperature ADD equipments_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE temperature ADD temperature DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE temperature ADD date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE temperature ADD CONSTRAINT FK_BE4E2A6C5AEF5E63 FOREIGN KEY (equipments_id_id) REFERENCES equipments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_BE4E2A6C5AEF5E63 ON temperature (equipments_id_id)');
        $this->addSql('ALTER TABLE brightness ADD equipments_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE brightness ADD brightness INT NOT NULL');
        $this->addSql('ALTER TABLE brightness ADD date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE brightness ADD CONSTRAINT FK_D976D6E35AF23A42 FOREIGN KEY (equipments_id_id) REFERENCES equipments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D976D6E35AF23A42 ON brightness (equipments_id_id)');
        $this->addSql('ALTER TABLE equipments ADD mac_address VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE equipments ADD name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE equipments ADD type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE temperature DROP CONSTRAINT FK_BE4E2A6C5AEF5E63');
        $this->addSql('DROP INDEX IDX_BE4E2A6C5AEF5E63');
        $this->addSql('ALTER TABLE temperature DROP equipments_id_id');
        $this->addSql('ALTER TABLE temperature DROP temperature');
        $this->addSql('ALTER TABLE temperature DROP date');
        $this->addSql('ALTER TABLE brightness DROP CONSTRAINT FK_D976D6E35AF23A42');
        $this->addSql('DROP INDEX IDX_D976D6E35AF23A42');
        $this->addSql('ALTER TABLE brightness DROP equipments�_id_id');
        $this->addSql('ALTER TABLE brightness DROP brightness');
        $this->addSql('ALTER TABLE brightness DROP date');
        $this->addSql('ALTER TABLE equipments DROP mac_address');
        $this->addSql('ALTER TABLE equipments DROP name');
        $this->addSql('ALTER TABLE equipments DROP type');
    }
}
