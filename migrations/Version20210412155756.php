<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412155756 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proces_verbal ADD pv_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE proces_verbal ADD CONSTRAINT FK_5B95250B207EBA30 FOREIGN KEY (pv_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5B95250B207EBA30 ON proces_verbal (pv_user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proces_verbal DROP FOREIGN KEY FK_5B95250B207EBA30');
        $this->addSql('DROP INDEX IDX_5B95250B207EBA30 ON proces_verbal');
        $this->addSql('ALTER TABLE proces_verbal DROP pv_user_id');
    }
}
