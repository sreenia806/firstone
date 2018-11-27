-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for hrms
DROP DATABASE IF EXISTS `hrms`;
CREATE DATABASE IF NOT EXISTS `hrms` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `hrms`;

-- Dumping structure for table hrms.employees
DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_unit_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pao_id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_appointment` date DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_employee_number_unique` (`employee_number`),
  UNIQUE KEY `employees_pao_id_no_unique` (`pao_id_no`),
  UNIQUE KEY `employees_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.employees: ~3 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `employee_number`, `parent_unit_number`, `pao_id_no`, `first_name`, `last_name`, `date_of_birth`, `date_of_appointment`, `date_of_joining`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, '4325432666', '43254325666', NULL, 'Hari', 'Dornala', '2018-06-05', '2018-06-14', NULL, NULL, NULL, '2018-06-17 14:19:04', '2018-06-17 17:05:53'),
	(2, 'fewqrewq', 'fdsfsa', NULL, 'Padmaja', 'Goli', '2018-06-05', '2018-06-14', NULL, NULL, NULL, '2018-06-17 14:22:29', '2018-06-17 14:22:29'),
	(3, '453254325', '543654365', NULL, 'Gopal', 'Shah', '2018-06-06', '1940-02-08', NULL, NULL, NULL, '2018-06-17 16:11:25', '2018-06-17 16:11:25'),
	(4, '5432543', '54645', NULL, 'Amulya', 'Dornala', '2018-06-06', '2018-06-14', NULL, NULL, NULL, '2018-06-23 13:28:35', '2018-06-23 13:28:35');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;



-- Dumping structure for table hrms.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.migrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_06_16_075609_employee', 2),
	(5, '2018_06_23_154640_create_induction_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table hrms.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table hrms.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Hari', 'hari.dorna@gmail.com', '$2y$10$9RFoeLHuBtBJnYJVzOynie3Xwq9MjpdgCwYh7uNCJ1WbI9sbT7kFS', 'Q1JXZwwjtMj5H8pm7LvxD8ZCCxSyPxNG5nyycMhlpWwAi10pWT8D3EDe0JPv', '2018-06-11 11:37:14', '2018-06-11 11:37:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table hrms.inductions
DROP TABLE IF EXISTS `inductions`;
CREATE TABLE IF NOT EXISTS `inductions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `do_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `induction_date` date NOT NULL,
  `status` enum('NEW','PROCESSED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NEW',
  `created_by` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_inductions_users` (`created_by`),
  CONSTRAINT `FK_inductions_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.inductions: ~0 rows (approximately)
/*!40000 ALTER TABLE `inductions` DISABLE KEYS */;
INSERT INTO `inductions` (`id`, `file_number`, `do_number`, `induction_date`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, '35342/trewt/12-9-2018', '2018-06-05', '2018-06-05', 'NEW', 1, '2018-06-23 17:05:03', '2018-06-23 18:36:32');
/*!40000 ALTER TABLE `inductions` ENABLE KEYS */;


/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
