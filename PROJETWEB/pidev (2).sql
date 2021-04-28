-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 17 avr. 2021 à 21:53
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pidev`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE `affectation` (
  `id` int(11) NOT NULL,
  `id_etudiant_id` int(11) NOT NULL,
  `id_encadrant_academique_id` int(11) NOT NULL,
  `id_encadrant_entreprise_id` int(11) DEFAULT NULL,
  `nom_etudiant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_encadrant_academique` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_encadrant_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bilan`
--

CREATE TABLE `bilan` (
  `id` int(11) NOT NULL,
  `titre_descriptif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bilan`
--

INSERT INTO `bilan` (`id`, `titre_descriptif`, `index_periode`) VALUES
(7, 'Debut de Stage', 1),
(8, 'Milieu de Stage', 2),
(9, 'Fin de Stage', 3);

-- --------------------------------------------------------

--
-- Structure de la table `bilan_questions`
--

CREATE TABLE `bilan_questions` (
  `bilan_id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bilan_questions`
--

INSERT INTO `bilan_questions` (`bilan_id`, `questions_id`) VALUES
(7, 49),
(7, 50),
(7, 51),
(7, 52),
(7, 53),
(7, 54),
(7, 55),
(7, 56),
(7, 58),
(7, 59),
(7, 60),
(7, 61),
(8, 49),
(8, 50),
(8, 51),
(8, 52),
(8, 53),
(8, 54),
(8, 55),
(8, 62),
(8, 63),
(8, 64),
(8, 65),
(8, 66),
(8, 67),
(9, 49),
(9, 50),
(9, 51),
(9, 52),
(9, 53),
(9, 54),
(9, 55),
(9, 68),
(9, 69),
(9, 70),
(9, 71),
(9, 72);

-- --------------------------------------------------------

--
-- Structure de la table `compte_rendu`
--

CREATE TABLE `compte_rendu` (
  `id` int(11) NOT NULL,
  `etudiantcr_id` int(11) NOT NULL,
  `fichier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validationcr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentairetud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentairencad` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210417194414', '2021-04-17 21:44:34', 38428);

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `id_enc_entreprise_id` int(11) NOT NULL,
  `eval_etudiant_id` int(11) NOT NULL,
  `dateremp` date NOT NULL,
  `ponctualite` tinyint(1) NOT NULL,
  `comm1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `integration` tinyint(1) NOT NULL,
  `comm2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `travail` tinyint(1) NOT NULL,
  `comm3` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `competence` tinyint(1) NOT NULL,
  `comm4` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `eg` tinyint(1) NOT NULL,
  `comm5` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `grille`
--

CREATE TABLE `grille` (
  `id` int(11) NOT NULL,
  `enc_academique_id` int(11) NOT NULL,
  `grille_etudiant_id` int(11) NOT NULL,
  `dateremp` date NOT NULL,
  `mention` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` double NOT NULL,
  `q1` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q2` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q3` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q4` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q5` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q6` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q7` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q8` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `journal_projet`
--

CREATE TABLE `journal_projet` (
  `id` int(11) NOT NULL,
  `etudiantjp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `tache` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plan_travail`
--

CREATE TABLE `plan_travail` (
  `id` int(11) NOT NULL,
  `etudiantpp_id` int(11) NOT NULL,
  `backlog` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sprints` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proces_verbal`
--

CREATE TABLE `proces_verbal` (
  `id` int(11) NOT NULL,
  `pv_user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `membre_reunion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proposition_projet`
--

CREATE TABLE `proposition_projet` (
  `id` int(11) NOT NULL,
  `etudiantpp_id` int(11) NOT NULL,
  `nom_sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cahier_charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validationproposition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaireprop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `quest`, `index_periode`) VALUES
(49, 'Évaluez votre capacité à travailler en équipe ?', 0),
(50, 'Évaluez votre capacité à travailler en équipe ?', 0),
(51, 'Évaluez votre capacité à être autonome ?', 0),
(52, 'Évaluez votre capacité à être résilient ?', 0),
(53, 'Évaluez votre capacité à organiser votre travail dans les délais ?', 0),
(54, 'Évaluez-vous votre capacité à prendre des initiatives ?', 0),
(55, 'Évaluez-vous votre capacité à réaliser un travail de qualité ?', 0),
(56, 'Qu’est-ce qui vous plaît et vous motive dans votre stage?', 1),
(57, 'Décrivez une situation de travail marquante que vous avez vécu.', 1),
(58, 'Avez-vous vécu pendant votre stage une situation difficile ou problématique?', 1),
(59, 'Que retirez-vous comme apprentissages depuis le début de votre stage ?', 1),
(60, 'Comment gérez-vous les délais dans votre travail?', 1),
(61, 'De quelle(s) manière(s) utilisez-vous vos capacités dans votre stage? ', 1),
(62, 'Vos missions ont-elles évolué depuis le début de votre stage?', 2),
(63, 'Citez une réalisation dont vous êtes fier/ère :', 2),
(64, 'Comment avez-vous procédé pour mener à bien cette mission?', 2),
(65, 'Quels ont été vos défis pendant votre stage?', 2),
(66, 'Comment avez-vous réussi à surmonter vos reculs?', 2),
(67, 'Comment votre stage confirme-t-il votre projet professionnel ?', 2),
(68, 'De manière générale, comment vos missions ont-elles evolué?', 3),
(69, 'Quelles ont été vos meilleures réalisations pendant votre stage?', 3),
(70, 'Quels apprentissages pouvez-vous en tirer ? ', 3),
(71, 'Quelles compétences avez-vous développé pour mener à bien vos missions? ', 3),
(72, 'Quel bilan faites-vous de votre projet professionnel à la fin de votre stage ?', 3);

-- --------------------------------------------------------

--
-- Structure de la table `rapport_final`
--

CREATE TABLE `rapport_final` (
  `id` int(11) NOT NULL,
  `rapp_etudiant_id` int(11) NOT NULL,
  `enc_ac_correction_id` int(11) NOT NULL,
  `plagiat` double NOT NULL,
  `fichier` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `raison` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous_user`
--

CREATE TABLE `rendez_vous_user` (
  `rendez_vous_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `reps_etud_id` int(11) NOT NULL,
  `question_des_reponses_id` int(11) NOT NULL,
  `rep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `soutenance`
--

CREATE TABLE `soutenance` (
  `id` int(11) NOT NULL,
  `soutenancers_id` int(11) NOT NULL,
  `sout_enc_ac_id` int(11) NOT NULL,
  `sout_etud_id` int(11) NOT NULL,
  `president` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_soutenance` date NOT NULL,
  `salle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut_stage` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F4DD61D3C5F87C54` (`id_etudiant_id`),
  ADD KEY `IDX_F4DD61D3E7E48C90` (`id_encadrant_academique_id`),
  ADD KEY `IDX_F4DD61D3AE41E756` (`id_encadrant_entreprise_id`);

--
-- Index pour la table `bilan`
--
ALTER TABLE `bilan`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bilan_questions`
--
ALTER TABLE `bilan_questions`
  ADD PRIMARY KEY (`bilan_id`,`questions_id`),
  ADD KEY `IDX_1E36E4BE705F7C57` (`bilan_id`),
  ADD KEY `IDX_1E36E4BEBCB134CE` (`questions_id`);

--
-- Index pour la table `compte_rendu`
--
ALTER TABLE `compte_rendu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D39E69D24D8259E2` (`etudiantcr_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1323A575F61CDD52` (`eval_etudiant_id`),
  ADD KEY `IDX_1323A5752F56E09D` (`id_enc_entreprise_id`);

--
-- Index pour la table `grille`
--
ALTER TABLE `grille`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D452165F7FF18EE8` (`grille_etudiant_id`),
  ADD KEY `IDX_D452165F97C4E34C` (`enc_academique_id`);

--
-- Index pour la table `journal_projet`
--
ALTER TABLE `journal_projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8B4D8E4CEA9BF318` (`etudiantjp_id`);

--
-- Index pour la table `plan_travail`
--
ALTER TABLE `plan_travail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2E3632B3C0CB7C3B` (`etudiantpp_id`);

--
-- Index pour la table `proces_verbal`
--
ALTER TABLE `proces_verbal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5B95250B207EBA30` (`pv_user_id`);

--
-- Index pour la table `proposition_projet`
--
ALTER TABLE `proposition_projet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D6781ECFC0CB7C3B` (`etudiantpp_id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rapport_final`
--
ALTER TABLE `rapport_final`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_CCE74518E7A149D7` (`rapp_etudiant_id`),
  ADD KEY `IDX_CCE745185B5DEF45` (`enc_ac_correction_id`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rendez_vous_user`
--
ALTER TABLE `rendez_vous_user`
  ADD PRIMARY KEY (`rendez_vous_id`,`user_id`),
  ADD KEY `IDX_7AB596891EF7EAA` (`rendez_vous_id`),
  ADD KEY `IDX_7AB5968A76ED395` (`user_id`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1E512EC6740D47C0` (`reps_etud_id`),
  ADD KEY `IDX_1E512EC615388B47` (`question_des_reponses_id`);

--
-- Index pour la table `soutenance`
--
ALTER TABLE `soutenance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4D59FF6E8F4FF5A6` (`sout_etud_id`),
  ADD KEY `IDX_4D59FF6E7B07BC48` (`soutenancers_id`),
  ADD KEY `IDX_4D59FF6E54E96A68` (`sout_enc_ac_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bilan`
--
ALTER TABLE `bilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `compte_rendu`
--
ALTER TABLE `compte_rendu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `grille`
--
ALTER TABLE `grille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `journal_projet`
--
ALTER TABLE `journal_projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plan_travail`
--
ALTER TABLE `plan_travail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proces_verbal`
--
ALTER TABLE `proces_verbal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proposition_projet`
--
ALTER TABLE `proposition_projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `rapport_final`
--
ALTER TABLE `rapport_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `soutenance`
--
ALTER TABLE `soutenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD CONSTRAINT `FK_F4DD61D3AE41E756` FOREIGN KEY (`id_encadrant_entreprise_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_F4DD61D3C5F87C54` FOREIGN KEY (`id_etudiant_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_F4DD61D3E7E48C90` FOREIGN KEY (`id_encadrant_academique_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `bilan_questions`
--
ALTER TABLE `bilan_questions`
  ADD CONSTRAINT `FK_1E36E4BE705F7C57` FOREIGN KEY (`bilan_id`) REFERENCES `bilan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1E36E4BEBCB134CE` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `compte_rendu`
--
ALTER TABLE `compte_rendu`
  ADD CONSTRAINT `FK_D39E69D24D8259E2` FOREIGN KEY (`etudiantcr_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `FK_1323A5752F56E09D` FOREIGN KEY (`id_enc_entreprise_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_1323A575F61CDD52` FOREIGN KEY (`eval_etudiant_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `grille`
--
ALTER TABLE `grille`
  ADD CONSTRAINT `FK_D452165F7FF18EE8` FOREIGN KEY (`grille_etudiant_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_D452165F97C4E34C` FOREIGN KEY (`enc_academique_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `journal_projet`
--
ALTER TABLE `journal_projet`
  ADD CONSTRAINT `FK_8B4D8E4CEA9BF318` FOREIGN KEY (`etudiantjp_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `plan_travail`
--
ALTER TABLE `plan_travail`
  ADD CONSTRAINT `FK_2E3632B3C0CB7C3B` FOREIGN KEY (`etudiantpp_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `proces_verbal`
--
ALTER TABLE `proces_verbal`
  ADD CONSTRAINT `FK_5B95250B207EBA30` FOREIGN KEY (`pv_user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `proposition_projet`
--
ALTER TABLE `proposition_projet`
  ADD CONSTRAINT `FK_D6781ECFC0CB7C3B` FOREIGN KEY (`etudiantpp_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `rapport_final`
--
ALTER TABLE `rapport_final`
  ADD CONSTRAINT `FK_CCE745185B5DEF45` FOREIGN KEY (`enc_ac_correction_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_CCE74518E7A149D7` FOREIGN KEY (`rapp_etudiant_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `rendez_vous_user`
--
ALTER TABLE `rendez_vous_user`
  ADD CONSTRAINT `FK_7AB596891EF7EAA` FOREIGN KEY (`rendez_vous_id`) REFERENCES `rendez_vous` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7AB5968A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `FK_1E512EC615388B47` FOREIGN KEY (`question_des_reponses_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `FK_1E512EC6740D47C0` FOREIGN KEY (`reps_etud_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `soutenance`
--
ALTER TABLE `soutenance`
  ADD CONSTRAINT `FK_4D59FF6E54E96A68` FOREIGN KEY (`sout_enc_ac_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_4D59FF6E7B07BC48` FOREIGN KEY (`soutenancers_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_4D59FF6E8F4FF5A6` FOREIGN KEY (`sout_etud_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
