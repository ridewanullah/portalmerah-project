-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for portalme_portalmerah
CREATE DATABASE IF NOT EXISTS `portalme_portalmerah` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `portalme_portalmerah`;

-- Dumping structure for table portalme_portalmerah.auth_activation_attempts
CREATE TABLE IF NOT EXISTS `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.auth_activation_attempts: ~43 rows (approximately)
/*!40000 ALTER TABLE `auth_activation_attempts` DISABLE KEYS */;
INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
	(1, '192.168.13.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36', '70ffd5cc37ae0bcd79d469b4e284ba95', '2022-07-28 07:27:27'),
	(2, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:43:40'),
	(3, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-08-01 01:51:37'),
	(4, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-08-01 01:51:40'),
	(5, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-08-01 01:51:41'),
	(6, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:45'),
	(7, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:47'),
	(8, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:48'),
	(9, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:49'),
	(10, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:50'),
	(11, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:51'),
	(12, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:51'),
	(13, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:52'),
	(14, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:53'),
	(15, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:54'),
	(16, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:55'),
	(17, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:56'),
	(18, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:57'),
	(19, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:57'),
	(20, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:57'),
	(21, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:57'),
	(22, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:57'),
	(23, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:57'),
	(24, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:58'),
	(25, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:59'),
	(26, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:51:59'),
	(27, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:00'),
	(28, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:00'),
	(29, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:01'),
	(30, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:23'),
	(31, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:24'),
	(32, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:26'),
	(33, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:27'),
	(34, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:27'),
	(35, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:27'),
	(36, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:27'),
	(37, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:28'),
	(38, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:28'),
	(39, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:28'),
	(40, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:29'),
	(41, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:29'),
	(42, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:30'),
	(43, '192.168.13.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '62e04818a3f882a85a046be5a9a1fa49', '2022-08-01 01:52:31');
/*!40000 ALTER TABLE `auth_activation_attempts` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.auth_groups
CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.auth_groups: ~2 rows (approximately)
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Kontrol Penuh'),
	(2, 'author', 'Membuat, Mengedit, dan Menghapus Berita yang Dibuatnya'),
	(3, 'visitor', 'Komen artikel dan mengajukan berita');
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.auth_groups_permissions
CREATE TABLE IF NOT EXISTS `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  `permission_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.auth_groups_permissions: ~3 rows (approximately)
/*!40000 ALTER TABLE `auth_groups_permissions` DISABLE KEYS */;
INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
	(1, 1),
	(1, 2),
	(2, 2);
/*!40000 ALTER TABLE `auth_groups_permissions` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.auth_groups_users
CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.auth_groups_users: ~5 rows (approximately)
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
	(1, 1),
	(2, 5),
	(2, 6),
	(2, 19),
	(2, 21);
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.auth_logins
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.auth_logins: ~109 rows (approximately)
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
	(1, '::1', 'cofranc44@gmail.com', NULL, '2022-06-16 08:53:04', 0),
	(2, '::1', 'Createrorr', NULL, '2022-06-16 08:53:34', 0),
	(3, '::1', 'jokoprakarya@gmail.com', 2, '2022-06-16 08:53:52', 0),
	(4, '::1', 'jokoprakarya@gmail.com', 2, '2022-06-16 08:54:57', 0),
	(5, '::1', 'coba', 3, '2022-06-16 08:55:07', 0),
	(6, '::1', 'cofranc44@gmail.com', 4, '2022-06-16 08:56:08', 0),
	(7, '::1', 'cofranc44@gmail.com', 4, '2022-06-16 10:37:30', 1),
	(8, '::1', 'cofranc44@gmail.com', 4, '2022-06-16 11:12:32', 1),
	(9, '::1', 'cofranc44@gmail.com', 4, '2022-06-16 11:17:28', 1),
	(10, '::1', 'cofranc44@gmail.com', 4, '2022-06-16 11:28:36', 1),
	(11, '::1', 'cofranc44@gmail.com', 4, '2022-06-16 13:25:39', 1),
	(12, '::1', 'cofranc44@gmail.com', 4, '2022-06-16 13:28:45', 1),
	(13, '::1', 'cofranc44@gmail.com', 4, '2022-06-16 13:43:16', 1),
	(14, '::1', 'cofranc44@gmail.com', 4, '2022-06-16 18:22:35', 1),
	(15, '::1', 'cofranc44@gmail.com', 4, '2022-06-17 03:32:24', 1),
	(16, '::1', 'cofranc44@gmail.com', 4, '2022-06-17 18:29:03', 1),
	(17, '::1', 'cofranc', NULL, '2022-06-17 22:23:23', 0),
	(18, '::1', 'cofranc44@gmail.com', 4, '2022-06-17 22:23:48', 1),
	(19, '::1', 'portalmerahnews@gmail.com', 1, '2022-06-18 14:51:16', 1),
	(20, '::1', 'portalmerahnews@gmail.com', 1, '2022-06-22 02:33:07', 1),
	(21, '::1', 'portalmerahnews@gmail.com', 1, '2022-06-26 01:53:18', 1),
	(22, '::1', 'portalmerahnews@gmail.com', 1, '2022-06-27 05:33:23', 1),
	(23, '::1', 'portalmerahnews@gmail.com', 1, '2022-06-27 08:47:17', 1),
	(24, '::1', 'portalmerahnews@gmail.com', 1, '2022-06-27 16:22:24', 1),
	(25, '::1', 'portalmerahnews@gmail.com', 1, '2022-06-27 21:45:59', 1),
	(26, '::1', 'portalmerahnews@gmail.com', 1, '2022-06-28 03:36:42', 1),
	(27, '::1', 'portalmerahnews@gmail.com', 1, '2022-06-28 17:01:30', 1),
	(28, '192.168.1.17', 'portalmerahnews@gmail.com', 1, '2022-06-29 18:42:34', 1),
	(29, '192.168.1.17', 'portalmerahnews@gmail.com', 1, '2022-06-29 19:57:00', 1),
	(30, '192.168.1.10', 'portalmerahnews@gmail.com', 1, '2022-07-01 05:37:45', 1),
	(31, '192.168.1.10', 'portalmerah', NULL, '2022-07-01 07:47:04', 0),
	(32, '192.168.1.10', 'portalmerahnews@gmail.com', 1, '2022-07-01 07:47:12', 1),
	(33, '192.168.1.10', 'portalmerahnews@gmail.com', 1, '2022-07-01 07:49:33', 1),
	(34, '192.168.1.10', 'portalmerahnews@gmail.com', 1, '2022-07-01 10:30:43', 1),
	(35, '192.168.1.10', 'portalmerahnews@gmail.com', 1, '2022-07-03 05:06:57', 1),
	(36, '192.168.1.17', 'portalmerahnews@gmail.com', 1, '2022-07-04 06:40:26', 1),
	(37, '192.168.1.17', 'portalmerahnews@gmail.com', 1, '2022-07-04 06:57:04', 1),
	(38, '192.168.1.10', 'portalmerahnews@gmail.com', 1, '2022-07-04 07:55:30', 1),
	(39, '192.168.1.10', 'portalmerahnews@gmail.com', 1, '2022-07-04 18:34:53', 1),
	(40, '192.168.1.4', 'portalmerahnews@gmail.com', 1, '2022-07-04 20:00:23', 1),
	(41, '192.168.1.10', 'portalmerahnews@gmail.com', 1, '2022-07-04 22:03:37', 1),
	(42, '192.168.1.10', 'portalmerah', 1, '2022-07-11 23:18:33', 0),
	(43, '192.168.1.10', 'portalmerah', 1, '2022-07-11 23:38:38', 0),
	(44, '192.168.1.10', 'portalmerah', 1, '2022-07-11 23:38:53', 0),
	(45, '192.168.1.10', 'portalmerah', 1, '2022-07-11 23:39:07', 0),
	(46, '192.168.1.10', 'portalmerah', 1, '2022-07-11 23:54:37', 0),
	(47, '192.168.1.10', 'portalmerah', 1, '2022-07-12 01:26:54', 0),
	(48, '192.168.1.10', 'portalmerahnews@gmail.com', 1, '2022-07-12 01:27:10', 1),
	(49, '192.168.1.10', 'coba', 2, '2022-07-12 20:57:18', 0),
	(50, '192.168.1.10', 'coba@gmail.com', 5, '2022-07-12 21:04:29', 1),
	(51, '192.168.1.10', 'coba@gmail.com', 5, '2022-07-12 21:06:02', 0),
	(52, '192.168.1.10', 'coba@gmail.com', 5, '2022-07-12 21:06:10', 0),
	(53, '192.168.1.5', 'portalmerahnews@gmail.com', 1, '2022-07-13 02:40:56', 1),
	(54, '192.168.1.5', 'coba', NULL, '2022-07-13 02:41:34', 0),
	(55, '192.168.1.5', 'coba', 5, '2022-07-13 02:41:42', 0),
	(56, '192.168.1.5', 'coba@gmail.com', 5, '2022-07-13 02:42:12', 1),
	(57, '192.168.1.5', 'portalmerahnews@gmail.com', 1, '2022-07-13 02:43:32', 1),
	(58, '192.168.1.5', 'coba@gmail.com', 5, '2022-07-13 02:50:59', 1),
	(59, '192.168.1.5', 'portalmerah', NULL, '2022-07-13 02:58:30', 0),
	(60, '192.168.1.5', 'portalmerahnews@gmail.com', 1, '2022-07-13 02:58:35', 1),
	(61, '192.168.1.5', 'portalmerahnews@gmail.com', 1, '2022-07-13 17:19:45', 1),
	(62, '192.168.1.5', 'portalmerahnews@gmail.com', 1, '2022-07-13 17:49:51', 1),
	(63, '10.42.0.1', 'portalmerahnews@gmail.com', 1, '2022-07-14 06:08:34', 1),
	(64, '10.42.0.1', 'coba1234@gmail.com', 6, '2022-07-14 06:40:37', 1),
	(65, '10.42.0.192', 'portalmerahnews@gmail.com', 1, '2022-07-14 06:55:12', 1),
	(66, '192.168.254.233', 'portalmerahnews@gmail.com', 1, '2022-07-14 07:00:55', 1),
	(67, '10.42.0.1', 'portalmerahnews@gmail.com', 1, '2022-07-14 07:46:33', 1),
	(68, '192.168.254.229', 'coba@gmail.com', 5, '2022-07-14 07:54:19', 1),
	(69, '192.168.254.229', 'portalmerahnews@gmail.com', 1, '2022-07-14 07:55:04', 1),
	(70, '192.168.254.229', 'portalmerahnews@gmail.com', 1, '2022-07-14 08:13:09', 1),
	(71, '192.168.254.229', 'portalmerahnews@gmail.com', 1, '2022-07-14 21:43:24', 1),
	(72, '192.168.254.229', 'coba@gmail.com', 5, '2022-07-14 23:07:31', 1),
	(73, '192.168.254.229', 'portalmerahnews@gmail.com', 1, '2022-07-14 23:08:01', 1),
	(74, '192.168.254.229', 'portalmerahnews@gmail.com', 1, '2022-07-15 08:07:52', 1),
	(75, '192.168.126.233', 'portalmerahnews@gmail.com', 1, '2022-07-16 02:11:32', 1),
	(76, '192.168.16.229', 'portalmerahnews@gmail.com', 1, '2022-07-19 07:46:15', 1),
	(77, '192.168.16.233', 'portalmerahnews@gmail.com', 1, '2022-07-20 10:14:10', 1),
	(78, '192.168.16.233', 'portalmerahnews@gmail.com', 1, '2022-07-20 21:22:55', 1),
	(79, '192.168.16.229', 'portalmerahnews@gmail.com', 1, '2022-07-20 22:36:37', 1),
	(80, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-20 23:06:52', 1),
	(81, '192.168.174.233', 'portalmerahnews@gmail.com', 1, '2022-07-21 02:30:50', 1),
	(82, '192.168.13.233', 'portalmerahnews@gmail.com', 1, '2022-07-21 07:32:07', 1),
	(83, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-25 21:15:50', 1),
	(84, '192.168.13.233', 'portalmerahnews@gmail.com', 1, '2022-07-25 21:25:39', 1),
	(85, '192.168.13.229', 'coba@gmail.com', 5, '2022-07-25 21:29:53', 1),
	(86, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-25 21:32:57', 1),
	(87, '192.168.13.229', 'coba1234@gmail.com', 6, '2022-07-25 21:33:52', 1),
	(88, '192.168.13.229', 'coba', 5, '2022-07-25 21:42:53', 0),
	(89, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-25 21:43:42', 1),
	(90, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-25 23:53:47', 1),
	(91, '192.168.13.234', 'portalmerahnews@gmail.com', 1, '2022-07-26 00:50:00', 1),
	(92, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-26 07:33:28', 1),
	(93, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-26 23:03:20', 1),
	(94, '192.168.13.233', 'portalmerahnews@gmail.com', 1, '2022-07-27 10:03:59', 1),
	(95, '192.168.13.233', 'coba', 5, '2022-07-27 10:06:36', 0),
	(96, '192.168.13.233', 'coba', 5, '2022-07-27 10:09:02', 0),
	(97, '192.168.13.233', 'coba', 5, '2022-07-27 10:14:29', 0),
	(98, '192.168.13.233', 'coba', 5, '2022-07-27 10:14:42', 0),
	(99, '192.168.13.233', 'coba', NULL, '2022-07-27 10:17:07', 0),
	(100, '192.168.13.233', 'coba', 5, '2022-07-27 10:17:21', 0),
	(101, '192.168.13.233', 'coba', 5, '2022-07-27 10:27:15', 0),
	(102, '192.168.13.233', 'portalmerahnews@gmail.com', 1, '2022-07-27 11:04:09', 1),
	(103, '192.168.13.233', 'portalmerahnews@gmail.com', 1, '2022-07-27 11:40:19', 1),
	(104, '192.168.13.233', 'co.franc44@gmail.com', NULL, '2022-07-28 07:22:37', 0),
	(105, '192.168.13.233', 'co.franc44@gmail.com', 18, '2022-07-28 07:23:02', 0),
	(106, '192.168.13.233', 'co.franc44@gmail.com', 18, '2022-07-28 07:24:16', 0),
	(107, '192.168.13.233', 'cofranc44@gmail.com', 19, '2022-07-28 07:27:59', 1),
	(108, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-28 07:33:53', 1),
	(109, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-28 07:52:57', 1),
	(110, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-28 13:22:22', 1),
	(111, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-28 13:37:22', 1),
	(112, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-28 22:19:58', 1),
	(113, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-30 03:16:08', 1),
	(114, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-30 12:06:47', 1),
	(115, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-07-31 10:43:34', 1),
	(116, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-08-01 00:48:47', 1),
	(117, '192.168.13.229', 'junaedi', 16, '2022-08-01 00:54:20', 0),
	(118, '192.168.13.229', 'junaedi171100@gmail.com', 16, '2022-08-01 00:56:06', 0),
	(119, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-08-01 01:06:11', 1),
	(120, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-08-01 01:06:32', 1),
	(121, '192.168.13.229', 'junaedi', 16, '2022-08-01 01:06:59', 0),
	(122, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-08-01 21:16:01', 1),
	(123, '192.168.13.233', 'portalmerahnews@gmail.com', 1, '2022-08-01 21:49:32', 1),
	(124, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-08-02 02:28:52', 1),
	(125, '192.168.13.233', 'cofranc44@gmail.com', NULL, '2022-08-02 06:25:40', 0),
	(126, '192.168.13.233', 'cofranc44@gmail.com', NULL, '2022-08-02 06:25:48', 0),
	(127, '192.168.13.233', 'cofranc44@gmail.com', 19, '2022-08-02 06:26:03', 1),
	(128, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-08-03 05:23:31', 1),
	(129, '192.168.13.229', 'junaedi171100@gmail.com', 21, '2022-08-03 07:45:17', 1),
	(130, '192.168.13.233', 'portalmerahnews@gmail.com', 1, '2022-08-03 08:26:58', 1),
	(131, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-08-03 08:51:58', 1),
	(132, '192.168.13.229', 'junaedi171100@gmail.com', 21, '2022-08-03 08:56:43', 1),
	(133, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-08-03 09:44:41', 1),
	(134, '192.168.13.229', 'portalmerahnews@gmail.com', 1, '2022-08-03 09:53:20', 1),
	(135, '192.168.13.229', 'junaedi171100@gmail.com', 21, '2022-08-03 09:54:37', 1),
	(136, '192.168.159.229', 'portalmerahnews@gmail.com', 1, '2022-08-03 23:47:24', 1),
	(137, '192.168.159.229', 'xxx', 21, '2022-08-04 00:48:00', 0),
	(138, '192.168.159.229', 'xxx', 21, '2022-08-04 00:52:28', 0);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.auth_permissions
CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.auth_permissions: ~2 rows (approximately)
/*!40000 ALTER TABLE `auth_permissions` DISABLE KEYS */;
INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
	(1, 'manage-users', 'Manage All Users'),
	(2, 'manage-profile', 'Setting Profile User');
/*!40000 ALTER TABLE `auth_permissions` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.auth_reset_attempts
CREATE TABLE IF NOT EXISTS `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.auth_reset_attempts: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_reset_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_reset_attempts` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.auth_tokens
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.auth_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.auth_users_permissions
CREATE TABLE IF NOT EXISTS `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `permission_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.auth_users_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_users_permissions` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1655035906, 1),
	(2, '2022-06-14-235044', 'App\\Database\\Migrations\\TblKomen', 'default', 'App', 1655385211, 2),
	(3, '2022-06-14-235050', 'App\\Database\\Migrations\\TblAuthor', 'default', 'App', 1655385211, 2),
	(4, '2022-06-14-235055', 'App\\Database\\Migrations\\TblNewsKategori', 'default', 'App', 1655385211, 2),
	(5, '2022-06-14-235103', 'App\\Database\\Migrations\\TblBerita', 'default', 'App', 1655385211, 2),
	(6, '2022-06-14-235109', 'App\\Database\\Migrations\\TblArtikel', 'default', 'App', 1655385211, 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.tblartikel
CREATE TABLE IF NOT EXISTS `tblartikel` (
  `id_artikel` int(15) NOT NULL AUTO_INCREMENT,
  `link` varchar(250) NOT NULL,
  `news_judul` varchar(200) NOT NULL,
  `news_konten` text NOT NULL,
  `news_gambar` varchar(200) DEFAULT NULL,
  `news_video` varchar(200) NOT NULL,
  `news_traffic` int(20) NOT NULL DEFAULT '0',
  `news_status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_artikel`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.tblartikel: ~4 rows (approximately)
/*!40000 ALTER TABLE `tblartikel` DISABLE KEYS */;
INSERT INTO `tblartikel` (`id_artikel`, `link`, `news_judul`, `news_konten`, `news_gambar`, `news_video`, `news_traffic`, `news_status`, `created_at`, `updated_at`) VALUES
	(32, 'Coba-1-user-xxx', 'Coba 1 user xxx', '<p>Coba 1 user xxx</p>', 'assets/berita/images/Screenshot 2022-07-31 000840_8.png', '', 1, 1, '2022-08-03 12:55:40', '2022-08-04 12:10:40'),
	(33, 'cek-waktu', 'cek waktu', '<p>cek waktu</p>', 'assets/berita/images/Screenshot 2022-08-03 172649_2.png', '', 1, 1, '2022-08-04 00:05:58', '2022-08-04 12:22:48'),
	(35, 'cek-waktu-2', 'cek waktu 2', '<p>cek waktu 2</p>', 'assets/berita/images/Screenshot 2022-08-03 172649_3.png', '', 1, 1, '2022-08-04 12:12:22', '2022-08-04 12:22:45'),
	(36, 'tambah-1', 'tambah 1', '<p>tambah 1</p>', 'assets/berita/images/Screenshot 2022-08-03 172649_4.png', '', 0, 1, '2022-08-04 12:22:20', '2022-08-04 12:22:23');
/*!40000 ALTER TABLE `tblartikel` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.tblberita
CREATE TABLE IF NOT EXISTS `tblberita` (
  `id_berita` int(15) NOT NULL AUTO_INCREMENT,
  `id_artikel` int(15) NOT NULL,
  `id_kategori` int(15) NOT NULL,
  `id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_berita`),
  UNIQUE KEY `id_berita` (`id_berita`),
  KEY `FK_tblberita_tblartikel` (`id_artikel`),
  KEY `FK_tblberita_tblnewskategori` (`id_kategori`),
  KEY `FK_tblberita_users` (`id`),
  CONSTRAINT `FK_tblberita_tblartikel` FOREIGN KEY (`id_artikel`) REFERENCES `tblartikel` (`id_artikel`) ON DELETE CASCADE,
  CONSTRAINT `FK_tblberita_tblnewskategori` FOREIGN KEY (`id_kategori`) REFERENCES `tblnewskategori` (`id_kategori`) ON DELETE CASCADE,
  CONSTRAINT `FK_tblberita_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.tblberita: ~4 rows (approximately)
/*!40000 ALTER TABLE `tblberita` DISABLE KEYS */;
INSERT INTO `tblberita` (`id_berita`, `id_artikel`, `id_kategori`, `id`) VALUES
	(31, 32, 10, 21),
	(32, 33, 12, 1),
	(34, 35, 8, 1),
	(35, 36, 13, 1);
/*!40000 ALTER TABLE `tblberita` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.tbliklan
CREATE TABLE IF NOT EXISTS `tbliklan` (
  `id_iklan` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `iklan_letak` varchar(200) DEFAULT NULL,
  `iklan_gambar` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_iklan`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table portalme_portalmerah.tbliklan: ~18 rows (approximately)
/*!40000 ALTER TABLE `tbliklan` DISABLE KEYS */;
INSERT INTO `tbliklan` (`id_iklan`, `iklan_letak`, `iklan_gambar`) VALUES
	(1, 'Home Atas', NULL),
	(2, 'Home Weekly Top News Pertama', NULL),
	(3, 'Home Whats New', NULL),
	(4, 'Home Potrait Follow Us ', NULL),
	(5, 'Home Weekly Top News Kedua', NULL),
	(6, 'Home Recent Articles', NULL),
	(7, 'Home Bawah', NULL),
	(8, 'Kategori Atas', NULL),
	(9, 'Kategori Potrait Follow Us', NULL),
	(10, 'Kategori Bawah', NULL),
	(11, 'Latest News Atas', NULL),
	(12, 'Latest Potrait News Samping 1', NULL),
	(13, 'Latest Potrait News Samping 2', NULL),
	(14, 'Latest Potrait News Samping 3', NULL),
	(15, 'Latest News Bawah', NULL),
	(16, 'News Atas', NULL),
	(17, 'News Tengah', NULL),
	(18, 'News Potrait Samping', NULL);
/*!40000 ALTER TABLE `tbliklan` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.tblkomen
CREATE TABLE IF NOT EXISTS `tblkomen` (
  `id_komen` int(15) NOT NULL AUTO_INCREMENT,
  `id_artikel` int(15) NOT NULL,
  `komen_isi` text NOT NULL,
  `komen_user` varchar(200) NOT NULL,
  `komen_email` varchar(200) NOT NULL,
  `komen_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_komen`),
  UNIQUE KEY `id_komen` (`id_komen`),
  KEY `FK_tblkomen_tblartikel` (`id_artikel`),
  CONSTRAINT `FK_tblkomen_tblartikel` FOREIGN KEY (`id_artikel`) REFERENCES `tblartikel` (`id_artikel`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.tblkomen: ~0 rows (approximately)
/*!40000 ALTER TABLE `tblkomen` DISABLE KEYS */;
INSERT INTO `tblkomen` (`id_komen`, `id_artikel`, `komen_isi`, `komen_user`, `komen_email`, `komen_status`, `created_at`, `updated_at`) VALUES
	(4, 32, 'waktu', 'waktu', 'waktu@gmail.com', 1, '2022-08-04 12:11:08', '2022-08-04 12:11:08');
/*!40000 ALTER TABLE `tblkomen` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.tblnewskategori
CREATE TABLE IF NOT EXISTS `tblnewskategori` (
  `id_kategori` int(15) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(100) NOT NULL,
  `kategori_deskripsi` text NOT NULL,
  `prioritas` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kategori`),
  UNIQUE KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.tblnewskategori: ~15 rows (approximately)
/*!40000 ALTER TABLE `tblnewskategori` DISABLE KEYS */;
INSERT INTO `tblnewskategori` (`id_kategori`, `kategori_nama`, `kategori_deskripsi`, `prioritas`) VALUES
	(1, 'Umum', 'Umum', 0),
	(2, 'Nasional', 'Nasional', 1),
	(3, 'Daerah', 'Daerah', 0),
	(4, 'Internasional', 'Internasional', 2),
	(5, 'Kriminalitas', 'Kriminalitas', 0),
	(6, 'Hukum', 'Hukum', 0),
	(7, 'Pendidikan', 'Pendidikan', 0),
	(8, 'Olahraga', 'Olahraga', 0),
	(9, 'Ekonomi', 'Ekonomi', 0),
	(10, 'Hobi & Gaya Hidup', 'Hobi & Gaya Hidup', 0),
	(11, 'Otomotif', 'Otomotif', 0),
	(12, 'Keluhan Masyarakat', 'Keluhan Masyarakat', 0),
	(13, 'Hiburan', 'Hiburan', 0),
	(14, 'TNI - POLRI', 'TNI - POLRI', 0);
/*!40000 ALTER TABLE `tblnewskategori` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.tblnewstraffic
CREATE TABLE IF NOT EXISTS `tblnewstraffic` (
  `id_newstraffic` int(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) DEFAULT '',
  `id_artikel` int(15) NOT NULL,
  PRIMARY KEY (`id_newstraffic`) USING BTREE,
  KEY `id_artikel` (`id_artikel`),
  CONSTRAINT `FK_tblnewstraffic_tblartikel` FOREIGN KEY (`id_artikel`) REFERENCES `tblartikel` (`id_artikel`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table portalme_portalmerah.tblnewstraffic: ~2 rows (approximately)
/*!40000 ALTER TABLE `tblnewstraffic` DISABLE KEYS */;
INSERT INTO `tblnewstraffic` (`id_newstraffic`, `ip_address`, `id_artikel`) VALUES
	(21, '192.168.159.229', 32),
	(22, '192.168.159.229', 35),
	(23, '192.168.159.229', 33);
/*!40000 ALTER TABLE `tblnewstraffic` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.tblredaksi
CREATE TABLE IF NOT EXISTS `tblredaksi` (
  `id_redaksi` int(11) NOT NULL AUTO_INCREMENT,
  `susunan_redaksi` text,
  PRIMARY KEY (`id_redaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table portalme_portalmerah.tblredaksi: ~0 rows (approximately)
/*!40000 ALTER TABLE `tblredaksi` DISABLE KEYS */;
INSERT INTO `tblredaksi` (`id_redaksi`, `susunan_redaksi`) VALUES
	(1, '<p style="text-align: center;"><span style="color: rgb(0, 0, 0);">Diterbitkan oleh: <strong>PT AXA GLOBAL MEDIA</strong></span><br><span style="color: rgb(0, 0, 0);"><strong>SK MENKUMHAM</strong>: AHU-0062025.01.11.TAHUN 2021</span><br><span style="color: rgb(0, 0, 0);"><strong>NIB</strong>: 1261000440667 | <strong>NPWP</strong>: 42.041.619.0-622.000</span><br><span style="color: rgb(0, 0, 0);">Redaksi: Jl. Merbabu III, No. 36, Jabon, Banyakan, Kabupaten Kediri &ndash; Jawa Timur,&nbsp;</span><br><span style="color: rgb(0, 0, 0);"><strong>Phone</strong>: +62 8199-8434-678 | <strong>Email</strong>: portalmerahid@gmail.com&nbsp;</span></p>\r\n<table style="border-collapse: collapse; width: 80%; height: 50px; border-width: 0px; margin-left: auto; margin-right: auto;" border="1"><colgroup><col style="width: 50.0319%;"><col style="width: 50.0319%;"></colgroup>\r\n<tbody>\r\n<tr>\r\n<td style="text-align: center; border-width: 0px;"><span style="color: rgb(0, 0, 0);"><strong>Penanggung Jawab:</strong></span><br><span style="color: rgb(0, 0, 0);">Samsul Munir, M.Ag</span></td>\r\n<td style="text-align: center; border-width: 0px;"><span style="color: rgb(0, 0, 0);"><strong>Pemimpin Redaksi:</strong></span><br><span style="color: rgb(0, 0, 0);">Bangkit W. Pratikto. S.S.</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style="text-align: center;"><span style="color: rgb(0, 0, 0);"><strong>Dewan Redaksi:</strong></span><br><span style="color: rgb(0, 0, 0);">Muhamad Heri Santoso</span></p>\r\n<p style="text-align: center;"><span style="color: rgb(0, 0, 0);"><strong>Penasihat Hukum:</strong></span><br><span style="color: rgb(0, 0, 0);">Samsul Munir, M.Ag.</span><br><span style="color: rgb(0, 0, 0);">M. Karim Amrulloh, S.H.</span></p>\r\n<p style="text-align: center;"><span style="color: rgb(0, 0, 0);"><strong>Redaktur Pelaksana:</strong></span><br><span style="color: rgb(0, 0, 0);">Muhammad Nabilul Muttaqin, S.E.</span></p>\r\n<p style="text-align: center;"><span style="color: rgb(0, 0, 0);"><strong>Editor (Rilis + Layout):</strong></span><br><span style="color: rgb(0, 0, 0);">Syarif Hidayatulloh</span></p>\r\n<p style="text-align: center;"><span style="color: rgb(0, 0, 0);"><strong>Koordinator Liputan Nasional:</strong></span><br><span style="color: rgb(0, 0, 0);">Dewan Gustani N.&nbsp;</span></p>\r\n<p style="text-align: center;"><span style="color: rgb(0, 0, 0);"><strong>Kaperwil Jawa Timur:</strong></span><br><span style="color: rgb(0, 0, 0);">&ndash;</span></p>\r\n<p style="text-align: center;"><span style="color: rgb(0, 0, 0);"><strong>Wartawan Liputan Jawa Timur:</strong></span><br><span style="color: rgb(0, 0, 0);">Mohamad Mukhlis</span><br><span style="color: rgb(0, 0, 0);">Syarif Hidayatulloh</span><br><span style="color: rgb(0, 0, 0);">R. Puspitasari</span><br><span style="color: rgb(0, 0, 0);">Mohamad Ikhwan</span><br><span style="color: rgb(0, 0, 0);">Dewan Gustani N.&nbsp;</span></p>\r\n<p style="text-align: center;"><span style="color: rgb(0, 0, 0);"><strong>Koordinator Wilayah Eks. Karasidenan Kediri:</strong></span><br><span style="color: rgb(0, 0, 0);">Syarif Hidayatulloh</span><br><span style="color: rgb(0, 0, 0);">Kantor Wilayah Eks. Karasidenan Kediri: Jalan Merbabu III No. 36 Jabon, Kec. Banyakan, Kabupaten Kediri &ndash; Jawa Timur (64157)</span></p>\r\n<p style="text-align: center;"><span style="color: rgb(0, 0, 0);"><strong>Wartawan Kab./Kota Kediri</strong></span><br><span style="color: rgb(0, 0, 0);">Syarif Hidayatulloh</span><br><span style="color: rgb(0, 0, 0);">R. Puspitasari</span><br><span style="color: rgb(0, 0, 0);">Mohamad Ikhwan</span><br><span style="color: rgb(0, 0, 0);">Dewan Gustani N.</span><br><span style="color: rgb(0, 0, 0);">Mohamad Mukhlis</span></p>');
/*!40000 ALTER TABLE `tblredaksi` ENABLE KEYS */;

-- Dumping structure for table portalme_portalmerah.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `about` text,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table portalme_portalmerah.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `image`, `about`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'portalmerahnews@gmail.com', 'portalmerah', 'Portal Merah', 'assets/author/img/portalmerah.png', 'Media Nasional Portal Merah Mengungkap Fakta Menguak Realita', '$2y$10$Vb7P74mC.BWYXnSqItg8nurOhi5Wk3kwVfADelpL6IybsgUE0u6vK', NULL, NULL, NULL, '3608cf9592ff05f67d1966e1d294a2e1', NULL, NULL, 1, 0, '2022-06-16 08:55:31', '2022-06-16 08:55:31', NULL),
	(5, 'coba@gmail.com', 'coba', NULL, NULL, NULL, '$2y$10$tfXlr8dTy0oQWYO96nDuqeBi0yIskgujFR1oo/jIvWv4xY4Zaoz82', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-12 21:03:17', '2022-08-01 01:51:37', NULL),
	(6, 'coba1234@gmail.com', 'coba1234', NULL, NULL, NULL, '$2y$10$FIsZPRoFnMhuJ1TyYbCO0OUShC.jzfuQc/SXHlJIJGa0jO3hLHIWO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-14 06:40:19', '2022-07-14 06:40:19', NULL),
	(19, 'cofranc44@gmail.com', 'joko', NULL, NULL, NULL, '$2y$10$VpGqTNq66E.h/ZnFD6feKOi2n/mtFgWOHKlLGa/JCK5E58ZGft4VS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-28 07:26:24', '2022-07-28 07:27:29', NULL),
	(21, 'junaedi171100@gmail.com', 'xxx', 'User 1', NULL, 'Mencoba Menulis', '$2y$10$gv.Q9V.kzZyXjZCnDOSGfO7se/iEsRax5RhH25uJkI0IQPhRu6C6q', '45c1f4d5c8d1f2276117b3506c181500', NULL, '2022-08-04 02:46:35', NULL, NULL, NULL, 1, 0, '2022-08-01 01:42:08', '2022-08-04 01:46:35', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
