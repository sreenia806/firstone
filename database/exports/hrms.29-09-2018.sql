-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for hrms
CREATE DATABASE IF NOT EXISTS `hrms` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `hrms`;


-- Dumping structure for table hrms.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.addresses: ~2 rows (approximately)
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT IGNORE INTO `addresses` (`id`, `address1`, `address2`, `city`, `state`, `pincode`, `created_at`, `updated_at`) VALUES
	(14, 'Flat # 201', 'Fortview Edifice Apartment', 'HYDERABAD', 'TELANGANA', '500084', '2018-09-12 00:59:54', '2018-09-12 01:08:05'),
	(15, 'Flat # 201', 'Fortview Edifice Apartment', 'HYDERABAD', 'TELANGANA', '500084', '2018-09-12 00:59:54', '2018-09-12 01:08:05');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;


-- Dumping structure for table hrms.designations
CREATE TABLE IF NOT EXISTS `designations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.designations: ~18 rows (approximately)
/*!40000 ALTER TABLE `designations` DISABLE KEYS */;
INSERT IGNORE INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'INSPECTOR', '2018-08-11 18:50:36', '2018-08-11 18:50:38'),
	(2, 'SUB-INSPECTOR', '2018-08-09 18:50:41', '2018-08-11 18:50:44'),
	(3, 'ASST-SUB-INSPECTOR', '2018-08-11 18:50:46', '2018-08-11 18:50:48'),
	(4, 'HEAD CONSTABLE', '2018-08-11 18:50:51', '2018-08-11 18:50:53'),
	(5, 'POLICE CONSTABLE', '2018-08-11 18:50:58', '2018-08-11 18:50:56'),
	(6, 'DEPUTY SUPERINTENDENT OF POLICE', '2018-09-11 20:01:45', '2018-09-11 20:01:46'),
	(7, 'SENIOR REPORTER', '2018-09-11 20:01:38', '2018-09-11 20:01:39'),
	(8, 'IGP', '2018-09-11 20:03:05', '2018-09-11 20:03:05'),
	(9, 'COMMANDANT', '2018-09-11 20:03:39', '2018-09-11 20:03:40'),
	(10, 'ASST-COMMANDANT', '2018-09-11 20:04:06', '2018-09-11 20:04:06'),
	(11, 'ADDL-COMMANDANT', '2018-09-11 20:04:52', '2018-09-11 20:04:53'),
	(12, 'ANALYTICAL OFFICER', '2018-09-11 20:05:14', '2018-09-11 20:05:15'),
	(13, 'DEPUTY ANALYTICAL OFFICER', '2018-09-11 20:05:29', '2018-09-11 20:05:30'),
	(14, 'ASST-ANALYTICAL OFFICER', '2018-09-11 20:06:04', '2018-09-11 20:06:04'),
	(15, 'ADMINISTRATIVE OFFICER', '2018-09-11 20:07:04', '2018-09-11 20:10:29'),
	(16, 'OFFICE SUPERINTENDENT', '2018-09-11 20:12:03', '2018-09-11 20:12:04'),
	(17, 'SENIOR ASSISTANT', '2018-09-11 20:12:17', '2018-09-11 20:12:17'),
	(18, 'JUNIOR ASSISTANT', '2018-09-11 20:12:30', '2018-09-11 20:12:30');
/*!40000 ALTER TABLE `designations` ENABLE KEYS */;


-- Dumping structure for table hrms.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_unit_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pao_id_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_appointment` date DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `date_of_repatriation` date DEFAULT NULL,
  `date_of_promotion` date DEFAULT NULL,
  `increment_month` int(11) DEFAULT NULL,
  `aadhar_number` bigint(12) DEFAULT NULL,
  `pan_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caste` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` int(10) DEFAULT NULL,
  `alternate_mobile_number` int(10) DEFAULT NULL,
  `promotion_id` int(10) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank_id` int(10) unsigned DEFAULT NULL,
  `designation_id` int(10) unsigned DEFAULT NULL,
  `nativeunit_id` int(10) unsigned DEFAULT NULL,
  `spouse_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address_id` int(10) unsigned DEFAULT NULL,
  `permanent_address_id` int(10) unsigned DEFAULT NULL,
  `increment_id` int(10) unsigned DEFAULT NULL,
  `gh_unit_id` int(10) unsigned DEFAULT NULL,
  `account_number` int(20) unsigned DEFAULT NULL,
  `bankname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branchname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `micrcode` int(20) DEFAULT NULL,
  `ifsccode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_employee_number_unique` (`employee_number`),
  UNIQUE KEY `employees_pao_id_no_unique` (`pao_id_number`),
  UNIQUE KEY `employees_email_unique` (`email`),
  UNIQUE KEY `aadhar_number` (`aadhar_number`),
  UNIQUE KEY `pan_number` (`pan_number`),
  KEY `FK_employees_ranks` (`rank_id`),
  KEY `employees_present_address_id_foreign` (`present_address_id`),
  KEY `employees_nativeunit_id_foreign` (`nativeunit_id`),
  KEY `employees_permanent_address_id_foreign` (`permanent_address_id`),
  KEY `employees_designation_id_foreign` (`designation_id`),
  KEY `FK_employees_units` (`gh_unit_id`),
  CONSTRAINT `FK_employees_ranks` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_employees_units` FOREIGN KEY (`gh_unit_id`) REFERENCES `units` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `employees_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `employees_nativeunit_id_foreign` FOREIGN KEY (`nativeunit_id`) REFERENCES `nativeunits` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `employees_permanent_address_id_foreign` FOREIGN KEY (`permanent_address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `employees_present_address_id_foreign` FOREIGN KEY (`present_address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.employees: ~4 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT IGNORE INTO `employees` (`id`, `employee_number`, `parent_unit_number`, `pao_id_number`, `first_name`, `last_name`, `date_of_birth`, `date_of_appointment`, `date_of_joining`, `date_of_repatriation`, `date_of_promotion`, `increment_month`, `aadhar_number`, `pan_number`, `photo`, `blood_group`, `caste`, `community`, `category`, `father_name`, `mobile_number`, `alternate_mobile_number`, `promotion_id`, `email`, `remember_token`, `created_at`, `updated_at`, `rank_id`, `designation_id`, `nativeunit_id`, `spouse_name`, `marital_status`, `present_address_id`, `permanent_address_id`, `increment_id`, `gh_unit_id`, `account_number`, `bankname`, `branchname`, `micrcode`, `ifsccode`) VALUES
	(52, '7933', '0', '2557058', 'Padmaja', 'Goli', '1971-08-16', '1999-12-08', '1999-12-08', NULL, NULL, NULL, 32453425, 'AWYPG2194H', '52.jpg', 'AB POSITIVE', 'BC-B', 'PADMASHALI', 'ADMIN STAFF', 'GOLI RAGHAVENDER RAO', NULL, NULL, NULL, NULL, NULL, '2018-09-10 13:49:51', '2018-09-17 13:07:32', 14, 7, 20, 'DORNALA HARI BABU', 'Married', 14, 15, NULL, 23, 801041428, 'ICICI', 'LANGERHOUSE', 50008090, 'ICIC000800'),
	(55, '4393', '343', NULL, 'HARISH', 'POTHARI', '1989-09-16', '2018-04-30', '2018-04-30', NULL, NULL, NULL, NULL, NULL, '55.jpg', NULL, NULL, NULL, 'TSSP', NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-15 09:21:22', '2018-09-15 09:23:40', 10, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(57, '4402', '3434', NULL, 'VINOD KUMAR', 'KOTA', '1989-09-16', '2018-04-30', '2018-04-30', NULL, NULL, NULL, NULL, NULL, '57.jpg', NULL, NULL, NULL, 'TSSP', NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-15 09:21:46', '2018-09-15 09:28:03', 10, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(59, '7643', '0', '2345678', 'VENKATAIAH', 'R', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-17 12:49:58', '2018-09-17 12:49:58', 6, 11, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;


-- Dumping structure for table hrms.employee_induction
CREATE TABLE IF NOT EXISTS `employee_induction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) unsigned NOT NULL,
  `induction_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_induction_employee_id_foreign` (`employee_id`),
  KEY `employee_induction_induction_id_foreign` (`induction_id`),
  CONSTRAINT `employee_induction_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employee_induction_induction_id_foreign` FOREIGN KEY (`induction_id`) REFERENCES `inductions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.employee_induction: ~0 rows (approximately)
/*!40000 ALTER TABLE `employee_induction` DISABLE KEYS */;
INSERT IGNORE INTO `employee_induction` (`id`, `employee_id`, `induction_id`, `created_at`, `updated_at`) VALUES
	(1, 59, 5, '2018-09-17 12:49:58', '2018-09-17 12:49:58');
/*!40000 ALTER TABLE `employee_induction` ENABLE KEYS */;


-- Dumping structure for table hrms.employee_leaves
CREATE TABLE IF NOT EXISTS `employee_leaves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) unsigned NOT NULL,
  `leave_type_id` int(10) unsigned NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `days` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = Unapproved, 1 = Approved',
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_leaves_leave_type_id_foreign` (`leave_type_id`),
  KEY `employee_leaves_emp_id_foriegn` (`emp_id`),
  CONSTRAINT `employee_leaves__leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employee_leaves_emp_id_foriegn` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table hrms.employee_leaves: ~0 rows (approximately)
/*!40000 ALTER TABLE `employee_leaves` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_leaves` ENABLE KEYS */;


