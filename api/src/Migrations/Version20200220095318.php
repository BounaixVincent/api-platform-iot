<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220095318 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE temperature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE brightness_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE equipments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE temperature (id INT NOT NULL, t_equipments_id_id INT NOT NULL, temperature DOUBLE PRECISION NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BE4E2A6C9F1A5669 ON temperature (t_equipments_id_id)');
        $this->addSql('CREATE TABLE brightness (id INT NOT NULL, b_equiments_id_id INT NOT NULL, brightness INT NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D976D6E3B57761F6 ON brightness (b_equiments_id_id)');
        $this->addSql('CREATE TABLE equipments (id INT NOT NULL, mac_address VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE temperature ADD CONSTRAINT FK_BE4E2A6C9F1A5669 FOREIGN KEY (t_equipments_id_id) REFERENCES equipments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE brightness ADD CONSTRAINT FK_D976D6E3B57761F6 FOREIGN KEY (b_equiments_id_id) REFERENCES equipments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE temperature DROP CONSTRAINT FK_BE4E2A6C9F1A5669');
        $this->addSql('ALTER TABLE brightness DROP CONSTRAINT FK_D976D6E3B57761F6');
        $this->addSql('DROP SEQUENCE temperature_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE brightness_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE equipments_id_seq CASCADE');
        $this->addSql('DROP TABLE temperature');
        $this->addSql('DROP TABLE brightness');
        $this->addSql('DROP TABLE equipments');
    }
}
