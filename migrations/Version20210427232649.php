<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427232649 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plan_travail DROP INDEX UNIQ_2E3632B3C0CB7C3B, ADD INDEX IDX_2E3632B3C0CB7C3B (etudiantpp_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plan_travail DROP INDEX IDX_2E3632B3C0CB7C3B, ADD UNIQUE INDEX UNIQ_2E3632B3C0CB7C3B (etudiantpp_id)');
    }
}
