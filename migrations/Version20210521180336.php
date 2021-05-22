<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210521180336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE members CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE soldes ADD member_id INT NOT NULL');
        $this->addSql('ALTER TABLE soldes ADD CONSTRAINT FK_C8BEAA737597D3FE FOREIGN KEY (member_id) REFERENCES members (id)');
        $this->addSql('CREATE INDEX IDX_C8BEAA737597D3FE ON soldes (member_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE members CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE soldes DROP FOREIGN KEY FK_C8BEAA737597D3FE');
        $this->addSql('DROP INDEX IDX_C8BEAA737597D3FE ON soldes');
        $this->addSql('ALTER TABLE soldes DROP member_id');
    }
}
