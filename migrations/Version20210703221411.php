<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210703221411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD service_des_monuments_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F234E72EA FOREIGN KEY (service_des_monuments_id) REFERENCES service_des_monuments (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F234E72EA ON image (service_des_monuments_id)');
        $this->addSql('ALTER TABLE reservation ADD service_des_monuments_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955234E72EA FOREIGN KEY (service_des_monuments_id) REFERENCES service_des_monuments (id)');
        $this->addSql('CREATE INDEX IDX_42C84955234E72EA ON reservation (service_des_monuments_id)');
        $this->addSql('ALTER TABLE service_des_monuments ADD lieu_interet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service_des_monuments ADD CONSTRAINT FK_7620F5A9442DF78 FOREIGN KEY (lieu_interet_id) REFERENCES lieu_interet (id)');
        $this->addSql('CREATE INDEX IDX_7620F5A9442DF78 ON service_des_monuments (lieu_interet_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F234E72EA');
        $this->addSql('DROP INDEX IDX_C53D045F234E72EA ON image');
        $this->addSql('ALTER TABLE image DROP service_des_monuments_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955234E72EA');
        $this->addSql('DROP INDEX IDX_42C84955234E72EA ON reservation');
        $this->addSql('ALTER TABLE reservation DROP service_des_monuments_id');
        $this->addSql('ALTER TABLE service_des_monuments DROP FOREIGN KEY FK_7620F5A9442DF78');
        $this->addSql('DROP INDEX IDX_7620F5A9442DF78 ON service_des_monuments');
        $this->addSql('ALTER TABLE service_des_monuments DROP lieu_interet_id');
    }
}
