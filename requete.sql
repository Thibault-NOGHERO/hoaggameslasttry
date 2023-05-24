-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 06 avr. 2023 à 07:55
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mobi`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE `appartient` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `id_game` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `appartient`
--

INSERT INTO `appartient` (`id`, `user_id`, `id_game`) VALUES
(5, 9, 9),
(6, 9, 9),
(9, 14, 2),
(11, 9, NULL),
(12, 9, NULL),
(13, 9, NULL),
(14, 9, NULL),
(15, 9, NULL),
(16, 9, NULL),
(17, 9, NULL),
(18, 9, NULL),
(19, 9, NULL),
(20, 9, NULL),
(21, 9, NULL),
(22, 9, NULL),
(23, 9, NULL),
(24, 9, NULL),
(25, 9, NULL),
(26, 9, NULL),
(27, 9, NULL),
(28, 9, NULL),
(29, 9, NULL),
(30, 9, NULL),
(31, 9, NULL),
(32, 9, NULL),
(33, 9, NULL),
(34, 9, NULL),
(35, 9, NULL),
(36, 9, NULL),
(37, 9, NULL),
(38, 9, NULL),
(39, 9, NULL),
(40, 9, NULL),
(41, 9, NULL),
(42, 9, NULL),
(43, 9, NULL),
(44, 9, NULL),
(45, 9, NULL),
(46, 15, NULL),
(47, 15, NULL),
(48, 15, NULL),
(49, 15, NULL),
(50, 15, NULL),
(51, 15, NULL),
(52, 9, NULL),
(53, 9, NULL),
(54, 9, NULL),
(55, 9, NULL),
(56, 9, NULL),
(57, 9, NULL),
(58, 9, NULL),
(59, 9, NULL),
(60, 9, NULL),
(61, 9, NULL),
(62, 9, NULL),
(63, 9, NULL),
(64, 9, NULL),
(65, 9, NULL),
(66, 9, NULL),
(67, 9, NULL),
(68, 9, NULL),
(69, 9, NULL),
(70, 9, NULL),
(71, 9, NULL),
(72, 9, NULL),
(73, 9, NULL),
(74, 9, NULL),
(75, 9, 6),
(85, 9, 3),
(86, 9, 3),
(5, 9, 9),
(6, 9, 9),
(9, 14, 2),
(11, 9, NULL),
(12, 9, NULL),
(13, 9, NULL),
(14, 9, NULL),
(15, 9, NULL),
(16, 9, NULL),
(17, 9, NULL),
(18, 9, NULL),
(19, 9, NULL),
(20, 9, NULL),
(21, 9, NULL),
(22, 9, NULL),
(23, 9, NULL),
(24, 9, NULL),
(25, 9, NULL),
(26, 9, NULL),
(27, 9, NULL),
(28, 9, NULL),
(29, 9, NULL),
(30, 9, NULL),
(31, 9, NULL),
(32, 9, NULL),
(33, 9, NULL),
(34, 9, NULL),
(35, 9, NULL),
(36, 9, NULL),
(37, 9, NULL),
(38, 9, NULL),
(39, 9, NULL),
(40, 9, NULL),
(41, 9, NULL),
(42, 9, NULL),
(43, 9, NULL),
(44, 9, NULL),
(45, 9, NULL),
(46, 15, NULL),
(47, 15, NULL),
(48, 15, NULL),
(49, 15, NULL),
(50, 15, NULL),
(51, 15, NULL),
(52, 9, NULL),
(53, 9, NULL),
(54, 9, NULL),
(55, 9, NULL),
(56, 9, NULL),
(57, 9, NULL),
(58, 9, NULL),
(59, 9, NULL),
(60, 9, NULL),
(61, 9, NULL),
(62, 9, NULL),
(63, 9, NULL),
(64, 9, NULL),
(65, 9, NULL),
(66, 9, NULL),
(67, 9, NULL),
(68, 9, NULL),
(69, 9, NULL),
(70, 9, NULL),
(71, 9, NULL),
(72, 9, NULL),
(73, 9, NULL),
(74, 9, NULL),
(75, 9, 6),
(85, 9, 3),
(86, 9, 3),
(1, 9, 6),
(2, 9, 6),
(3, 9, 6),
(4, 9, 6),
(5, 9, 9),
(6, 9, 9),
(9, 14, 2),
(10, 9, 3),
(11, 9, NULL),
(12, 9, NULL),
(13, 9, NULL),
(14, 9, NULL),
(15, 9, NULL),
(16, 9, NULL),
(17, 9, NULL),
(18, 9, NULL),
(19, 9, NULL),
(20, 9, NULL),
(21, 9, NULL),
(22, 9, NULL),
(23, 9, NULL),
(24, 9, NULL),
(25, 9, NULL),
(26, 9, NULL),
(27, 9, NULL),
(28, 9, NULL),
(29, 9, NULL),
(30, 9, NULL),
(31, 9, NULL),
(32, 9, NULL),
(33, 9, NULL),
(34, 9, NULL),
(35, 9, NULL),
(36, 9, NULL),
(37, 9, NULL),
(38, 9, NULL),
(39, 9, NULL),
(40, 9, NULL),
(41, 9, NULL),
(42, 9, NULL),
(43, 9, NULL),
(44, 9, NULL),
(45, 9, NULL),
(87, 9, 2),
(88, 9, 2),
(89, 9, 4),
(90, 9, 4),
(91, 18, 4);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_users` int NOT NULL,
  `id_news` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `date`, `id_users`, `id_news`) VALUES
