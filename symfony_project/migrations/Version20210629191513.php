<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629191513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC271237A8DE');
        $this->addSql('DROP INDEX IDX_29A5EC271237A8DE ON produit');
        $this->addSql('ALTER TABLE produit ADD type_produit VARCHAR(255) NOT NULL, DROP type_produit_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD type_produit_id INT NOT NULL, DROP type_produit');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC271237A8DE FOREIGN KEY (type_produit_id) REFERENCES type_produit (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC271237A8DE ON produit (type_produit_id)');
    }
}
