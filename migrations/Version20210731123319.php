<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210731123319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service_des_monuments ADD wallet_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE service_restauration ADD wallet_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE service_transport ADD wallet_id VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE service_des_monuments DROP wallet_id');
        $this->addSql('ALTER TABLE service_restauration DROP wallet_id');
        $this->addSql('ALTER TABLE service_transport DROP wallet_id');
    }
}
