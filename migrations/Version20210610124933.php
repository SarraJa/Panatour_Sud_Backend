<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610124933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_lieu_interet (client_id INT NOT NULL, lieu_interet_id INT NOT NULL, INDEX IDX_F90FF54519EB6921 (client_id), INDEX IDX_F90FF5459442DF78 (lieu_interet_id), PRIMARY KEY(client_id, lieu_interet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_lieu_interet ADD CONSTRAINT FK_F90FF54519EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_lieu_interet ADD CONSTRAINT FK_F90FF5459442DF78 FOREIGN KEY (lieu_interet_id) REFERENCES lieu_interet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facture ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE866410B83297E7 ON facture (reservation_id)');
        $this->addSql('ALTER TABLE reclamation ADD client_id INT DEFAULT NULL, ADD lieu_interet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064049442DF78 FOREIGN KEY (lieu_interet_id) REFERENCES lieu_interet (id)');
        $this->addSql('CREATE INDEX IDX_CE60640419EB6921 ON reclamation (client_id)');
        $this->addSql('CREATE INDEX IDX_CE6064049442DF78 ON reclamation (lieu_interet_id)');
        $this->addSql('ALTER TABLE reservation ADD client_id INT DEFAULT NULL, ADD service_transport_id INT DEFAULT NULL, ADD service_hotelier_id INT DEFAULT NULL, ADD service_restauration_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495546A5B4DA FOREIGN KEY (service_transport_id) REFERENCES service_transport (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495532AB77CD FOREIGN KEY (service_hotelier_id) REFERENCES service_hotelier (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849555E6DC9CD FOREIGN KEY (service_restauration_id) REFERENCES service_restauration (id)');
        $this->addSql('CREATE INDEX IDX_42C8495519EB6921 ON reservation (client_id)');
        $this->addSql('CREATE INDEX IDX_42C8495546A5B4DA ON reservation (service_transport_id)');
        $this->addSql('CREATE INDEX IDX_42C8495532AB77CD ON reservation (service_hotelier_id)');
        $this->addSql('CREATE INDEX IDX_42C849555E6DC9CD ON reservation (service_restauration_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE client_lieu_interet');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410B83297E7');
        $this->addSql('DROP INDEX UNIQ_FE866410B83297E7 ON facture');
        $this->addSql('ALTER TABLE facture DROP reservation_id');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640419EB6921');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064049442DF78');
        $this->addSql('DROP INDEX IDX_CE60640419EB6921 ON reclamation');
        $this->addSql('DROP INDEX IDX_CE6064049442DF78 ON reclamation');
        $this->addSql('ALTER TABLE reclamation DROP client_id, DROP lieu_interet_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495546A5B4DA');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495532AB77CD');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849555E6DC9CD');
        $this->addSql('DROP INDEX IDX_42C8495519EB6921 ON reservation');
        $this->addSql('DROP INDEX IDX_42C8495546A5B4DA ON reservation');
        $this->addSql('DROP INDEX IDX_42C8495532AB77CD ON reservation');
        $this->addSql('DROP INDEX IDX_42C849555E6DC9CD ON reservation');
        $this->addSql('ALTER TABLE reservation DROP client_id, DROP service_transport_id, DROP service_hotelier_id, DROP service_restauration_id');
    }
}
