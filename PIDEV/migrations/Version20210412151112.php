<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412151112 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE grille ADD enc_academique_id INT NOT NULL, ADD grille_etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE grille ADD CONSTRAINT FK_D452165F97C4E34C FOREIGN KEY (enc_academique_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE grille ADD CONSTRAINT FK_D452165F7FF18EE8 FOREIGN KEY (grille_etudiant_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D452165F97C4E34C ON grille (enc_academique_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D452165F7FF18EE8 ON grille (grille_etudiant_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE grille DROP FOREIGN KEY FK_D452165F97C4E34C');
        $this->addSql('ALTER TABLE grille DROP FOREIGN KEY FK_D452165F7FF18EE8');
        $this->addSql('DROP INDEX IDX_D452165F97C4E34C ON grille');
        $this->addSql('DROP INDEX UNIQ_D452165F7FF18EE8 ON grille');
        $this->addSql('ALTER TABLE grille DROP enc_academique_id, DROP grille_etudiant_id');
    }
}
