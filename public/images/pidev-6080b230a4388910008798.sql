-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 12 avr. 2021 à 18:18
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

-- --------------------------------------------------------

--
-- Structure de la table `bilan_questions`
--

CREATE TABLE `bilan_questions` (
  `bilan_id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compte_rendu`
--

CREATE TABLE `compte_rendu` (
  `id` int(11) NOT NULL,
  `fichier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validationcr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentairetud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentairencad` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etudiantcr_id` int(11) NOT NULL
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
('DoctrineMigrations\\Version20210412134958', '2021-04-12 15:50:22', 446),
('DoctrineMigrations\\Version20210412140204', '2021-04-12 16:02:14', 3955),
('DoctrineMigrations\\Version20210412141311', '2021-04-12 16:13:19', 394),
('DoctrineMigrations\\Version20210412141504', '2021-04-12 16:15:11', 288),
('DoctrineMigrations\\Version20210412141752', '2021-04-12 16:17:58', 298),
('DoctrineMigrations\\Version20210412141951', '2021-04-12 16:19:57', 271),
('DoctrineMigrations\\Version20210412143251', '2021-04-12 16:33:13', 1738),
('DoctrineMigrations\\Version20210412143649', '2021-04-12 16:36:55', 3050),
('DoctrineMigrations\\Version20210412143818', '2021-04-12 16:38:25', 1276),
('DoctrineMigrations\\Version20210412145012', '2021-04-12 16:50:21', 273),
('DoctrineMigrations\\Version20210412145313', '2021-04-12 16:53:21', 258),
('DoctrineMigrations\\Version20210412150243', '2021-04-12 17:02:48', 1334),
('DoctrineMigrations\\Version20210412150703', '2021-04-12 17:07:09', 1726),
('DoctrineMigrations\\Version20210412151112', '2021-04-12 17:11:18', 3037),
('DoctrineMigrations\\Version20210412152020', '2021-04-12 17:20:27', 256),
('DoctrineMigrations\\Version20210412152133', '2021-04-12 17:21:38', 375),
('DoctrineMigrations\\Version20210412152217', '2021-04-12 17:22:30', 1070),
('DoctrineMigrations\\Version20210412152424', '2021-04-12 17:24:30', 3653),
('DoctrineMigrations\\Version20210412153125', '2021-04-12 17:31:31', 2208),
('DoctrineMigrations\\Version20210412153420', '2021-04-12 17:34:34', 1535),
('DoctrineMigrations\\Version20210412154836', '2021-04-12 17:48:43', 270),
('DoctrineMigrations\\Version20210412155206', '2021-04-12 17:52:13', 487),
('DoctrineMigrations\\Version20210412155440', '2021-04-12 17:54:46', 2513),
('DoctrineMigrations\\Version20210412155756', '2021-04-12 17:58:03', 1061),
('DoctrineMigrations\\Version20210412160602', '2021-04-12 18:06:12', 318),
('DoctrineMigrations\\Version20210412160835', '2021-04-12 18:08:44', 525),
('DoctrineMigrations\\Version20210412161229', '2021-04-12 18:12:36', 3934),
('DoctrineMigrations\\Version20210412161742', '2021-04-12 18:17:51', 3710);

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
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
  `comm5` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_enc_entreprise_id` int(11) NOT NULL,
  `eval_etudiant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `grille`
--

CREATE TABLE `grille` (
  `id` int(11) NOT NULL,
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
  `q8` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enc_academique_id` int(11) NOT NULL,
  `grille_etudiant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `journal_projet`
--

CREATE TABLE `journal_projet` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `tache` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etudiantjp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plan_travail`
--

CREATE TABLE `plan_travail` (
  `id` int(11) NOT NULL,
  `backlog` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sprints` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etudiantpp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proces_verbal`
--

CREATE TABLE `proces_verbal` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `membre_reunion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pv_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proposition_projet`
--

CREATE TABLE `proposition_projet` (
  `id` int(11) NOT NULL,
  `nom_sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cahier_charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validationproposition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaireprop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etudiantpp_id` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Structure de la table `rapport_final`
--

CREATE TABLE `rapport_final` (
  `id` int(11) NOT NULL,
  `plagiat` double NOT NULL,
  `fichier` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rapp_etudiant_id` int(11) NOT NULL,
  `enc_ac_correction_id` int(11) NOT NULL
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
  `rep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rep_de_quest_id` int(11) NOT NULL,
  `reps_etud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `soutenance`
--

CREATE TABLE `soutenance` (
  `id` int(11) NOT NULL,
  `president` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_soutenance` date NOT NULL,
  `salle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soutenancers_id` int(11) NOT NULL,
  `sout_enc_ac_id` int(11) NOT NULL,
  `sout_etud_id` int(11) NOT NULL
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
  ADD KEY `IDX_1E512EC6BAF8D5D3` (`rep_de_quest_id`),
  ADD KEY `IDX_1E512EC6740D47C0` (`reps_etud_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `FK_1E512EC6740D47C0` FOREIGN KEY (`reps_etud_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_1E512EC6BAF8D5D3` FOREIGN KEY (`rep_de_quest_id`) REFERENCES `questions` (`id`);

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
