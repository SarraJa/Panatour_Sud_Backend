<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210715093541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service_des_monuments ADD latitude DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE service_des_monuments ADD longitude DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE service_hotelier ADD latitude DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE service_hotelier ADD longitude DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE service_restauration ADD latitude DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE service_restauration ADD longitude DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE service_transport ADD latitude DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE service_transport ADD longitude DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE service_restauration DROP latitude');
        $this->addSql('ALTER TABLE service_restauration DROP longitude');
        $this->addSql('ALTER TABLE service_des_monuments DROP latitude');
        $this->addSql('ALTER TABLE service_des_monuments DROP longitude');
        $this->addSql('ALTER TABLE service_hotelier DROP latitude');
        $this->addSql('ALTER TABLE service_hotelier DROP longitude');
        $this->addSql('ALTER TABLE service_transport DROP latitude');
        $this->addSql('ALTER TABLE service_transport DROP longitude');
    }
}
