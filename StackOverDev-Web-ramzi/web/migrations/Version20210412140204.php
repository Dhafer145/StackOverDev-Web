<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412140204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affectation (id INT AUTO_INCREMENT NOT NULL, id_etudiant_id INT NOT NULL, id_encadrant_academique_id INT NOT NULL, id_encadrant_entreprise_id INT DEFAULT NULL, nom_etudiant VARCHAR(255) NOT NULL, nom_encadrant_academique VARCHAR(255) NOT NULL, nom_encadrant_entreprise VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F4DD61D3C5F87C54 (id_etudiant_id), INDEX IDX_F4DD61D3E7E48C90 (id_encadrant_academique_id), INDEX IDX_F4DD61D3AE41E756 (id_encadrant_entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3E7E48C90 FOREIGN KEY (id_encadrant_academique_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3AE41E756 FOREIGN KEY (id_encadrant_entreprise_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE affectation');
    }
}
