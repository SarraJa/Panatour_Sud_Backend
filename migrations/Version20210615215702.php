<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210615215702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD service_restauration_id INT DEFAULT NULL, ADD service_transport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F5E6DC9CD FOREIGN KEY (service_restauration_id) REFERENCES service_restauration (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F46A5B4DA FOREIGN KEY (service_transport_id) REFERENCES service_transport (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F5E6DC9CD ON image (service_restauration_id)');
        $this->addSql('CREATE INDEX IDX_C53D045F46A5B4DA ON image (service_transport_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F5E6DC9CD');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F46A5B4DA');
        $this->addSql('DROP INDEX IDX_C53D045F5E6DC9CD ON image');
        $this->addSql('DROP INDEX IDX_C53D045F46A5B4DA ON image');
        $this->addSql('ALTER TABLE image DROP service_restauration_id, DROP service_transport_id');
    }
}