-- Dumping structure for table hrms.increments
CREATE TABLE IF NOT EXISTS `increments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) unsigned DEFAULT NULL,
  `increment_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanction_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`employee_id`),
  CONSTRAINT `increment_employee_id_foriegn` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table hrms.increments: ~8 rows (approximately)
/*!40000 ALTER TABLE `increments` DISABLE KEYS */;
INSERT IGNORE INTO `increments` (`id`, `employee_id`, `increment_type`, `reference_number`, `sanction_date`, `created_at`, `updated_at`) VALUES
	(4, 59, 'Promotion', '54353', '2018-08-31', '2018-09-28 13:58:10', '2018-09-28 13:58:10'),
	(5, 59, '6 Years', '54235423', '2018-08-31', '2018-09-28 14:03:57', '2018-09-28 14:03:57'),
	(6, 59, '6 Years', '54235423', '2018-08-31', '2018-09-28 14:04:37', '2018-09-28 14:04:37'),
	(7, 59, '6 Years', '54235423', '2018-08-31', '2018-09-28 14:04:54', '2018-09-28 14:04:54'),
	(8, 59, '6 Years', '54353', '2018-08-30', '2018-09-28 14:05:28', '2018-09-28 14:05:28'),
	(9, 59, 'Promotion', '99999', '2018-08-30', '2018-09-28 14:24:06', '2018-09-28 14:24:06'),
	(11, 52, 'Promotion', 'PPP1234', '2018-09-01', '2018-09-28 14:28:14', '2018-09-29 17:52:23');
