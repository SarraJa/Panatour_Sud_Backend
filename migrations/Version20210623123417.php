<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623123417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_service_hotelier (client_id INT NOT NULL, service_hotelier_id INT NOT NULL, INDEX IDX_977B06A119EB6921 (client_id), INDEX IDX_977B06A132AB77CD (service_hotelier_id), PRIMARY KEY(client_id, service_hotelier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_service_hotelier ADD CONSTRAINT FK_977B06A119EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_service_hotelier ADD CONSTRAINT FK_977B06A132AB77CD FOREIGN KEY (service_hotelier_id) REFERENCES service_hotelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client ADD mangopayid VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE client_service_hotelier');
        $this->addSql('ALTER TABLE client DROP mangopayid');
    }
}
