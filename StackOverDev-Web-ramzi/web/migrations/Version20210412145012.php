<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412145012 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evaluation (id INT AUTO_INCREMENT NOT NULL, dateremp DATE NOT NULL, ponctualite TINYINT(1) NOT NULL, comm1 LONGTEXT NOT NULL, integration TINYINT(1) NOT NULL, comm2 LONGTEXT NOT NULL, travail TINYINT(1) NOT NULL, comm3 LONGTEXT NOT NULL, competence TINYINT(1) NOT NULL, comm4 LONGTEXT NOT NULL, eg TINYINT(1) NOT NULL, comm5 LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE evaluation');
    }
}
