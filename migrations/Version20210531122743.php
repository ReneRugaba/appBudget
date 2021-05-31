<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531122743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cathegories_depenses CHANGE nom nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE depenses CHANGE date_paiement date_paiement DATE DEFAULT NULL, CHANGE beneficiaire beneficiaire VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE members CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE revenu CHANGE montant montant DOUBLE PRECISION DEFAULT NULL, CHANGE date_reception date_reception DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE soldes CHANGE revenu_total revenu_total DOUBLE PRECISION DEFAULT NULL, CHANGE depense_total depense_total DOUBLE PRECISION DEFAULT NULL, CHANGE date_debut date_debut DATE DEFAULT NULL, CHANGE date_fin date_fin DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE type_revenus CHANGE nom nom VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cathegories_depenses CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE depenses CHANGE date_paiement date_paiement DATE NOT NULL, CHANGE beneficiaire beneficiaire VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE members CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE revenu CHANGE montant montant INT NOT NULL, CHANGE date_reception date_reception DATE NOT NULL');
        $this->addSql('ALTER TABLE soldes CHANGE revenu_total revenu_total DOUBLE PRECISION NOT NULL, CHANGE depense_total depense_total DOUBLE PRECISION NOT NULL, CHANGE date_debut date_debut DATE NOT NULL, CHANGE date_fin date_fin DATE NOT NULL');
        $this->addSql('ALTER TABLE type_revenus CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
