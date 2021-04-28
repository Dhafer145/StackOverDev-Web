<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412143818 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposition_projet ADD etudiantpp_id INT NOT NULL');
        $this->addSql('ALTER TABLE proposition_projet ADD CONSTRAINT FK_D6781ECFC0CB7C3B FOREIGN KEY (etudiantpp_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D6781ECFC0CB7C3B ON proposition_projet (etudiantpp_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposition_projet DROP FOREIGN KEY FK_D6781ECFC0CB7C3B');
        $this->addSql('DROP INDEX UNIQ_D6781ECFC0CB7C3B ON proposition_projet');
        $this->addSql('ALTER TABLE proposition_projet DROP etudiantpp_id');
    }
}
