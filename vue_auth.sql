-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table vue_auth.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pro_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.carts: ~0 rows (approximately)
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;

-- Dumping structure for table vue_auth.category_manages
CREATE TABLE IF NOT EXISTS `category_manages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.category_manages: ~2 rows (approximately)
/*!40000 ALTER TABLE `category_manages` DISABLE KEYS */;
INSERT INTO `category_manages` (`id`, `category_name`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'T-shirt', '1638408492.png', '2021-12-02 01:28:12', '2021-12-03 04:57:13'),
	(3, 'Jents news', '1638894856.jpeg', '2021-12-02 15:23:16', '2021-12-07 16:34:16'),
	(4, 'hello', '1638458609.png', '2021-12-02 15:23:29', '2021-12-02 15:23:29');
/*!40000 ALTER TABLE `category_manages` ENABLE KEYS */;

-- Dumping structure for table vue_auth.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.customers: ~2 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `image`, `created_at`, `updated_at`) VALUES
	(6, 'Alam alam', 'a.b123kwsar@gmail.com', '01858969248', 'police quarter,Feni', '1639415599.png', '2021-12-13 01:23:39', '2021-12-13 17:13:33'),
	(7, 'riya', 'riya@gmal.com', '0185896345', 'police quarter,Feni', '1639415686.jpeg', '2021-12-13 17:14:46', '2021-12-13 17:14:46');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table vue_auth.employe_manages
CREATE TABLE IF NOT EXISTS `employe_manages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.employe_manages: ~3 rows (approximately)
/*!40000 ALTER TABLE `employe_manages` DISABLE KEYS */;
INSERT INTO `employe_manages` (`id`, `name`, `email`, `phone`, `salary`, `image`, `address`, `join_date`, `nid`, `created_at`, `updated_at`) VALUES
	(1, 'a.b123kwsar@gmail.com', 'a.b123kwsar@gmail.com', '01858969248', '234324', 'backend/employe/1637904056.jpeg', 'police quarter,Feni', '2021-11-19', '23432423', '2021-11-26 05:20:56', '2021-12-08 14:37:50'),
	(8, 'hamid hasan', 'a.b123kwsar@gmail.com', '01858969247', '345435', 'backend/employe/1637947302.jpeg', 'police quarter,Feni', '2021-11-24', '435435', '2021-11-26 15:25:48', '2021-11-26 17:21:42');
/*!40000 ALTER TABLE `employe_manages` ENABLE KEYS */;