/*!40000 ALTER TABLE `increments` ENABLE KEYS */;


-- Dumping structure for table hrms.inductions
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.inductions: ~0 rows (approximately)
/*!40000 ALTER TABLE `inductions` DISABLE KEYS */;
INSERT IGNORE INTO `inductions` (`id`, `file_number`, `do_number`, `induction_date`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
	(4, '1280/A1/GHs/2018', '320', '2018-06-10', 'NEW', 2, '2018-06-28 00:47:04', '2018-06-28 00:47:04'),
	(5, 'C.No123456/A1/GHs/2018', '245', '2018-09-12', 'NEW', 2, '2018-09-15 09:07:11', '2018-09-15 09:07:11');
/*!40000 ALTER TABLE `inductions` ENABLE KEYS */;


-- Dumping structure for table hrms.leaves
CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) unsigned DEFAULT NULL,
  `leave_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_days` int(11) DEFAULT NULL,
  `reference_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanction_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `leave_employee_id_foriegn` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table hrms.leaves: ~0 rows (approximately)
/*!40000 ALTER TABLE `leaves` DISABLE KEYS */;
/*!40000 ALTER TABLE `leaves` ENABLE KEYS */;


-- Dumping structure for table hrms.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.migrations: ~17 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_06_16_075609_employee', 2),
	(5, '2018_06_23_154640_create_induction_table', 3),
	(6, '2018_06_25_203653_create_employee_induction', 4),
	(7, '2018_06_26_034420_create_ranks_table', 4),
	(8, '2018_06_26_034821_add_rank_id_to_employees_table', 5),
	(9, '2018_06_26_095956_create_designations_table', 6),
	(10, '2018_06_26_100831_create_parentunits_table', 7),
	(11, '2018_06_26_102403_add_designation_id_to_employees', 7),
	(12, '2018_06_26_102811_add_parentunit_id_to_employees', 7),
	(13, '2018_06_26_113937_add_induction_id_to_employees', 8),
	(14, '2018_06_26_123907_create_motherunit_table', 9),
	(15, '2018_06_26_131709_create_nativeunits_table', 10),
	(16, '2018_06_26_133129_add_nativeunit_id_to_employees_table', 10),
	(17, '2018_06_26_140747_add_type_to_nativeunits_table', 11),
	(18, '2018_06_26_141927_create_nativeunits_table', 12),
	(19, '2018_06_26_142313_add_nativeunit_id_to_employees_table', 13),
	(20, '2018_07_11_135445_create_addresses_table', 14),
	(21, '2018_07_11_140354_create_address_employee', 14),
	(22, '2018_07_15_120048_add_addresses_to_employee', 15),
	(23, '2018_09_09_120942_create_units_table', 16);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table hrms.nativeunits
CREATE TABLE IF NOT EXISTS `nativeunits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.nativeunits: ~15 rows (approximately)
/*!40000 ALTER TABLE `nativeunits` DISABLE KEYS */;
INSERT IGNORE INTO `nativeunits` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
	(1, '1ST BATTALION,HYDERABAD', 'TSSP', NULL, NULL),
	(2, '2ND BATTALION,EPPALAPALLY', 'TSSP', NULL, NULL),
	(5, '3RD BATTALION', 'TSSP', '2018-06-30 10:56:19', '2018-06-30 10:56:20'),
	(6, '4TH BATTALION', 'TSSP', '2018-07-15 14:58:26', '2018-07-15 14:58:27'),
	(7, '5TH BATTALION', 'TSSP', '2018-07-15 14:59:00', '2018-07-15 14:59:01'),
	(8, '6TH BATTALION', 'TSSP', '2018-07-15 14:59:21', '2018-07-15 14:59:22'),
	(9, '7TH BATTALION', 'TSSP', '2018-07-15 14:59:41', '2018-07-15 14:59:42'),
	(10, '8TH BATTALION', 'TSSP', '2018-07-15 14:59:57', '2018-07-15 14:59:58'),
	(11, '9TH BATTALION', 'TSSP', '2018-07-15 15:00:14', '2018-07-15 15:00:14'),
	(12, '10TH BATTALION', 'TSSP', '2018-07-15 15:02:21', '2018-07-15 15:02:22'),
	(13, '11TH BATTALION', 'TSSP', '2018-07-15 15:02:41', '2018-07-15 15:02:42'),
	(14, '12TH BATTALION', 'TSSP', '2018-07-15 15:03:23', '2018-07-15 15:03:23'),
	(15, '13TH BATTALION', 'TSSP', '2018-07-15 15:03:43', '2018-07-15 15:03:43'),
	(16, '14TH BATTALION', 'TSSP', '2018-07-15 15:04:01', '2018-07-15 15:04:02'),
	(17, '15TH BATTALION', 'TSSP', '2018-07-15 15:04:22', '2018-07-15 15:04:22'),
	(18, '16TH BATTALION', 'TSSP', '2018-07-15 15:04:41', '2018-07-15 15:04:42'),
	(19, '17TH  BATTALION', 'TSSP', '2018-07-15 15:04:41', '2018-07-15 15:04:42'),
	(20, 'GREYHOUNDS', 'GH', '2018-09-11 20:39:56', '2018-09-11 20:39:57'),
	(21, 'PTO', 'PTO', '2018-09-11 20:40:32', '2018-09-11 20:40:33');
