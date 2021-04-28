<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412143251 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE journal_projet ADD etudiantjp_id INT NOT NULL');
        $this->addSql('ALTER TABLE journal_projet ADD CONSTRAINT FK_8B4D8E4CEA9BF318 FOREIGN KEY (etudiantjp_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8B4D8E4CEA9BF318 ON journal_projet (etudiantjp_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE journal_projet DROP FOREIGN KEY FK_8B4D8E4CEA9BF318');
        $this->addSql('DROP INDEX IDX_8B4D8E4CEA9BF318 ON journal_projet');
        $this->addSql('ALTER TABLE journal_projet DROP etudiantjp_id');
    }
}
