<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210614213935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD service_hotelier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F32AB77CD FOREIGN KEY (service_hotelier_id) REFERENCES service_hotelier (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F32AB77CD ON image (service_hotelier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F32AB77CD');
        $this->addSql('DROP INDEX IDX_C53D045F32AB77CD ON image');
        $this->addSql('ALTER TABLE image DROP service_hotelier_id');
    }
}
