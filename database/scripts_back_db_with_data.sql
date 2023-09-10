-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2023-09-10 09:27:31
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for drugovich_test
CREATE DATABASE IF NOT EXISTS `drugovich_test` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `drugovich_test`;


-- Dumping structure for table drugovich_test.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(15) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `id_grupo` int DEFAULT NULL,
  `data_fundacao` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_grupo` (`id_grupo`),
  CONSTRAINT `FK_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table drugovich_test.clientes: ~2 rows (approximately)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `cnpj`, `nome`, `id_grupo`, `data_fundacao`) VALUES
	(0000000009, '5454445', 'ivan amado', 3, '2010-05-17'),
	(0000000012, '5454445', 'samile de jesus amado', 3, '2010-05-17'),
	(0000000013, '0221402132121', 'Transportadora Teste', 3, '2010-05-17');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


-- Dumping structure for table drugovich_test.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table drugovich_test.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;


-- Dumping structure for table drugovich_test.gerentes
CREATE TABLE IF NOT EXISTS `gerentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `nivel` int DEFAULT NULL,
  `id_user` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_gerentes_users` (`id_user`),
  CONSTRAINT `FK_gerentes_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table drugovich_test.gerentes: ~2 rows (approximately)
/*!40000 ALTER TABLE `gerentes` DISABLE KEYS */;
INSERT INTO `gerentes` (`id`, `nome`, `email`, `nivel`, `id_user`) VALUES
	(8, 'Ivan Amado Cardoso', 'peacevan@hotmail.com', 2, 1),
	(9, 'Samile De Jesus Amado', 'samile@hotmail.com', 1, 2);
/*!40000 ALTER TABLE `gerentes` ENABLE KEYS */;


-- Dumping structure for table drugovich_test.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table drugovich_test.grupos: ~4 rows (approximately)
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` (`id`, `nome`, `created_at`) VALUES
	(3, 'Grupo Updated', '2023-09-09 21:20:22'),
	(4, 'STARDARD', '2023-09-09 21:20:22'),
	(5, 'VIP', '2023-09-09 21:20:22'),
	(66, 'Grupo de Teste', '2023-09-09 21:20:22'),
	(67, 'Grupo de Teste', '2023-09-09 21:20:22'),
	(68, 'Grupo VI', '2023-09-09 21:19:19'),
	(69, 'Grupo de Teste', '2023-09-09 21:20:22'),
	(70, 'Grupo de Teste', '2023-09-09 21:21:13'),
	(71, 'Grupo de Teste', '2023-09-09 21:21:51'),
	(72, 'Grupo de Teste', '2023-09-09 21:22:39'),
	(73, 'Grupo updated', '2023-09-09 21:24:41'),
	(97, 'Grupo VI', '2023-09-09 22:39:38'),
	(98, 'Grupo Updated', '2023-09-09 22:40:11'),
	(132, 'Grupo de Teste', '2023-09-10 07:45:10'),
	(134, 'Grupo de Teste', '2023-09-10 07:47:14');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;


-- Dumping structure for table drugovich_test.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table drugovich_test.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table drugovich_test.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table drugovich_test.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table drugovich_test.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table drugovich_test.personal_access_tokens: ~4 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 1, 'APP', 'c4718621b9d410cb3de43257ceecf3eb8d92077dc3aaa53daa9c103677e684c6', '["*"]', '2023-09-10 01:39:38', NULL, '2023-09-07 19:23:02', '2023-09-10 01:39:38'),
	(5, 'App\\Models\\User', 1, 'APP', 'f5afdbf4c5d15dbe2bb23447b29db05792f647c5b003fcbee0c3d35d6dd3e35f', '["*"]', '2023-09-10 10:41:02', NULL, '2023-09-10 10:40:44', '2023-09-10 10:41:02');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;


-- Dumping structure for table drugovich_test.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nivel` int DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table drugovich_test.users: ~38 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `nivel`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Ivan Amado Cardoso', 'peacevan@hotmail.com', NULL, 2, '$2y$10$SQkC5qjkx.fuKj5vJcgqauD6aDA4Afnkpin36/gBZCH6ED9eFXQaK', NULL, '2023-09-07 19:07:31', '2023-09-07 19:29:00'),
	(2, 'Sofia de Jesus Amado', 'sofia@hotmail.com', NULL, 1, '$2y$10$ibQQc2o71QCKr6IhVzOtM.eiS5I0E3iIxT6cKYshoT6rqgrdksDmS', NULL, '2023-09-07 19:13:04', '2023-09-07 19:13:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
