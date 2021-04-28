<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412150703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluation ADD eval_etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A575F61CDD52 FOREIGN KEY (eval_etudiant_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1323A575F61CDD52 ON evaluation (eval_etudiant_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A575F61CDD52');
        $this->addSql('DROP INDEX UNIQ_1323A575F61CDD52 ON evaluation');
        $this->addSql('ALTER TABLE evaluation DROP eval_etudiant_id');
    }
}
