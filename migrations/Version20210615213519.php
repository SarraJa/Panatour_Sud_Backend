<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210615213519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service_hotelier ADD lieu_interet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service_hotelier ADD CONSTRAINT FK_B3B2835A9442DF78 FOREIGN KEY (lieu_interet_id) REFERENCES lieu_interet (id)');
        $this->addSql('CREATE INDEX IDX_B3B2835A9442DF78 ON service_hotelier (lieu_interet_id)');
        $this->addSql('ALTER TABLE service_restauration ADD lieu_interet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service_restauration ADD CONSTRAINT FK_56276B149442DF78 FOREIGN KEY (lieu_interet_id) REFERENCES lieu_interet (id)');
        $this->addSql('CREATE INDEX IDX_56276B149442DF78 ON service_restauration (lieu_interet_id)');
        $this->addSql('ALTER TABLE service_transport ADD lieu_interet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service_transport ADD CONSTRAINT FK_3E3A1B649442DF78 FOREIGN KEY (lieu_interet_id) REFERENCES lieu_interet (id)');
        $this->addSql('CREATE INDEX IDX_3E3A1B649442DF78 ON service_transport (lieu_interet_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service_hotelier DROP FOREIGN KEY FK_B3B2835A9442DF78');
        $this->addSql('DROP INDEX IDX_B3B2835A9442DF78 ON service_hotelier');
        $this->addSql('ALTER TABLE service_hotelier DROP lieu_interet_id');
        $this->addSql('ALTER TABLE service_restauration DROP FOREIGN KEY FK_56276B149442DF78');
        $this->addSql('DROP INDEX IDX_56276B149442DF78 ON service_restauration');
        $this->addSql('ALTER TABLE service_restauration DROP lieu_interet_id');
        $this->addSql('ALTER TABLE service_transport DROP FOREIGN KEY FK_3E3A1B649442DF78');
        $this->addSql('DROP INDEX IDX_3E3A1B649442DF78 ON service_transport');
        $this->addSql('ALTER TABLE service_transport DROP lieu_interet_id');
    }
}
