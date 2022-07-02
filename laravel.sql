-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 03:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `analyst`
--

CREATE TABLE `analyst` (
  `id` int(10) NOT NULL,
  `kriteria` text NOT NULL,
  `bobot` double NOT NULL,
  `cb` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analyst`
--

INSERT INTO `analyst` (`id`, `kriteria`, `bobot`, `cb`, `created_at`, `updated_at`) VALUES
(1, 'Kualitas Kerja', 0.3, 'Const', '2022-07-01 04:51:15', '2022-07-01 05:13:51'),
(2, 'Ketelitian Kerja', 0.2, 'Benefit', '2022-07-01 04:58:00', '2022-07-01 04:58:00'),
(3, 'Tanggung Jawab', 0.2, 'Benefit', '2022-07-01 04:58:21', '2022-07-01 04:58:21'),
(4, 'Profesionalisme', 0.1, 'Benefit', '2022-07-01 04:58:43', '2022-07-01 04:58:43'),
(5, 'Inisiatif', 0.1, 'Benefit', '2022-07-01 04:59:02', '2022-07-01 04:59:02'),
(6, 'Prilaku', 0.1, 'Const', '2022-07-01 05:15:27', '2022-07-01 05:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `nik` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ijazah_terakhir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kepegawaian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_bekerja` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk_kerja` date NOT NULL,
  `tgl_pengangkatan` date NOT NULL,
  `id_golongan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama_bekerja` int(11) NOT NULL,
  `usia_pensiun` int(11) NOT NULL,
  `usia_sekarang` int(11) NOT NULL,
  `perkiraan_pensiun` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pas_foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `email`, `agama`, `marital`, `ijazah_terakhir`, `status_kepegawaian`, `jabatan`, `tempat_bekerja`, `tgl_masuk_kerja`, `tgl_pengangkatan`, `id_golongan`, `lama_bekerja`, `usia_pensiun`, `usia_sekarang`, `perkiraan_pensiun`, `created_at`, `updated_at`, `pas_foto`) VALUES
(20391230128404, 'Kon', 'Laki-laki', 'smi', '2022-07-02', 'qw@qw.com', 'Kristen Protestan', 'Menikah', 's1', 'Tetap', 'Pengangguran', 'Sekretariat', '2022-07-02', '2022-07-02', '1', 0, 10, 0, 10, '2022-07-02 02:05:06', '2022-07-02 05:32:24', 'd_1656752706.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_29_045416_create_employees_table', 1),
(5, '2021_08_05_022642_add_pas_foto_to_employees', 1),
(6, '2021_09_27_011917_create_salary_groups_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` text NOT NULL,
  `gaji_pokok` int(10) NOT NULL,
  `jabatan` text NOT NULL,
  `lembur` int(10) NOT NULL,
  `t_istri` int(10) NOT NULL,
  `t_anak` int(10) NOT NULL,
  `absen` int(10) NOT NULL,
  `cuti` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id_user`, `nama_lengkap`, `gaji_pokok`, `jabatan`, `lembur`, `t_istri`, `t_anak`, `absen`, `cuti`, `total`, `created_at`, `updated_at`) VALUES
(20391230128404, 'Kon', 3000000, 'Pengangguran', 10, 10, 10, 10, 10, 3000050, '2022-07-02 02:05:23', '2022-07-02 02:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `salary_groups`
--

CREATE TABLE `salary_groups` (
  `id_golongan` bigint(20) UNSIGNED NOT NULL,
  `nama_golongan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaji_pokok` double DEFAULT NULL,
  `persentase_kenaikan` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_groups`
--

INSERT INTO `salary_groups` (`id_golongan`, `nama_golongan`, `gaji_pokok`, `persentase_kenaikan`, `created_at`, `updated_at`) VALUES
(1, 'A', 3000000, 7, '2022-06-30 03:23:15', '2022-07-02 00:34:41'),
(2, 'B', 2000000, 7, '2022-07-02 00:05:34', '2022-07-02 00:34:49'),
(5, 'C', 1000000, NULL, '2022-07-02 05:36:26', '2022-07-02 05:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `nik` bigint(20) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `k1` int(10) NOT NULL,
  `k2` int(10) NOT NULL,
  `k3` int(10) NOT NULL,
  `k4` int(10) NOT NULL,
  `k5` int(10) NOT NULL,
  `k6` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`nik`, `nama_lengkap`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `created_at`, `updated_at`) VALUES
(20391230128404, 'Kon', 90, 90, 90, 90, 90, 90, '2022-07-02 02:05:40', '2022-07-02 02:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'qw', 'qw@qw.com', NULL, '$2y$10$fS60sJTFJ/JVr6T50aefOOFbTn.tGD0RYjYcNst8Mc6BM4WDBG9Di', NULL, '2022-06-30 03:18:19', '2022-06-30 03:18:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analyst`
--
ALTER TABLE `analyst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `salary_groups`
--
ALTER TABLE `salary_groups`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`nik`);

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
-- AUTO_INCREMENT for table `analyst`
--
ALTER TABLE `analyst`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `nik` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94375953894858;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salary_groups`
--
ALTER TABLE `salary_groups`
  MODIFY `id_golongan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
