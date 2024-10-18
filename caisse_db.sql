-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : database
-- Généré le : ven. 11 oct. 2024 à 20:41
-- Version du serveur : 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- Version de PHP : 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET FOREIGN_KEY_CHECKS = 0;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `caisse_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `appro_caisse`
--

CREATE TABLE IF NOT EXISTS `appro_caisse` (
  `id` int(11) NOT NULL,
  `journee_id` int(11) DEFAULT NULL,
  `caisse_emettrice_id` int(11) NOT NULL,
  `caisse_receptrice_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `montant` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `objet` varchar(255) DEFAULT NULL,
  `uuid` binary(16) DEFAULT NULL COMMENT '(DC2Type:uuid)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `appro_caisse`
--

INSERT INTO `appro_caisse` (`id`, `journee_id`, `caisse_emettrice_id`, `caisse_receptrice_id`, `user_id`, `date`, `montant`, `status`, `reference`, `objet`, `uuid`) VALUES
(11, 174, 12, 14, 2, '2024-10-10 00:00:00', '500000', 'validée', 'N°OSC-APC/2024/001', 'Approvisionnement de caisse à caisse', NULL),
(12, 174, 12, 14, 2, '2024-10-10 00:00:00', '300000', 'validée', 'N°OSC-APC/2024/012', 'Approvisionnement de caisse à caisse', NULL),
(13, 174, 12, 14, 2, '2024-10-10 00:00:00', '150000', 'validée', 'N°OSC-APC/2024/013', 'Approvisionnement de caisse à caisse', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `billetage`
--

CREATE TABLE IF NOT EXISTS `billetage` (
  `id` int(11) NOT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `bonapprovisionnement_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `journee_id` int(11) DEFAULT NULL,
  `b10000` int(11) DEFAULT NULL,
  `b5000` int(11) DEFAULT NULL,
  `b2000` int(11) DEFAULT NULL,
  `b1000` int(11) DEFAULT NULL,
  `b500` int(11) DEFAULT NULL,
  `m500` int(11) DEFAULT NULL,
  `m250` int(11) DEFAULT NULL,
  `m200` int(11) DEFAULT NULL,
  `m100` int(11) DEFAULT NULL,
  `m50` int(11) DEFAULT NULL,
  `m10` int(11) DEFAULT NULL,
  `m5` int(11) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `ecart` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `confimre_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `uuid` binary(16) DEFAULT NULL COMMENT '(DC2Type:uuid)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bonapprovisionnement`
--

CREATE TABLE IF NOT EXISTS `bonapprovisionnement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `emeteur_id` int(11) DEFAULT NULL,
  `banque_id` int(11) DEFAULT NULL,
  `tiers_id` int(11) DEFAULT NULL,
  `journee_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL COMMENT '(DC2Type:date_immutable)',
  `modepaie` varchar(255) DEFAULT NULL,
  `montanttotal` double DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `porteur` varchar(255) DEFAULT NULL,
  `destinataire` varchar(255) DEFAULT NULL,
  `check_number` varchar(255) DEFAULT NULL,
  `nom_banque` varchar(255) DEFAULT NULL,
  `nom_caisse` varchar(255) DEFAULT NULL,
  `numero_bon` varchar(255) DEFAULT NULL,
  `nom_tiers` varchar(255) DEFAULT NULL,
  `echeance` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bonapprovisionnement`
--

INSERT INTO `bonapprovisionnement` (`id`, `user_id`, `caisse_id`, `emeteur_id`, `banque_id`, `tiers_id`, `journee_id`, `date`, `modepaie`, `montanttotal`, `status`, `uuid`, `created_at`, `updated_at`, `reference`, `porteur`, `destinataire`, `check_number`, `nom_banque`, `nom_caisse`, `numero_bon`, `nom_tiers`, `echeance`) VALUES
(12, 2, 12, NULL, NULL, NULL, 174, '2024-10-10', 'Banque', 1000000, 'convertit', 'aae5ef92-971c-4f2b-98b4-c93620f1da7f', '2024-10-10 16:19:24', NULL, 'N°OSC-BA/2024/001', 'Objet 1', 'Bénéficiaire 1', NULL, NULL, NULL, NULL, 'numéro chèque', NULL),
(13, 2, 12, NULL, NULL, NULL, 174, '2024-10-11', 'Banque', 500000, 'en attente', 'bbd0e0a5-b312-4e07-a8ae-8efbb0c0966a', '2024-10-11 10:22:44', NULL, 'N°OSC-BA/2024/013', 'Approvisionnement Banque à caisse', 'Bénéficiaire 1', NULL, NULL, NULL, NULL, 'numéro chèque', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bon_caisse`
--

CREATE TABLE IF NOT EXISTS `bon_caisse` (
  `id` int(11) NOT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `fdb_id` int(11) DEFAULT NULL,
  `depense_id` int(11) DEFAULT NULL,
  `bonapprovisionnement_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `beneficiaire` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

CREATE TABLE IF NOT EXISTS `caisse` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `intitule` varchar(255) NOT NULL,
  `plafond` varchar(255) DEFAULT NULL,
  `responsable` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `soldedispo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `caisse`
--

INSERT INTO `caisse` (`id`, `user_id`, `intitule`, `plafond`, `responsable`, `code`, `soldedispo`) VALUES
(12, 2, 'Caisse principale', '10000000', '', 'C001', 50000.00),
(14, 22, 'Caisse secondaire', '10000000', NULL, 'C002', 950000.00);

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE IF NOT EXISTS `depense` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `type_expense_id` int(11) DEFAULT NULL,
  `montant` double NOT NULL,
  `modepaie` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `id` int(11) NOT NULL,
  `fdb_id` int(11) DEFAULT NULL,
  `depense_id` int(11) DEFAULT NULL,
  `designationproduit` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `detail`
--

INSERT INTO `detail` (`id`, `fdb_id`, `depense_id`, `designationproduit`, `quantite`, `price`, `montant`) VALUES
(1, 173, NULL, 'azerty', 1, 15000, 15000),
(179, 175, NULL, 'Carburant Manager', 1, 15000, 15000);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20241007165124', '2024-10-07 16:51:45', 1559);

-- --------------------------------------------------------

--
-- Structure de la table `emeteur`
--

CREATE TABLE IF NOT EXISTS `emeteur` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emeteur`
--

INSERT INTO `emeteur` (`id`, `name`, `contact`) VALUES
(1, 'Wognin Fernand', ''),
(2, 'Otron André', ''),
(3, 'Konan Bertrand', '');

-- --------------------------------------------------------

--
-- Structure de la table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `id` int(11) NOT NULL,
  `type_expense_id` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `autre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `expense`
--

INSERT INTO `expense` (`id`, `type_expense_id`, `code`, `name`, `status`, `autre`) VALUES
(1, 1, '605100', '605100 - Fournitures non stockables -Eau', '', ''),
(2, 1, '605200', '605200 - Fournitures non stockables - Electricité', '', ''),
(3, 1, '605300', '605300 - Fournitures non stockables – Autres énergies', '', ''),
(4, 1, '605400', '605400 - Fournitures d\'entretien non stockables', '', ''),
(5, 1, '605500', '605500 - Fournitures de bureau non stockables', '', ''),
(6, 1, '605600', '605600 - Achats de petit matériel et outillage', '', ''),
(7, 1, '605700', '605700 - Achats d\'études et prestations de services', '', ''),
(8, 1, '605800', '605800 - Achats de travaux, matériels et équipements', '', ''),
(9, 1, '605900', '605900 - Rabais, Remises et Ristournes obtenus (non ventilés)', '', ''),
(10, 2, '608100', '608100 - Emballages perdus', '', ''),
(11, 2, '608200', '608200 - Emballages récupérables non identifiables', '', ''),
(12, 2, '608300', '608300 - Emballages à usage mixte', '', ''),
(13, 2, '608400', '608400 - Rabais, Remises et Ristournes obtenus (non ventilés)', '', ''),
(14, 3, '611100', '611100 - Transports sur achats', '', ''),
(15, 3, '612100', '612100 - Transports sur ventes', '', ''),
(16, 3, '613100', '613100 - Transports pour le compte de tiers', '', ''),
(17, 3, '614100', '614100 - Transports du personnel', '', ''),
(18, 3, '616100', '616100 - Transports de plis', '', ''),
(19, 3, '618100', '618100 - Voyages et déplacements', '', ''),
(20, 3, '618200', '618200 - Transports entre établissements ou chantiers', '', ''),
(21, 3, '618300', '618300 - Transports administratifs', '', ''),
(22, 4, '621000', '621000 -  Sous traitance générale ', '', ''),
(23, 5, '622100', '622100 - Locations de terrains', '', ''),
(24, 5, '622200', '622200 - Locations de bâtiments', '', ''),
(25, 5, '622300', '622300 - Locations de matériels et outillages', '', ''),
(26, 5, '622400', '622400 - Malis sur emballages', '', ''),
(27, 5, '622500', '622500 - Locations d\'emballages', '', ''),
(28, 5, '622800', '622800 - Locations et charges locatives diverses', '', ''),
(29, 6, '624100', '624100 - Entretien et réparations des biens immobiliers', '', ''),
(30, 6, '624200', '624200 - Entretien et réparations des biens mobiliers', '', ''),
(31, 6, '624300', '624300 - Maintenance', '', ''),
(32, 6, '624800', '624800 - Autres entretiens et réparations', '', ''),
(33, 7, '626100', '626100 - Études et recherches', '', ''),
(34, 7, '626500 ', '626500 - Documentation générale', '', ''),
(35, 7, '626600', '626600 - Documentation technique', '', ''),
(36, 8, '627100', '627100 - Annonces, insertions', '', ''),
(37, 8, '627200', '627200 - Catalogues, imprimés publicitaires', '', ''),
(38, 8, '627300', '627300 - Échantillons', '', ''),
(39, 8, '627400', '627400 - Foires et expositions', '', ''),
(40, 8, '627500', '627500 - Publications', '', ''),
(41, 8, '627600', '627600 - Cadeaux à la clientèle', '', ''),
(42, 8, '627700', '627700 - Frais de colloques, séminaires, conférences', '', ''),
(43, 8, '627800', '627800 - Autres charges de publicité et relations publiques', '', ''),
(44, 9, '628100', '628100 - Frais de téléphone', '', ''),
(45, 9, '628200', '628200 - Frais d\'internet', '', ''),
(46, 9, '628300', '628300 - Frais de télécopie', '', ''),
(47, 9, '628800', '628800 - Autres frais de télécommunications', '', ''),
(48, 10, '632100', '632100 - Commissions et courtages sur achats', '', ''),
(49, 10, '632200', '632200 - Commissions et courtages sur ventes', '', ''),
(50, 10, '632300', '632300 - Rémunérations des transitaires', '', ''),
(51, 10, '632400', '632400 - Honoraires', '', ''),
(52, 10, '632500', '632500 - Frais d\'actes et de contentieux', '', ''),
(53, 10, '632800', '632800 - Divers frais', '', ''),
(54, 11, '635100', '635100 - Cotisations', '', ''),
(55, 11, '635800', '635800 - Concours divers', '', ''),
(56, 12, '638100', '638100 - Frais de recrutement du personnel', '', ''),
(57, 12, '638200', '638200 - Frais de déménagement', '', ''),
(58, 12, '638300', '638300 - Réceptions', '', ''),
(59, 12, '638400', '638400 -  Missions', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `fdb`
--

CREATE TABLE IF NOT EXISTS `fdb` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `type_expense_id` int(11) DEFAULT NULL,
  `emeteur_id` int(11) DEFAULT NULL,
  `journee_id` int(11) DEFAULT NULL,
  `valid_by_id` int(11) DEFAULT NULL,
  `numero_fiche_besoin` varchar(20) DEFAULT NULL,
  `destinataire` varchar(255) DEFAULT NULL,
  `departement` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `beneficiaire` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fdb`
--

INSERT INTO `fdb` (`id`, `user_id`, `caisse_id`, `expense_id`, `type_expense_id`, `emeteur_id`, `journee_id`, `valid_by_id`, `numero_fiche_besoin`, `destinataire`, `departement`, `status`, `uuid`, `updated_at`, `total`, `beneficiaire`, `date`, `is_active`) VALUES
(175, 4, 14, 11, 2, NULL, NULL, NULL, 'N°OSC-FB/2024/001', 'Konan Gwladys', NULL, 'brouillon', 'f395ec0f-1500-4f75-8033-d69eb0c6de22', NULL, 15000.00, 'Wognin Fernand', '2024-10-11 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fonction`
--

INSERT INTO `fonction` (`id`, `name`) VALUES
(1, 'Société anonyme'),
(2, 'Société à responsabilité limitée'),
(3, 'Société à responsabilité limitée unipersonnelle'),
(4, 'Entreprise individuelle'),
(5, 'Société civile immobilière');

-- --------------------------------------------------------

--
-- Structure de la table `journal_caisse`
--

CREATE TABLE IF NOT EXISTS `journal_caisse` (
  `id` int(11) NOT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `fdb_id` int(11) DEFAULT NULL,
  `bonapprovisionnement_id` int(11) DEFAULT NULL,
  `recu_caisse_id` int(11) DEFAULT NULL,
  `bon_caisse_id` int(11) DEFAULT NULL,
  `appro_caisse_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `num_piece` varchar(255) DEFAULT NULL,
  `intitule` varchar(255) DEFAULT NULL,
  `entree` varchar(255) DEFAULT NULL,
  `sortie` varchar(255) DEFAULT NULL,
  `solde` varchar(255) DEFAULT NULL,
  `uuid` binary(16) DEFAULT NULL COMMENT '(DC2Type:uuid)',
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `journal_caisse`
--

INSERT INTO `journal_caisse` (`id`, `caisse_id`, `fdb_id`, `bonapprovisionnement_id`, `recu_caisse_id`, `bon_caisse_id`, `appro_caisse_id`, `date`, `num_piece`, `intitule`, `entree`, `sortie`, `solde`, `uuid`, `created_at`, `updated_at`) VALUES
(63, 12, NULL, NULL, NULL, NULL, NULL, '2024-10-10 16:18:31', NULL, 'Solde de la caisse principale au 10/10/2024', '0.00', NULL, '0.00', NULL, '2024-10-10 16:18:31', NULL),
(64, 14, NULL, NULL, NULL, NULL, NULL, '2024-10-10 16:19:06', NULL, 'Solde de la caisse secondaire au 10/10/2024', '0.00', NULL, '0.00', NULL, '2024-10-10 16:19:06', NULL),
(65, 12, NULL, 12, 12, NULL, NULL, '2024-10-10 16:19:30', 'N°OSC-JC001/2024/065', 'Objet 1', '1000000', NULL, '1000000', NULL, NULL, NULL),
(66, 12, NULL, NULL, NULL, NULL, 11, '2024-10-10 16:19:49', 'N°OSC-JC001/2024/066', 'Transfert à la caisse secondaire', NULL, '500000', '500000', NULL, NULL, NULL),
(67, 14, NULL, NULL, NULL, NULL, 11, '2024-10-10 16:19:49', 'N°OSC-JC002/2024/066', 'Réception de la caisse principale', '500000', NULL, '500000', NULL, NULL, NULL),
(68, 12, NULL, NULL, NULL, NULL, 12, '2024-10-10 16:27:27', 'N°OSC-JC001/2024/068', 'Transfert à la caisse secondaire', NULL, '300000', '200000', NULL, NULL, NULL),
(69, 14, NULL, NULL, NULL, NULL, 12, '2024-10-10 16:27:27', 'N°OSC-JC002/2024/068', 'Réception de la caisse principale', '300000', NULL, '800000', NULL, NULL, NULL),
(70, 12, NULL, NULL, NULL, NULL, 13, '2024-10-10 16:38:04', 'N°OSC-JC001/2024/070', 'Transfert à la caisse secondaire', NULL, '150000', '50000', NULL, NULL, NULL),
(71, 14, NULL, NULL, NULL, NULL, 13, '2024-10-10 16:38:04', 'N°OSC-JC002/2024/070', 'Réception de la caisse principale', '150000', NULL, '950000', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `journee`
--

CREATE TABLE IF NOT EXISTS `journee` (
  `id` int(11) NOT NULL,
  `caisse_id` int(11) NOT NULL,
  `last_journee_id` int(11) DEFAULT NULL,
  `started_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `active` tinyint(1) DEFAULT NULL,
  `close_at` datetime DEFAULT NULL,
  `debit` decimal(10,2) DEFAULT NULL,
  `credit` decimal(10,2) DEFAULT NULL,
  `solde` decimal(10,2) DEFAULT NULL,
  `last_solde` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `uuid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `journee`
--

INSERT INTO `journee` (`id`, `caisse_id`, `last_journee_id`, `started_at`, `updated_at`, `active`, `close_at`, `debit`, `credit`, `solde`, `last_solde`, `created_at`, `uuid`) VALUES
(174, 12, NULL, '2024-10-10 16:18:00', NULL, 1, NULL, 1000000.00, 950000.00, 50000.00, 0.00, NULL, '6707fe57686ed'),
(175, 14, NULL, '2024-10-10 16:19:00', NULL, 1, NULL, 0.00, 0.00, 0.00, 0.00, NULL, '6707fe7a6ed89');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:18:\\\"Contenu de l\\\'email\\\";i:1;s:5:\\\"utf-8\\\";i:2;s:25:\\\"<p>Contenu de l\\\'email</p>\\\";i:3;s:5:\\\"utf-8\\\";i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"your_email@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:21:\\\"recipient@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:16:\\\"Sujet de l\\\'email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2024-09-04 13:55:10', '2024-09-04 13:55:10', NULL),
(2, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:18:\\\"Contenu de l\\\'email\\\";i:1;s:5:\\\"utf-8\\\";i:2;s:25:\\\"<p>Contenu de l\\\'email</p>\\\";i:3;s:5:\\\"utf-8\\\";i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"your_email@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:21:\\\"recipient@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:16:\\\"Sujet de l\\\'email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2024-09-04 13:55:55', '2024-09-04 13:55:55', NULL),
(3, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:18:\\\"Contenu de l\\\'email\\\";i:1;s:5:\\\"utf-8\\\";i:2;s:25:\\\"<p>Contenu de l\\\'email</p>\\\";i:3;s:5:\\\"utf-8\\\";i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"your_email@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:21:\\\"recipient@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:16:\\\"Sujet de l\\\'email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2024-09-04 14:06:55', '2024-09-04 14:06:55', NULL),
(4, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:18:\\\"Contenu de l\\\'email\\\";i:1;s:5:\\\"utf-8\\\";i:2;s:25:\\\"<p>Contenu de l\\\'email</p>\\\";i:3;s:5:\\\"utf-8\\\";i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"your_email@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:21:\\\"recipient@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:16:\\\"Sujet de l\\\'email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2024-09-04 14:15:14', '2024-09-04 14:15:14', NULL),
(5, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:18:\\\"Contenu de l\\\'email\\\";i:1;s:5:\\\"utf-8\\\";i:2;s:25:\\\"<p>Contenu de l\\\'email</p>\\\";i:3;s:5:\\\"utf-8\\\";i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"your_email@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:21:\\\"recipient@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:16:\\\"Sujet de l\\\'email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2024-09-04 14:17:22', '2024-09-04 14:17:22', NULL),
(6, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:18:\\\"Contenu de l\\\'email\\\";i:1;s:5:\\\"utf-8\\\";i:2;s:25:\\\"<p>Contenu de l\\\'email</p>\\\";i:3;s:5:\\\"utf-8\\\";i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"your_email@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:21:\\\"recipient@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:16:\\\"Sujet de l\\\'email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2024-09-04 14:17:26', '2024-09-04 14:17:26', NULL),
(7, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:18:\\\"Contenu de l\\\'email\\\";i:1;s:5:\\\"utf-8\\\";i:2;s:25:\\\"<p>Contenu de l\\\'email</p>\\\";i:3;s:5:\\\"utf-8\\\";i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"your_email@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:21:\\\"recipient@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:16:\\\"Sujet de l\\\'email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2024-09-04 14:44:00', '2024-09-04 14:44:00', NULL),
(8, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:18:\\\"Contenu de l\\\'email\\\";i:1;s:5:\\\"utf-8\\\";i:2;s:25:\\\"<p>Contenu de l\\\'email</p>\\\";i:3;s:5:\\\"utf-8\\\";i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"your_email@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:21:\\\"recipient@example.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:16:\\\"Sujet de l\\\'email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2024-09-04 14:45:59', '2024-09-04 14:45:59', NULL),
(9, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:28:\\\"Symfony\\\\Component\\\\Mime\\\\Email\\\":6:{i:0;s:18:\\\"Contenu de l\\\'email\\\";i:1;s:5:\\\"utf-8\\\";i:2;s:25:\\\"<p>Contenu de l\\\'email</p>\\\";i:3;s:5:\\\"utf-8\\\";i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:21:\\\"kangaabel78@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:24:\\\"audreyassoua22@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:16:\\\"Sujet de l\\\'email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2024-09-04 14:53:48', '2024-09-04 14:53:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fdb_id` int(11) DEFAULT NULL,
  `bonapprovisionnement_id` int(11) DEFAULT NULL,
  `uuid` binary(16) DEFAULT NULL COMMENT '(DC2Type:uuid)',
  `message` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `unread` tinyint(1) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recu_caisse`
--

CREATE TABLE IF NOT EXISTS `recu_caisse` (
  `id` int(11) NOT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `bonapprovisionnement_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `montant` varchar(255) DEFAULT NULL,
  `uuid` binary(16) DEFAULT NULL COMMENT '(DC2Type:uuid)',
  `reference` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `beneficiaire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recu_caisse`
--

INSERT INTO `recu_caisse` (`id`, `caisse_id`, `bonapprovisionnement_id`, `date`, `montant`, `uuid`, `reference`, `status`, `beneficiaire`) VALUES
(12, 12, 12, '2024-10-10 00:00:00', '1000000', 0x6b52627ce725475cab231ff437032394, 'N°OSC-RC/2024/001', 'convertit', 'Bénéficiaire 1');

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) NOT NULL,
  `hashed_token` varchar(100) NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE IF NOT EXISTS `societe` (
  `id` int(11) NOT NULL,
  `fonction_id` int(11) DEFAULT NULL,
  `raison_sociale` varchar(255) DEFAULT NULL,
  `forme_juridique` tinytext DEFAULT NULL COMMENT '(DC2Type:json)',
  `activite` varchar(255) DEFAULT NULL,
  `siege_sociale` varchar(255) DEFAULT NULL,
  `adresse_postale` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `site_internet` varchar(255) DEFAULT NULL,
  `code_commerce` varchar(255) DEFAULT NULL,
  `numero_compte_contribuable` varchar(255) DEFAULT NULL,
  `regime_fiscale` varchar(255) DEFAULT NULL,
  `numero_tele_declarant` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `forme` longtext DEFAULT NULL COMMENT '(DC2Type:array)',
  `siege_social` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `societe`
--

INSERT INTO `societe` (`id`, `fonction_id`, `raison_sociale`, `forme_juridique`, `activite`, `siege_sociale`, `adresse_postale`, `ville`, `pays`, `telephone`, `email`, `site_internet`, `code_commerce`, `numero_compte_contribuable`, `regime_fiscale`, `numero_tele_declarant`, `date`, `forme`, `siege_social`) VALUES
(1, 2, 'Offset Consulting', NULL, 'Audit et Conseil en Organisation Management', NULL, '08 BP 2941 Abidjan 08', 'Abidjan', 'Côte d\'Ivoire', '27 22 01 59 71', 'info@offset-consulting.com', 'www.offset-consulting.com', 'No Complet', 'No Complet', 'No Complet', 'No Complet', '2021-01-13 00:00:00', 'a:1:{i:0;s:4:\"SARL\";}', 'Abidjan, Cocody-Mermoz');

-- --------------------------------------------------------

--
-- Structure de la table `tiers`
--

CREATE TABLE IF NOT EXISTS `tiers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_expense`
--

CREATE TABLE IF NOT EXISTS `type_expense` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_expense`
--

INSERT INTO `type_expense` (`id`, `code`, `name`, `status`) VALUES
(1, '605', '605 - Autres achats', ''),
(2, '608', '608 - Achats d\'emballages ', ''),
(3, '610', '610 - Transports', ''),
(4, '621', '621 - Sous traitance générale ', ''),
(5, '622', '622 - Locations et charges locatives ', ''),
(6, '624', '624 - Entretien, réparations et maintenance ', ''),
(7, '626', '626 - Etudes, recherches, et documentation ', ''),
(8, '627', '627 - Publicité, publication, relations publiques', ''),
(9, '628', '628 - Frais de télécommunications', ''),
(10, '632', '632 - Remunérations d\'intermédiaires et de conseils ', ''),
(11, '635', '635 - Cotisations', ''),
(12, '638', '638 - Autres charges externes', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  `is_temporary` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `roles`, `password`, `is_active`, `contact`, `pseudo`, `fonction`, `is_temporary`) VALUES
(1, 'Admin', 'admin2@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$tlkHo/U86C8HrD/KOKHHQeXcawmK.XrSDhiRa234vAsMjg52N3zFq', 1, '01 02 03 04 05', 'admin', 'Développeur', NULL),
(2, 'Caissier', 'caissier@gmail.com', '[\"ROLE_MANAGER\"]', '$2y$13$S9Y7dYqylI7lIMpG.RCOau70klycPOz/umPZMbXgxIsBHO8bUWE.C', 1, '07 08 09 04 05', 'caissier', 'Manager Exe', NULL),
(3, 'Responsable', 'respo@gmail.com', '[\"ROLE_RESPONSABLE\"]', '$2y$13$SsF6aW9qoUcQT42HjG3/.OobRmzh/MTdNDkkQGxVRxu1wtHBCQ9w6', 1, '02 03 05 04 06', 'responsable', 'Responsable Informatique', NULL),
(4, 'User', 'user@gmail.com', '[\"ROLE_USER\"]', '$2y$13$vhMJTWJ8et02Dsy7lZouyeSoUk46wvzuctlKm5nIAsR1GKU6P3PS2', 1, '07 68 23 54 02', 'user', 'Collaborateur Informatique', NULL),
(5, 'Utilisateur', 'print0@gmail.com', '[\"ROLE_IMPRESSION\"]', '$2y$13$g9LpXmiTK.2U1onUPjmGI.lNrTSpCLEvUAQg7f84aZLIcwrEx2dJC', 1, '07 08 09 04 99', 'utilisateur', 'Sécrétaire', NULL),
(21, 'woga', 'user23@gmail.com', '[\"ROLE_MANAGER1\"]', '$2y$13$fmJlXhEAJOM6cS0BzUSoZetZJOG.QVOutFHB8IFPKbCZEypvLTWsC', 1, '01 02 03 04 05', 'woga_8365', 'Manager', NULL),
(22, 'John Joe', 'john@gmail.com', '[\"ROLE_MANAGER\"]', '$2y$13$S9Y7dYqylI7lIMpG.RCOau70klycPOz/umPZMbXgxIsBHO8bUWE.C', 1, '01 45 20 35 68', 'joeJO_0453', 'manager', NULL),
(23, 'Validator', 'validator@gmail.com', '[\"ROLE_RESPONSABLE\"]', '$2y$13$W2ILgzQ2MnN2jnnO2ThDuOVZa3C78B5Ut0c3Nlt3zDW2v/qGzjGWO', 1, '01 01 02 03 04', 'validator_3557', 'Validateur', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appro_caisse`
--
ALTER TABLE `appro_caisse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C12B0312CF066148` (`journee_id`),
  ADD KEY `IDX_C12B0312495F4718` (`caisse_emettrice_id`),
  ADD KEY `IDX_C12B0312BE06C2E7` (`caisse_receptrice_id`),
  ADD KEY `IDX_C12B0312A76ED395` (`user_id`);

--
-- Index pour la table `billetage`
--
ALTER TABLE `billetage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_83E6E9FACF066148` (`journee_id`),
  ADD KEY `IDX_83E6E9FA27B4FEBF` (`caisse_id`),
  ADD KEY `IDX_83E6E9FA1715AECD` (`bonapprovisionnement_id`),
  ADD KEY `IDX_83E6E9FAA76ED395` (`user_id`);

--
-- Index pour la table `bonapprovisionnement`
--
ALTER TABLE `bonapprovisionnement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A4690520A76ED395` (`user_id`),
  ADD KEY `IDX_A469052027B4FEBF` (`caisse_id`),
  ADD KEY `IDX_A4690520C8791E35` (`emeteur_id`),
  ADD KEY `IDX_A469052037E080D9` (`banque_id`),
  ADD KEY `IDX_A469052068B77723` (`tiers_id`),
  ADD KEY `IDX_A4690520CF066148` (`journee_id`);

--
-- Index pour la table `bon_caisse`
--
ALTER TABLE `bon_caisse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A6DF2BF227B4FEBF` (`caisse_id`),
  ADD KEY `IDX_A6DF2BF2BF2BFC3` (`fdb_id`),
  ADD KEY `IDX_A6DF2BF241D81563` (`depense_id`),
  ADD KEY `IDX_A6DF2BF21715AECD` (`bonapprovisionnement_id`);

--
-- Index pour la table `caisse`
--
ALTER TABLE `caisse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B2A353C8A76ED395` (`user_id`);

--
-- Index pour la table `depense`
--
ALTER TABLE `depense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_34059757A76ED395` (`user_id`),
  ADD KEY `IDX_3405975727B4FEBF` (`caisse_id`),
  ADD KEY `IDX_34059757F395DB7B` (`expense_id`),
  ADD KEY `IDX_34059757EE960D5E` (`type_expense_id`);

--
-- Index pour la table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2E067F93BF2BFC3` (`fdb_id`),
  ADD KEY `IDX_2E067F9341D81563` (`depense_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `emeteur`
--
ALTER TABLE `emeteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2D3A8DA6EE960D5E` (`type_expense_id`);

--
-- Index pour la table `fdb`
--
ALTER TABLE `fdb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1136C057A76ED395` (`user_id`),
  ADD KEY `IDX_1136C05727B4FEBF` (`caisse_id`),
  ADD KEY `IDX_1136C057F395DB7B` (`expense_id`),
  ADD KEY `IDX_1136C057EE960D5E` (`type_expense_id`),
  ADD KEY `IDX_1136C057C8791E35` (`emeteur_id`),
  ADD KEY `IDX_1136C057CF066148` (`journee_id`),
  ADD KEY `IDX_1136C057D8228AFF` (`valid_by_id`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `journal_caisse`
--
ALTER TABLE `journal_caisse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_69FB412D27B4FEBF` (`caisse_id`),
  ADD KEY `IDX_69FB412DBF2BFC3` (`fdb_id`),
  ADD KEY `IDX_69FB412D1715AECD` (`bonapprovisionnement_id`),
  ADD KEY `IDX_69FB412D907D10FF` (`recu_caisse_id`),
  ADD KEY `IDX_69FB412DB01D5004` (`bon_caisse_id`),
  ADD KEY `IDX_69FB412DFE72186C` (`appro_caisse_id`);

--
-- Index pour la table `journee`
--
ALTER TABLE `journee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_DC179AED26720BA2` (`last_journee_id`),
  ADD KEY `IDX_DC179AED27B4FEBF` (`caisse_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BF5476CAA76ED395` (`user_id`),
  ADD KEY `IDX_BF5476CABF2BFC3` (`fdb_id`),
  ADD KEY `IDX_BF5476CA1715AECD` (`bonapprovisionnement_id`);

--
-- Index pour la table `recu_caisse`
--
ALTER TABLE `recu_caisse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ADA5DC4A27B4FEBF` (`caisse_id`),
  ADD KEY `IDX_ADA5DC4A1715AECD` (`bonapprovisionnement_id`);

--
-- Index pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Index pour la table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_19653DBD57889920` (`fonction_id`);

--
-- Index pour la table `tiers`
--
ALTER TABLE `tiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_expense`
--
ALTER TABLE `type_expense`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_USERNAME` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appro_caisse`
--
ALTER TABLE `appro_caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `billetage`
--
ALTER TABLE `billetage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bonapprovisionnement`
--
ALTER TABLE `bonapprovisionnement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `bon_caisse`
--
ALTER TABLE `bon_caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `caisse`
--
ALTER TABLE `caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `depense`
--
ALTER TABLE `depense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT pour la table `emeteur`
--
ALTER TABLE `emeteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `fdb`
--
ALTER TABLE `fdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `journal_caisse`
--
ALTER TABLE `journal_caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `journee`
--
ALTER TABLE `journee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `recu_caisse`
--
ALTER TABLE `recu_caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `societe`
--
ALTER TABLE `societe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tiers`
--
ALTER TABLE `tiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_expense`
--
ALTER TABLE `type_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appro_caisse`
--
ALTER TABLE `appro_caisse`
  ADD CONSTRAINT `FK_C12B0312495F4718` FOREIGN KEY (`caisse_emettrice_id`) REFERENCES `caisse` (`id`),
  ADD CONSTRAINT `FK_C12B0312A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_C12B0312BE06C2E7` FOREIGN KEY (`caisse_receptrice_id`) REFERENCES `caisse` (`id`),
  ADD CONSTRAINT `FK_C12B0312CF066148` FOREIGN KEY (`journee_id`) REFERENCES `journee` (`id`);

--
-- Contraintes pour la table `billetage`
--
ALTER TABLE `billetage`
  ADD CONSTRAINT `FK_83E6E9FA1715AECD` FOREIGN KEY (`bonapprovisionnement_id`) REFERENCES `bonapprovisionnement` (`id`),
  ADD CONSTRAINT `FK_83E6E9FA27B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`),
  ADD CONSTRAINT `FK_83E6E9FAA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_83E6E9FACF066148` FOREIGN KEY (`journee_id`) REFERENCES `journee` (`id`);

--
-- Contraintes pour la table `bonapprovisionnement`
--
ALTER TABLE `bonapprovisionnement`
  ADD CONSTRAINT `FK_A469052027B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`),
  ADD CONSTRAINT `FK_A469052037E080D9` FOREIGN KEY (`banque_id`) REFERENCES `banque` (`id`),
  ADD CONSTRAINT `FK_A469052068B77723` FOREIGN KEY (`tiers_id`) REFERENCES `tiers` (`id`),
  ADD CONSTRAINT `FK_A4690520A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_A4690520C8791E35` FOREIGN KEY (`emeteur_id`) REFERENCES `emeteur` (`id`),
  ADD CONSTRAINT `FK_A4690520CF066148` FOREIGN KEY (`journee_id`) REFERENCES `journee` (`id`);

--
-- Contraintes pour la table `bon_caisse`
--
ALTER TABLE `bon_caisse`
  ADD CONSTRAINT `FK_A6DF2BF21715AECD` FOREIGN KEY (`bonapprovisionnement_id`) REFERENCES `bonapprovisionnement` (`id`),
  ADD CONSTRAINT `FK_A6DF2BF227B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`),
  ADD CONSTRAINT `FK_A6DF2BF241D81563` FOREIGN KEY (`depense_id`) REFERENCES `depense` (`id`),
  ADD CONSTRAINT `FK_A6DF2BF2BF2BFC3` FOREIGN KEY (`fdb_id`) REFERENCES `fdb` (`id`);

--
-- Contraintes pour la table `caisse`
--
ALTER TABLE `caisse`
  ADD CONSTRAINT `FK_B2A353C8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `depense`
--
ALTER TABLE `depense`
  ADD CONSTRAINT `FK_3405975727B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`),
  ADD CONSTRAINT `FK_34059757A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_34059757EE960D5E` FOREIGN KEY (`type_expense_id`) REFERENCES `type_expense` (`id`),
  ADD CONSTRAINT `FK_34059757F395DB7B` FOREIGN KEY (`expense_id`) REFERENCES `expense` (`id`);

--
-- Contraintes pour la table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `FK_2E067F9341D81563` FOREIGN KEY (`depense_id`) REFERENCES `depense` (`id`),
  ADD CONSTRAINT `FK_2E067F93BF2BFC3` FOREIGN KEY (`fdb_id`) REFERENCES `fdb` (`id`);

--
-- Contraintes pour la table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `FK_2D3A8DA6EE960D5E` FOREIGN KEY (`type_expense_id`) REFERENCES `type_expense` (`id`);

--
-- Contraintes pour la table `fdb`
--
ALTER TABLE `fdb`
  ADD CONSTRAINT `FK_1136C05727B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`),
  ADD CONSTRAINT `FK_1136C057A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_1136C057C8791E35` FOREIGN KEY (`emeteur_id`) REFERENCES `emeteur` (`id`),
  ADD CONSTRAINT `FK_1136C057CF066148` FOREIGN KEY (`journee_id`) REFERENCES `journee` (`id`),
  ADD CONSTRAINT `FK_1136C057D8228AFF` FOREIGN KEY (`valid_by_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_1136C057EE960D5E` FOREIGN KEY (`type_expense_id`) REFERENCES `type_expense` (`id`),
  ADD CONSTRAINT `FK_1136C057F395DB7B` FOREIGN KEY (`expense_id`) REFERENCES `expense` (`id`);

--
-- Contraintes pour la table `journal_caisse`
--
ALTER TABLE `journal_caisse`
  ADD CONSTRAINT `FK_69FB412D1715AECD` FOREIGN KEY (`bonapprovisionnement_id`) REFERENCES `bonapprovisionnement` (`id`),
  ADD CONSTRAINT `FK_69FB412D27B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`),
  ADD CONSTRAINT `FK_69FB412D907D10FF` FOREIGN KEY (`recu_caisse_id`) REFERENCES `recu_caisse` (`id`),
  ADD CONSTRAINT `FK_69FB412DB01D5004` FOREIGN KEY (`bon_caisse_id`) REFERENCES `bon_caisse` (`id`),
  ADD CONSTRAINT `FK_69FB412DBF2BFC3` FOREIGN KEY (`fdb_id`) REFERENCES `fdb` (`id`),
  ADD CONSTRAINT `FK_69FB412DFE72186C` FOREIGN KEY (`appro_caisse_id`) REFERENCES `appro_caisse` (`id`);

--
-- Contraintes pour la table `journee`
--
ALTER TABLE `journee`
  ADD CONSTRAINT `FK_DC179AED26720BA2` FOREIGN KEY (`last_journee_id`) REFERENCES `journee` (`id`),
  ADD CONSTRAINT `FK_DC179AED27B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`);

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FK_BF5476CA1715AECD` FOREIGN KEY (`bonapprovisionnement_id`) REFERENCES `bonapprovisionnement` (`id`),
  ADD CONSTRAINT `FK_BF5476CAA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_BF5476CABF2BFC3` FOREIGN KEY (`fdb_id`) REFERENCES `fdb` (`id`);

--
-- Contraintes pour la table `recu_caisse`
--
ALTER TABLE `recu_caisse`
  ADD CONSTRAINT `FK_ADA5DC4A1715AECD` FOREIGN KEY (`bonapprovisionnement_id`) REFERENCES `bonapprovisionnement` (`id`),
  ADD CONSTRAINT `FK_ADA5DC4A27B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`);

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `societe`
--
ALTER TABLE `societe`
  ADD CONSTRAINT `FK_19653DBD57889920` FOREIGN KEY (`fonction_id`) REFERENCES `fonction` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
