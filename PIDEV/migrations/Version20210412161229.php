<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412161229 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_final ADD rapp_etudiant_id INT NOT NULL, ADD enc_ac_correction_id INT NOT NULL');
        $this->addSql('ALTER TABLE rapport_final ADD CONSTRAINT FK_CCE74518E7A149D7 FOREIGN KEY (rapp_etudiant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rapport_final ADD CONSTRAINT FK_CCE745185B5DEF45 FOREIGN KEY (enc_ac_correction_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CCE74518E7A149D7 ON rapport_final (rapp_etudiant_id)');
        $this->addSql('CREATE INDEX IDX_CCE745185B5DEF45 ON rapport_final (enc_ac_correction_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_final DROP FOREIGN KEY FK_CCE74518E7A149D7');
        $this->addSql('ALTER TABLE rapport_final DROP FOREIGN KEY FK_CCE745185B5DEF45');
        $this->addSql('DROP INDEX UNIQ_CCE74518E7A149D7 ON rapport_final');
        $this->addSql('DROP INDEX IDX_CCE745185B5DEF45 ON rapport_final');
        $this->addSql('ALTER TABLE rapport_final DROP rapp_etudiant_id, DROP enc_ac_correction_id');
    }
}
