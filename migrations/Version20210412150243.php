<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412150243 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluation ADD id_enc_entreprise_id INT NOT NULL');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A5752F56E09D FOREIGN KEY (id_enc_entreprise_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1323A5752F56E09D ON evaluation (id_enc_entreprise_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A5752F56E09D');
        $this->addSql('DROP INDEX IDX_1323A5752F56E09D ON evaluation');
        $this->addSql('ALTER TABLE evaluation DROP id_enc_entreprise_id');
    }
}
