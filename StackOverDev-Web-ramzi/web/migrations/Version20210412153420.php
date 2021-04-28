<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412153420 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reponsess (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reponses ADD reps_etud_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC6740D47C0 FOREIGN KEY (reps_etud_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1E512EC6740D47C0 ON reponses (reps_etud_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reponsess');
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC6740D47C0');
        $this->addSql('DROP INDEX IDX_1E512EC6740D47C0 ON reponses');
        $this->addSql('ALTER TABLE reponses DROP reps_etud_id');
    }
}
