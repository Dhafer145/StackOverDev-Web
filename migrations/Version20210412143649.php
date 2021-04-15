<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412143649 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte_rendu ADD etudiantcr_id INT NOT NULL');
        $this->addSql('ALTER TABLE compte_rendu ADD CONSTRAINT FK_D39E69D24D8259E2 FOREIGN KEY (etudiantcr_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D39E69D24D8259E2 ON compte_rendu (etudiantcr_id)');
        $this->addSql('ALTER TABLE plan_travail ADD etudiantpp_id INT NOT NULL');
        $this->addSql('ALTER TABLE plan_travail ADD CONSTRAINT FK_2E3632B3C0CB7C3B FOREIGN KEY (etudiantpp_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2E3632B3C0CB7C3B ON plan_travail (etudiantpp_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte_rendu DROP FOREIGN KEY FK_D39E69D24D8259E2');
        $this->addSql('DROP INDEX IDX_D39E69D24D8259E2 ON compte_rendu');
        $this->addSql('ALTER TABLE compte_rendu DROP etudiantcr_id');
        $this->addSql('ALTER TABLE plan_travail DROP FOREIGN KEY FK_2E3632B3C0CB7C3B');
        $this->addSql('DROP INDEX UNIQ_2E3632B3C0CB7C3B ON plan_travail');
        $this->addSql('ALTER TABLE plan_travail DROP etudiantpp_id');
    }
}