(1, 'magnifique', '2023-04-01 09:10:35', 35, 9),
(2, 'Hello-world!!', '2023-04-01 15:27:24', 35, 6),
(3, 'En tant que joueur de GTA 5, je peux dire que c\'est un jeu incroyablement amusant et addictif. La carte immense offre une multitude d\'activités, des missions principales passionnantes aux tâches secondaires amusantes comme le parachutisme, la course de rue ou le braquage de banque. Les graphismes sont magnifiques, avec une attention particulière aux détails dans chaque aspect de la ville et des personnages.\r\n\r\nLe jeu offre également une grande variété de véhicules, allant des voitures de sport aux avions et aux bateaux, chacun avec ses propres caractéristiques uniques. Les combats sont également bien conçus, offrant une gamme d\'armes et de tactiques différentes pour vaincre vos ennemis.\r\n\r\nL\'histoire est captivante, avec des personnages bien développés et une intrigue complexe qui vous tient en haleine jusqu\'à la fin. Le mode multijoueur est également très amusant, permettant aux joueurs de se connecter et de jouer avec des amis ou des inconnus dans un monde en constante évolution.\r\n\r\nEn somme, GTA 5 est un jeu qui mérite d\'être joué pour tout amateur de jeux vidéo, offrant des heures de divertissement et une expérience de jeu immersive.', '2023-04-01 21:31:47', 39, 5);

-- --------------------------------------------------------

--
-- Structure de la table `discussions`
--

