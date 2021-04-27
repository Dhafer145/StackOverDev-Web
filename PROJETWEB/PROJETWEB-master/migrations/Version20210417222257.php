<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210417222257 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affectation (id INT AUTO_INCREMENT NOT NULL, id_etudiant_id INT NOT NULL, id_encadrant_academique_id INT NOT NULL, id_encadrant_entreprise_id INT DEFAULT NULL, nom_etudiant VARCHAR(255) NOT NULL, nom_encadrant_academique VARCHAR(255) NOT NULL, nom_encadrant_entreprise VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F4DD61D3C5F87C54 (id_etudiant_id), INDEX IDX_F4DD61D3E7E48C90 (id_encadrant_academique_id), INDEX IDX_F4DD61D3AE41E756 (id_encadrant_entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bilan (id INT AUTO_INCREMENT NOT NULL, titre_descriptif VARCHAR(255) NOT NULL, index_periode INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bilan_questions (bilan_id INT NOT NULL, questions_id INT NOT NULL, INDEX IDX_1E36E4BE705F7C57 (bilan_id), INDEX IDX_1E36E4BEBCB134CE (questions_id), PRIMARY KEY(bilan_id, questions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte_rendu (id INT AUTO_INCREMENT NOT NULL, etudiantcr_id INT NOT NULL, fichier VARCHAR(255) NOT NULL, validationcr VARCHAR(255) NOT NULL, commentairetud VARCHAR(255) NOT NULL, commentairencad VARCHAR(300) NOT NULL, INDEX IDX_D39E69D24D8259E2 (etudiantcr_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluation (id INT AUTO_INCREMENT NOT NULL, id_enc_entreprise_id INT NOT NULL, eval_etudiant_id INT NOT NULL, dateremp DATE NOT NULL, ponctualite TINYINT(1) NOT NULL, comm1 LONGTEXT NOT NULL, integration TINYINT(1) NOT NULL, comm2 LONGTEXT NOT NULL, travail TINYINT(1) NOT NULL, comm3 LONGTEXT NOT NULL, competence TINYINT(1) NOT NULL, comm4 LONGTEXT NOT NULL, eg TINYINT(1) NOT NULL, comm5 LONGTEXT NOT NULL, INDEX IDX_1323A5752F56E09D (id_enc_entreprise_id), UNIQUE INDEX UNIQ_1323A575F61CDD52 (eval_etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grille (id INT AUTO_INCREMENT NOT NULL, enc_academique_id INT NOT NULL, grille_etudiant_id INT NOT NULL, dateremp DATE NOT NULL, mention VARCHAR(1) NOT NULL, note DOUBLE PRECISION NOT NULL, q1 VARCHAR(1) NOT NULL, q2 VARCHAR(1) NOT NULL, q3 VARCHAR(1) NOT NULL, q4 VARCHAR(1) NOT NULL, q5 VARCHAR(1) NOT NULL, q6 VARCHAR(1) NOT NULL, q7 VARCHAR(1) NOT NULL, q8 VARCHAR(1) NOT NULL, INDEX IDX_D452165F97C4E34C (enc_academique_id), UNIQUE INDEX UNIQ_D452165F7FF18EE8 (grille_etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journal_projet (id INT AUTO_INCREMENT NOT NULL, etudiantjp_id INT NOT NULL, date DATE NOT NULL, tache VARCHAR(255) NOT NULL, avis VARCHAR(255) NOT NULL, INDEX IDX_8B4D8E4CEA9BF318 (etudiantjp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan_travail (id INT AUTO_INCREMENT NOT NULL, etudiantpp_id INT NOT NULL, backlog VARCHAR(255) NOT NULL, sprints LONGTEXT NOT NULL, validation VARCHAR(255) NOT NULL, commentaire VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2E3632B3C0CB7C3B (etudiantpp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proces_verbal (id INT AUTO_INCREMENT NOT NULL, pv_user_id INT NOT NULL, date DATE NOT NULL, membre_reunion VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_5B95250B207EBA30 (pv_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposition_projet (id INT AUTO_INCREMENT NOT NULL, etudiantpp_id INT NOT NULL, nom_sujet VARCHAR(255) NOT NULL, cahier_charge VARCHAR(255) NOT NULL, validationproposition VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, commentaireprop VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D6781ECFC0CB7C3B (etudiantpp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, quest VARCHAR(255) NOT NULL, index_periode INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rapport_final (id INT AUTO_INCREMENT NOT NULL, rapp_etudiant_id INT NOT NULL, enc_ac_correction_id INT NOT NULL, plagiat DOUBLE PRECISION NOT NULL, fichier VARCHAR(1000) NOT NULL, UNIQUE INDEX UNIQ_CCE74518E7A149D7 (rapp_etudiant_id), INDEX IDX_CCE745185B5DEF45 (enc_ac_correction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, user_name VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, date DATE NOT NULL, raison VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendez_vous_user (rendez_vous_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7AB596891EF7EAA (rendez_vous_id), INDEX IDX_7AB5968A76ED395 (user_id), PRIMARY KEY(rendez_vous_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponses (id INT AUTO_INCREMENT NOT NULL, reps_etud_id INT NOT NULL, question_des_reponses_id INT NOT NULL, rep VARCHAR(255) NOT NULL, INDEX IDX_1E512EC6740D47C0 (reps_etud_id), INDEX IDX_1E512EC615388B47 (question_des_reponses_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soutenance (id INT AUTO_INCREMENT NOT NULL, soutenancers_id INT NOT NULL, sout_enc_ac_id INT NOT NULL, sout_etud_id INT NOT NULL, president VARCHAR(255) NOT NULL, date_soutenance DATE NOT NULL, salle VARCHAR(255) NOT NULL, INDEX IDX_4D59FF6E7B07BC48 (soutenancers_id), INDEX IDX_4D59FF6E54E96A68 (sout_enc_ac_id), UNIQUE INDEX UNIQ_4D59FF6E8F4FF5A6 (sout_etud_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, addresse VARCHAR(255) NOT NULL, debut_stage DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3E7E48C90 FOREIGN KEY (id_encadrant_academique_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3AE41E756 FOREIGN KEY (id_encadrant_entreprise_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bilan_questions ADD CONSTRAINT FK_1E36E4BE705F7C57 FOREIGN KEY (bilan_id) REFERENCES bilan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bilan_questions ADD CONSTRAINT FK_1E36E4BEBCB134CE FOREIGN KEY (questions_id) REFERENCES questions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte_rendu ADD CONSTRAINT FK_D39E69D24D8259E2 FOREIGN KEY (etudiantcr_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A5752F56E09D FOREIGN KEY (id_enc_entreprise_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A575F61CDD52 FOREIGN KEY (eval_etudiant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE grille ADD CONSTRAINT FK_D452165F97C4E34C FOREIGN KEY (enc_academique_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE grille ADD CONSTRAINT FK_D452165F7FF18EE8 FOREIGN KEY (grille_etudiant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE journal_projet ADD CONSTRAINT FK_8B4D8E4CEA9BF318 FOREIGN KEY (etudiantjp_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE plan_travail ADD CONSTRAINT FK_2E3632B3C0CB7C3B FOREIGN KEY (etudiantpp_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE proces_verbal ADD CONSTRAINT FK_5B95250B207EBA30 FOREIGN KEY (pv_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE proposition_projet ADD CONSTRAINT FK_D6781ECFC0CB7C3B FOREIGN KEY (etudiantpp_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rapport_final ADD CONSTRAINT FK_CCE74518E7A149D7 FOREIGN KEY (rapp_etudiant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rapport_final ADD CONSTRAINT FK_CCE745185B5DEF45 FOREIGN KEY (enc_ac_correction_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rendez_vous_user ADD CONSTRAINT FK_7AB596891EF7EAA FOREIGN KEY (rendez_vous_id) REFERENCES rendez_vous (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rendez_vous_user ADD CONSTRAINT FK_7AB5968A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC6740D47C0 FOREIGN KEY (reps_etud_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC615388B47 FOREIGN KEY (question_des_reponses_id) REFERENCES questions (id)');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6E7B07BC48 FOREIGN KEY (soutenancers_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6E54E96A68 FOREIGN KEY (sout_enc_ac_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6E8F4FF5A6 FOREIGN KEY (sout_etud_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bilan_questions DROP FOREIGN KEY FK_1E36E4BE705F7C57');
        $this->addSql('ALTER TABLE bilan_questions DROP FOREIGN KEY FK_1E36E4BEBCB134CE');
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC615388B47');
        $this->addSql('ALTER TABLE rendez_vous_user DROP FOREIGN KEY FK_7AB596891EF7EAA');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D3C5F87C54');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D3E7E48C90');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D3AE41E756');
        $this->addSql('ALTER TABLE compte_rendu DROP FOREIGN KEY FK_D39E69D24D8259E2');
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A5752F56E09D');
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A575F61CDD52');
        $this->addSql('ALTER TABLE grille DROP FOREIGN KEY FK_D452165F97C4E34C');
        $this->addSql('ALTER TABLE grille DROP FOREIGN KEY FK_D452165F7FF18EE8');
        $this->addSql('ALTER TABLE journal_projet DROP FOREIGN KEY FK_8B4D8E4CEA9BF318');
        $this->addSql('ALTER TABLE plan_travail DROP FOREIGN KEY FK_2E3632B3C0CB7C3B');
        $this->addSql('ALTER TABLE proces_verbal DROP FOREIGN KEY FK_5B95250B207EBA30');
        $this->addSql('ALTER TABLE proposition_projet DROP FOREIGN KEY FK_D6781ECFC0CB7C3B');
        $this->addSql('ALTER TABLE rapport_final DROP FOREIGN KEY FK_CCE74518E7A149D7');
        $this->addSql('ALTER TABLE rapport_final DROP FOREIGN KEY FK_CCE745185B5DEF45');
        $this->addSql('ALTER TABLE rendez_vous_user DROP FOREIGN KEY FK_7AB5968A76ED395');
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC6740D47C0');
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6E7B07BC48');
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6E54E96A68');
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6E8F4FF5A6');
        $this->addSql('DROP TABLE affectation');
        $this->addSql('DROP TABLE bilan');
        $this->addSql('DROP TABLE bilan_questions');
        $this->addSql('DROP TABLE compte_rendu');
        $this->addSql('DROP TABLE evaluation');
        $this->addSql('DROP TABLE grille');
        $this->addSql('DROP TABLE journal_projet');
        $this->addSql('DROP TABLE plan_travail');
        $this->addSql('DROP TABLE proces_verbal');
        $this->addSql('DROP TABLE proposition_projet');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE rapport_final');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE rendez_vous_user');
        $this->addSql('DROP TABLE reponses');
        $this->addSql('DROP TABLE soutenance');
        $this->addSql('DROP TABLE user');
    }
}