-- Dumping structure for table vue_auth.expences
CREATE TABLE IF NOT EXISTS `expences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.expences: ~2 rows (approximately)
/*!40000 ALTER TABLE `expences` DISABLE KEYS */;
INSERT INTO `expences` (`id`, `details`, `amount`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'sfdsfdsf', 435435, '1638891032.png', '2021-12-07 15:30:32', '2021-12-07 15:30:32'),
	(3, 'kawsar', 12000, '1638895225.jpeg', '2021-12-07 15:53:19', '2021-12-07 16:40:25'),
	(4, 'Office Rent', 5666, '1639714911.jpeg', '2021-12-17 04:21:52', '2021-12-17 04:21:52');
/*!40000 ALTER TABLE `expences` ENABLE KEYS */;

-- Dumping structure for table vue_auth.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table vue_auth.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2021_11_22_171015_create_employe_manages_table', 2),
	(6, '2021_11_27_134455_create_suppliers_table', 3),
	(7, '2021_12_01_154117_create_category_manages_table', 4),
	(8, '2021_12_03_050747_create_product_manages_table', 5),
	(10, '2021_12_07_141707_create_expences_table', 6),
	(11, '2021_12_08_135402_create_salaries_table', 7),
	(12, '2021_12_10_152157_create_customers_table', 8),
	(13, '2021_12_15_152123_create_carts_table', 9),
	(14, '2021_12_16_042636_create_order_details_table', 10),
	(15, '2021_12_16_042827_create_orders_table', 10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table vue_auth.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.orders: ~2 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `customer_id`, `qty`, `subtotal`, `total`, `vat`, `pay`, `due`, `payby`, `order_date`, `order_month`, `order_year`, `created_at`, `updated_at`) VALUES
	(7, '7', '3', '44543542', '44543542', '0', '4543534534', '34543', 'Hand-Cash', '16-12-2021', '12', '2021', '2021-12-16 16:04:19', '2021-12-16 16:04:19'),
	(8, '7', '3', '1002999', '1002999', '0', '5436456', '45654', 'Hand-Cash', '17-12-2021', '12', '2021', '2021-12-17 04:18:51', '2021-12-17 04:18:51'),
	(9, '6', '3', '45703299', '45703299', '0', '54645456', '45654', 'Bikash', '19-12-2021', '12', '2021', '2021-12-19 13:17:50', '2021-12-19 13:17:50');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table vue_auth.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.order_details: ~8 rows (approximately)
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `product_price`, `sub_total`, `created_at`, `updated_at`) VALUES
	(13, '7', '10', '1', '543543', '543543', '2021-12-16 16:04:19', '2021-12-16 16:04:19'),
	(14, '7', '9', '1', '456456', '456456', '2021-12-16 16:04:19', '2021-12-16 16:04:19'),
	(15, '7', '8', '1', '43543543', '43543543', '2021-12-16 16:04:19', '2021-12-16 16:04:19'),
	(16, '8', '1', '1', '3000', '3000', '2021-12-17 04:18:51', '2021-12-17 04:18:51'),
	(17, '8', '9', '1', '456456', '456456', '2021-12-17 04:18:51', '2021-12-17 04:18:51'),
	(18, '8', '10', '1', '543543', '543543', '2021-12-17 04:18:51', '2021-12-17 04:18:51'),
	(19, '9', '1', '1', '3000', '3000', '2021-12-19 13:17:50', '2021-12-19 13:17:50'),
	(20, '9', '4', '1', '45654654', '45654654', '2021-12-19 13:17:50', '2021-12-19 13:17:50'),
	(21, '9', '5', '1', '45645', '45645', '2021-12-19 13:17:50', '2021-12-19 13:17:50');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

-- Dumping structure for table vue_auth.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table vue_auth.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table vue_auth.product_manages
CREATE TABLE IF NOT EXISTS `product_manages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `root` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supllier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.product_manages: ~8 rows (approximately)
/*!40000 ALTER TABLE `product_manages` DISABLE KEYS */;
INSERT INTO `product_manages` (`id`, `category_id`, `product_name`, `product_code`, `root`, `buying_price`, `selling_price`, `supllier_id`, `buying_date`, `image`, `product_quantity`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Gold Ring One', '2300', 'root', '2000', '3000', '1', '2021-12-22', '1639491863.jpeg', '84', '2021-12-04 13:56:39', '2021-12-19 13:17:50'),
	(4, 3, 'Gold RIng Tow', '34543', 'fdsfds', '45645', '45654654', '4', '2021-12-23', '1639491897.jpeg', '4094', '2021-12-05 15:20:07', '2021-12-19 13:17:50'),
	(5, 3, 'Gold Three', '56456', '456', '54645', '45645', '5', '2021-12-23', '1639491913.jpeg', '52', '2021-12-14 14:08:22', '2021-12-19 13:17:50'),
	(6, 4, 'Gold Four', '5646', '454', '43534', '345435', '4', '2021-12-24', '1639491925.jpeg', '342', '2021-12-14 14:17:59', '2021-12-16 16:00:42'),
	(7, 4, 'Gold Five', '45643', '43543', '43543', '34543', '5', '2022-01-06', '1639491950.jpeg', '345', '2021-12-14 14:18:43', '2021-12-14 14:25:50'),
	(8, 3, 'Gold Six', '54', '45435', '4354354', '43543543', '1', '2021-12-29', '1639492107.jpeg', '53', '2021-12-14 14:28:27', '2021-12-16 16:04:19'),
	(9, 4, 'Gold Seven', '54645', '45654', '45654', '456456', '1', '2021-12-29', '1639492274.jpeg', '643', '2021-12-14 14:31:15', '2021-12-17 04:18:51'),
	(10, 1, 'Gold Eight', '4534', '43543', '543543', '543543', '5', '2021-12-23', '1639492311.jpeg', '543541', '2021-12-14 14:31:51', '2021-12-17 04:18:51'),
	(11, 4, 'Gold Nine', '4353', '4354', '34543', '345', '1', '2021-12-15', '1639492693.jpeg', '0', '2021-12-14 14:38:14', '2021-12-14 14:38:14');
/*!40000 ALTER TABLE `product_manages` ENABLE KEYS */;

-- Dumping structure for table vue_auth.salaries
CREATE TABLE IF NOT EXISTS `salaries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `salary_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.salaries: ~7 rows (approximately)
/*!40000 ALTER TABLE `salaries` DISABLE KEYS */;
INSERT INTO `salaries` (`id`, `employe_id`, `amount`, `salary_date`, `salary_month`, `salary_year`, `created_at`, `updated_at`) VALUES
	(1, '8', 345435, '08', 'Feb', '2021', '2021-12-08 16:39:09', '2021-12-08 16:39:09'),
	(7, '8', 345435, '09', 'Jan', '2021', '2021-12-09 15:47:54', '2021-12-09 15:47:54'),
	(8, '1', 234324, '10', 'Feb', '2021', '2021-12-10 06:00:58', '2021-12-10 06:00:58'),
	(9, '1', 234324, '10', 'Jun', '2021', '2021-12-10 06:02:42', '2021-12-10 06:02:42'),
	(10, '1', 234324, '10', 'Sep', '2021', '2021-12-10 06:03:13', '2021-12-10 06:03:13'),
	(11, '1', 234324, '10', 'Dec', '2021', '2021-12-10 06:04:18', '2021-12-10 06:04:18'),
	(12, '8', 345435, '10', 'Feb', '2021', '2021-12-10 06:05:06', '2021-12-10 11:07:27'),
	(13, '8', 345435, '10', 'Nov', '2021', '2021-12-10 06:06:11', '2021-12-10 06:06:11');
/*!40000 ALTER TABLE `salaries` ENABLE KEYS */;

-- Dumping structure for table vue_auth.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.suppliers: ~2 rows (approximately)
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `image`, `shop_name`, `created_at`, `updated_at`) VALUES
	(1, 'kawsar', 'abulkalam360360@gmail.com', '01858969247', 'police quarter,Feni', '1638025860.jpeg', 'demo shop', '2021-11-27 15:11:00', '2021-11-27 15:11:00'),
	(4, 'nahida', 'nahida@gmail.com', '4543543543', 'dhaka,bangladesh', '1638118231.png', 'new shiop', '2021-11-28 14:10:16', '2021-11-28 16:50:45'),
	(5, 'fdsfds', 'nahid@gmail.com', '43543543543', 'dhaka', '1638407679.png', 'mirha shop', '2021-12-02 01:14:39', '2021-12-02 01:14:39');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;

-- Dumping structure for table vue_auth.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vue_auth.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'kawsar', 'Admin@gmail.com', NULL, '$2y$10$ActMpKoIeD.A17lKf3mD6OnvJSxzX5Np9et9PitIrWezK/yW7FsSG', NULL, NULL, NULL),
	(3, 'Riya', 'Riya@gmail.com', NULL, '$2y$10$TLprR1.x.gLlhalcVXAqru/AH0gEr0X6FVW9hgkmqMfp09/rvjwQi', NULL, NULL, NULL),
	(4, 'hamid hamid', 'tusar@gmail.com', NULL, '$2y$10$sr54cx7lb.rYaB5H4lEo3eAr6as1HLeOGg3amAGQ7hKSuhuSwS7sq', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