CREATE TABLE `discussions` (
  `id` int UNSIGNED NOT NULL,
  `user1_id` int NOT NULL,
  `user2_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `discussions`
--

INSERT INTO `discussions` (`id`, `user1_id`, `user2_id`) VALUES
(5, 34, 33),
(6, 34, 32),
(7, 34, 35),
(8, 33, 32),
(9, 36, 33),
(10, 33, 33),
(11, 38, 33),
(12, 38, 37),
(13, 38, 36),
(14, 38, 35),
(15, 33, 37),
(16, 34, 36),
(17, 34, 37),
(18, 34, 38),
(19, 43, 42),
(20, 43, 36),
(21, 43, 33),
(22, 43, 34),
(23, 43, 35),
(24, 35, 36),
(25, 33, 35),
(26, 38, 40),
(27, 38, 43),
(28, 42, 34),
(29, 42, 36),
(30, 36, 39),
(31, 35, 42),
(32, 35, 39),
(33, 35, 40),
(34, 34, 39),
(35, 39, 33),
(36, 39, 38),
(37, 39, 41),
(38, 34, 40),
(39, 34, 41),
(40, 39, 37);

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `lieu` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favorite_games`
--

CREATE TABLE `favorite_games` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `game_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `favorite_games`
--

INSERT INTO `favorite_games` (`id`, `user_id`, `game_id`) VALUES
(16, 33, 1),
(17, 33, 3),
(18, 33, 7),
(19, 35, 1),
(20, 33, 10),
(21, 38, 1),
(23, 34, 1),
(24, 37, 6),
(25, 35, 2),
(26, 39, 1),
(27, 39, 5),
(28, 39, 2),
(29, 37, 3);

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `statut` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_demande` datetime DEFAULT NULL,
  `friend_id` int NOT NULL DEFAULT '0',
  `friend_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `statut`, `date_demande`, `friend_id`, `friend_name`) VALUES
(130, 34, 'en_attente', '2023-04-01 19:13:18', 33, 'Arnaud'),
(131, 34, 'en_attente', '2023-04-01 19:13:26', 36, 'Thibault'),
(133, 36, 'en_attente', '2023-04-01 19:14:02', 35, 'Oxane'),
(134, 36, 'en_attente', '2023-04-01 19:14:06', 38, 'Chris'),
(135, 36, 'en_attente', '2023-04-01 19:14:14', 41, 'Camille'),
(136, 36, 'en_attente', '2023-04-01 19:14:22', 43, 'hugo'),
(138, 36, 'en_attente', '2023-04-01 19:19:50', 33, 'Arnaud'),
(139, 33, 'en_attente', '2023-04-01 19:20:32', 36, 'Thibault'),
(140, 33, 'en_attente', '2023-04-01 19:21:23', 34, 'Lina'),
(141, 33, 'en_attente', '2023-04-01 20:15:37', 35, 'Oxane'),
(142, 33, 'en_attente', '2023-04-01 20:44:10', 37, 'Julie'),
(143, 33, 'attente', NULL, 38, ''),
(144, 33, 'attente', NULL, 39, ''),
(145, 33, 'en_attente', '2023-04-01 20:59:17', 41, 'Camille'),
(146, 35, 'attente', NULL, 33, ''),
(147, 35, 'attente', NULL, 36, ''),
(148, 35, 'attente', NULL, 34, ''),
(149, 34, 'attente', NULL, 35, ''),
(150, 34, 'en_attente', '2023-04-01 21:01:45', 37, 'Julie'),
(151, 34, 'en_attente', '2023-04-01 21:03:32', 38, 'Chris'),
(152, 44, 'en_attente', '2023-04-01 21:05:03', 33, 'Arnaud'),
(153, 33, 'en_attente', '2023-04-01 21:05:31', 44, 'nicolas'),
(154, 44, 'en_attente', '2023-04-01 21:22:37', 37, 'Julie'),
(155, 44, 'en_attente', '2023-04-01 21:22:46', 34, 'Lina'),
(156, 34, 'en_attente', '2023-04-01 21:23:12', 39, 'john'),
(157, 34, 'en_attente', '2023-04-01 21:23:16', 40, 'lucas'),
(158, 34, 'en_attente', '2023-04-01 21:23:20', 41, 'Camille'),
(159, 34, 'en_attente', '2023-04-01 21:23:23', 42, 'jules'),
(160, 34, 'en_attente', '2023-04-01 21:23:27', 43, 'hugo'),
(161, 34, 'en_attente', '2023-04-01 21:23:30', 44, 'nicolas'),
(163, 39, 'en_attente', '2023-04-01 21:24:05', 34, 'Lina'),
(164, 39, 'en_attente', '2023-04-01 22:12:36', 35, 'Oxane'),
(166, 39, 'en_attente', '2023-04-01 22:18:32', 33, 'Arnaud'),
(167, 39, 'en_attente', '2023-04-01 22:18:39', 42, 'jules'),
(168, 39, 'en_attente', '2023-04-01 23:01:48', 37, 'Julie'),
(171, 39, 'en_attente', '2023-04-01 23:41:39', 39, 'john'),
(172, 37, 'en_attente', '2023-04-02 22:58:54', 33, 'Arnaud');

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `annee_de_sortie` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `name`, `description`, `annee_de_sortie`) VALUES
(1, 'Fortnite', 'Fortnite est un jeu de survie et de construction de base en monde ouvert.', '2017-07-25 00:00:00'),
(2, 'Apex Legends', 'Apex Legends est un jeu de tir à la première personne multijoueur en ligne.', '2019-02-04 00:00:00'),
(3, 'Valheim', 'Valheim est un jeu de survie en monde ouvert se déroulant dans un univers inspiré de la mythologie nordique.', '2021-02-02 00:00:00'),
(4, 'Cyberpunk 2077', 'Cyberpunk 2077 est un jeu de rôle en monde ouvert se déroulant dans un univers dystopique futuriste.', '2020-12-10 00:00:00'),
(5, 'Resident Evil Village', 'Resident Evil Village est un jeu d\'horreur et d\'aventure à la première personne.', '2021-05-07 00:00:00'),
(6, 'COD Warzone', 'Call of Duty: Warzone est un jeu de tir à la première personne multijoueur en ligne.', '2020-03-10 00:00:00'),
(7, 'Outriders', 'Outriders est un jeu de tir à la troisième personne et de rôle en ligne se déroulant dans un univers de science-fiction.', '2021-04-01 00:00:00'),
(8, 'It Takes Two', 'It Takes Two est un jeu de plateforme et de coopération en ligne.', '2021-03-26 00:00:00'),
(9, 'Hitman 3', 'Hitman 3 est un jeu d\'infiltration et d\'aventure en monde ouvert.', '2021-01-20 00:00:00'),
(10, 'Deathloop', 'Deathloop est un jeu de tir à la première personne et d\'aventure se déroulant dans un univers de science-fiction.', '2021-09-14 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_message` int NOT NULL,
  `contenu` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `id` int NOT NULL,
  `discussion_id` int NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `auteur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `contenu`, `date`, `id`, `discussion_id`, `is_read`, `auteur`) VALUES
(338, 'c est super tu as enfin trouvé la solution ', '2023-04-01 22:19:25', 39, 40, 0, NULL),
(339, '\"Qu\'avez-vous fait d\'intéressant récemment ?\" \"Avez-vous vu le dernier film qui est sorti ?\" \"Quel est votre endroit préféré pour passer vos vacances ?\"', '2023-04-01 23:34:43', 39, 30, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_users` int NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `contenu`, `date`, `id_users`, `titre`, `image_path`) VALUES
(5, 'a propos de gta VI', 'Grand Theft Auto VI, le nouvel opus tant attendu de la série à succès de Rockstar Games, est enfin arrivé ! Dans cette nouvelle aventure, les joueurs exploreront un monde ouvert massif et détaillé, avec des personnages intrigants, des missions passionnantes et des rebondissements inattendus. Plongez dans l\'atmosphère unique de GTA VI, où vous découvrirez des environnements urbains et ruraux, ainsi qu\'une multitude d\'activités et de secrets à dévoiler. Que vous soyez un vétéran de la série ou un nouveau venu, rejoignez-nous pour discuter de ce chef-d\'œuvre du monde du gaming, partager des astuces, des conseils et échanger sur vos expériences dans l\'univers de GTA VI.', '2023-03-29 09:17:19', 38, NULL, 'images/6424021fc8482.png'),
(6, 'The Legend of Zelda: Tears of the Kingdom', '\"The Legend of Zelda: Tears of the Kingdom\" est un jeu vidéo d\'aventure et de rôle développé par des fans de la série \"The Legend of Zelda\". Le jeu a été créé avec le moteur de jeu \"RPG Maker VX Ace\" et est disponible gratuitement en téléchargement sur des sites de fans dédiés à la série.\r\n\r\n\r\nDans ce jeu, le joueur incarne Link, le héros de la série, qui doit sauver le royaume d\'Hyrule de la menace d\'un nouvel ennemi maléfique. Le gameplay est similaire à celui des autres jeux \"The Legend of Zelda\", avec des énigmes à résoudre, des donjons à explorer et des ennemis à combattre.\r\n\r\n\r\nL\'histoire de \"Tears of the Kingdom\" est originale et se déroule après les événements du jeu \"The Legend of Zelda: Ocarina of Time\". Link doit découvrir pourquoi les larmes de la princesse Zelda ont mystérieusement disparu et comment il peut aider à restaurer l\'équilibre dans le royaume.', '2023-03-29 15:59:02', 35, NULL, 'images/64246046c65d0.jpg'),
(9, 'hello world', 'hello', '2023-03-31 13:33:18', 37, NULL, 'images/6426e11e9193a.JPG');

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `id` int NOT NULL,
  `id_evenement` int NOT NULL,
  `id_utilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

CREATE TABLE `possede` (
  `id` int NOT NULL,
  `id_game` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_jeu`
