-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 10:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasesib`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2024_02_02_014045_create_permission_tables', 1),
(4, '2024_02_02_014343_create_products_table', 2),
(5, '2014_10_12_100000_create_password_resets_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 11),
(1, 'App\\User', 12),
(3, 'App\\User', 13),
(3, 'App\\User', 14),
(3, 'App\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2024-02-01 19:31:47', '2024-02-01 19:31:47'),
(2, 'role-create', 'web', '2024-02-01 19:31:47', '2024-02-01 19:31:47'),
(3, 'role-edit', 'web', '2024-02-01 19:31:47', '2024-02-01 19:31:47'),
(4, 'role-delete', 'web', '2024-02-01 19:31:47', '2024-02-01 19:31:47'),
(5, 'product-list', 'web', '2024-02-01 19:31:47', '2024-02-01 19:31:47'),
(6, 'product-create', 'web', '2024-02-01 19:31:47', '2024-02-01 19:31:47'),
(7, 'product-edit', 'web', '2024-02-01 19:31:47', '2024-02-01 19:31:47'),
(8, 'product-delete', 'web', '2024-02-01 19:31:47', '2024-02-01 19:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Jack The Ripper', 'Killer Paradox', '2024-02-11 19:37:44', '2024-02-11 19:37:44'),
(2, 'Black Angus', 'Daging Sapi Asal Amerika Serikat', '2024-02-14 22:27:08', '2024-02-14 22:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-02-01 19:34:28', '2024-02-01 19:34:28'),
(3, 'User', 'web', '2024-02-11 21:25:53', '2024-02-11 21:25:53'),
(6, 'Other', 'web', '2024-02-15 23:33:21', '2024-02-15 23:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(1, 6),
(2, 1),
(2, 6),
(3, 1),
(3, 3),
(4, 1),
(5, 1),
(5, 3),
(5, 6),
(6, 1),
(6, 6),
(7, 1),
(7, 3),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_action`
--

CREATE TABLE `tb_action` (
  `id_action` int(11) NOT NULL,
  `kode_action` int(11) NOT NULL,
  `action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_action`
--

INSERT INTO `tb_action` (`id_action`, `kode_action`, `action`) VALUES
(1, 1, 'Insert'),
(2, 2, 'Update'),
(3, 3, 'Delete');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soft_delete` int(11) NOT NULL,
  `log_user1` int(11) NOT NULL,
  `log_user2` int(11) NOT NULL,
  `last_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `id_jenis`, `created_at`, `updated_at`, `soft_delete`, `log_user1`, `log_user2`, `last_action`) VALUES
