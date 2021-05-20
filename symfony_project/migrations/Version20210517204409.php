<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517204409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, facture_id INT DEFAULT NULL, date_commande DATE NOT NULL, UNIQUE INDEX UNIQ_6EEAA67D7F2DEE08 (facture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, date_facture DATE NOT NULL, prix_total DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_produit (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_produit_produit (ligne_produit_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_E4BF064DEC9890E6 (ligne_produit_id), INDEX IDX_E4BF064DF347EFB (produit_id), PRIMARY KEY(ligne_produit_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_produit_commande (ligne_produit_id INT NOT NULL, commande_id INT NOT NULL, INDEX IDX_C34034D1EC9890E6 (ligne_produit_id), INDEX IDX_C34034D182EA2E54 (commande_id), PRIMARY KEY(ligne_produit_id, commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, commande_id INT DEFAULT NULL, date_livraison DATE NOT NULL, UNIQUE INDEX UNIQ_A60C9F1F82EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE ligne_produit_produit ADD CONSTRAINT FK_E4BF064DEC9890E6 FOREIGN KEY (ligne_produit_id) REFERENCES ligne_produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_produit_produit ADD CONSTRAINT FK_E4BF064DF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_produit_commande ADD CONSTRAINT FK_C34034D1EC9890E6 FOREIGN KEY (ligne_produit_id) REFERENCES ligne_produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_produit_commande ADD CONSTRAINT FK_C34034D182EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE produit ADD quantite INT NOT NULL, ADD prix DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_produit_commande DROP FOREIGN KEY FK_C34034D182EA2E54');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F82EA2E54');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D7F2DEE08');
        $this->addSql('ALTER TABLE ligne_produit_produit DROP FOREIGN KEY FK_E4BF064DEC9890E6');
        $this->addSql('ALTER TABLE ligne_produit_commande DROP FOREIGN KEY FK_C34034D1EC9890E6');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE ligne_produit');
        $this->addSql('DROP TABLE ligne_produit_produit');
        $this->addSql('DROP TABLE ligne_produit_commande');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('ALTER TABLE produit DROP quantite, DROP prix');
    }
}
