-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2024 at 03:44 AM
-- Server version: 11.2.2-MariaDB-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pln_punagaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_role`
--

CREATE TABLE `data_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_role`
--

INSERT INTO `data_role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '2024-10-31 03:40:57', '2024-10-31 03:40:57'),
(2, 'Sekretaris', '2024-10-31 03:40:57', '2024-10-31 03:40:57'),
(3, 'Manager', '2024-10-31 03:40:57', '2024-10-31 03:40:57'),
(4, 'Asisten Manager', '2024-10-31 03:40:57', '2024-10-31 03:40:57'),
(5, 'Karyawan', '2024-10-31 03:40:57', '2024-10-31 03:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `data_sppd`
--

CREATE TABLE `data_sppd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_uuid` char(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `maksud` text NOT NULL,
  `tujuan_provinsi` varchar(255) NOT NULL,
  `tujuan_kota` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `surat_undangan` varchar(255) NOT NULL,
  `sppd_file` varchar(255) DEFAULT NULL,
  `status_konfirmasi` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('Menunggu Asmen untuk meneruskan SPPD ke Manager','Menunggu persetujuan Manager','Diproses Sekretaris','Selesai','Ditolak','Dibatalkan') NOT NULL DEFAULT 'Menunggu Asmen untuk meneruskan SPPD ke Manager',
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_sppd`
--

INSERT INTO `data_sppd` (`id`, `uuid`, `user_uuid`, `nama`, `nip`, `maksud`, `tujuan_provinsi`, `tujuan_kota`, `tanggal_mulai`, `tanggal_selesai`, `surat_undangan`, `sppd_file`, `status_konfirmasi`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 'fea0929d-063a-4b7b-9380-6dee29e77b68', '67e276d9-26f5-44d0-a1da-cd5cdaf0b094', 'dummykaryawan1', '123456', 'Dinas', 'DKI JAKARTA', 'KOTA JAKARTA UTARA', '2024-10-31', '2024-11-02', 'surat_undangan/SPPD_dummykaryawan1_940af2fc-0b92-4d18-b0de-6ccfd0869c4a.pdf', 'sppd_fea0929d-063a-4b7b-9380-6dee29e77b68.pdf', 1, 'Selesai', NULL, '2024-10-31 03:44:10', '2024-10-31 04:50:38'),
(2, '21ca1890-6f3c-4d29-98bd-db279bb10117', '67e276d9-26f5-44d0-a1da-cd5cdaf0b094', 'dummykaryawan1', '123456', 'Dinas', 'JAWA TIMUR', 'KABUPATEN BANYUWANGI', '2024-11-09', '2024-11-12', 'surat_undangan/SPPD_dummykaryawan1_8c1e3df7-db93-4514-86cb-39087889d13d.pdf', 'sppd_21ca1890-6f3c-4d29-98bd-db279bb10117.pdf', 1, 'Selesai', NULL, '2024-10-31 03:46:44', '2024-11-02 02:47:35'),
(3, 'eb89ebef-367e-43cf-bf31-2dd1a2ce73ee', 'c9fbe9e5-2ff3-48aa-89af-3bb20420dc95', 'Super Admin', '123456', 'Liburan', 'BENGKULU', 'KABUPATEN KAUR', '2024-11-02', '2024-11-04', 'surat_undangan/SPPD_Super Admin_98182050-4b33-452b-ab79-8fb915ad8821.pdf', 'sppd_eb89ebef-367e-43cf-bf31-2dd1a2ce73ee.pdf', 1, 'Selesai', NULL, '2024-11-02 02:45:25', '2024-11-02 03:51:24'),
(4, 'dd7af99c-f412-4c5d-b2b8-2f1a1e6f3dbd', 'c28c554a-e9ce-4b5f-9ab4-da2ded83caff', 'dummysekretaris', '12345679', 'Liburan', 'BANTEN', 'KABUPATEN TANGERANG', '2024-11-02', '2024-11-21', 'surat_undangan/SPPD_dummysekretaris_46db61d4-1dca-45c7-a785-d9c35f3b71b5.pdf', 'sppd_dd7af99c-f412-4c5d-b2b8-2f1a1e6f3dbd.pdf', 1, 'Selesai', NULL, '2024-11-02 03:54:27', '2024-11-02 03:56:09'),
(5, '68a4e45e-8e1b-4269-9dad-4f9ac9962292', '9c23142f-087d-4212-89dd-18d4498be937', 'dummymanager', '1234567', 'Liburan', 'DI YOGYAKARTA', 'KOTA YOGYAKARTA', '2024-11-03', '2024-11-06', 'surat_undangan/SPPD_dummymanager_91a09d33-a672-4585-8906-caa45757bf5d.pdf', 'sppd_68a4e45e-8e1b-4269-9dad-4f9ac9962292.pdf', 1, 'Selesai', NULL, '2024-11-03 08:09:08', '2024-11-03 08:12:45'),
(6, '0c9e056f-cf11-45ac-aa2e-2cfbbe3c4a4f', '9c23142f-087d-4212-89dd-18d4498be937', 'dummymanager', '1234567', 'Liburan', 'BANTEN', 'KABUPATEN SERANG', '2024-11-19', '2024-11-21', 'surat_undangan/SPPD_dummymanager_68779497-2312-4d4c-a577-d6fbc46f7f77.pdf', 'sppd_0c9e056f-cf11-45ac-aa2e-2cfbbe3c4a4f.pdf', 1, 'Selesai', NULL, '2024-11-03 08:09:34', '2024-11-03 08:13:24'),
(7, 'c7f50e73-543f-4572-a8c8-749d33f65b07', '1456f9cb-ca3d-4951-8ef3-e2dcbfff2f52', 'dummytes', '123456', 'Liburan', 'KALIMANTAN BARAT', 'KABUPATEN BENGKAYANG', '2024-11-04', '2024-11-06', 'surat_undangan/SPPD_dummytes_18ca8c3a-8bee-4d0f-9b56-fe22dc874357.pdf', 'sppd_c7f50e73-543f-4572-a8c8-749d33f65b07.pdf', 1, 'Selesai', NULL, '2024-11-03 17:06:11', '2024-11-03 17:09:57'),
(8, '9f2ea636-e0a5-4772-a83e-44348f067b15', '1456f9cb-ca3d-4951-8ef3-e2dcbfff2f52', 'dummytes', '123456', 'Liburan', 'ACEH', 'KABUPATEN ACEH BARAT DAYA', '2024-11-04', '2024-11-07', 'surat_undangan/SPPD_dummytes_d9381718-0010-44ea-8280-48f76ad93614.pdf', NULL, 0, 'Ditolak', NULL, '2024-11-03 17:10:56', '2024-11-03 17:11:17'),
(9, '3349d327-831b-425b-9fdf-d5519cdd19c3', 'c28c554a-e9ce-4b5f-9ab4-da2ded83caff', 'dummysekretaris', '123456', 'Dinas', 'DI YOGYAKARTA', 'KABUPATEN KULON PROGO', '2024-11-04', '2024-11-08', 'surat_undangan/SPPD_dummysekretaris_290956f1-f50a-4d1f-859b-b6ea4e4b7a79.pdf', NULL, 0, 'Ditolak', 'oleh dummymanager', '2024-11-04 01:45:24', '2024-11-05 02:15:24'),
(10, 'f9bc3ec3-644a-4b97-9726-325c2dff8705', '9c23142f-087d-4212-89dd-18d4498be937', 'dummymanager', '123456', 'Liburan', 'BENGKULU', 'KABUPATEN MUKOMUKO', '2024-11-05', '2024-11-07', 'surat_undangan/SPPD_dummymanager_8b141d80-51d4-441d-8235-c5eb3b6b8534.pdf', NULL, 0, 'Diproses Sekretaris', NULL, '2024-11-05 02:20:06', '2024-11-05 02:20:06'),
(11, '3f18825d-8555-49b5-8439-c469fb45d176', '67e276d9-26f5-44d0-a1da-cd5cdaf0b094', 'dummykaryawan1', '123456', 'Liburan', 'DI YOGYAKARTA', 'KOTA YOGYAKARTA', '2024-11-13', '2024-11-14', 'surat_undangan/SPPD_dummykaryawan1_3b08c242-2124-4fb7-b325-7f32e45b7b13.pdf', NULL, 0, 'Dibatalkan', NULL, '2024-11-05 02:35:05', '2024-11-05 02:54:01'),
(12, '05cc47f2-46cd-4a63-aeec-620c82a9c68e', '67e276d9-26f5-44d0-a1da-cd5cdaf0b094', 'dummykaryawan1', '12345678', 'Kunjungan', 'SULAWESI SELATAN', 'KOTA PAREPARE', '2024-11-22', '2024-11-23', 'surat_undangan/SPPD_dummykaryawan1_49831eee-38ba-4b36-8c86-abd1870e3b91.pdf', NULL, 0, 'Menunggu Asmen untuk meneruskan SPPD ke Manager', NULL, '2024-11-05 05:14:48', '2024-11-05 05:14:48'),
(13, 'f52c3fe9-4836-4e95-8502-e47f61ab38a7', 'fcaf66b7-c7c7-411e-b64e-366de782b862', 'dummyasmen', '123456789', 'Kunjungan', 'KALIMANTAN TIMUR', 'KOTA BALIKPAPAN', '2024-11-06', '2024-11-08', 'surat_undangan/SPPD_dummyasmen_096b3f25-9d96-4c8c-bc67-45d1255dcdf3.pdf', NULL, 0, 'Dibatalkan', NULL, '2024-11-06 01:42:13', '2024-11-06 01:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.png',
  `role` enum('superadmin','Sekretaris','Manager','Asisten Manager','Karyawan') NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `uuid`, `nama`, `email`, `password`, `foto`, `role`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 'c9fbe9e5-2ff3-48aa-89af-3bb20420dc95', 'Super Admin', 'superadmin123@email.com', '$2y$12$PvbzLu3Pc0OyI1CGnkDSL.1UAzHTVpPnqhaZPx3iRi5NTt9kVaqmi', 'default.png', 'superadmin', 1, '2024-10-31 03:41:04', '2024-10-31 03:41:04'),
(2, '67e276d9-26f5-44d0-a1da-cd5cdaf0b094', 'dummykaryawan1', 'dummykaryawan1@gmail.com', '$2y$12$1Giuplw5VKggbRlnt31QyOFA6BoLtxTmJ7wOg5ykz0oYWdAgQbiBK', 'default.png', 'Karyawan', 1, '2024-10-31 03:41:26', '2024-10-31 03:43:18'),
(3, '6439acb0-44f3-4954-b735-5a916de48303', 'dummykaryawan2', 'dummykaryawan2@gmail.com', '$2y$12$qZSfBRK1BdN5OlmYB0aVguSx0uLfxw55vslwHP8PPmfbPBeJkeHCW', 'default.png', 'Karyawan', 1, '2024-10-31 03:41:53', '2024-10-31 03:43:24'),
(4, 'fcaf66b7-c7c7-411e-b64e-366de782b862', 'dummyasmen', 'dummyasmen@gmail.com', '$2y$12$taNNcIiYTdSJqOL5r4982.GrO3oPck5XnwzKrLoTMwqzyKdcvJHny', 'default.png', 'Asisten Manager', 1, '2024-10-31 03:42:14', '2024-10-31 03:43:30'),
(5, '9c23142f-087d-4212-89dd-18d4498be937', 'dummymanager', 'dummymanager@gmail.com', '$2y$12$sqMTnVfjZoTL.GxgUa5yc.WbJTflR7lwowZ6OkHdGGM.R9XlSK4sW', 'default.png', 'Manager', 1, '2024-10-31 03:42:31', '2024-10-31 03:43:34'),
(6, 'c28c554a-e9ce-4b5f-9ab4-da2ded83caff', 'dummysekretaris', 'dummysekretaris@gmail.com', '$2y$12$SjhV6yMQFnMzbPicDUY.0OYO04tH4bzrsuC44i4tYUxDINR5xeyeS', 'default.png', 'Sekretaris', 1, '2024-10-31 03:42:52', '2024-10-31 03:43:38'),
(7, '1456f9cb-ca3d-4951-8ef3-e2dcbfff2f52', 'dummytes', 'dummytes@gmail.com', '$2y$12$UKzGkfP8PvyFbsvwW0gPiO2m7sQFYwnfLm70p5sKO0siyPGsM6l9i', 'default.png', 'Karyawan', 1, '2024-11-03 17:05:11', '2024-11-03 17:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '0001_01_01_000000_create_users_table', 1),
(8, '0001_01_01_000001_create_cache_table', 1),
(9, '0001_01_01_000002_create_jobs_table', 1),
(10, '2024_10_22_130031_data_role', 1),
(11, '2024_10_22_130045_data_user', 1),
(12, '2024_10_22_130057_data_sppd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lZ5g9Zz91BVKr3CZzD4W0Qc5Qvup5r7t3vvCT7VJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicW1PVmFKcjhQeGMxU0IwRnNHdWtkdkNBTHRLOUNDVjBoT2dNQlBtUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730878702),
('xkvtsR6Xr9UmbDNLGeojpuRYVE9cWFl1hpFRrqjP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiVEpoTHEwMXR4Rzk2YkZtSmxZYnRHOU1yVUFRT041SklOOWY4SEY0WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvcml3YXlhdFNwcGQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjI6ImlkIjtpOjQ7czo0OiJ1dWlkIjtzOjM2OiJmY2FmNjZiNy1jN2M3LTQxMWUtYjY0ZS0zNjZkZTc4MmI4NjIiO3M6NDoibmFtYSI7czoxMDoiZHVtbXlhc21lbiI7czo0OiJmb3RvIjtzOjExOiJkZWZhdWx0LnBuZyI7czo0OiJyb2xlIjtzOjE1OiJBc2lzdGVuIE1hbmFnZXIiO30=', 1730857405);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `data_role`
--
ALTER TABLE `data_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_sppd`
--
ALTER TABLE `data_sppd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_sppd_uuid_unique` (`uuid`),
  ADD KEY `data_sppd_user_uuid_foreign` (`user_uuid`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_user_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `data_user_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `data_role`
--
ALTER TABLE `data_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_sppd`
--
ALTER TABLE `data_sppd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_sppd`
--
ALTER TABLE `data_sppd`
  ADD CONSTRAINT `data_sppd_user_uuid_foreign` FOREIGN KEY (`user_uuid`) REFERENCES `data_user` (`uuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
