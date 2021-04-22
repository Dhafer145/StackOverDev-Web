<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412161742 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soutenance ADD soutenancers_id INT NOT NULL, ADD sout_enc_ac_id INT NOT NULL, ADD sout_etud_id INT NOT NULL');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6E7B07BC48 FOREIGN KEY (soutenancers_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6E54E96A68 FOREIGN KEY (sout_enc_ac_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6E8F4FF5A6 FOREIGN KEY (sout_etud_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4D59FF6E7B07BC48 ON soutenance (soutenancers_id)');
        $this->addSql('CREATE INDEX IDX_4D59FF6E54E96A68 ON soutenance (sout_enc_ac_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4D59FF6E8F4FF5A6 ON soutenance (sout_etud_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6E7B07BC48');
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6E54E96A68');
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6E8F4FF5A6');
        $this->addSql('DROP INDEX IDX_4D59FF6E7B07BC48 ON soutenance');
        $this->addSql('DROP INDEX IDX_4D59FF6E54E96A68 ON soutenance');
        $this->addSql('DROP INDEX UNIQ_4D59FF6E8F4FF5A6 ON soutenance');
        $this->addSql('ALTER TABLE soutenance DROP soutenancers_id, DROP sout_enc_ac_id, DROP sout_etud_id');
    }
}