/*!40000 ALTER TABLE `nativeunits` ENABLE KEYS */;


-- Dumping structure for table hrms.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT IGNORE INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('padmajaharibabu@gmail.com', '$2y$10$M00BzBb1D0oO1UQxnNvMaeGORkTIcYHUUngnY3kuLKZH98Z9YEKPi', '2018-06-25 12:49:32');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table hrms.promotions
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) unsigned NOT NULL,
  `old_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `new_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_salary` int(11) NOT NULL,
  `new_salary` int(11) NOT NULL,
  `date_of_promotion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `promotions_emp_id_foreign` (`emp_id`),
  CONSTRAINT `promotions_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table hrms.promotions: ~0 rows (approximately)
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;


-- Dumping structure for table hrms.ranks
CREATE TABLE IF NOT EXISTS `ranks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanctioned_strength` int(10) unsigned NOT NULL,
  `actual_strength` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.ranks: ~42 rows (approximately)
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
INSERT IGNORE INTO `ranks` (`id`, `name`, `sanctioned_strength`, `actual_strength`, `created_at`, `updated_at`) VALUES
	(1, 'IGP', 1, 0, NULL, NULL),
	(2, 'DIG', 1, 0, NULL, NULL),
	(3, 'GC', 2, 0, NULL, NULL),
	(4, 'GC(NC)', 1, 0, NULL, NULL),
	(5, 'SQUADRON COMMANDER', 3, 0, NULL, NULL),
	(6, 'ASSAULT COMMANDER ', 11, 0, NULL, NULL),
	(7, 'DEPUTY ASSAULT COMMANDER', 45, 0, NULL, NULL),
	(8, 'ASSISTANT ASSAULT COMMANDER', 104, 0, NULL, NULL),
	(9, 'SENIOR COMMANDO', 317, 0, NULL, NULL),
	(10, 'JUNIOR COMMANDO', 1136, 0, NULL, NULL),
	(11, 'ANALYTICAL OFFICER(INT)', 1, 0, NULL, NULL),
	(12, 'DEPUTY ANALYTICAL OFFICER', 1, 0, NULL, NULL),
	(13, 'ASSISTANT ANALYTICAL OFFICER', 5, 0, NULL, NULL),
	(14, 'SENIOR REPORTER', 2, 0, NULL, NULL),
	(15, 'MEDICAL OFFICER', 3, 0, NULL, NULL),
	(16, 'COMPOUNDER', 3, 0, NULL, NULL),
	(17, 'MID-WIFE', 1, 0, NULL, NULL),
	(18, 'NURSING ORDERLY', 3, 0, NULL, NULL),
	(19, 'ADMINISTRATIVE OFFICER', 1, 0, NULL, NULL),
	(20, 'DEPUTY ASSAULT COMMANDER(PTO)', 1, 0, NULL, NULL),
	(21, 'ASSISTANT ASSAULT COMMANDER(PTO)', 2, 0, NULL, NULL),
	(22, 'SENIOR STENO', 2, 0, NULL, NULL),
	(23, 'OFFICE SUPERINTENDENT', 5, 0, NULL, NULL),
	(24, 'SENIOR ASSISTANT', 9, 0, NULL, NULL),
	(25, 'JUNIOR ASSISTANT', 13, 0, NULL, NULL),
	(26, 'TYPIST', 2, 0, NULL, NULL),
	(27, 'RECORD ASSISTANT', 1, 0, NULL, NULL),
	(28, 'COOKS', 13, 0, NULL, NULL),
	(29, 'ASST.COOKS', 7, 0, NULL, NULL),
	(30, 'SWEEPERS', 11, 0, NULL, NULL),
	(31, 'BARBERS', 2, 0, NULL, NULL),
	(32, 'DHOBIES', 2, 0, NULL, NULL),
	(33, 'ELECTRICIAN', 1, 0, NULL, NULL),
	(34, 'CARPENTER', 1, 0, NULL, NULL),
	(35, 'COBBLER', 1, 0, NULL, NULL),
	(36, 'DOG BOYS', 5, 0, NULL, NULL),
	(37, 'DEPUTY SUPERINTENDENT OF POLICE(COM)', 1, 0, NULL, NULL),
	(38, 'INSPECTOR(COM)', 3, 0, NULL, NULL),
	(39, 'SUB-INSPECTOR(COM)', 13, 0, NULL, NULL),
	(40, 'ASSISTANT-SUB-INSPECTOR(COM)', 10, 0, NULL, NULL),
	(41, 'HEAD CONSTABLE(COM)', 13, 0, NULL, NULL),
	(42, 'POLICE CONSTABLE(COM)', 28, 0, NULL, NULL);
/*!40000 ALTER TABLE `ranks` ENABLE KEYS */;


-- Dumping structure for table hrms.rewards
CREATE TABLE IF NOT EXISTS `rewards` (
  `ID` int(11) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pathakam_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table hrms.rewards: ~0 rows (approximately)
/*!40000 ALTER TABLE `rewards` DISABLE KEYS */;
/*!40000 ALTER TABLE `rewards` ENABLE KEYS */;


-- Dumping structure for table hrms.scales
CREATE TABLE IF NOT EXISTS `scales` (
  `id` int(10) unsigned DEFAULT NULL,
  `short_scale` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_scale` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table hrms.scales: ~0 rows (approximately)
