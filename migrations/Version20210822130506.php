<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210822130506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ALTER date_naissance TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE client ALTER date_naissance DROP DEFAULT');
        $this->addSql('ALTER TABLE client ALTER numero_carte TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE client ALTER numero_carte DROP DEFAULT');
        $this->addSql('ALTER TABLE client ALTER numero_telephone TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE client ALTER numero_telephone DROP DEFAULT');
        $this->addSql('ALTER TABLE facture ALTER prix_total TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE facture ALTER prix_total DROP DEFAULT');
        $this->addSql('ALTER TABLE lieu_interet ALTER latitude TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE lieu_interet ALTER latitude DROP DEFAULT');
        $this->addSql('ALTER TABLE lieu_interet ALTER longitude TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE lieu_interet ALTER longitude DROP DEFAULT');
        $this->addSql('ALTER TABLE lieu_interet ALTER score TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE lieu_interet ALTER score DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ADD nbr_personnes VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD nbr_tables VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ALTER duree TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE reservation ALTER duree DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER nombre_chamber TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE reservation ALTER nombre_chamber DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER nombre_adulte TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE reservation ALTER nombre_adulte DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER nombre_enfant TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE reservation ALTER nombre_enfant DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER check_in TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE reservation ALTER check_in DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER check_out TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE reservation ALTER check_out DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER status TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE reservation ALTER status DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER montant_paiment TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE reservation ALTER montant_paiment DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE lieu_interet ALTER latitude TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE lieu_interet ALTER latitude DROP DEFAULT');
        $this->addSql('ALTER TABLE lieu_interet ALTER longitude TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE lieu_interet ALTER longitude DROP DEFAULT');
        $this->addSql('ALTER TABLE lieu_interet ALTER score TYPE INT');
        $this->addSql('ALTER TABLE lieu_interet ALTER score DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation DROP nbr_personnes');
        $this->addSql('ALTER TABLE reservation DROP nbr_tables');
        $this->addSql('ALTER TABLE reservation ALTER duree TYPE INT');
        $this->addSql('ALTER TABLE reservation ALTER duree DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER nombre_chamber TYPE INT');
        $this->addSql('ALTER TABLE reservation ALTER nombre_chamber DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER nombre_adulte TYPE INT');
        $this->addSql('ALTER TABLE reservation ALTER nombre_adulte DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER nombre_enfant TYPE INT');
        $this->addSql('ALTER TABLE reservation ALTER nombre_enfant DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER check_in TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE reservation ALTER check_in DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER check_out TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE reservation ALTER check_out DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER status TYPE BOOLEAN');
        $this->addSql('ALTER TABLE reservation ALTER status DROP DEFAULT');
        $this->addSql('ALTER TABLE reservation ALTER montant_paiment TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE reservation ALTER montant_paiment DROP DEFAULT');
        $this->addSql('ALTER TABLE facture ALTER prix_total TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE facture ALTER prix_total DROP DEFAULT');
        $this->addSql('ALTER TABLE client ALTER date_naissance TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE client ALTER date_naissance DROP DEFAULT');
        $this->addSql('ALTER TABLE client ALTER numero_carte TYPE INT');
        $this->addSql('ALTER TABLE client ALTER numero_carte DROP DEFAULT');
        $this->addSql('ALTER TABLE client ALTER numero_telephone TYPE INT');
        $this->addSql('ALTER TABLE client ALTER numero_telephone DROP DEFAULT');
    }
}
