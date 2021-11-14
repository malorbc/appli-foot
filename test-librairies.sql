-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 14 nov. 2021 à 12:00
-- Version du serveur :  10.1.39-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test-librairies`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Match'),
(2, 'Entrainement'),
(3, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `clubrequests`
--

CREATE TABLE `clubrequests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clubrequests`
--

INSERT INTO `clubrequests` (`id`, `user_id`, `club_id`, `created_at`, `updated_at`, `status`) VALUES
(13, 17, 12, '2021-10-15 11:22:50', '2021-10-15 15:07:00', '0'),
(15, 18, 13, '2021-10-19 07:04:07', '2021-10-19 07:04:14', '1'),
(16, 6, 13, '2021-10-20 09:43:24', '2021-10-20 09:43:49', '1'),
(17, 19, 13, '2021-10-20 16:05:38', '2021-10-20 16:06:03', '1');

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sans club', NULL, NULL),
(2, 'Besançon', NULL, NULL),
(3, 'zeg', '2021-10-05 10:46:35', '2021-10-05 10:46:35'),
(4, 'ROMAIN LE BG', '2021-10-05 10:46:54', '2021-10-05 10:46:54'),
(5, 'a', '2021-10-05 10:56:26', '2021-10-05 10:56:26'),
(6, 'aeg', '2021-10-05 10:58:21', '2021-10-05 10:58:21'),
(7, 'jhk', '2021-10-05 10:59:55', '2021-10-05 10:59:55'),
(8, 'ae', '2021-10-05 11:01:24', '2021-10-05 11:01:24'),
(9, 'azeg', '2021-10-05 11:02:07', '2021-10-05 11:02:07'),
(10, 'Yes', '2021-10-05 11:03:20', '2021-10-05 11:03:20'),
(11, 'rr', '2021-10-05 11:05:09', '2021-10-05 11:05:09'),
(12, 'Belfort', '2021-10-05 11:48:55', '2021-10-05 11:48:55'),
(13, 'Sochaux', '2021-10-05 12:29:51', '2021-10-14 18:16:09'),
(14, 'Belforttt', '2021-10-08 06:08:20', '2021-10-08 06:08:20'),
(15, 'Zouz', '2021-10-14 07:43:23', '2021-10-14 07:43:23');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `club_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `categorie_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `description`, `club_id`, `categorie_id`) VALUES
('0224596d-b8a6-4a51-a8cf-a2aef7ce75d7', 'Boum', '2021-10-30T04:05', NULL, 'rip rhizome', 13, 1),
('0622ab67-58e2-4887-bb0a-32d981ff576d', 'aa', '2021-10-06', NULL, 'aaaaa', 1, 1),
('1b619565-44c5-495e-8d42-721ec06855c8', 'aya', '2021-10-07', NULL, NULL, 13, 1),
('1de8e3f5-6e35-4ec4-b222-98876b0dc50a', 'Entrainement au stade Bonal', '2021-10-14T10:00:00+02:00', '2021-10-14T14:30:00+02:00', 'Suspendisse imperdiet metus eget lorem convallis aliquam. Nulla venenatis, justo nec venenatis semper, elit lectus viverra justo, ac suscipit dolor quam in mauris. Fusce condimentum lectus id odio tincidunt, sed sagittis massa porttitor. Ut ornare magna iaculis ligula tempus, ac tristique arcu vestibulum. Etiam pharetra auctor dapibus.', 13, 2),
('2cb61f06-b45d-420a-be5d-8f009775e2e3', 'Rencontre amicale PSG', '2021-10-23T10:00:00+02:00', '2021-10-23T11:30:00+02:00', 'Donec porta, justo ac cursus porttitor, felis mi bibendum velit, sit amet hendrerit dolor purus ut libero. Nullam at mauris sit amet sem scelerisque dictum nec vel lacus. Integer euismod lobortis eros, et rhoncus mi condimentum vel. Mauris sed ex egestas quam auctor mollis. Integer consectetur, nulla eu vestibulum vestibulum, leo turpis bibendum leo, quis sagittis erat massa in diam. Fusce posuere accumsan tortor id tincidunt. ', 13, 1),
('31502722-6365-4c95-8624-e2f2428788f5', 'Anniv trop bien', '2021-12-10T00:00', NULL, 'N\'oublie pas merci', 13, 3),
('40c9448f-7fb7-4b6e-bfd6-0f0286d08aff', 'aef', '2021-10-13', NULL, NULL, 13, 1),
('4fde4af3-dc01-49f5-8d2b-19af8bbc01cd', 'aya', '2021-10-07', NULL, NULL, 13, 1),
('5a8ba17e-a952-4129-9d38-ed8904b1c046', 'lionel', '2021-10-18T10:10:00+02:00', NULL, 'yes', 13, 1),
('836bb7f6-4322-492f-9ce3-fb09c372d741', 'test', '2021-11-03', '2021-11-04', 'description test', 1, 1),
('88d3cde1-8949-4282-8343-921cfcc1d5be', 'z', '2021-10-13', NULL, NULL, 13, 1),
('8c35555a-ed55-4a23-b697-2577202558c4', 'test', '2021-10-14', '2021-10-15', 'description test', 1, 1),
('98565bd1-8c86-49e1-adc5-dcced06be6cc', 'azef', '2021-10-07', NULL, NULL, 13, 1),
('a69d12b9-8010-43b7-8177-ddaf6e3b31cc', 'Tout le monde !!', '2021-10-22', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula sapien. Quisque ac hendrerit ligula, et laoreet nunc. Mauris nisl quam, dictum ut odio eget, iaculis porttitor lacus. Sed et sollicitudin risus, quis tristique enim. Aenean augue neque, consequat non sem sit amet, volutpat vestibulum felis. Phasellus nunc enim, tincidunt vel mauris et, tincidunt rutrum mi. Praesent sodales sem pellentesque nisl volutpat accumsan. Integer in maximus leo. Vestibulum fermentum, quam sed euismod sodales, est risus consectetur magna, id venenatis nisi purus pellentesque urna. Vestibulum ut rhoncus nisl. Morbi laoreet risus lacinia accumsan maximus. Aliquam sed suscipit mauris, eleifend pellentesque nisl. Aenean at tellus vulputate, porta turpis non, suscipit felis. Nullam dui ligula, eleifend eget nunc non, dapibus pellentesque odio. Duis blandit lorem at consectetur malesuada.', 13, 1),
('a9dc9ff0-4425-4e85-8c89-392a2cf3482f', 'pour jean bon', '2021-10-21T10:30', NULL, 'yes', 13, 3),
('b92ff273-fc2d-401d-9c9e-ddbabe92454c', 'test', '2021-10-07', '2021-10-08', 'description test', 1, 1),
('ba34f9fe-6e0f-4e63-b1ca-a783fca17839', 'azef', '2021-10-07', NULL, NULL, 13, 1),
('c8266ab6-4718-45fe-b7af-cb8f77b37adc', 'evt admin', '2021-10-13T10:10:00+02:00', NULL, 'desc', 13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `event_user`
--

CREATE TABLE `event_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `participation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event_user`
--

