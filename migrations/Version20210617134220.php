<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210617134220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD nombre_chamber INT DEFAULT NULL, ADD nombre_adulte INT DEFAULT NULL, ADD nombre_enfant INT DEFAULT NULL, ADD check_in DATETIME DEFAULT NULL, ADD check_out DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE service_hotelier DROP nombre_chamber, DROP nombre_adulte, DROP nombre_enfant, DROP check_in, DROP check_out');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP nombre_chamber, DROP nombre_adulte, DROP nombre_enfant, DROP check_in, DROP check_out');
        $this->addSql('ALTER TABLE service_hotelier ADD nombre_chamber INT DEFAULT NULL, ADD nombre_adulte INT DEFAULT NULL, ADD nombre_enfant INT DEFAULT NULL, ADD check_in DATETIME DEFAULT NULL, ADD check_out DATETIME DEFAULT NULL');
    }
}