/*!40000 ALTER TABLE `scales` DISABLE KEYS */;
/*!40000 ALTER TABLE `scales` ENABLE KEYS */;


-- Dumping structure for table hrms.units
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.units: ~26 rows (approximately)
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT IGNORE INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'TG-1', '2018-09-09 19:34:53', '2018-09-09 19:34:55'),
	(2, 'TG-2', '2018-09-09 19:35:08', '2018-09-09 19:35:10'),
	(3, 'TG-3', '2018-09-09 19:35:55', '2018-09-09 19:35:56'),
	(4, 'TG-4', '2018-09-09 19:35:48', '2018-09-09 19:36:11'),
	(5, 'TG-5', '2018-09-09 19:36:22', '2018-09-09 19:36:23'),
	(6, 'TG-6', '2018-09-09 19:36:46', '2018-09-09 19:36:47'),
	(7, 'TG-7', '2018-09-09 19:36:58', '2018-09-09 19:36:58'),
	(8, 'TG-8', '2018-09-09 19:37:15', '2018-09-09 19:37:16'),
	(9, 'TG-9', '2018-09-09 19:37:28', '2018-09-09 19:37:29'),
	(10, 'TG-10', '2018-09-09 19:37:38', '2018-09-09 19:37:41'),
	(11, 'TG-11', '2018-09-09 19:38:04', '2018-09-09 19:38:05'),
	(12, 'TG-12', '2018-09-09 19:38:16', '2018-09-09 19:38:16'),
	(13, 'TG-13', '2018-09-09 19:38:26', '2018-09-09 19:38:27'),
	(14, 'TG-14', '2018-09-09 19:38:43', '2018-09-09 19:38:44'),
	(15, 'TG-15', '2018-09-09 19:38:58', '2018-09-09 19:38:59'),
	(16, 'TG-16', '2018-09-09 19:39:09', '2018-09-09 19:39:10'),
	(17, 'TG-17', '2018-09-09 19:39:20', '2018-09-09 19:39:22'),
	(18, 'TG-18', '2018-09-09 19:39:36', '2018-09-09 19:39:37'),
	(19, 'TG-19', '2018-09-09 19:39:45', '2018-09-09 19:39:45'),
	(20, 'TG-20', '2018-09-09 19:39:54', '2018-09-09 19:39:54'),
	(21, 'TRG', '2018-09-09 19:40:18', '2018-09-09 19:40:19'),
	(22, 'BOA', '2018-09-09 19:40:28', '2018-09-09 19:40:29'),
	(23, 'HQR', '2018-09-09 19:41:17', '2018-09-09 19:41:17'),
	(24, 'DSQ', '2018-09-09 19:41:28', '2018-09-09 19:41:29'),
	(25, 'BT', '2018-09-09 19:41:56', '2018-09-09 19:41:57'),
	(26, 'COMM', '2018-09-09 19:42:10', '2018-09-09 19:42:11'),
	(27, 'SW', '2018-09-09 19:42:29', '2018-09-09 19:42:30'),
	(28, 'WEL', '2018-09-09 19:42:40', '2018-09-09 19:42:59'),
	(29, 'HOSPITAL', '2018-09-09 19:43:23', '2018-09-09 19:43:23');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;