--

CREATE TABLE `type_jeu` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_jeu`
--

INSERT INTO `type_jeu` (`id`, `nom`) VALUES
(1, 'Jeu de stratégie'),
(2, 'Jeu de rôle'),
(3, 'Jeu de sport');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `bio` text COLLATE utf8mb4_general_ci NOT NULL,
  `jeux_favoris` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `est_connecte` tinyint(1) NOT NULL DEFAULT '1',
  `last_active` int NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `password`, `email`, `date`, `bio`, `jeux_favoris`, `est_connecte`, `last_active`, `image`) VALUES
(33, 'Arnaud', 'aaa', 'AAA@AAA.AA', '2023-03-23', 'Arnaud, passionné de jeux vidéo depuis l\'enfance, j\'ai grandi en explorant des mondes virtuels et en relevant des défis épiques. ', 'pc', 1, 0, '2023-03-23-44.user-307993_640.png'),
(34, 'Lina', 'aaa', 'bbb@bbb.bb', '2023-03-23', 'Je suis une fan inconditionnelle de jeux d\'aventure et de plateforme. J\'adore explorer des univers colorés et captivants, et je m\'épanouis en résolvant des énigmes complexes.', 'xbox', 1, 0, '64258b65d01d2.png'),
(35, 'Oxane', 'aaa', 'bbb@bb.bb', '2023-03-23', 'Je me considère comme une adepte des jeux multijoueurs en ligne, principalement des FPS et des MOBA. Rien ne me plaît plus que de former des équipes avec mes amis et de relever ensemble des défis compétitifs.', 'pc', 1, 0, '64259c935f801.png'),
(36, 'Thibault', 'aaa', 'vvv@vvv.vv', '2023-03-24', ' Passionné de jeux de stratégie et de simulation, je passe des heures à bâtir des empires et à gérer des ressources. J\'aime échanger des astuces avec d\'autres joueurs pour améliorer mes compétences.', 'xbox,pc', 1, 0, '64259c4ab5894.png'),
(37, 'julie', 'aaa', 'aaa@aa.aa', '2023-03-25', '\"Salut ! Je m\'appelle julie, et je suis un passionnée de jeux vidéo depuis mon plus jeune âge. J\'ai grandi en explorant les mondes fantastiques de Zelda et en affrontant des adversaires redoutables dans Street Fighter. Aujourd\'hui, je suis une joueuse assidue de jeux en ligne compétitifs tels que Fortnite et Overwatch,', 'pc', 1, 0, '6429f7845f3e9.png'),
(38, 'Chris', 'aaa', 'aaa@aaa.aa', '2023-03-25', 'Passionné de jeux de stratégie et de simulation, je passe des heures à bâtir des empires et à gérer des ressources. J\'aime échanger des astuces avec d\'autres joueurs pour améliorer mes compétences.', 'pc', 1, 0, '641f87ce12039.png'),
(39, 'john', 'aaa', 'john@jim.com', '2023-03-26', 'Passionné de jeux de course et de sport, je suis toujours à la recherche de nouveaux défis à relever avec mes amis.', 'playstation', 1, 0, '6428a50bf3da8.jpg'),
(40, 'lucas', 'aaa', 'luca@gmail.com', '2023-03-26', 'J\\\'adore les jeux de stratégie et les jeux de cartes. Je suis toujours prêt pour un bon duel entre amis.', 'pc', 1, 0, '2023-03-26-21.homme-daffaire (1).png'),
(41, 'Camille', 'aaa', 'camille@gmail.com', '2023-03-26', 'Fan de jeux d\\\'action et de plateforme, je suis constamment à la recherche de nouveaux défis et de records à battre.', 'nintendo switch', 1, 0, '2023-03-26-49.utilisateur (1).png'),
(42, 'jules', 'aaa', 'jules@gmail.com', '2023-03-26', 'Je suis un joueur occasionnel qui aime les jeux de puzzle et de réflexion. Les jeux de société en ligne sont également mes favoris', 'xbox', 1, 0, '64258bac90711.png'),
(43, 'hugo', 'aaa', 'hugho@gmail.com', '2023-03-26', 'Je suis un fan de jeux de tir à la première personne et de jeux d\\\'action. J\\\'aime me plonger dans des univers futuristes et réaliser des exploits héroïques.', 'xbox', 1, 0, '2023-03-26-00.homme.png'),
(44, 'nicolas', 'aaa', 'nicolas@nicolas.ni', '2023-04-01', 'hello_world !', 'xbox', 1, 0, '2023-04-01-53.homme (1).png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD KEY `id` (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_users_FK` (`id_users`),
  ADD KEY `comments_news_FK` (`id_news`);

--
-- Index pour la table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favorite_games`
--
ALTER TABLE `favorite_games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `messages_users_FK` (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_users_FK` (`id_users`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participe_evenements_FK` (`id_evenement`),
  ADD KEY `participe_users_FK` (`id_utilisateur`);

--
-- Index pour la table `possede`
--
ALTER TABLE `possede`
  ADD PRIMARY KEY (`id`,`id_game`),
  ADD KEY `possede_game0_FK` (`id_game`);

--
-- Index pour la table `type_jeu`
--
ALTER TABLE `type_jeu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appartient`
--
ALTER TABLE `appartient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favorite_games`
--
ALTER TABLE `favorite_games`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `type_jeu`
--
ALTER TABLE `type_jeu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_news_FK` FOREIGN KEY (`id_news`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `comments_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `favorite_games`
--
ALTER TABLE `favorite_games`
  ADD CONSTRAINT `favorite_games_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorite_games_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_users_FK` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `participe_evenements_FK` FOREIGN KEY (`id_evenement`) REFERENCES `evenements` (`id`),
  ADD CONSTRAINT `participe_users_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `possede_game0_FK` FOREIGN KEY (`id_game`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `possede_users_FK` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
