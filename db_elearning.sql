-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2023 pada 19.47
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absens`
--

CREATE TABLE `absens` (
  `id` int(10) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent` varchar(255) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  `pertemuan` varchar(255) DEFAULT NULL,
  `rangkuman` text DEFAULT NULL,
  `berita_acara` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `foto`, `nama`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'images/profile/rJOqDtb3vXjJ4YL6LSM9vwSvcD9OyfyUZR4t8lLn.png', 'Admin', 'admin@gmail.com', '$2y$10$eidzEDThX9wTWyqGlUscxe93XSepQ.HoAyXm3wkw3oOxvcIEjokJq', 'byyyZPCoPJ', '2023-03-09 17:58:11', '2023-06-25 13:30:32'),
(2, 'images/profile/QhOk5NpXLmUzNjMeJ7wpOwC5fxrgGhQbAuuRFei8.jpg', 'Anisa Rahmayanti', 'arimuhamadsetiawan@gmail.com', '$2y$10$eFKLRDcsYAkA5uTQoxZMqOzPhv.8clg.upzVap8D0S2KZLoJHv9V.', 'byyyZPCoPJ', '2023-03-11 08:54:58', '2023-06-25 13:30:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosens`
--

CREATE TABLE `dosens` (
  `id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosens`
--

INSERT INTO `dosens` (`id`, `foto`, `nip`, `nama`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(52, 'default.png', 12345, 'Marson J. Budiman, SST., MT', 'marson@gmail.com', '$2y$10$c9qLUdBtXspUdgvlqviaYOvgIgHyvLOsm1E1t/W82DOe6EswUitw.', NULL, '2023-03-25 13:40:20', '2023-03-25 13:40:20'),
(53, 'default.png', 23456, 'Venny Ponggawa, SST., MT', 'venny@gmail.com', '$2y$10$fYgeRcdMEFtPASjcl3NZmOtUHF2Hl..DIXB./jyr3RULOqYfs2yti', NULL, '2023-03-25 13:41:57', '2023-03-25 13:41:57'),
(54, 'default.png', 34567, 'Anritsu Ch Polii, SST., MT', 'anritsu@gmail.com', '$2y$10$3Lh0khoV1rCmypBMV5oGWeP5r9Ltn5itRBou4TOPuiV0pzlq7SoLi', NULL, '2023-03-25 13:42:59', '2023-03-25 13:42:59'),
(55, 'default.png', 45678, 'Dr. Anthon Kimbal, Spd., SH., MH', 'anthon@gmail.com', '$2y$10$KoJ1TdFP5l6Q/42nG18x3OZa8oHv9lwzE3x4iRIWU5rB.3Ma1AzrW', NULL, '2023-03-25 13:44:09', '2023-03-25 13:44:09'),
(56, 'default.png', 56789, 'Oldi Lombonan, Mpd', 'oldi@gmail.com', '$2y$10$/nZ1QZBCDh.Il0Qk67T/HuAU.ckeT7YRSVNmzrsOztMK2TFiJe88u', NULL, '2023-03-25 13:44:48', '2023-03-25 13:44:48'),
(57, 'default.png', 67891, 'Tracy Marcela, ST., MT', 'tracy@gmail.com', '$2y$10$s4/iJT944Q8HApdKa2y.yueET4bXH1ncmO.suXDpkiBj.H6qJFXSG', NULL, '2023-03-25 13:46:04', '2023-03-25 13:46:04'),
(58, 'default.png', 78912, 'Olga E. Melo., SST., MT', 'olga@gmail.com', '$2y$10$z4k/ZDQGRx3nbs2PuuxO/.4mkM4aoJNgDiWea2l1KWSQpoB05rO8S', NULL, '2023-03-25 13:46:44', '2023-03-25 13:46:44'),
(59, 'default.png', 89123, 'Bili J Woworuntu, S.Pd., M.Kom', 'bili@gmail.com', '$2y$10$GsGFYWfK5pds3XQ5JdAJPOHkMteYFHgWPtyh7Thddb0aPnYpCo7mO', NULL, '2023-03-25 13:47:31', '2023-03-25 13:47:31'),
(60, 'default.png', 91234, 'Harson Kapoh, ST., MT', 'harson@gmail.com', '$2y$10$q10Sfp63YfBc4.708lQuOutMZljF8fBJQLdqL2jRkIS83gEZHrVmy', NULL, '2023-03-25 13:48:38', '2023-03-25 13:48:38'),
(61, 'default.png', 54321, 'Maya Munaicehe, SS., MS', 'maya@gmail.com', '$2y$10$nJ2POwQE1W2MGzsEHykb6.4tk2BpCUJTFsX.GYDMFWzoPwMI068P6', NULL, '2023-03-25 13:49:19', '2023-03-25 13:49:19'),
(62, 'default.png', 22222, 'Alsa Nabila', 'alsa@gmail.com', '$2y$10$I9PleIXaU5jegPg8Ky4zo.iSJNezuKmBKpxXYuOPb3579mwYI7Lre', 'WgfoDxNHuTa4ZWZU5PbqIE9YbGA51Wo8FEup8Jh80PeB0Eeq95LBfvIOkL9A', '2023-06-25 13:36:50', '2023-06-25 13:36:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_kelas`
--

CREATE TABLE `dosen_kelas` (
  `dosen_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `matkul_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen_kelas`
--

INSERT INTO `dosen_kelas` (`dosen_id`, `kelas_id`, `matkul_id`) VALUES
(1, 1, 7),
(1, 6, 14),
(1, 7, 5),
(1, 8, 13),
(52, 1, NULL),
(53, 1, NULL),
(54, 1, NULL),
(55, 1, NULL),
(56, 1, NULL),
(57, 1, NULL),
(58, 1, NULL),
(59, 1, NULL),
(60, 1, NULL),
(61, 1, NULL),
(62, 1, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_matkul`
--

CREATE TABLE `dosen_matkul` (
  `dosen_id` int(10) UNSIGNED NOT NULL,
  `matkul_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen_matkul`
--

INSERT INTO `dosen_matkul` (`dosen_id`, `matkul_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 13),
(1, 14),
(1, 15),
(52, 16),
(53, 17),
(53, 18),
(54, 19),
(54, 24),
(55, 20),
(56, 21),
(57, 22),
(57, 25),
(58, 23),
(59, 23),
(60, 26),
(61, 27),
(62, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(10) UNSIGNED NOT NULL,
  `kd_fk` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id`, `kd_fk`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'TI-D', 'Teknik Informatika - D4', '2023-03-09 17:58:12', '2023-03-25 13:28:33'),
(2, 'TL-D', 'Teknik Listrik - D4', '2023-03-09 17:58:12', '2023-03-25 13:28:22'),
(3, 'TK-D', 'Teknik Komputer - D3', '2023-03-09 17:58:12', '2023-03-25 13:28:45'),
(12, 'TL-D', 'Teknik Listrik - D3', '2023-03-25 13:28:53', '2023-03-25 13:28:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `matkul_id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam_masuk` varchar(255) NOT NULL,
  `jam_keluar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `kd_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kd_kelas`) VALUES
(1, '2 TI 1'),
(2, '2 TI 2'),
(9, '2 TI 3'),
(10, '2 TI 4'),
(11, '2 TI 5'),
(12, '2 TI 6'),
(13, '2 TI 7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fakultas_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `fakultas_id`, `kelas_id`, `nim`, `nama`, `email`, `password`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(402, 1, 1, 22024001, 'ZEFANYA RIVALDY FATTIHANDEL MACHMUD', 'zefanya@gmail.com', '$2y$10$r4tSwfQyFoW5qNj6nhrEdOjipz9cdpdTP6rN0tv78E9TPhW7EozrW', 'default.png', NULL, '2023-03-25 13:55:35', '2023-03-25 13:55:35'),
(403, 1, 1, 22024002, 'SYALOMITA PASHA SANTE', 'syalomita@gmail.con', '$2y$10$A/3cXY6LhXn/kKbpwASoL.M.qMJn4xUCTpzBgcGSLhTtToO6h3R0m', 'default.png', NULL, '2023-03-25 13:56:12', '2023-03-25 13:56:12'),
(404, 1, 1, 22024003, 'FERNANDA GRETY PANESE', 'fernanda@gmail.com', '$2y$10$Cl9q8x0Si7bzv4S/NHkpre5h/1l8.LRip2jkJlQ9GSDkjCCTC1zdW', 'default.png', NULL, '2023-03-25 13:56:47', '2023-03-25 13:56:47'),
(405, 1, 1, 1111, 'KaSetya', 'kasetya@gmail.com', '$2y$10$XKgBegzjLDZAxVB1WaaUOuUBxWB33KapNBwufMG2YXjxvGGMRCxOa', 'default.png', NULL, '2023-06-25 16:09:07', '2023-06-25 16:09:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materis`
--

CREATE TABLE `materis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `matkul_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `file_or_link` longtext NOT NULL,
  `pertemuan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materis`
--

INSERT INTO `materis` (`id`, `kelas_id`, `dosen_id`, `matkul_id`, `judul`, `tipe`, `file_or_link`, `pertemuan`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 7, 'Apa itu Pemrograman?', 'youtube', 'jGyYuQf-GeE', '1', 'Pelajari', '2023-03-12 12:36:19', '2023-03-16 16:12:58'),
(6, 1, 1, 7, 'Instalasi Web Server Dan Text Editor', 'pdf', 'materials/1678628954.docx', '1', 'Baca Dan Pelajari', '2023-03-12 13:49:14', '2023-03-12 13:49:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkuls`
--

CREATE TABLE `matkuls` (
  `id` int(10) UNSIGNED NOT NULL,
  `kd_matkul` varchar(255) NOT NULL,
  `nm_matkul` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matkuls`
--

INSERT INTO `matkuls` (`id`, `kd_matkul`, `nm_matkul`, `sks`, `created_at`, `updated_at`) VALUES
(16, 'O&AK', 'organisasi & arsitektur komputer', 1, '2023-03-25 13:31:02', '2023-03-25 13:32:39'),
(17, 'PA&SD', 'prak algoritma & struktur data', 2, '2023-03-25 13:32:19', '2023-03-25 13:32:19'),
(18, 'A&SD', 'algoritma & struktur data', 1, '2023-03-25 13:33:00', '2023-03-25 13:33:00'),
(19, 'WJK', 'workshop jaringan komputer', 1, '2023-03-25 13:33:10', '2023-03-25 13:33:10'),
(20, 'P', 'pancasila', 3, '2023-03-25 13:33:21', '2023-03-25 13:33:53'),
(21, 'M2', 'matematika 2', 2, '2023-03-25 13:34:05', '2023-03-25 13:34:05'),
(22, 'MN', 'metode numerik', 2, '2023-03-25 13:34:16', '2023-03-25 13:34:16'),
(23, 'DSI', 'dasar sistem informasi', 2, '2023-03-25 13:35:10', '2023-03-25 13:35:10'),
(24, 'PJK', 'prak. jaringan komputer', 3, '2023-03-25 13:35:38', '2023-03-25 13:35:38'),
(25, 'PMN', 'prak. metode numerik', 2, '2023-03-25 13:35:48', '2023-03-25 13:35:48'),
(26, 'DW', 'desain web', 3, '2023-03-25 13:36:05', '2023-03-25 13:36:05'),
(27, 'BIT2', 'bahasa inggris teknik 2', 1, '2023-03-25 13:36:14', '2023-03-25 13:36:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2021_05_30_142659_create_dosens_table', 1),
(3, '2021_05_30_154252_create_mahasiswas_table', 1),
(4, '2021_05_30_155037_create_jadwals_table', 1),
(5, '2021_05_31_170404_create_permission_tables', 1),
(6, '2021_06_01_092935_create_admins_table', 1),
(7, '2021_06_01_115533_create_matkuls_table', 1),
(8, '2021_06_19_155329_create_kelas_table', 1),
(9, '2021_06_24_143650_create_fakultas_table', 1),
(10, '2021_06_24_144427_create_dosen_matkul', 1),
(11, '2021_06_27_151139_create_dosen_kelas_table', 1),
(12, '2021_07_08_104748_create_materis_table', 1),
(13, '2021_07_25_210355_create_tugas_table', 1),
(14, '2021_08_23_155644_create_absens_table', 1),
(15, '2021_11_13_153805_create_nilai_tugas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Admin', 2),
(1, 'App\\Models\\Admin', 3),
(2, 'App\\Models\\Dosen', 1),
(2, 'App\\Models\\Dosen', 52),
(2, 'App\\Models\\Dosen', 53),
(2, 'App\\Models\\Dosen', 54),
(2, 'App\\Models\\Dosen', 55),
(2, 'App\\Models\\Dosen', 56),
(2, 'App\\Models\\Dosen', 57),
(2, 'App\\Models\\Dosen', 58),
(2, 'App\\Models\\Dosen', 59),
(2, 'App\\Models\\Dosen', 60),
(2, 'App\\Models\\Dosen', 61),
(2, 'App\\Models\\Dosen', 62),
(3, 'App\\Models\\Mahasiswa', 1),
(3, 'App\\Models\\Mahasiswa', 402),
(3, 'App\\Models\\Mahasiswa', 403),
(3, 'App\\Models\\Mahasiswa', 404),
(3, 'App\\Models\\Mahasiswa', 405);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_tugas`
--

CREATE TABLE `nilai_tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tugas_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `komentar_dosen` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai_tugas`
--

INSERT INTO `nilai_tugas` (`id`, `tugas_id`, `dosen_id`, `nilai`, `komentar_dosen`, `created_at`, `updated_at`) VALUES
(3, 12, 1, 90, 'Tingkatkan', '2023-03-22 03:33:24', '2023-03-22 03:33:58'),
(4, 14, 1, 87, 'Tingkatkan Geulis', '2023-03-22 05:05:25', '2023-03-22 05:05:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dosen@gmail.com', 'aSIY6wJw09P8MLS23AJD7PDedcgimGOHckOka8b2RfZH7L7tdt4nPIx5vZ6G', '2023-03-12 14:28:13'),
('arimuhamadsetiawan@gmail.com', 'WUjyuTe2ZoC3ZyZtaR2Un8IyFuRvcxVZWe6lEmuYnA91tlUhjiNRqo1KhHgm', '2023-03-12 14:37:19'),
('arimuhamadsetiawan@gmail.com', 'SVXTKW2Hfaq8ht69qejinquMHhBXnbbJUnIB5g6mWFL8GgCdO7Gl9hkCKXVo', '2023-03-12 14:38:56'),
('arimsetyawan@gmail.com', 'XQVmLSq7FuHTAbzUlRoFWKuNRGb5hVNsZOizwNIB6GJaMwlguM0Fd7r2wiJP', '2023-03-12 14:42:08'),
('arimsetyawan@gmail.com', 'wSlKAYSKdnDvRLOap0kwG1mon17BDeYlbCyJRaJm1k09kNLRNwS2mMOpMFpc', '2023-03-12 18:20:55'),
('arimuhamadsetiawan@gmail.com', 'pX1xFHj97ZZxb2aUfD9RmTxMELkkdqaErSuq8E6TBp1sohTmONjZFfiOji79', '2023-03-12 18:52:23'),
('arimuhamadsetiawan@gmail.com', 'FCoqkTj6l9hcoEhXZ2LGGkyP76pgP9oKo8whN3WcSCSZYbJWJetzvNYGl3ad', '2023-03-13 02:21:38'),
('arimuhamadsetiawan@gmail.com', '2tFfC6SyzdDrNsOwO3Fb6fDyJEb0ZIeigT5izoPOJZKWqnL1UcPL1BPkt63F', '2023-03-14 16:42:12'),
('arimuhamadsetiawan@gmail.com', 'cZ8SaiVkflmSRvzNy5vAmSG19G0q7dL1QX1xY6VidYv0GyzncqxWRgTGKjfI', '2023-03-16 16:05:16'),
('arimuhamadsetiawan@gmail.com', 'sYXxiv9yxdHmCg0CRPU27ntzbKj06l1fau6I4mnUyadt0DQh9LaaU7G1aKlf', '2023-03-16 16:07:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'jadwal kuliah', 'mahasiswa', '2023-03-09 17:58:11', '2023-03-09 17:58:11'),
(2, 'jadwal mengajar', 'dosen', '2023-03-09 17:58:11', '2023-03-09 17:58:11'),
(3, 'management nilai', 'dosen', '2023-03-09 17:58:11', '2023-03-09 17:58:11'),
(4, 'management materi', 'dosen', '2023-03-09 17:58:11', '2023-03-09 17:58:11'),
(5, 'management absen', 'dosen', '2023-03-09 17:58:11', '2023-03-09 17:58:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2023-03-09 17:58:11', '2023-03-09 17:58:11'),
(2, 'dosen', 'dosen', '2023-03-09 17:58:11', '2023-03-09 17:58:11'),
(3, 'mahasiswa', 'mahasiswa', '2023-03-09 17:58:11', '2023-03-09 17:58:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(2, 2),
(3, 2),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` int(10) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `matkul_id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent` varchar(255) NOT NULL DEFAULT '0',
  `judul` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) NOT NULL,
  `file_or_link` varchar(255) NOT NULL,
  `pertemuan` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `pengumpulan` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `jadwal_id`, `dosen_id`, `matkul_id`, `mahasiswa_id`, `parent`, `judul`, `tipe`, `file_or_link`, `pertemuan`, `deskripsi`, `pengumpulan`, `created_at`, `updated_at`) VALUES
(13, 1, 1, 7, NULL, '0', 'Cara Upgrade Laravel 9 Ke Laravel 10 Di Windows 10', 'link', 'https://www.youtube.com/watch?v=L9fQfENpx6w', '1', 'Kerjakan', '2023-03-22 23:59:00', '2023-03-22 04:48:26', '2023-03-22 05:01:51'),
(14, 1, NULL, 7, 1, '13', 'Cara Upgrade Laravel 9 Ke Laravel 10 Di Windows 10', 'file', 'bahan_ajar/Ob23KFDC4vrKCfZj1x9yaiOj7nFireKFbONdgM3B.png', '1', 'Kerjakan', '2023-03-22 23:59:00', '2023-03-22 05:04:00', '2023-03-22 05:04:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen_kelas`
--
ALTER TABLE `dosen_kelas`
  ADD PRIMARY KEY (`dosen_id`,`kelas_id`);

--
-- Indeks untuk tabel `dosen_matkul`
--
ALTER TABLE `dosen_matkul`
  ADD PRIMARY KEY (`dosen_id`,`matkul_id`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswas_email_unique` (`email`);

--
-- Indeks untuk tabel `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matkuls`
--
ALTER TABLE `matkuls`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absens`
--
ALTER TABLE `absens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT untuk tabel `materis`
--
ALTER TABLE `materis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `matkuls`
--
ALTER TABLE `matkuls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