-- Dumping structure for table hrms.unittransfers
CREATE TABLE IF NOT EXISTS `unittransfers` (
  `id` int(11) DEFAULT NULL,
  `unit` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table hrms.unittransfers: ~0 rows (approximately)
/*!40000 ALTER TABLE `unittransfers` DISABLE KEYS */;
/*!40000 ALTER TABLE `unittransfers` ENABLE KEYS */;


-- Dumping structure for table hrms.users
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hrms.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Hari', 'hari.dorna@gmail.com', '$2y$10$9RFoeLHuBtBJnYJVzOynie3Xwq9MjpdgCwYh7uNCJ1WbI9sbT7kFS', 'Q1JXZwwjtMj5H8pm7LvxD8ZCCxSyPxNG5nyycMhlpWwAi10pWT8D3EDe0JPv', '2018-06-11 11:37:14', '2018-06-11 11:37:14'),
	(2, 'Padmaja', 'padmajaharibabu@gmail.com', '$2y$10$qTar2Wqcj7JZntUmfPypE.oM2YKcFttrNHGH648ghiGKGVRdL5aKy', '2pZgpIxwQXSxhLTFNGrsDkzhay9UDbtNzT7wmcxCiSgGrQm69hEoRIhHWQjD', '2018-06-24 13:37:14', '2018-06-24 13:37:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
