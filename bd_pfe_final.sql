-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 avr. 2021 à 20:59
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_pfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE `affectation` (
  `id_affectation` int(10) NOT NULL,
  `nom_etudiant` varchar(40) NOT NULL,
  `nom_encadrant_academique` varchar(40) NOT NULL,
  `nom_encadrant_entreprise` varchar(40) NOT NULL,
  `id_etudiant` int(10) NOT NULL,
  `id_encadrant_academique` int(10) NOT NULL,
  `id_encadrant_entreprise` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `affectation`
--

INSERT INTO `affectation` (`id_affectation`, `nom_etudiant`, `nom_encadrant_academique`, `nom_encadrant_entreprise`, `id_etudiant`, `id_encadrant_academique`, `id_encadrant_entreprise`) VALUES
(1, 'Ramzi Khfifi', 'Sonia Jeribi', 'Rayen Bouhjar', 117, 92, 99),
(2, 'Jihene Labidi', 'Sonia Jeribi', 'Rayen Bouhjar', 118, 92, 99),
(450, 'safa', 'baati', 'Rayen Bouhjar', 162, 509, 99);

-- --------------------------------------------------------

--
-- Structure de la table `bilan`
--

CREATE TABLE `bilan` (
  `idBilan` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `indexPeriode` int(11) NOT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bilan`
--

INSERT INTO `bilan` (`idBilan`, `titre`, `indexPeriode`, `periode`) VALUES
(1, 'Bilan periodique de debut de stage', 1, '2021-03-24'),
(2, 'Bilan periodique de milieu de stage', 2, '2020-10-20'),
(3, 'Bilan periodique de fin de stage', 3, '2021-03-09');

-- --------------------------------------------------------

--
-- Structure de la table `compte_rendu`
--

CREATE TABLE `compte_rendu` (
  `id_cr` int(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fichier` varchar(400) NOT NULL,
  `validation_cr` varchar(20) DEFAULT NULL,
  `commentaire` varchar(255) NOT NULL,
  `commentaire_encadrant` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte_rendu`
--

INSERT INTO `compte_rendu` (`id_cr`, `id_user`, `fichier`, `validation_cr`, `commentaire`, `commentaire_encadrant`) VALUES
(22, 50, 'C:\\Users\\ASUS\\Desktop\\hello.txt', 'Refusé', 'aaaaaaaaaaaaaa', 'diaidiaidaeeeee'),
(24, 40, 'C:\\Users\\ASUS\\Desktop\\Esprit2020\\PiDev\\sqd.txt', 'Validé', 'sqdsqdsq', 'qsdsqdsq'),
(25, 30, 'C:\\Users\\ASUS\\Desktop\\Esprit2020\\PiDev\\sqd.txt', 'Refusé', 'sqdsqdsq', 'eeee'),
(28, NULL, 'sqd', NULL, 'qsd', NULL),
(29, 90, 'ggg', 'Refusé', 'ggggg', 'AAAAA'),
(30, 515, 'C:\\Users\\ASUS\\Desktop\\Esprit2020\\captions.txt', NULL, 'Dazeaz', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `id_enc` int(10) DEFAULT 1,
  `id_etu` int(10) NOT NULL,
  `date_r` date NOT NULL DEFAULT current_timestamp(),
  `ponctualite` tinyint(1) NOT NULL,
  `comm1` text NOT NULL,
  `integration` tinyint(1) NOT NULL,
  `comm2` text NOT NULL,
  `travail` tinyint(1) NOT NULL,
  `comm3` text NOT NULL,
  `competence` tinyint(1) NOT NULL,
  `comm4` text NOT NULL,
  `eg` tinyint(1) NOT NULL,
  `comm5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evaluation`
--

INSERT INTO `evaluation` (`id`, `id_enc`, `id_etu`, `date_r`, `ponctualite`, `comm1`, `integration`, `comm2`, `travail`, `comm3`, `competence`, `comm4`, `eg`, `comm5`) VALUES
(23, 99, 117, '2021-03-29', 0, 'test ramzi', 0, 'test ramzi', 0, 'test ramzi', 0, 'test ramzi', 0, 'test ramzi'),
(29, 99, 118, '2021-03-29', 0, 'test ', 0, 'test jihene', 0, 'test jihene', 0, 'test jihene', 1, 'test jihene');

-- --------------------------------------------------------

--
-- Structure de la table `grille`
--

CREATE TABLE `grille` (
  `id` int(11) NOT NULL,
  `id_enc` int(10) NOT NULL,
  `id_etu` int(10) NOT NULL,
  `date_r` date NOT NULL DEFAULT current_timestamp(),
  `mention` varchar(1) NOT NULL,
  `note` float NOT NULL,
  `q1` varchar(1) NOT NULL,
  `q2` varchar(1) NOT NULL,
  `q3` varchar(1) NOT NULL,
  `q4` varchar(1) NOT NULL,
  `q5` varchar(1) NOT NULL,
  `q6` varchar(1) NOT NULL,
  `q7` varchar(1) NOT NULL,
  `q8` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `grille`
--

INSERT INTO `grille` (`id`, `id_enc`, `id_etu`, `date_r`, `mention`, `note`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`) VALUES
(2, 92, 118, '2021-03-30', 'A', 38, 'A', 'B', 'B', 'A', 'A', 'A', 'A', 'A');

-- --------------------------------------------------------

--
-- Structure de la table `journal_projet`
--

CREATE TABLE `journal_projet` (
  `id_jp` int(30) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date` varchar(20) NOT NULL,
  `tache` varchar(200) NOT NULL,
  `avis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `journal_projet`
--

INSERT INTO `journal_projet` (`id_jp`, `id_user`, `date`, `tache`, `avis`) VALUES
(1, 0, '18-03-2021', 'sqd', 'sqdsqf'),
(2, 0, '19/03/2021', 'sqd', 'sqdsqf'),
(3, 0, '17/03/2021', 'sqd', 'sqdsqf'),
(4, 0, '10/03/2021', 'sqd', 'sqdsqf'),
(5, 0, '10/03/2021', 'sqd', 'sqdsqf'),
(6, 0, '11/03/2021', 'kkkkkk', 'aaaaaaaaaaaaaaaaaaaaaaaaaa'),
(7, 0, '09/03/2021', 'sqd', 'sqdsqf'),
(8, 0, '03/03/2021', 'sqd', 'llllllllllllll'),
(9, 0, '18/03/2021', 'sqd', 'sqdsqfgp'),
(10, 0, '10/03/2021', 'sqd', 'sqdsqf'),
(11, 0, '10/03/2021', 'sqd', 'sqdsqf'),
(12, 0, '', 'sqd', 'sqdsqf'),
(13, 0, '18/03/2021', 'sqd', 'sqdsqf'),
(14, 0, '', 'sdds', 'aaaaa'),
(15, 0, '11/03/2021', 'ddd', 'ddd'),
(16, 0, '10/03/2021', 'sqd', 'llllllllllllll'),
(17, 0, '03/03/2021', 'aad', 'af'),
(18, 0, '12/03/2021', '123', '321'),
(19, 0, '12/03/2021', 'sqd', 'sqdsqf'),
(20, NULL, '18/03/2021', 'D', 'E'),
(21, 90, '08/04/2021', 'sss', 'aaaa'),
(22, 515, '09/04/2021', 'dhazea', 'qsdsq'),
(23, 515, '22/04/2021', 'dhaz', 'qsds'),
(24, 515, '15/04/2021', 'skdkqsdsq', 'dqsdsqdkl,qs');

-- --------------------------------------------------------

--
-- Structure de la table `plan_travail`
--

CREATE TABLE `plan_travail` (
  `id_pt` int(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `backlog` varchar(1000) NOT NULL,
  `sprints` varchar(1000) NOT NULL,
  `validation_pt` varchar(20) DEFAULT NULL,
  `commentaire_pt` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plan_travail`
--

INSERT INTO `plan_travail` (`id_pt`, `id_user`, `backlog`, `sprints`, `validation_pt`, `commentaire_pt`) VALUES
(1, 20, 'C:\\Users\\ASUS\\Desktop\\Esprit2020\\captions.txt', 'C:\\Users\\ASUS\\Desktop\\music\\Bee Gees - Timeless [The All-Time Greatest Hits] (2017) FLAC\\07 - I Started a Joke.flac', 'Refusé', 'dsqd'),
(2, 90, 'ggg', 'g', NULL, NULL),
(3, 515, 'C:\\Users\\ASUS\\Desktop\\Esprit2020\\english project- FINAL.pptx', 'C:\\Users\\ASUS\\Desktop\\Esprit2020\\captions.txt', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE `presentation` (
  `id_p` int(20) NOT NULL,
  `non_etudiant` varchar(20) NOT NULL,
  `non_president` varchar(20) NOT NULL,
  `non_encadrant` varchar(20) NOT NULL,
  `date_soutenance` varchar(20) NOT NULL,
  `salle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `presentation`
--

INSERT INTO `presentation` (`id_p`, `non_etudiant`, `non_president`, `non_encadrant`, `date_soutenance`, `salle`) VALUES
(6, 'iisam', 'mourad', 'selim', '05/12/2021', 'A02'),
(7, 'aa', 'sndkjnd', 'aaaaa', '0000-00-00', 'A03'),
(8, 'fz', 'dz', 'dza', '0000-00-00', 'A01'),
(9, 'salim', 'toto', 'dzag', '11/05/1999', 'B04'),
(10, 'ramzikhefifi', 'ahmed', 'HamzaJedidi', '01/12/2021', 'A02'),
(11, 'Jihene Labidi', 'iizdin', 'Sonia Jeribi', '05/12/2020', 'B01'),
(12, 'safa', 'yassine', 'baati', '06/12/2021', 'D01');

-- --------------------------------------------------------

--
-- Structure de la table `proposition_projet`
--

CREATE TABLE `proposition_projet` (
  `id_sujet` int(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nom_sujet` varchar(255) NOT NULL,
  `cahier_charge` varchar(50) NOT NULL,
  `validation_pp` varchar(20) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `commentaire_pp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `proposition_projet`
--

INSERT INTO `proposition_projet` (`id_sujet`, `id_user`, `nom_sujet`, `cahier_charge`, `validation_pp`, `description`, `commentaire_pp`) VALUES
(1, 45, 'imple', 'C:\\Users\\ASUS\\Desktop\\music\\Bee Gees - Timeless [T', 'Validé', 'projet', 'aaa'),
(2, 46, 'sds', 'C:\\AdwCleaner\\AdwCleaner[S0].txt', 'Refusé', 'DDD', 'sqdsqd'),
(3, 68, 'dd', 'C:\\AdwCleaner\\AdwCleaner[S0].txt', 'Validé', '', 'ffff'),
(4, 2, 'ccc', 'C:\\AdwCleaner\\AdwCleaner[S0].txt', '', '', ''),
(5, NULL, 'dhafouuuura', 'dhafouuuura', 'Validé', 'dhafouuuuuuuuuuura', 'qsdzaezaezaezeaze'),
(6, NULL, 'qsdsqdsq', 'sdqsd', NULL, 'sqdsqdsqd', NULL),
(7, NULL, 'sqdsqd', 'sdsqdq', NULL, 'qsdqsd', NULL),
(8, NULL, 'sqdsq', 'sqd', NULL, 'sqd', NULL),
(9, NULL, 'sqdsqdsq', 'sqdsqd', NULL, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', NULL),
(10, NULL, 'DHDHDH', 'DHDHDH', NULL, 'dkskdksk', NULL),
(11, NULL, 'DAZD', 'eazeAZ', NULL, 'sqdqsd', NULL),
(12, 90, 'eee', 'eee', NULL, 'eee', NULL),
(13, 515, 'dhdhdhd', 'djjdjd', NULL, 'dsqdqs', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `idQuestion` int(11) NOT NULL,
  `quest` varchar(255) NOT NULL,
  `indexPeriode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`idQuestion`, `quest`, `indexPeriode`) VALUES
(8, 'Qu’est-ce qui vous plaît et vous motive dans votre stage?\r\n', 1),
(9, 'Décrivez une situation de travail marquante que vous avez vécu.\r\n', 1),
(10, 'Avez-vous vécu pendant votre stage une situation difficile ou problématique? \r\nSi oui,comment avez-vous réagi ?', 1),
(11, 'Que retirez-vous comme apprentissages depuis le début de votre stage ?', 1),
(12, 'Comment gérez-vous les délais dans votre travail?', 1),
(13, 'De quelle(s) manière(s) utilisez-vous vos capacités dans votre stage? \r\n', 1),
(14, 'Évaluez votre capacité à travailler en équipe ?\r\n', 0),
(16, 'Évaluez votre capacité à être autonome ?\r\n', 0),
(17, 'Évaluez votre capacité à être résilient ?\r\n', 0),
(18, 'Évaluez votre capacité à organiser votre travail dans les délais ?\r\n', 0),
(19, 'Évaluez-vous votre capacité à prendre des initiatives ?\r\n', 0),
(20, 'Évaluez-vous votre capacité à réaliser un travail de qualité ?\r\n', 0),
(23, 'Vos missions ont-elles évolué depuis le début de votre stage?\r\nSi oui, quelles sont-elles ?', 2),
(24, 'Citez une réalisation dont vous êtes fier/ère :\r\n', 2),
(25, 'Comment avez-vous procédé pour mener à bien cette mission?\r\n', 2),
(26, 'Quels ont été vos défis pendant votre stage?\r\n', 2),
(27, 'Comment avez-vous réussi à surmonter vos reculs?', 2),
(28, 'Comment votre stage confirme-t-il votre projet professionnel ?\r\n', 2),
(29, 'De manière générale, comment vos missions ont-elles evolué?', 3),
(30, 'Quelles ont été vos meilleures réalisations pendant votre stage? \r\n', 3),
(31, 'Quels apprentissages pouvez-vous en tirer ? \r\n', 3),
(32, 'Quelles compétences avez-vous développé pour mener à bien vos missions? \r\nComment les avez-vous utilisées ?', 3),
(33, 'Quel bilan faites-vous de votre projet professionnel à la fin de votre stage ?', 3);

-- --------------------------------------------------------

--
-- Structure de la table `rapport_final`
--

CREATE TABLE `rapport_final` (
  `id_rf` int(20) NOT NULL,
  `id_encadrant` int(10) DEFAULT NULL,
  `id_etudiant` int(10) DEFAULT NULL,
  `plagiat` float NOT NULL,
  `fichier` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rapport_final`
--

INSERT INTO `rapport_final` (`id_rf`, `id_encadrant`, `id_etudiant`, `plagiat`, `fichier`) VALUES
(9, NULL, NULL, 32, 'C:\\Users\\usp\\Documents\\hhhhhh.txt'),
(10, NULL, NULL, 66, 'C:\\Users\\usp\\Pictures\\uml.PNG'),
(11, NULL, NULL, 65, 'C:\\Users\\usp\\Downloads\\classe1.png'),
(12, NULL, NULL, 25, 'C:\\Users\\usp\\Desktop\\TrayNotification.jar'),
(13, NULL, NULL, 87, 'C:\\Users\\usp\\Desktop\\jar_files\\protobuf-java-3.6.1.jar'),
(14, NULL, NULL, 65, 'C:\\Users\\usp\\Pictures\\uml.PNG'),
(15, 93, 0, 50, 'C:\\Users\\usp\\Documents\\hhhhhh.txt'),
(16, 93, 117, 100, 'C:\\Users\\usp\\Documents\\hhhhhh.txt'),
(17, 93, 118, 5, 'C:\\Users\\usp\\Documents\\hhhhhh.txt'),
(18, 509, 90, 50, 'C:\\Users\\ASUS\\Desktop\\isg\\2ème année ISG\\Chapitre1.pptx'),
(19, 509, 162, 45, 'C:\\Users\\ASUS\\Desktop\\صيد الريم.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `id_rv` int(11) NOT NULL,
  `login` varchar(200) COLLATE utf8_bin NOT NULL,
  `lieu` varchar(20) COLLATE utf8_bin NOT NULL,
  `date` date DEFAULT NULL,
  `raison` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`id_rv`, `login`, `lieu`, `date`, `raison`) VALUES
(42, '999', 'tunis', '2021-03-25', 'rapport'),
(44, 'ada', 'ad', '2021-04-09', 'ada'),
(45, 'aaaaa', 'dazaaaaaaaaaa', '2021-04-09', 'asada'),
(48, 'eddddddddd', 'azda', '2021-04-13', 'faidzaz'),
(49, 'mmmmmmmmm', 'mmmmmmmmm', '2021-04-15', 'hhhhhhhhh'),
(50, 'uuuuu', 'uuuuuuu', '2021-04-23', 'adddddddddddd'),
(51, 'azd', 'zefjkn', '2021-04-15', 'adazd'),
(52, 'dez', 'rfe', '2021-04-15', 'fezfzef'),
(53, 'fsv', 'vsd', '2021-04-22', 'ssdvsd'),
(54, 'ggggggg', 'gggggggg', '2021-04-08', 'gggggggg'),
(55, 'aaaaab', 'ab', '2021-04-16', 'ada'),
(57, 'edz', 'fds', '2021-04-15', 'azda'),
(58, 'adz', 'azd', '2021-04-23', 'azzad'),
(59, 'gv', 'dd', '2021-04-22', 'jjjjjj'),
(60, 'fhx', 'vv', '2021-05-01', 'dfxh'),
(61, 'fhx', 'vv', '2021-05-01', 'dfxh'),
(62, 'adz', 'azd', '2021-04-23', 'azda'),
(63, 'fvv', 'csdc', '2021-04-17', 'azdza'),
(64, 'zed', 'zdz', '2021-04-17', 'zef'),
(65, 'k', 'kk', '2021-04-24', 'kkk'),
(66, 'bb', 'hhh', '2021-04-14', 'jjjjj'),
(67, 'jjk', 'ghgeu', '2021-04-16', 'edzfdez'),
(68, 'dza', 'adzdza', '2021-04-13', 'azdazd'),
(69, '545', 'ppp', '2021-04-08', '123456'),
(70, 'dhafer', 'tunis', '2021-04-08', 'suivi');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `idReponse` int(11) NOT NULL,
  `rep` varchar(255) NOT NULL,
  `IdQuestion` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `indexPeriode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`idReponse`, `rep`, `IdQuestion`, `idUser`, `indexPeriode`) VALUES
(36, 'aa', 8, 118, 1),
(37, 'aaze', 9, 118, 1),
(38, 'az', 10, 118, 1),
(39, 'dsd', 11, 118, 1),
(40, 'sd', 12, 118, 1),
(41, 'scqs', 13, 118, 1),
(42, 's', 14, 118, 1),
(43, 'sddd', 16, 118, 1),
(44, 'scq', 17, 118, 1),
(45, 'dsd', 18, 118, 1),
(46, 'scq', 19, 118, 1),
(47, 'sdq', 20, 118, 1),
(48, 'a', 8, 118, 1),
(49, 'a', 9, 118, 1),
(50, 'a', 10, 118, 1),
(51, 'a', 11, 118, 1),
(52, 'a', 12, 118, 1),
(53, 'a', 13, 118, 1),
(54, 'a', 14, 118, 1),
(55, 'a', 16, 118, 1),
(56, 'a', 17, 118, 1),
(57, 'a', 18, 118, 1),
(58, 'a', 19, 118, 1),
(59, 'a', 20, 118, 1),
(60, 'a', 23, 118, 2),
(61, 'a', 24, 118, 2),
(62, 'a', 25, 118, 2),
(63, 'a', 26, 118, 2),
(64, 'a', 27, 118, 2),
(65, 'a', 28, 118, 2),
(66, 'a', 14, 118, 2),
(67, 'a', 16, 118, 2),
(68, 'a', 17, 118, 2),
(69, 'a', 18, 118, 2),
(70, 'a', 19, 118, 2),
(71, 'a', 20, 118, 2),
(72, 'hjk,ml', 8, 118, 1),
(73, 'jk,ml', 9, 118, 1),
(74, 'hujoze', 10, 118, 1),
(75, 'uoefj', 11, 118, 1),
(76, 'uhfjez', 12, 118, 1),
(77, 'uoefj', 13, 118, 1),
(78, 'ozfjzl', 14, 118, 1),
(79, 'ohjfel', 16, 118, 1),
(80, 'oeffjn', 17, 118, 1),
(81, 'ipfjez', 18, 118, 1),
(82, 'hifepz', 19, 118, 1),
(83, 'ipfhen', 20, 118, 1),
(84, 'dfghj', 8, 119, 1),
(85, 'fgh', 9, 119, 1),
(86, 'fghj', 10, 119, 1),
(87, 'ghy', 11, 119, 1),
(88, 'vgbhnj', 12, 119, 1),
(89, 'dcfvgbh', 13, 119, 1),
(90, 'fvgbh', 14, 119, 1),
(91, 'rfgth', 16, 119, 1),
(92, 'cfvgb', 17, 119, 1),
(93, 'fcvg', 18, 119, 1),
(94, 'dcfvg', 19, 119, 1),
(95, 'cfvg', 20, 119, 1),
(96, 'gyhjk', 29, 119, 3),
(97, 'hjnk,l', 30, 119, 3),
(98, 'hjnk', 31, 119, 3),
(99, 'hjkl', 32, 119, 3),
(100, 'ujhkl', 33, 119, 3),
(101, 'jkl', 14, 119, 3),
(102, 'jkjl', 16, 119, 3),
(103, 'jkl', 17, 119, 3),
(104, 'jkl', 18, 119, 3),
(105, 'jhkl', 19, 119, 3),
(106, 'jhkjl', 20, 119, 3),
(107, 'a', 29, 119, 3),
(108, 'a', 30, 119, 3),
(109, 'a', 31, 119, 3),
(110, 'a', 32, 119, 3),
(111, 'a', 33, 119, 3),
(112, 'a', 14, 119, 3),
(113, 'a', 16, 119, 3),
(114, 'a', 17, 119, 3),
(115, 'a', 18, 119, 3),
(116, 'a', 19, 119, 3),
(117, 'a', 20, 119, 3),
(118, 'a', 29, 119, 3),
(119, 'a', 30, 119, 3),
(120, 'a', 31, 119, 3),
(121, 'a', 32, 119, 3),
(122, 'a', 33, 119, 3),
(123, 'a', 14, 119, 3),
(124, 'a', 16, 119, 3),
(125, 'a', 17, 119, 3),
(126, 'a', 18, 119, 3),
(127, 'a', 19, 119, 3),
(128, 'a', 20, 119, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id_tache` int(10) NOT NULL,
  `libelle` varchar(70) NOT NULL,
  `id_etudiant` int(10) NOT NULL,
  `id_encadrant_academique` int(10) NOT NULL,
  `id_encadrant_entreprise` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `debut_stage` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `full_name`, `email`, `password`, `confirm_password`, `role`, `address`, `debut_stage`) VALUES
(90, 'abc', 'salim', 'ramzi@esprit.tn', 'CU\\Y]CU\\Y]', 'CU\\Y]CU\\Y]', 'Etudiant', 'xxxx', '2021-04-27'),
(92, 'sonia', 'Sonia Jeribi', 'sonia@gmail.com', 'RQQDYRQQDY', 'RQQDYRQQDY', 'Encadrant Académique ', 'sousse', '2021-04-21'),
(93, 'hamza', 'HamzaJedidi', 'hamza@gmail.com', 'RQQDYRQQDY', 'RQQDYRQQDY', 'Encadrant Academique', 'megrine', NULL),
(99, 'rayen', 'Rayen Bouhjar', 'rayen@gmail.com', 'RQQDYRQQDY', 'RQQDYRQQDY', 'Encadrant Professionnel', 'megrine', NULL),
(117, 'ramzi', 'Ramzi Khfifi', 'ramziK@gmail.com', 'RQQDYRQQDY', 'RQQDYRQQDY', 'Etudiant', 'nabeul', NULL),
(118, 'jihene', 'Jihene Labidi', ' jihene@gmail.com', 'RQQDYRQQDY', 'RQQDYRQQDY', 'Etudiant', 'marsa', NULL),
(162, 'safa', 'safa', 'safa@gmail.com', 'hjjj*', 'YEIDBUJQhhhhh', 'Etudiant', 'safa@gmail.com', '2020-04-21'),
(502, 'salah', 'salah', 'salah@gmail.com', 'RQQDYRQQDY', 'RQQDYRQQDY', 'Encadrant Professionnel', 'tunis', NULL),
(509, 'baati', 'baati', 'baati@gmail.com', 'RQQDYRQQDY', 'RQQDYRQQDY', 'Encadrant Académique ', 'baati', NULL),
(510, 'esprit', 'esprit', 'esprit@esprit.tn', 'UC@BYDUC@BYD', 'UC@BYDUC@BYD', 'responsable des stages', 'ariena', NULL),
(515, 'ramzi', 'ramzi', 'ramzikhefifi.98@gmail.com', 'BQ]JECC', 'BQ]JECC', 'Etudiant', 'benarous', '2021-04-14'),
(516, 'ramziii', 'ramzikhefifi', 'ramzi@gmail.tn', 'QJUBDIEY', 'QJUBDIEY', 'Etudiant', 'nabeul', '2021-04-14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id_affectation`);

--
-- Index pour la table `bilan`
--
ALTER TABLE `bilan`
  ADD PRIMARY KEY (`idBilan`);

--
-- Index pour la table `compte_rendu`
--
ALTER TABLE `compte_rendu`
  ADD PRIMARY KEY (`id_cr`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `grille`
--
ALTER TABLE `grille`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `journal_projet`
--
ALTER TABLE `journal_projet`
  ADD PRIMARY KEY (`id_jp`);

--
-- Index pour la table `plan_travail`
--
ALTER TABLE `plan_travail`
  ADD PRIMARY KEY (`id_pt`);

--
-- Index pour la table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`id_p`);

--
-- Index pour la table `proposition_projet`
--
ALTER TABLE `proposition_projet`
  ADD PRIMARY KEY (`id_sujet`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Index pour la table `rapport_final`
--
ALTER TABLE `rapport_final`
  ADD PRIMARY KEY (`id_rf`);

--
-- Index pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`id_rv`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`idReponse`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id_tache`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `id_affectation` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT pour la table `bilan`
--
ALTER TABLE `bilan`
  MODIFY `idBilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `compte_rendu`
--
ALTER TABLE `compte_rendu`
  MODIFY `id_cr` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `grille`
--
ALTER TABLE `grille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `journal_projet`
--
ALTER TABLE `journal_projet`
  MODIFY `id_jp` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `plan_travail`
--
ALTER TABLE `plan_travail`
  MODIFY `id_pt` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `id_p` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `proposition_projet`
--
ALTER TABLE `proposition_projet`
  MODIFY `id_sujet` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `rapport_final`
--
ALTER TABLE `rapport_final`
  MODIFY `id_rf` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `id_rv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `idReponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id_tache` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