(1, '01', 'Ga Baik', 5, '2024-02-26 20:07:01', '2024-05-21 04:10:26', 1, 1, 1, 3),
(2, '02', 'Apapun', 5, '2024-02-27 01:19:36', '2024-05-21 04:10:47', 1, 1, 1, 3),
(3, '03', 'Rusak', 6, '2024-03-22 02:44:49', '2024-03-22 02:44:49', 0, 1, 1, 1),
(4, '04', 'Meja Setengah Biro', 12, '2024-05-21 03:34:00', '2024-05-21 03:34:00', 0, 1, 1, 1),
(5, '01', 'Komputer 1', 6, '2024-05-21 04:13:23', '2024-05-21 04:15:01', 0, 1, 1, 2),
(6, '02', 'Kursi Goyang', 7, '2024-05-21 04:14:26', '2024-05-21 04:14:51', 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailkartu`
--

CREATE TABLE `tb_detailkartu` (
  `id_detailkartu` int(11) NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL COMMENT 'tahun pembelian',
  `id_anggaran` int(11) NOT NULL,
  `no_urut` varchar(11) NOT NULL,
  `jumlah_barang` varchar(255) NOT NULL,
  `kondisi_barang` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soft_delete` int(11) NOT NULL,
  `log_user1` int(11) NOT NULL,
  `log_user2` int(11) NOT NULL,
  `last_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detailkartu`
--

INSERT INTO `tb_detailkartu` (`id_detailkartu`, `id_kartu`, `id_barang`, `id_tahun`, `id_anggaran`, `no_urut`, `jumlah_barang`, `kondisi_barang`, `keterangan`, `created_at`, `updated_at`, `soft_delete`, `log_user1`, `log_user2`, `last_action`) VALUES
(1, 1, 2, 0, 0, '0', '12', 'Baik Sekali', 'Ada', '2024-05-13 02:34:51', '2024-05-13 02:42:06', 0, 1, 1, 2),
(2, 1, 3, 0, 0, '0', '1', 'Baik', 'Ada', '2024-05-13 03:10:52', '2024-05-13 03:10:52', 0, 1, 1, 1),
(3, 1, 1, 0, 0, '0', '3', 'Kurang Baik', 'Belum Ada', '2024-05-13 03:11:18', '2024-05-13 03:11:18', 0, 1, 1, 1),
(4, 2, 1, 0, 0, '0', '10', 'Baik', 'Ada', '2024-05-14 03:52:45', '2024-05-14 03:52:45', 0, 1, 1, 1),
(5, 2, 2, 0, 0, '0', '12', 'Baik', 'Ada', '2024-05-14 03:53:15', '2024-05-14 03:53:15', 0, 1, 1, 1),
(6, 2, 3, 0, 0, '0', '2', 'Baik', 'Ada', '2024-05-14 03:53:33', '2024-05-14 03:53:33', 0, 1, 1, 1),
(7, 4, 4, 1, 1, '35', '2', 'Baik', 'Ada xxxxxxxxxxx', '2024-05-21 04:43:13', '2024-05-21 07:14:57', 0, 1, 1, 2),
(8, 4, 5, 2, 2, '001', '1', 'Baik', 'Ada', '2024-05-21 06:20:09', '2024-05-21 06:24:16', 0, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gedung`
--

CREATE TABLE `tb_gedung` (
  `id_gedung` int(11) NOT NULL,
  `kode_gedung` varchar(10) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_user1` int(11) NOT NULL,
  `log_user2` int(11) NOT NULL,
  `soft_delete` int(11) NOT NULL,
  `last_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gedung`
--

INSERT INTO `tb_gedung` (`id_gedung`, `kode_gedung`, `nama_gedung`, `created_at`, `updated_at`, `log_user1`, `log_user2`, `soft_delete`, `last_action`) VALUES
(1, '01', 'Gedung Lantai 1', '2024-02-20 01:48:49', '2024-05-21 03:19:22', 1, 1, 0, 2),
(2, '02', 'Gedung Lantai 2', '2024-02-20 01:48:49', '2024-05-21 03:19:32', 1, 1, 0, 2),
(3, '03', 'Gedung Lainnya', '2024-02-27 00:08:14', '2024-02-27 00:44:40', 1, 1, 1, 3),
(4, '03', 'Gedung Lantai 3', '2024-02-29 00:01:27', '2024-05-21 03:19:41', 1, 1, 0, 2),
(5, '04', 'Gedung Lantai 4', '2024-05-21 03:19:52', '2024-05-21 03:19:52', 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_golongan` int(11) NOT NULL,
  `kode_golongan` varchar(10) NOT NULL,
  `nama_golongan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soft_delete` int(11) NOT NULL,
  `log_user1` int(11) NOT NULL,
  `log_user2` int(11) NOT NULL,
  `last_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_golongan`, `kode_golongan`, `nama_golongan`, `created_at`, `updated_at`, `soft_delete`, `log_user1`, `log_user2`, `last_action`) VALUES
(1, '01', 'Tanah', '2024-02-20 21:13:35', '2024-05-21 03:09:44', 0, 1, 1, 2),
(2, '02', 'Gedung', '2024-02-27 00:59:53', '2024-05-21 03:09:55', 0, 1, 1, 2),
(3, '03', 'Kendaraan', '2024-05-21 03:10:05', '2024-05-21 03:10:05', 0, 1, 1, 1),
(4, '04', 'Peralatan', '2024-05-21 03:10:19', '2024-05-21 03:10:19', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soft_delete` int(11) NOT NULL,
  `log_user1` int(11) NOT NULL,
  `log_user2` int(11) NOT NULL,
  `last_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`, `id_golongan`, `created_at`, `updated_at`, `soft_delete`, `log_user1`, `log_user2`, `last_action`) VALUES
(1, '01', 'Tanah Hak Milik', 1, '2024-02-21 20:33:22', '2024-05-21 03:12:31', 0, 1, 1, 2),
(2, '002', 'Kursi Kantor', 1, '2024-02-21 20:38:14', '2024-02-27 01:09:29', 1, 1, 1, 3),
(3, '02', 'Tanah Hak Guna', 1, '2024-02-21 20:38:26', '2024-05-21 03:13:07', 0, 1, 1, 2),
(4, '03', 'Tanah Hak Pakai', 1, '2024-02-21 20:39:18', '2024-05-21 03:13:28', 0, 1, 1, 2),
(5, '01', 'Gedung Kantor', 2, '2024-02-21 20:44:38', '2024-05-21 03:13:59', 0, 1, 1, 2),
(6, '02', 'Gedung Pendidikan', 2, '2024-02-21 21:10:14', '2024-05-21 03:14:21', 0, 1, 1, 2),
(7, '03', 'Gedung Masjid', 2, '2024-03-22 02:56:07', '2024-05-21 03:14:36', 0, 1, 1, 2),
(8, '04', 'Gedung Laboratorium', 2, '2024-05-21 03:15:00', '2024-05-21 03:15:00', 0, 1, 1, 1),
(9, '05', 'Gedung Bengkel', 2, '2024-05-21 03:15:14', '2024-05-21 03:15:14', 0, 1, 1, 1),
(10, '01', 'Kendaraan Roda Empat', 3, '2024-05-21 03:15:49', '2024-05-21 03:15:49', 0, 1, 1, 1),
(11, '02', 'Kendaraan Roda Dua', 3, '2024-05-21 03:16:08', '2024-05-21 03:16:08', 0, 1, 1, 1),
(12, '01', 'Meja', 4, '2024-05-21 03:32:24', '2024-05-21 03:32:24', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kartubarang`
--

CREATE TABLE `tb_kartubarang` (
  `id_kartu` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soft_delete` int(11) NOT NULL,
  `log_user1` int(11) NOT NULL,
  `log_user2` int(11) NOT NULL,
  `last_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kartubarang`
--

INSERT INTO `tb_kartubarang` (`id_kartu`, `id_ruang`, `keterangan`, `created_at`, `updated_at`, `soft_delete`, `log_user1`, `log_user2`, `last_action`) VALUES
(1, 1, 'Ada', '2024-02-29 00:17:00', '2024-02-29 07:51:34', 0, 1, 1, 2),
(2, 2, 'Ada', '2024-03-20 04:19:31', '2024-03-20 04:19:31', 0, 1, 1, 1),
(3, 0, '', '2024-05-21 04:15:20', '2024-05-21 04:15:38', 0, 1, 1, 2),
(4, 11, 'Ada', '2024-05-21 04:16:28', '2024-05-21 04:16:28', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lantai`
--

CREATE TABLE `tb_lantai` (
  `id_lantai` int(11) NOT NULL,
  `kode_lantai` varchar(10) NOT NULL,
  `nama_lantai` varchar(255) NOT NULL,
  `id_gedung` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soft_delete` int(11) NOT NULL,
  `log_user1` int(11) NOT NULL,
  `log_user2` int(11) NOT NULL,
  `last_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lantai`
--

INSERT INTO `tb_lantai` (`id_lantai`, `kode_lantai`, `nama_lantai`, `id_gedung`, `created_at`, `updated_at`, `soft_delete`, `log_user1`, `log_user2`, `last_action`) VALUES
(1, '01', 'Lantai 1', 1, '2024-02-20 19:55:58', '2024-05-21 03:22:43', 0, 1, 1, 2),
(2, '002', 'Lantai 2', 2, '2024-02-20 19:56:20', '2024-02-27 00:53:37', 1, 1, 1, 3),
(3, '02', 'Lantai 2', 2, '2024-02-28 23:53:41', '2024-05-21 03:22:53', 0, 1, 1, 2),
(4, '03', 'Lantai 3', 4, '2024-03-22 02:30:21', '2024-05-21 03:23:04', 0, 1, 1, 2),
(5, '04', 'Lantai 4', 5, '2024-05-21 03:23:16', '2024-05-21 03:23:16', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruang` int(11) NOT NULL,
  `kode_ruang` varchar(10) NOT NULL,
  `nama_ruang` varchar(255) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soft_delete` int(11) NOT NULL,
  `log_user1` int(11) NOT NULL,
  `log_user2` int(11) NOT NULL,
  `last_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruang`, `kode_ruang`, `nama_ruang`, `id_lantai`, `created_at`, `updated_at`, `soft_delete`, `log_user1`, `log_user2`, `last_action`) VALUES
(1, '01', 'WC Laki-Laki Lantai 1', 1, '2024-02-26 20:17:04', '2024-05-21 03:21:47', 0, 1, 1, 2),
(2, '02', 'Ruang Cleaning Service (Pantry)', 1, '2024-02-26 20:21:31', '2024-05-21 03:22:08', 0, 1, 1, 2),
(3, '03', 'Ruang Kuliah (101)', 1, '2024-03-22 02:43:26', '2024-05-21 03:23:41', 0, 1, 1, 2),
(4, '04', 'Ruang LP2M', 1, '2024-05-21 03:24:01', '2024-05-21 03:24:01', 0, 1, 1, 1),
(5, '05', 'Ruang LKK', 1, '2024-05-21 03:24:17', '2024-05-21 03:24:17', 0, 1, 1, 1),
(6, '06', 'Ruang Transit Dosen Teknik Mesin', 1, '2024-05-21 03:28:27', '2024-05-21 03:28:27', 0, 1, 1, 1),
(7, '07', 'Ruang Transit Dosen Informatika', 1, '2024-05-21 03:28:41', '2024-05-21 03:28:41', 0, 1, 1, 1),
(8, '08', 'Ruang Resepsionis', 1, '2024-05-21 03:29:13', '2024-05-21 03:29:13', 0, 1, 1, 1),
(9, '09', 'Ruang Staff PMB', 1, '2024-05-21 03:29:50', '2024-05-21 03:29:50', 0, 1, 1, 1),
(10, '10', 'Ruang PMB', 1, '2024-05-21 03:30:03', '2024-05-21 03:30:03', 0, 1, 1, 1),
(11, '02', 'Ruang Sistem Informasi (SI)', 3, '2024-05-21 03:31:28', '2024-05-21 03:31:28', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_orang` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `id_atasan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soft_delete` int(11) NOT NULL,
  `log_user1` int(11) NOT NULL,
  `log_user2` int(11) NOT NULL,
  `last_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sumberanggaran`
--

CREATE TABLE `tb_sumberanggaran` (
  `id_anggaran` int(11) NOT NULL,
  `kode_anggaran` varchar(10) NOT NULL,
  `nama_anggaran` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soft_delete` int(11) NOT NULL,
  `log_user1` int(11) NOT NULL,
  `log_user2` int(11) NOT NULL,
  `last_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sumberanggaran`
--

INSERT INTO `tb_sumberanggaran` (`id_anggaran`, `kode_anggaran`, `nama_anggaran`, `created_at`, `updated_at`, `soft_delete`, `log_user1`, `log_user2`, `last_action`) VALUES
(1, '01', 'Bantuan Bamsoet Foundation', '2024-02-20 22:44:06', '2024-05-21 06:09:01', 0, 1, 1, 2),
(2, '02', 'Dana Talangan', '2024-02-26 19:47:15', '2024-02-26 19:47:15', 0, 1, 1, 1),
(3, '03', 'Dana Abadi', '2024-03-22 03:16:53', '2024-03-22 03:18:51', 0, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahunpembelian`
--

CREATE TABLE `tb_tahunpembelian` (
  `id_tahun` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soft_delete` int(11) NOT NULL,
  `log_user1` int(11) NOT NULL,
  `log_user2` int(11) NOT NULL,
  `last_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tahunpembelian`
--

INSERT INTO `tb_tahunpembelian` (`id_tahun`, `tahun`, `created_at`, `updated_at`, `soft_delete`, `log_user1`, `log_user2`, `last_action`) VALUES
(1, '2022', '2024-02-20 23:22:59', '2024-03-22 03:47:35', 0, 1, 1, 2),
(2, '2023', '2024-03-22 03:47:48', '2024-03-22 03:47:48', 0, 1, 1, 1),
(3, '2024', '2024-03-22 03:48:01', '2024-03-22 03:48:01', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hardik Savani', 'admin@gmail.com', 'admin', NULL, '$2y$10$OLAphs7tS9F0zXbe1.HyROnl1ctNLbI5WrZfTxvRvfIsUkOP99N.K', 'ywIJiQrohdvvORFkzDtgpvsXsJNW3iX7nCzrt82TP6ZXD6r5Wxvy4mjcoMpf', '2024-02-01 19:34:28', '2024-02-01 19:34:28'),
(15, 'Mainaky', 'main@gmail.com', 'user', NULL, '$2y$10$0lbbjLjhdkrpOvxD/xCIg.RB2qAe/RNUfEgMb42ZdV.Q0tlebE756', NULL, '2024-02-15 00:43:34', '2024-02-15 23:30:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tb_action`
--
ALTER TABLE `tb_action`
  ADD PRIMARY KEY (`id_action`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_detailkartu`
--
ALTER TABLE `tb_detailkartu`
  ADD PRIMARY KEY (`id_detailkartu`);

--
-- Indexes for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_kartubarang`
--
ALTER TABLE `tb_kartubarang`
  ADD PRIMARY KEY (`id_kartu`);

--
-- Indexes for table `tb_lantai`
--
ALTER TABLE `tb_lantai`
  ADD PRIMARY KEY (`id_lantai`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tb_sumberanggaran`
--
ALTER TABLE `tb_sumberanggaran`
  ADD PRIMARY KEY (`id_anggaran`);

--
-- Indexes for table `tb_tahunpembelian`
--
ALTER TABLE `tb_tahunpembelian`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_action`
--
ALTER TABLE `tb_action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_detailkartu`
--
ALTER TABLE `tb_detailkartu`
  MODIFY `id_detailkartu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kartubarang`
--
ALTER TABLE `tb_kartubarang`
  MODIFY `id_kartu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_lantai`
--
ALTER TABLE `tb_lantai`
  MODIFY `id_lantai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sumberanggaran`
--
ALTER TABLE `tb_sumberanggaran`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tahunpembelian`
--
ALTER TABLE `tb_tahunpembelian`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
