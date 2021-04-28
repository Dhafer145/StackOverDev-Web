<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422050739 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affecter (id INT AUTO_INCREMENT NOT NULL, nom_etudiant_id INT DEFAULT NULL, nom_encadrant_academique_id INT DEFAULT NULL, nom_encadrant_entreprise_id INT DEFAULT NULL, INDEX IDX_C290057A138A1ABC (nom_etudiant_id), INDEX IDX_C290057A84BDC8EB (nom_encadrant_academique_id), INDEX IDX_C290057ACD18A32D (nom_encadrant_entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affecter ADD CONSTRAINT FK_C290057A138A1ABC FOREIGN KEY (nom_etudiant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE affecter ADD CONSTRAINT FK_C290057A84BDC8EB FOREIGN KEY (nom_encadrant_academique_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE affecter ADD CONSTRAINT FK_C290057ACD18A32D FOREIGN KEY (nom_encadrant_entreprise_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE affectation ADD nom_etudiant VARCHAR(255) NOT NULL, ADD nom_encadrant_academique VARCHAR(255) NOT NULL, ADD nom_encadrant_entreprise VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE affecter');
        $this->addSql('ALTER TABLE affectation DROP nom_etudiant, DROP nom_encadrant_academique, DROP nom_encadrant_entreprise');
    }
}
