-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : database
-- Généré le : ven. 07 juin 2024 à 09:05
-- Version du serveur : 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- Version de PHP : 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `orbis_caisse`
--

-- --------------------------------------------------------

--
-- Structure de la table `bonapprovisionnement`
--

CREATE TABLE `bonapprovisionnement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `date` date NOT NULL COMMENT '(DC2Type:date_immutable)',
  `modepaie` varchar(255) NOT NULL,
  `montanttotal` double NOT NULL,
  `nature` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bonapprovisionnement`
--

INSERT INTO `bonapprovisionnement` (`id`, `user_id`, `caisse_id`, `date`, `modepaie`, `montanttotal`, `nature`, `status`, `uuid`, `created_at`, `updated_at`) VALUES
(7, 7, 4, '2024-06-04', 'Espèce', 2000000, 'Outils de bureau', 'validée', '4c4ebb8b-0e1b-4e7b-b819-3706b5c0f4f2', '2024-06-04 11:06:20', NULL),
(8, 10, 4, '2024-06-05', 'Carte', 2000000, 'Outils de bureau', 'validée', '595b07c6-5c86-4059-89b1-f1a07b42a901', '2024-06-05 17:08:25', NULL),
(9, 7, 4, '2024-06-06', 'Espèce', 200, 'Frais', 'validée', '3f669af9-2a5b-42ee-81ad-c164bd4df3c2', '2024-06-06 13:11:08', NULL),
(10, 7, 4, '2024-06-06', 'Espèce', 0, 'réaménagement', 'en attente', '0a4920f5-9b20-4cc2-92f6-8602b356b8c5', '2024-06-06 13:19:46', NULL),
(11, 7, 4, '2024-06-06', 'Espèce', 250, 'Outils de bureau', 'validée', '8a81549b-5790-4670-a5f7-725c58feb181', '2024-06-06 13:21:33', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bon_caisse`
--

CREATE TABLE `bon_caisse` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `fdb_id` int(11) DEFAULT NULL,
  `depense_id` int(11) DEFAULT NULL,
  `bonapprovisionnement_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bon_caisse`
--

INSERT INTO `bon_caisse` (`id`, `date`, `montant`, `uuid`, `reference`, `caisse_id`, `status`, `fdb_id`, `depense_id`, `bonapprovisionnement_id`) VALUES
(6, '2024-06-04 18:25:45', 5000.00, 'yk,jnzbGRHNJY?U', 'FG', 4, 'validée', 9, NULL, NULL),
(13, '2024-06-04 11:11:12', 500000.00, NULL, NULL, 4, 'validée', NULL, 11, NULL),
(14, '2024-06-04 11:11:48', 1200000.00, NULL, NULL, 4, 'validée', NULL, 10, NULL),
(20, '2024-06-04 11:40:46', 5000.00, NULL, NULL, 4, 'validée', NULL, 15, NULL),
(21, '2024-06-04 11:41:57', 2000000.00, NULL, NULL, 4, 'validée', NULL, NULL, 7),
(22, '2024-06-05 08:46:15', 5000.00, NULL, NULL, 4, 'validée', 8, NULL, NULL),
(23, '2024-06-05 09:01:47', 5000.00, NULL, NULL, 4, 'validée', 10, NULL, NULL),
(24, '2024-06-05 17:11:14', 5000.00, NULL, NULL, 4, 'validée', 9, NULL, NULL),
(25, '2024-06-05 17:12:29', 14000.00, NULL, NULL, 4, 'validée', 11, NULL, NULL),
(26, '2024-06-05 17:12:52', 2000000.00, NULL, NULL, 4, 'validée', NULL, NULL, 8),
(27, '2024-06-05 17:13:03', 500000.00, NULL, NULL, 4, 'validée', NULL, 16, NULL),
(28, '2024-06-06 10:33:19', 32000.00, NULL, NULL, 4, 'validée', 7, NULL, NULL),
(29, '2024-06-06 12:55:18', 500000.00, NULL, NULL, 4, 'validée', NULL, 17, NULL),
(30, '2024-06-06 13:13:49', 200.00, NULL, NULL, 4, 'validée', NULL, NULL, 9),
(31, '2024-06-06 13:22:08', 250.00, NULL, NULL, 4, 'validée', NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

CREATE TABLE `caisse` (
  `id` int(11) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `responsable` varchar(255) DEFAULT NULL,
  `soldedispo` decimal(10,2) DEFAULT NULL,
  `plafond` decimal(10,2) NOT NULL,
  `gerant` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `caisse`
--

INSERT INTO `caisse` (`id`, `intitule`, `responsable`, `soldedispo`, `plafond`, `gerant`, `code`) VALUES
(4, 'Caisse Principale', NULL, 6807450.00, 10000000.00, 'Gérante', 'CP');

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE `depense` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `montant` double NOT NULL,
  `category` varchar(255) NOT NULL,
  `modepaie` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `type_expense_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `depense`
--

INSERT INTO `depense` (`id`, `user_id`, `caisse_id`, `date`, `montant`, `category`, `modepaie`, `status`, `uuid`, `created_at`, `updated_at`, `expense_id`, `type_expense_id`, `total`) VALUES
(10, 7, 4, '2024-06-04 00:00:00', 1200000, 'Entretien Climatisation', 'Espèce', 'validée', 'da524ef1-dd41-4a5a-b626-8a533602ff8d', '2024-06-04 11:08:11', NULL, NULL, NULL, NULL),
(11, 7, 4, '2024-06-04 00:00:00', 500000, 'Transport', 'Espèce', 'validée', 'dc0907f6-a105-4882-83e1-a00982702237', '2024-06-04 11:10:28', NULL, NULL, NULL, NULL),
(14, 7, 4, '2024-06-04 00:00:00', 500000, 'Entretien Climatisation', 'Carte', 'en attente', '8321a6b2-0d9e-4956-b7b7-ca9b0f23a613', '2024-06-04 11:39:21', NULL, NULL, NULL, NULL),
(15, 7, 4, '2024-06-04 00:00:00', 5000, 'Vente', 'Espèce', 'validée', '6b487f1a-6d2b-4442-b321-25679091f76a', '2024-06-04 11:39:47', NULL, NULL, NULL, NULL),
(16, 10, 4, '2024-06-05 00:00:00', 500000, 'Entretien Climatisation', 'Chèque', 'validée', 'f925c744-d299-4a9a-ad74-2f7c9a3a6b74', '2024-06-05 17:09:00', NULL, NULL, NULL, NULL),
(17, 7, 4, '2024-06-06 00:00:00', 500000, 'Transport', 'Espèce', 'validée', '1a8500ef-3aa0-49a7-8a61-cadbf28d32a7', '2024-06-06 12:53:59', NULL, NULL, NULL, 5000.00);

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `fdb_id` int(11) DEFAULT NULL,
  `designationproduit` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `depense_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `detail`
--

INSERT INTO `detail` (`id`, `fdb_id`, `designationproduit`, `quantite`, `price`, `montant`, `depense_id`) VALUES
(5, 7, 'Droit d\'enregistrement', 1, 25000, 25000, NULL),
(6, 7, 'Timbres', 2, 1000, 2000, NULL),
(7, 7, 'Transport', 1, 5000, 5000, NULL),
(8, NULL, 'Remboursement frais de dépôt', 1, 10000, 10000, NULL),
(9, 8, 'Achat de carburant pour transport à Sara Petroleum', 1, 5000, 5000, NULL),
(10, NULL, 'Outils de bureau', 1, 2000000, 2000000, NULL),
(11, 9, 'Transport', 1, 5000, 5000, NULL),
(12, 10, 'Transport', 1, 5000, 5000, NULL),
(13, 11, 'Transport', 1, 5000, 5000, NULL),
(14, 11, 'Timbres', 2, 1000, 2000, NULL),
(15, 11, 'Achat d\'encres Laser Pro ject', 1, 7000, 7000, NULL),
(16, NULL, 'Outils de bureau', 1, 2000000, 2000000, NULL),
(17, 14, 'Transport', 1, 5000, 5000, NULL),
(18, 15, 'Transport', 1, 5000, 5000, NULL),
(19, NULL, 'Transport', 1, 5000, 5000, 17);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240514135139', '2024-06-07 09:04:37', 3),
('DoctrineMigrations\\Version20240516142734', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240522142211', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240523085218', '2024-06-07 09:04:37', 9),
('DoctrineMigrations\\Version20240523113416', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240523114745', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240523115327', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240523120913', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240523134035', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240523135444', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240523135732', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240523140141', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240523141026', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240523141502', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240523163130', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240524165516', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240527090028', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240527170543', '2024-06-07 09:04:37', 0),
('DoctrineMigrations\\Version20240527170925', '2024-06-07 09:04:37', 0);

-- --------------------------------------------------------

--
-- Structure de la table `emeteur`
--

CREATE TABLE `emeteur` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emeteur`
--

INSERT INTO `emeteur` (`id`, `name`) VALUES
(1, 'Konan Bertrand'),
(2, 'Mahile Emmanuel'),
(3, 'Otron André'),
(4, 'Wognin');

-- --------------------------------------------------------

--
-- Structure de la table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type_expense_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `expense`
--

INSERT INTO `expense` (`id`, `code`, `name`, `type_expense_id`) VALUES
(1, 'TPA', 'Achat Carburant', 1),
(2, 'TPD', 'Déplacement', 1),
(3, 'PVE', 'PV des états financiers', 2);

-- --------------------------------------------------------

--
-- Structure de la table `fdb`
--

CREATE TABLE `fdb` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `numero_fiche_besoin` varchar(20) NOT NULL,
  `date` date NOT NULL COMMENT '(DC2Type:date_immutable)',
  `objet` varchar(255) NOT NULL,
  `destinataire` varchar(255) NOT NULL,
  `departement` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `uuid` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `beneficiaire` varchar(255) DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `type_expense_id` int(11) DEFAULT NULL,
  `emeteur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fdb`
--

INSERT INTO `fdb` (`id`, `user_id`, `numero_fiche_besoin`, `date`, `objet`, `destinataire`, `departement`, `status`, `caisse_id`, `uuid`, `created_at`, `updated_at`, `total`, `beneficiaire`, `expense_id`, `type_expense_id`, `emeteur_id`) VALUES
(7, 7, 'N°OSC/2024/001', '2024-06-04', 'Paiement de droits d\'enregistrement du PV des états financiers OSC 2023', 'Konan Gwladys', NULL, 'validée', 4, 'b4888d2c-7e5e-4ac1-8648-3a0419c26490', '2024-06-04 10:26:53', NULL, 32000.00, 'Impôts', NULL, NULL, NULL),
(8, 7, 'N°OSC/2024/002', '2024-06-04', 'Achat de carburant pour transport à Sara Petroleum', 'Konan Gwladys', NULL, 'validée', 4, '113759e5-bc32-43b2-978c-2ce12bad676f', '2024-06-04 10:43:39', NULL, 5000.00, 'Otron André', NULL, NULL, NULL),
(9, 2, 'N°OSC/2024/009', '2024-06-04', 'Transport', 'Konan Gwladys', NULL, 'validée', 4, 'f8b3c734-f33e-429f-98b0-dc713f5fe0fe', '2024-06-04 18:21:38', NULL, 5000.00, 'Odou Charbel', NULL, NULL, NULL),
(10, 8, 'N°OSC/2024/010', '2024-06-04', 'Transport', 'Konan Gwladys', NULL, 'validée', 4, 'd1d47c18-4f2e-4d91-ab0a-b9f94054da83', '2024-06-04 18:24:20', NULL, 5000.00, 'Odou Charbel', NULL, NULL, NULL),
(11, 10, 'N°OSC/2024/011', '2024-06-05', 'Paiement de droits d\'enregistrement du PV des états financiers OSC 2023', 'Konan Gwladys', NULL, 'validée', 4, '9fa51c46-8e99-4a9f-9455-2cbf9fe736e1', '2024-06-05 17:03:17', NULL, 14000.00, 'Impôts', NULL, NULL, NULL),
(12, 7, 'N°OSC/2024/012', '2024-06-05', 'Transport', 'Konan Gwladys', NULL, 'en attente', 4, '0cce5c75-9a95-4cec-83a8-56acd923232c', '2024-06-05 18:53:34', NULL, 0.00, 'Impôts', NULL, NULL, NULL),
(13, 7, 'N°OSC/2024/013', '2024-05-29', 'Transport', 'Konan Gwladys', NULL, 'en attente', 4, 'd30f7e01-552f-42ae-b227-0126b46ae0ec', '2024-06-05 18:54:01', NULL, 0.00, 'Impôts', NULL, NULL, 1),
(14, 7, 'N°OSC/2024/014', '2024-06-05', 'Transport', 'Konan Gwladys', NULL, 'en attente', 4, 'ef124efe-beba-48b4-a00c-85c3defc3778', '2024-06-05 19:01:16', NULL, 5000.00, 'Odou Charbel', NULL, NULL, NULL),
(15, 7, 'N°OSC/2024/014', '2024-06-05', 'Transport', 'Konan Gwladys', NULL, 'en attente', 4, '676571c2-002d-4f01-862e-80fcc18d50e0', '2024-06-05 19:02:00', NULL, 5000.00, 'Odou Charbel', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `journee`
--

CREATE TABLE `journee` (
  `id` int(11) NOT NULL,
  `caisse_id` int(11) NOT NULL,
  `started_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `active` tinyint(1) NOT NULL,
  `close_at` datetime DEFAULT NULL,
  `debit` decimal(10,2) DEFAULT NULL,
  `credit` decimal(10,2) DEFAULT NULL,
  `solde` decimal(10,2) DEFAULT NULL,
  `last_solde` decimal(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_expense`
--

CREATE TABLE `type_expense` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_expense`
--

INSERT INTO `type_expense` (`id`, `code`, `name`) VALUES
(1, 'TP', 'Transport'),
(2, 'PV', 'Droit d\'enregistrement des PV');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `roles`, `password`, `caisse_id`, `is_active`, `contact`, `pseudo`) VALUES
(1, 'Admin', 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$YxFJrdpqTbrOUBYqQBpoTeOXsqYzUFmRz5ha8jl84HxXxaaiyAJea', 4, 1, '07 60 20 10 50', 'Admin'),
(2, 'super_admin', 'superadmin@gmail.com', '[\"ROLE_ADMIN\",\"ROLE_MANAGER\",\"ROLE_USER\"]', '$2y$13$w71k/p.2bASUsQIxnXUDReTyZC2kmWhHbtgI6eZonJ44KxJm0uIa6', NULL, 1, '07 60 20 10 60', 'Super Admin'),
(6, 'Caissier', 'caissier@gmail.com', '[\"ROLE_MANAGER\"]', '$2y$13$lkqAM5zEp26He/Qk/OIncOLEQD1Zdd/S8L.bwyilrIOniAebxrtWC', 4, 1, '07 60 20 10 70', 'Caissier'),
(7, 'User', 'user@gmail.com', '[\"ROLE_USER\"]', '$2y$13$8VlZhabroExi4DNVtTvz.OdMGOM2Z84K3U.3gmjn0pTS8MvJrgGCO', 4, 1, '07 60 20 10 80', 'User'),
(8, 'abel', 'kangaabel78@gmail.com', '[\"ROLE_USER\"]', '$2y$13$22OB6MvCFLbCJ/Qy5LcCgONMuWOEpQBNL9J/aLu.79QJ3d0crQ1lO', 4, 1, '07 68 23 50 66', 'belo'),
(10, 'abel2', 'abel@gmail.com', '[\"ROLE_USER\"]', '$2y$13$Cr7axsi5D3gFz1wJioSzt.XZu4Nypkri4w8upuq/pM70.qtHU9bHO', NULL, 1, '07 60 20 10 11', 'abel2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bonapprovisionnement`
--
ALTER TABLE `bonapprovisionnement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A4690520A76ED395` (`user_id`),
  ADD KEY `IDX_A469052027B4FEBF` (`caisse_id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `IDX_1136C057C8791E35` (`emeteur_id`);

--
-- Index pour la table `journee`
--
ALTER TABLE `journee`
  ADD PRIMARY KEY (`id`),
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
-- Index pour la table `type_expense`
--
ALTER TABLE `type_expense`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`),
  ADD KEY `IDX_8D93D64927B4FEBF` (`caisse_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bonapprovisionnement`
--
ALTER TABLE `bonapprovisionnement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `bon_caisse`
--
ALTER TABLE `bon_caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `caisse`
--
ALTER TABLE `caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `depense`
--
ALTER TABLE `depense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `emeteur`
--
ALTER TABLE `emeteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `fdb`
--
ALTER TABLE `fdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `journee`
--
ALTER TABLE `journee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_expense`
--
ALTER TABLE `type_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bonapprovisionnement`
--
ALTER TABLE `bonapprovisionnement`
  ADD CONSTRAINT `FK_A469052027B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`),
  ADD CONSTRAINT `FK_A4690520A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `bon_caisse`
--
ALTER TABLE `bon_caisse`
  ADD CONSTRAINT `FK_A6DF2BF21715AECD` FOREIGN KEY (`bonapprovisionnement_id`) REFERENCES `bonapprovisionnement` (`id`),
  ADD CONSTRAINT `FK_A6DF2BF227B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`),
  ADD CONSTRAINT `FK_A6DF2BF241D81563` FOREIGN KEY (`depense_id`) REFERENCES `depense` (`id`),
  ADD CONSTRAINT `FK_A6DF2BF2BF2BFC3` FOREIGN KEY (`fdb_id`) REFERENCES `fdb` (`id`);

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
  ADD CONSTRAINT `FK_1136C057EE960D5E` FOREIGN KEY (`type_expense_id`) REFERENCES `type_expense` (`id`),
  ADD CONSTRAINT `FK_1136C057F395DB7B` FOREIGN KEY (`expense_id`) REFERENCES `expense` (`id`);

--
-- Contraintes pour la table `journee`
--
ALTER TABLE `journee`
  ADD CONSTRAINT `FK_DC179AED27B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64927B4FEBF` FOREIGN KEY (`caisse_id`) REFERENCES `caisse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