INSERT INTO `event_user` (`id`, `event_id`, `user_id`, `created_at`, `updated_at`, `participation`) VALUES
(1, '1de8e3f5-6e35-4ec4-b222-98876b0dc50a', 1, '2021-10-06 22:00:00', '2021-10-18 07:34:25', '0'),
(2, '1de8e3f5-6e35-4ec4-b222-98876b0dc50a', 6, NULL, NULL, '0'),
(3, '2cb61f06-b45d-420a-be5d-8f009775e2e3', 1, NULL, '2021-10-20 12:49:02', '0'),
(18, '31502722-6365-4c95-8624-e2f2428788f5', 6, '2021-10-13 11:02:38', '2021-10-27 12:32:04', '0'),
(19, '31502722-6365-4c95-8624-e2f2428788f5', 1, '2021-10-13 11:02:38', '2021-10-27 12:32:20', '1'),
(20, '31502722-6365-4c95-8624-e2f2428788f5', 13, '2021-10-13 11:02:38', '2021-10-13 11:02:38', '0'),
(21, '31502722-6365-4c95-8624-e2f2428788f5', 2, '2021-10-13 11:02:38', '2021-10-13 11:02:38', '0'),
(24, '31502722-6365-4c95-8624-e2f2428788f5', 8, '2021-10-13 11:02:38', '2021-10-13 11:02:38', '0'),
(26, 'c8266ab6-4718-45fe-b7af-cb8f77b37adc', 1, '2021-10-17 06:28:07', '2021-10-19 07:02:12', '0'),
(27, '5a8ba17e-a952-4129-9d38-ed8904b1c046', 5, '2021-10-17 06:46:37', '2021-10-17 06:46:37', '0'),
(28, 'a69d12b9-8010-43b7-8177-ddaf6e3b31cc', 1, '2021-10-20 13:05:05', '2021-10-20 13:19:19', '0'),
(29, 'a69d12b9-8010-43b7-8177-ddaf6e3b31cc', 4, '2021-10-20 13:05:05', '2021-10-20 13:05:05', '0'),
(30, 'a69d12b9-8010-43b7-8177-ddaf6e3b31cc', 13, '2021-10-20 13:05:05', '2021-10-20 13:05:05', '0'),
(31, 'a69d12b9-8010-43b7-8177-ddaf6e3b31cc', 2, '2021-10-20 13:05:05', '2021-10-20 13:05:05', '0'),
(32, 'a69d12b9-8010-43b7-8177-ddaf6e3b31cc', 5, '2021-10-20 13:05:05', '2021-10-20 13:05:05', '0'),
(33, 'a69d12b9-8010-43b7-8177-ddaf6e3b31cc', 6, '2021-10-20 13:05:05', '2021-10-20 13:05:05', '0'),
(34, 'a69d12b9-8010-43b7-8177-ddaf6e3b31cc', 8, '2021-10-20 13:05:05', '2021-10-20 13:05:05', '0'),
(35, 'a69d12b9-8010-43b7-8177-ddaf6e3b31cc', 17, '2021-10-20 13:05:05', '2021-10-20 13:05:05', '0'),
(36, 'a69d12b9-8010-43b7-8177-ddaf6e3b31cc', 18, '2021-10-20 13:05:05', '2021-10-20 13:05:05', '0'),
(37, 'a9dc9ff0-4425-4e85-8c89-392a2cf3482f', 19, '2021-10-20 16:06:46', '2021-10-20 16:07:14', '0'),
(38, 'a9dc9ff0-4425-4e85-8c89-392a2cf3482f', 19, '2021-10-20 16:06:46', '2021-10-20 16:06:46', '0');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(44, '2014_10_12_000000_create_users_table', 1),
(45, '2014_10_12_100000_create_password_resets_table', 1),
(46, '2019_08_19_000000_create_failed_jobs_table', 1),
(47, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(48, '2021_09_17_162447_create_events_table', 1),
(49, '2021_09_20_073825_add_description_to_events', 1),
(50, '2021_09_20_135543_create_category_table', 1),
(51, '2021_09_23_123507_add_columns_to_users', 1),
(52, '2021_09_23_123712_add_surname_to_users', 1),
(53, '2021_10_05_085658_create_clubs_table', 1),
(54, '2021_10_05_090950_add_constraint_to_users', 1),
(55, '2021_10_05_181340_add_constraint_to_events', 2),
(56, '2021_10_07_113809_create_pivot_table_event_user', 3),
(57, '2021_10_07_151011_create_statistiques_table', 4),
(58, '2021_10_08_104134_create_type_table', 5),
(59, '2021_10_08_104224_constraint_to_statistiques', 6),
(60, '2021_10_12_122115_add_image_to_users', 6),
(61, '2021_10_15_105242_create_clubrequests_table', 7),
(64, '2021_10_15_111347_add_status_to_clubrequests', 8),
(65, '2021_10_18_090707_add_participation_to_event_user', 8),
(66, '2021_10_08_130746_create_videos_table', 9);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('lionel@mail.com', '$2y$10$Yp2tdUEQ3B.y52t7OyeefOUTFFzuwiZxs8gNa1LPJP3n6ldqF43by', '2021-10-14 14:55:35'),
('mail@mail.com', '$2y$10$K5HQYyjf2SPbL6h7I4G14ehrRvKHgYqwawUWPc/SZ4QhgxSAG4bF.', '2021-10-14 15:01:41'),
('malo.robic@gmail.com', '$2y$10$nl53.RMPCPss4NbBTr3eaeYjHqjnGJNl7dwyrH7lS/hspJeJXJ8R6', '2021-10-14 15:02:47');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

CREATE TABLE `statistiques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `statistiques`
--

INSERT INTO `statistiques` (`id`, `created_at`, `updated_at`, `value`, `date`, `type`, `user_id`, `type_id`) VALUES
(4, '2021-10-07 16:42:19', '2021-10-07 16:42:19', '9', '2021-10-06', 1, 1, 0),
(8, '2021-10-07 17:07:35', '2021-10-07 17:07:35', '8', '2021-10-08', 1, 1, 0),
(9, '2021-10-07 17:07:49', '2021-10-07 17:07:49', '11', '2021-10-22', 1, 1, 0),
(10, '2021-10-07 17:12:21', '2021-10-07 17:12:21', '15', '2021-11-10', 1, 1, 0),
(11, '2021-10-08 04:07:30', '2021-10-08 04:07:30', '3', '2021-10-09', 1, 1, 0),
(22, '2021-10-10 17:13:17', '2021-10-10 17:13:17', '10', '2021-10-10', 1, 5, 0),
(23, '2021-10-10 17:13:52', '2021-10-10 17:13:52', '15', '2021-10-12', 1, 5, 0),
(24, '2021-10-10 17:14:36', '2021-10-10 17:14:36', '12', '2021-10-14', 1, 5, 0),
(25, '2021-10-11 06:14:44', '2021-10-11 06:14:44', '10', '2021-10-11', 1, 6, 0),
(28, '2021-10-14 07:48:08', '2021-10-14 07:48:08', '5', '2021-10-14', 1, 15, NULL),
(29, '2021-10-20 12:09:49', '2021-10-20 12:09:49', '110', '2021-10-20', 1, 2, NULL),
(30, '2021-10-20 16:07:56', '2021-10-20 16:07:56', '30', '2021-10-20', 1, 19, NULL),
(31, '2021-10-20 16:08:19', '2021-10-20 16:08:19', '30', '2021-10-21', 1, 19, NULL),
(32, '2021-10-27 12:33:54', '2021-10-27 12:33:54', '10', '2021-10-27', 1, 6, NULL),
(33, '2021-10-27 12:34:15', '2021-10-27 12:34:15', '15', '2021-10-28', 1, 6, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `poste` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naissance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `poste`, `naissance`, `role`, `surname`, `club_id`, `image`) VALUES
(1, 'Robic', 'malo.robic@gmail.com', NULL, '$2y$10$2zv.iV8qx9UJ71le2WQ.0uF76WbttGGm.VbXs0UR038Pw/bBIbe7S', 'sGAUPJukud5kzKqK0241frIbTcnjprE29eI7H7cNjBwfzyG2YRcOUegdXSzw', '2021-10-05 07:21:07', '2021-10-07 12:52:12', 'gardien', '2000-08-28', 'staff', 'Malo', 13, 'users/default.png'),
(2, 'Turban', 'autre@joueur.mail', NULL, '$2y$10$7661CMAVbN8bOnGuX3Wo6OJ8h4AXt4IHVNGb.yjVWYL4jIqFW0e8y', NULL, '2021-10-05 14:59:14', '2021-10-05 14:59:37', 'attaquant', '1999-02-18', 'joueur', 'Romain', 13, 'users/default.png'),
(4, 'Malapert', 'pierre@mail.com', NULL, '$2y$10$2zv.iV8qx9UJ71le2WQ.0uF76WbttGGm.VbXs0UR038Pw/bBIbe7S', 'VeXrSlZXeMQDenoooXPuoHw4QS5RQM6HSBdoxWwDAwIL9eUGU71Vi7Fwq2VV', '2021-10-05 07:21:07', '2021-10-05 14:33:29', '', '2000-08-28', 'staff', 'Dupont', 13, 'users/default.png'),
(5, 'Messi', 'lionel@mail.com', NULL, '$2y$10$2zv.iV8qx9UJ71le2WQ.0uF76WbttGGm.VbXs0UR038Pw/bBIbe7S', 'LlVIZQqtfWX99RhHAy6cqVxcakyCwYUlSn3e1ZWcd42aFLTgTIhNS2x7kO59', '2021-10-05 07:21:07', '2021-10-15 11:08:25', 'attaquant', '2000-08-28', 'joueur', 'Lionel', 13, 'users/default.png'),
(6, 'Bartez', 'fabien@mail.com', NULL, '$2y$10$2zv.iV8qx9UJ71le2WQ.0uF76WbttGGm.VbXs0UR038Pw/bBIbe7S', 'VeXrSlZXeMQDenoooXPuoHw4QS5RQM6HSBdoxWwDAwIL9eUGU71Vi7Fwq2VV', '2021-10-05 07:21:07', '2021-10-20 09:43:49', 'gardien', '2000-08-28', 'joueur', 'Fabien', 13, 'users/default.png'),
(7, 'Mbappe', 'dsd@gmail.com', NULL, '$2y$10$tI5nXtVYv2ZPYrE15NaLTezaV.YZg86dgQGmUeXoK77JUlo5Gm2Ya', NULL, '2021-10-08 06:08:03', '2021-10-08 06:08:20', '', '2000-05-15', 'staff', 'Julien', 14, 'users/default.png'),
(8, 'Neymar', 'mail@maail.com', NULL, '$2y$10$EIKaYNORNM9GgCa/PEZ62O7z4Rr0xKJ.R8B2byY9TnSSXp8u99qGO', NULL, '2021-10-08 09:09:42', '2021-10-08 09:09:55', 'défenseur', '2019-10-08', 'joueur', 'Sphéane', 13, 'users/default.png'),
(13, 'turban', 'romain@gmail.com', NULL, '$2y$10$j2E56ESbEGT52/qreXVKdOxy983x.dpCv0rWgJcmur1Rq1ALVR3dW', NULL, '2021-10-13 11:00:36', '2021-10-13 11:00:46', '', '20000-12-10', 'staff', 'Marie', 13, 'users/default.png'),
(15, 'Giroud', 'oskour@mail.com', NULL, '$2y$10$BHz4mDJmE4l.R1Gko6s85uFRuTq0DlcsXTqquvml3as.qHs9OrNT6', NULL, '2021-10-14 07:09:21', '2021-10-14 07:09:21', 'attaquant', '2001-10-10', 'joueur', 'Juliette', 15, 'users/kTAGCg6atMi41QxuY7YCOJZisL4GJhqlN9WcdYoC.png'),
(16, 'GRYNIA', 'alexandre.grynia_1@outlook.com', NULL, '$2y$10$8FGtXItISTCzxT3Vt7vlH.cPmbSgOw/nBvmyDu51OrSyXMnE6qQim', NULL, '2021-10-14 07:42:58', '2021-10-14 07:43:23', '', '1997-02-09', 'joueur', 'Alexandre', 15, 'users/default.png'),
(17, 'jaja', 'jojo@mail.com', NULL, '$2y$10$dlMw/NLBZSfzIewV3rA55.N55GHpn5BfXowlmCKbCl2E2dJJfqFzO', NULL, '2021-10-15 11:10:32', '2021-10-15 11:23:03', 'attaquant', '2001-10-20', 'joueur', 'jojo', 13, 'users/1fSlQwsYB7tuwvwLgur1bb8PGL4wsxzfkfKgq4my.jpg'),
(18, 'lerenard', 'lerenard@mail.com', NULL, '$2y$10$XUFAEj5uHv6CAjCpOVKT6e9YFduaUkC5HLsi2/mtLS8H.PotUpBUi', NULL, '2021-10-19 07:03:09', '2021-10-19 07:04:14', 'attaquant', '1998-10-10', 'joueur', 'fabien', 13, 'users/JgAxcZPBaZcAaJ4ngYiPcRPMyq3GZdmjbzrd7JxZ.png'),
(19, 'pas bon', 'ydtyjd@gmail.com', NULL, '$2y$10$bqAVDhEjvaa77ZSmch7abubcSKQu5QnyiIZWWIuTJrHgwhDA3e55i', NULL, '2021-10-20 16:04:43', '2021-10-20 16:06:03', 'prout', '1738-10-16', 'joueur', 'Jean', 13, 'users/IzEHbPmccKSuRJpq4vUOyP06bxaIyPJJCmjCTEPl.png');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `url`, `title`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/watch?v=NpEaa2P7qZI', 'Replay', '2021-11-14 09:41:42', '2021-11-14 09:41:42'),
(2, 'https://www.youtube.com/watch?v=NpEaa2P7qZI', 'Autre', '2021-11-14 09:42:17', '2021-11-14 09:42:17'),
(3, 'https://www.youtube.com/watch?v=NpEaa2P7qZI', 'Dernière', '2021-11-14 09:48:25', '2021-11-14 09:48:25');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clubrequests`
--
ALTER TABLE `clubrequests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clubrequests_user_id_foreign` (`user_id`),
  ADD KEY `clubrequests_club_id_foreign` (`club_id`);

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_club_id_foreign` (`club_id`),
  ADD KEY `events_categorie_id_foreign` (`categorie_id`);

--
-- Index pour la table `event_user`
--
ALTER TABLE `event_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_user_user_id_foreign` (`user_id`),
  ADD KEY `event_user_event_id_foreign` (`event_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statistiques_user_id_foreign` (`user_id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_club_id_foreign` (`club_id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clubrequests`
--
ALTER TABLE `clubrequests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `event_user`
--
ALTER TABLE `event_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `statistiques`
--
ALTER TABLE `statistiques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clubrequests`
--
ALTER TABLE `clubrequests`
  ADD CONSTRAINT `clubrequests_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`),
  ADD CONSTRAINT `clubrequests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `events_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`);

--
-- Contraintes pour la table `event_user`
--
ALTER TABLE `event_user`
  ADD CONSTRAINT `event_user_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD CONSTRAINT `statistiques_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
