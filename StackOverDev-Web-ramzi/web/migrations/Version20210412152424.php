<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412152424 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bilan_questions (bilan_id INT NOT NULL, questions_id INT NOT NULL, INDEX IDX_1E36E4BE705F7C57 (bilan_id), INDEX IDX_1E36E4BEBCB134CE (questions_id), PRIMARY KEY(bilan_id, questions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bilan_questions ADD CONSTRAINT FK_1E36E4BE705F7C57 FOREIGN KEY (bilan_id) REFERENCES bilan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bilan_questions ADD CONSTRAINT FK_1E36E4BEBCB134CE FOREIGN KEY (questions_id) REFERENCES questions (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bilan_questions');
    }
}
