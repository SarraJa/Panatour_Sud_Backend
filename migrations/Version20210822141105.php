<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210822141105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ALTER date_reservation TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE reservation ALTER date_reservation DROP DEFAULT');
        $this->addSql('ALTER TABLE service_des_monuments ALTER latitude TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE service_des_monuments ALTER latitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_des_monuments ALTER longitude TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE service_des_monuments ALTER longitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_hotelier ALTER prix TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE service_hotelier ALTER prix DROP DEFAULT');
        $this->addSql('ALTER TABLE service_hotelier ALTER latitude TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE service_hotelier ALTER latitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_hotelier ALTER longitude TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE service_hotelier ALTER longitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_restauration ALTER latitude TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE service_restauration ALTER latitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_restauration ALTER longitude TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE service_restauration ALTER longitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_transport ALTER prix TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE service_transport ALTER prix DROP DEFAULT');
        $this->addSql('ALTER TABLE service_transport ALTER latitude TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE service_transport ALTER latitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_transport ALTER longitude TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE service_transport ALTER longitude DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE service_hotelier ALTER prix TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE service_hotelier ALTER prix DROP DEFAULT');
        $this->addSql('ALTER TABLE service_hotelier ALTER latitude TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE service_hotelier ALTER latitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_hotelier ALTER longitude TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE service_hotelier ALTER longitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_des_monuments ALTER latitude TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE service_des_monuments ALTER latitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_des_monuments ALTER longitude TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE service_des_monuments ALTER longitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_restauration ALTER latitude TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE service_restauration ALTER latitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_restauration ALTER longitude TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE service_restauration ALTER longitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_transport ALTER prix TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE service_transport ALTER prix DROP DEFAULT');
        $this->addSql('ALTER TABLE service_transport ALTER latitude TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE service_transport ALTER latitude DROP DEFAULT');
        $this->addSql('ALTER TABLE service_transport ALTER longitude TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE service_transport ALTER longitude DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER date_reservation TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE reservation ALTER date_reservation DROP DEFAULT');
    }
}
