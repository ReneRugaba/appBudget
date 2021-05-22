<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210521175628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cathegories_depenses (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depenses (id INT AUTO_INCREMENT NOT NULL, member_id INT NOT NULL, cathegorie_depense_id INT NOT NULL, montant DOUBLE PRECISION NOT NULL, date_paiement DATE NOT NULL, beneficiaire VARCHAR(255) NOT NULL, INDEX IDX_EE350ECB7597D3FE (member_id), INDEX IDX_EE350ECB5CAB8E2D (cathegorie_depense_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE members (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE revenu (id INT AUTO_INCREMENT NOT NULL, type_revenu_id INT NOT NULL, member_id INT NOT NULL, montant INT NOT NULL, date_reception DATE NOT NULL, INDEX IDX_7DA3C04520F3EE6A (type_revenu_id), INDEX IDX_7DA3C0457597D3FE (member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soldes (id INT AUTO_INCREMENT NOT NULL, revenu_total DOUBLE PRECISION NOT NULL, depense_total DOUBLE PRECISION NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_revenus (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE depenses ADD CONSTRAINT FK_EE350ECB7597D3FE FOREIGN KEY (member_id) REFERENCES members (id)');
        $this->addSql('ALTER TABLE depenses ADD CONSTRAINT FK_EE350ECB5CAB8E2D FOREIGN KEY (cathegorie_depense_id) REFERENCES cathegories_depenses (id)');
        $this->addSql('ALTER TABLE revenu ADD CONSTRAINT FK_7DA3C04520F3EE6A FOREIGN KEY (type_revenu_id) REFERENCES type_revenus (id)');
        $this->addSql('ALTER TABLE revenu ADD CONSTRAINT FK_7DA3C0457597D3FE FOREIGN KEY (member_id) REFERENCES members (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE depenses DROP FOREIGN KEY FK_EE350ECB5CAB8E2D');
        $this->addSql('ALTER TABLE depenses DROP FOREIGN KEY FK_EE350ECB7597D3FE');
        $this->addSql('ALTER TABLE revenu DROP FOREIGN KEY FK_7DA3C0457597D3FE');
        $this->addSql('ALTER TABLE revenu DROP FOREIGN KEY FK_7DA3C04520F3EE6A');
        $this->addSql('DROP TABLE cathegories_depenses');
        $this->addSql('DROP TABLE depenses');
        $this->addSql('DROP TABLE members');
        $this->addSql('DROP TABLE revenu');
        $this->addSql('DROP TABLE soldes');
        $this->addSql('DROP TABLE type_revenus');
    }
}
