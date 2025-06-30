-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2025 at 06:38 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `akademik`
--

CREATE TABLE `akademik` (
  `id_akademik` bigint UNSIGNED NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akademik`
--

INSERT INTO `akademik` (`id_akademik`, `mulai`, `akhir`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '2025-06-01', '2026-01-01', 1, '2025-06-16 12:08:14', '2025-06-16 12:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'VII A', '2025-06-16 12:06:20', '2025-06-16 12:06:20'),
(2, 'VII B', '2025-06-16 12:06:52', '2025-06-16 12:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_05_21_192209_create_siswa_table', 1),
(6, '2025_05_23_191242_create_kelas_table', 1),
(7, '2025_05_23_201342_create_spp_table', 1),
(8, '2025_05_23_202318_create_akademik_table', 1),
(9, '2025_05_23_205804_add_role_to_users_table', 1),
(10, '2025_06_15_181135_create_pembagian_spp_table', 1),
(11, '2025_06_19_051914_create_trasaksi_table', 2),
(12, '2025_06_19_055941_create_trasaksi_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembagian_spp`
--

CREATE TABLE `pembagian_spp` (
  `id_pembagian` bigint UNSIGNED NOT NULL,
  `id_akademik` bigint UNSIGNED NOT NULL,
  `id_kelas` bigint UNSIGNED NOT NULL,
  `id_spp` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembagian_spp`
--

INSERT INTO `pembagian_spp` (`id_pembagian`, `id_akademik`, `id_kelas`, `id_spp`, `siswa_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, '2025-06-16 12:08:38', '2025-06-16 12:08:38'),
(2, 1, 1, 1, 198, '2025-06-16 12:09:01', '2025-06-16 12:09:01'),
(3, 1, 1, 1, 199, '2025-06-16 12:09:01', '2025-06-16 12:09:01'),
(4, 1, 1, 1, 200, '2025-06-16 12:09:01', '2025-06-16 12:09:01'),
(5, 1, 1, 1, 1, '2025-06-19 10:11:21', '2025-06-19 10:11:21'),
(6, 1, 1, 1, 2, '2025-06-19 10:11:21', '2025-06-19 10:11:21'),
(7, 1, 1, 1, 3, '2025-06-19 10:11:21', '2025-06-19 10:11:21'),
(8, 1, 1, 1, 4, '2025-06-19 10:11:51', '2025-06-19 10:11:51'),
(9, 1, 1, 1, 5, '2025-06-19 10:11:51', '2025-06-19 10:11:51'),
(10, 1, 1, 1, 6, '2025-06-19 10:11:51', '2025-06-19 10:11:51'),
(11, 1, 2, 1, NULL, '2025-06-19 10:28:05', '2025-06-19 10:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_orang_tua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nisn`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nama_orang_tua`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'NIS0001', 'NISN00001', 'Gasti Nurdiyanti', 'P', 'Tebing Tinggi', '1994-08-29', 'Ds. W.R. Supratman No. 264, Lubuklinggau 11431, Pabar', 'Laras Yuliarti', '(+62) 23 3080 9684', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(2, 'NIS0002', 'NISN00002', 'Winda Pia Fujiati', 'L', 'Bogor', '1970-12-06', 'Kpg. Bara No. 13, Padangsidempuan 57114, Sumut', 'Widya Hilda Safitri M.Pd', '0263 9283 9390', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(3, 'NIS0003', 'NISN00003', 'Mursita Iswahyudi S.I.Kom', 'L', 'Administrasi Jakarta Selatan', '1982-09-16', 'Jln. Flora No. 890, Kotamobagu 47879, Kalbar', 'Oni Cici Rahimah', '(+62) 793 0101 656', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(4, 'NIS0004', 'NISN00004', 'Puji Laksmiwati', 'L', 'Parepare', '1994-04-30', 'Jln. Nangka No. 589, Padangpanjang 71888, Jabar', 'Intan Yance Melani S.Pd', '0308 2028 255', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(5, 'NIS0005', 'NISN00005', 'Darmanto Wibisono', 'L', 'Payakumbuh', '2005-11-24', 'Jr. Baladewa No. 627, Batam 39449, Gorontalo', 'Elisa Agustina', '(+62) 504 1272 2375', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(6, 'NIS0006', 'NISN00006', 'Najib Ramadan', 'P', 'Sukabumi', '1972-09-24', 'Ds. Ujung No. 413, Manado 86211, NTB', 'Nurul Nasyidah', '(+62) 828 2923 206', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(7, 'NIS0007', 'NISN00007', 'Vero Taufik Hakim S.I.Kom', 'L', 'Solok', '1986-04-04', 'Ds. Dr. Junjunan No. 229, Kupang 90045, Sulbar', 'Vega Anom Maulana', '0610 6715 3957', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(8, 'NIS0008', 'NISN00008', 'Latika Suartini S.Pd', 'L', 'Tidore Kepulauan', '2006-03-29', 'Dk. Lembong No. 698, Tanjungbalai 56932, Maluku', 'Elvina Fujiati', '0557 9727 784', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(9, 'NIS0009', 'NISN00009', 'Calista Sudiati', 'L', 'Jambi', '1978-07-12', 'Ki. Jaksa No. 646, Samarinda 44181, Kalsel', 'Eka Yulianti', '(+62) 25 0373 607', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(10, 'NIS0010', 'NISN00010', 'Reksa Candra Saefullah S.H.', 'P', 'Palembang', '1989-11-25', 'Ki. Diponegoro No. 924, Banjarmasin 98256, Aceh', 'Darimin Suryono S.Psi', '(+62) 805 1400 5550', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(11, 'NIS0011', 'NISN00011', 'Natalia Lestari', 'L', 'Sabang', '1999-09-13', 'Jr. Barat No. 921, Pekanbaru 12841, NTT', 'Hairyanto Sirait', '(+62) 204 5855 756', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(12, 'NIS0012', 'NISN00012', 'Karimah Hassanah', 'L', 'Ambon', '1982-03-22', 'Jr. Basoka Raya No. 986, Serang 19077, Maluku', 'Jaeman Wacana M.Farm', '0565 6506 8097', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(13, 'NIS0013', 'NISN00013', 'Ika Nasyidah S.Gz', 'L', 'Administrasi Jakarta Timur', '1976-10-18', 'Ds. Basudewo No. 306, Ambon 41021, Gorontalo', 'Rika Andriani', '(+62) 422 9046 779', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(14, 'NIS0014', 'NISN00014', 'Baktiadi Napitupulu', 'P', 'Sungai Penuh', '1985-10-31', 'Ds. Baan No. 957, Gorontalo 54725, Kalbar', 'Tami Restu Oktaviani', '(+62) 347 6967 360', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(15, 'NIS0015', 'NISN00015', 'Farah Ophelia Sudiati S.Farm', 'P', 'Palembang', '2010-08-01', 'Dk. Jambu No. 255, Bengkulu 92030, Kalsel', 'Jasmin Hartati', '(+62) 427 3942 221', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(16, 'NIS0016', 'NISN00016', 'Aris Tamba', 'P', 'Jayapura', '1983-12-29', 'Gg. Setiabudhi No. 523, Pematangsiantar 52473, Malut', 'Ella Sudiati', '0806 0386 787', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(17, 'NIS0017', 'NISN00017', 'Galuh Abyasa Salahudin', 'P', 'Sukabumi', '2000-04-27', 'Jr. Mahakam No. 261, Bandung 81255, DIY', 'Yoga Maheswara S.Pd', '(+62) 508 1177 5020', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(18, 'NIS0018', 'NISN00018', 'Irfan Rajata', 'P', 'Tanjung Pinang', '1990-03-14', 'Jln. Ters. Kiaracondong No. 977, Pangkal Pinang 35887, Jambi', 'Zalindra Vicky Rahmawati S.T.', '0669 7440 1971', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(19, 'NIS0019', 'NISN00019', 'Olga Firmansyah M.Pd', 'L', 'Padangsidempuan', '2009-02-05', 'Kpg. Antapani Lama No. 652, Pematangsiantar 44488, Kalbar', 'Eli Rahayu', '(+62) 725 3240 225', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(20, 'NIS0020', 'NISN00020', 'Cengkir Hutasoit', 'P', 'Jayapura', '2003-06-23', 'Jln. Gading No. 686, Pagar Alam 89209, Lampung', 'Niyaga Mahendra', '0594 4228 1245', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(21, 'NIS0021', 'NISN00021', 'Nadia Melani', 'P', 'Lubuklinggau', '1992-11-26', 'Jln. Salak No. 270, Pematangsiantar 64268, Sumut', 'Puji Laksmiwati', '0458 3726 8583', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(22, 'NIS0022', 'NISN00022', 'Tari Widya Hassanah S.Pd', 'L', 'Jayapura', '1987-09-18', 'Ki. Padang No. 581, Gorontalo 36416, Papua', 'Farah Aurora Nuraini', '(+62) 627 5992 7683', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(23, 'NIS0023', 'NISN00023', 'Enteng Artanto Irawan', 'P', 'Langsa', '1983-04-05', 'Gg. Asia Afrika No. 482, Pontianak 12972, Bali', 'Virman Saptono', '(+62) 330 9551 344', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(24, 'NIS0024', 'NISN00024', 'Paulin Agustina', 'L', 'Cimahi', '2001-06-20', 'Jln. K.H. Maskur No. 237, Malang 15788, Pabar', 'Estiono Gunawan', '(+62) 476 6928 157', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(25, 'NIS0025', 'NISN00025', 'Michelle Uyainah', 'L', 'Prabumulih', '2004-05-21', 'Gg. Wahidin Sudirohusodo No. 836, Banjarmasin 26592, Kalteng', 'Humaira Mardhiyah', '(+62) 836 963 307', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(26, 'NIS0026', 'NISN00026', 'Restu Mardhiyah', 'P', 'Pangkal Pinang', '2003-10-06', 'Kpg. Ters. Jakarta No. 961, Sabang 65788, Sulut', 'Nabila Pudjiastuti S.T.', '(+62) 297 9064 7281', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(27, 'NIS0027', 'NISN00027', 'Silvia Nuraini', 'P', 'Tanjungbalai', '2002-07-22', 'Kpg. Sunaryo No. 236, Administrasi Jakarta Pusat 68683, Riau', 'Warji Utama S.E.I', '0329 3325 8744', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(28, 'NIS0028', 'NISN00028', 'Ella Nasyidah', 'L', 'Surakarta', '1982-12-08', 'Kpg. Banal No. 958, Palopo 36611, Kaltim', 'Zulaikha Oktaviani M.Farm', '(+62) 800 4125 0962', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(29, 'NIS0029', 'NISN00029', 'Icha Yuni Hartati S.I.Kom', 'L', 'Banda Aceh', '1997-06-24', 'Dk. Bak Air No. 327, Palu 54023, Sumbar', 'Sadina Sabrina Astuti S.H.', '0925 1695 0472', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(30, 'NIS0030', 'NISN00030', 'Candrakanta Habibi', 'L', 'Ternate', '2003-11-23', 'Psr. Antapani Lama No. 678, Langsa 58849, Banten', 'Maryadi Firgantoro', '0643 2837 5916', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(31, 'NIS0031', 'NISN00031', 'Olivia Nasyidah', 'P', 'Tidore Kepulauan', '1992-01-29', 'Ki. Sudiarto No. 449, Sibolga 16443, Aceh', 'Uda Gandewa Setiawan', '028 9308 108', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(32, 'NIS0032', 'NISN00032', 'Jagapati Saputra M.TI.', 'L', 'Banjarbaru', '1972-04-14', 'Jr. Sudiarto No. 929, Madiun 70391, Sumsel', 'Kamal Prayoga Wacana S.Pd', '0302 5481 386', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(33, 'NIS0033', 'NISN00033', 'Vicky Nurdiyanti', 'L', 'Tangerang Selatan', '1993-04-08', 'Jln. Rajawali No. 403, Sibolga 65735, Jatim', 'Kuncara Mansur', '0604 8604 6810', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(34, 'NIS0034', 'NISN00034', 'Tina Palastri', 'L', 'Administrasi Jakarta Barat', '2010-09-24', 'Jln. Casablanca No. 958, Madiun 22347, Bali', 'Bella Nurdiyanti', '(+62) 746 9356 028', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(35, 'NIS0035', 'NISN00035', 'Danu Sihotang', 'L', 'Banjarmasin', '1995-01-28', 'Ds. Camar No. 278, Solok 91097, Sulut', 'Cahya Kemal Prakasa', '0587 9238 9744', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(36, 'NIS0036', 'NISN00036', 'Eka Hariyah', 'P', 'Administrasi Jakarta Pusat', '1998-12-25', 'Kpg. Jaksa No. 49, Probolinggo 34312, Jatim', 'Gangsa Wijaya S.Farm', '(+62) 331 5468 207', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(37, 'NIS0037', 'NISN00037', 'Mulya Narpati', 'L', 'Banjar', '1993-08-19', 'Jr. Sutoyo No. 257, Bengkulu 93205, Sulteng', 'Jasmin Safitri', '(+62) 202 0738 0961', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(38, 'NIS0038', 'NISN00038', 'Opung Mahendra', 'P', 'Pontianak', '1978-05-19', 'Jr. Imam Bonjol No. 955, Ternate 60542, DKI', 'Simon Vero Saputra M.TI.', '0362 5233 8181', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(39, 'NIS0039', 'NISN00039', 'Amelia Usamah', 'P', 'Bontang', '1980-08-05', 'Gg. Labu No. 412, Singkawang 40368, Kalbar', 'Ulya Oliva Usamah', '0321 3247 3677', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(40, 'NIS0040', 'NISN00040', 'Malik Narpati', 'P', 'Metro', '2008-11-05', 'Jr. Kalimalang No. 764, Kendari 86646, Maluku', 'Kamila Mulyani', '(+62) 632 0866 0002', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(41, 'NIS0041', 'NISN00041', 'Sarah Ratna Palastri', 'P', 'Tidore Kepulauan', '1978-06-23', 'Jr. Basuki Rahmat  No. 573, Tasikmalaya 16787, Sumut', 'Xanana Wijaya', '(+62) 26 3973 192', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(42, 'NIS0042', 'NISN00042', 'Hesti Utami', 'L', 'Probolinggo', '1981-03-25', 'Ki. Wahidin No. 640, Mataram 72515, Kalbar', 'Kawaya Hakim', '(+62) 23 4206 5808', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(43, 'NIS0043', 'NISN00043', 'Winda Ida Puspasari M.TI.', 'L', 'Cimahi', '1975-04-13', 'Jln. Babah No. 244, Pekanbaru 15922, Papua', 'Fathonah Hasanah', '0722 6728 331', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(44, 'NIS0044', 'NISN00044', 'Ajeng Rahimah', 'L', 'Gunungsitoli', '1979-10-11', 'Psr. Kalimantan No. 712, Dumai 93983, Bali', 'Harjasa Mustofa Simanjuntak S.Pd', '(+62) 826 3651 1614', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(45, 'NIS0045', 'NISN00045', 'Citra Icha Lestari', 'P', 'Sungai Penuh', '1992-12-28', 'Ds. Moch. Ramdan No. 338, Manado 97840, Sumsel', 'Rika Novitasari', '0271 7343 9218', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(46, 'NIS0046', 'NISN00046', 'Genta Maryati', 'P', 'Sabang', '1997-03-11', 'Psr. Bara Tambar No. 650, Manado 64760, Aceh', 'Cecep Mursita Jailani', '(+62) 20 6796 078', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(47, 'NIS0047', 'NISN00047', 'Kamila Rahimah M.Kom.', 'L', 'Ternate', '1987-01-14', 'Jln. Jend. A. Yani No. 847, Prabumulih 26919, NTT', 'Ciaobella Jamalia Kusmawati', '(+62) 846 398 546', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(48, 'NIS0048', 'NISN00048', 'Dasa Nugroho S.Gz', 'P', 'Tanjung Pinang', '1974-09-18', 'Ki. Bak Air No. 468, Tanjungbalai 29784, Kepri', 'Aditya Radika Lazuardi S.Kom', '0634 1811 122', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(49, 'NIS0049', 'NISN00049', 'Cindy Rina Oktaviani S.Farm', 'P', 'Batam', '1994-06-29', 'Jr. Hasanuddin No. 921, Tangerang Selatan 46738, Sulbar', 'Faizah Wijayanti', '0613 3262 463', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(50, 'NIS0050', 'NISN00050', 'Daliono Taswir Prabowo M.M.', 'L', 'Bima', '1990-01-28', 'Kpg. Bazuka Raya No. 182, Sukabumi 84228, Kalteng', 'Eka Yolanda', '(+62) 686 6185 127', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(51, 'NIS0051', 'NISN00051', 'Damar Napitupulu S.H.', 'L', 'Serang', '1985-09-23', 'Ds. Suprapto No. 857, Tangerang 28239, Sumut', 'Vega Prasetya', '0268 9718 404', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(52, 'NIS0052', 'NISN00052', 'Aurora Hassanah', 'L', 'Blitar', '2003-01-14', 'Ki. Babah No. 49, Bontang 94321, Gorontalo', 'Paiman Prayoga S.Pt', '0742 1933 595', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(53, 'NIS0053', 'NISN00053', 'Edward Rizki Hutasoit', 'L', 'Kotamobagu', '1980-02-27', 'Jr. Setia Budi No. 417, Tasikmalaya 70310, Sulsel', 'Janet Zulfa Usada', '(+62) 453 4688 837', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(54, 'NIS0054', 'NISN00054', 'Tirtayasa Simanjuntak', 'L', 'Banjarbaru', '1994-07-21', 'Psr. Gegerkalong Hilir No. 847, Metro 64686, DKI', 'Zamira Kusmawati', '(+62) 405 1821 7208', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(55, 'NIS0055', 'NISN00055', 'Patricia Namaga M.Farm', 'P', 'Gorontalo', '1986-07-15', 'Ki. Suprapto No. 74, Medan 65370, Kaltara', 'Patricia Puspita', '(+62) 953 4258 4946', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(56, 'NIS0056', 'NISN00056', 'Uchita Safitri S.T.', 'L', 'Sungai Penuh', '2004-01-26', 'Ki. Cihampelas No. 260, Bandar Lampung 30871, Kepri', 'Usman Mandala', '(+62) 630 5499 293', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(57, 'NIS0057', 'NISN00057', 'Cahyadi Putra M.Pd', 'P', 'Lhokseumawe', '1985-06-02', 'Psr. Bakit  No. 450, Administrasi Jakarta Barat 94730, Kaltim', 'Malik Balangga Suryono M.Farm', '0656 9184 569', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(58, 'NIS0058', 'NISN00058', 'Kairav Simanjuntak', 'P', 'Probolinggo', '1974-05-19', 'Ki. Madrasah No. 20, Makassar 27526, Malut', 'Gatot Mahendra', '0525 7259 019', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(59, 'NIS0059', 'NISN00059', 'Luwes Budiyanto', 'P', 'Mataram', '1980-12-06', 'Ds. Sudirman No. 310, Ternate 65985, Bengkulu', 'Titi Nuraini', '0581 5708 998', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(60, 'NIS0060', 'NISN00060', 'Karen Suartini', 'P', 'Yogyakarta', '1972-03-14', 'Kpg. Pattimura No. 257, Batam 17150, Pabar', 'Sadina Permata', '0916 5730 2312', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(61, 'NIS0061', 'NISN00061', 'Jamil Narpati', 'P', 'Sawahlunto', '1978-03-04', 'Kpg. Acordion No. 143, Administrasi Jakarta Barat 36560, DKI', 'Reksa Elon Prayoga', '(+62) 382 8505 389', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(62, 'NIS0062', 'NISN00062', 'Emas Ramadan', 'L', 'Cirebon', '1971-09-30', 'Gg. Basket No. 726, Jayapura 75387, Babel', 'Hafshah Tania Suartini S.Pt', '0781 9565 2127', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(63, 'NIS0063', 'NISN00063', 'Prabowo Prabowo', 'L', 'Pekanbaru', '1986-01-25', 'Kpg. Salak No. 590, Palangka Raya 80955, Maluku', 'Ella Mila Usada S.E.', '023 3190 2261', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(64, 'NIS0064', 'NISN00064', 'Tedi Irawan', 'P', 'Manado', '1975-03-03', 'Gg. Reksoninten No. 215, Bogor 56697, Sulsel', 'Salman Utama', '(+62) 323 5905 3966', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(65, 'NIS0065', 'NISN00065', 'Diah Laksita', 'L', 'Kendari', '1989-11-16', 'Jr. Rajiman No. 383, Administrasi Jakarta Timur 36498, Sultra', 'Cindy Wijayanti S.I.Kom', '(+62) 254 3393 623', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(66, 'NIS0066', 'NISN00066', 'Tomi Hutagalung', 'L', 'Pekalongan', '1975-05-11', 'Dk. Pasir Koja No. 239, Tidore Kepulauan 95469, Sulut', 'Raina Wahyuni', '0785 3308 563', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(67, 'NIS0067', 'NISN00067', 'Yance Elma Rahmawati', 'P', 'Madiun', '1995-02-16', 'Jr. R.M. Said No. 137, Tebing Tinggi 88587, Papua', 'Prima Pranowo', '0845 582 610', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(68, 'NIS0068', 'NISN00068', 'Ida Nuraini', 'L', 'Langsa', '1985-11-24', 'Dk. Gambang No. 225, Tarakan 11691, NTB', 'Zaenab Rahimah', '(+62) 733 5983 236', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(69, 'NIS0069', 'NISN00069', 'Victoria Lailasari', 'P', 'Lhokseumawe', '1976-11-11', 'Ki. Antapani Lama No. 936, Pariaman 13149, Malut', 'Taswir Zulkarnain', '(+62) 22 6673 0577', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(70, 'NIS0070', 'NISN00070', 'Dalima Pratiwi', 'P', 'Palangka Raya', '1992-11-27', 'Psr. Basoka Raya No. 821, Gunungsitoli 91893, Sulteng', 'Faizah Kiandra Mulyani', '(+62) 538 2004 3411', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(71, 'NIS0071', 'NISN00071', 'Gatot Pranowo', 'L', 'Pangkal Pinang', '2006-01-25', 'Gg. Abang No. 756, Pontianak 23515, Jateng', 'Jono Latupono', '0556 6640 569', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(72, 'NIS0072', 'NISN00072', 'Praba Hutasoit', 'P', 'Solok', '1990-10-06', 'Ds. Rumah Sakit No. 952, Pekanbaru 39335, Sultra', 'Imam Taufan Maulana', '(+62) 487 5878 1183', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(73, 'NIS0073', 'NISN00073', 'Rusman Saptono S.IP', 'P', 'Bogor', '1970-09-03', 'Psr. Teuku Umar No. 910, Mojokerto 58291, Kaltara', 'Indah Namaga', '0762 4255 297', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(74, 'NIS0074', 'NISN00074', 'Taufan Lukman Wahyudin', 'L', 'Metro', '1996-02-18', 'Jln. Baja No. 317, Pasuruan 70467, Pabar', 'Daniswara Karna Pranowo', '0557 8199 947', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(75, 'NIS0075', 'NISN00075', 'Balapati Mangunsong', 'L', 'Gorontalo', '1973-12-26', 'Dk. Ters. Pasir Koja No. 370, Surakarta 31005, Riau', 'Chandra Wibisono', '(+62) 505 1939 196', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(76, 'NIS0076', 'NISN00076', 'Maryanto Hutagalung', 'L', 'Banjarmasin', '1986-06-10', 'Kpg. Yap Tjwan Bing No. 902, Pontianak 76249, Kaltim', 'Baktiadi Pranowo', '(+62) 276 0748 313', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(77, 'NIS0077', 'NISN00077', 'Raisa Rahayu S.H.', 'L', 'Pekanbaru', '2005-07-25', 'Gg. Basmol Raya No. 777, Jambi 72551, Kaltara', 'Nalar Sinaga', '0558 5955 269', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(78, 'NIS0078', 'NISN00078', 'Wirda Namaga', 'P', 'Jambi', '1999-12-02', 'Gg. Basmol Raya No. 487, Sibolga 82074, Riau', 'Teddy Utama S.Kom', '(+62) 297 1176 2760', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(79, 'NIS0079', 'NISN00079', 'Talia Utami', 'P', 'Denpasar', '2001-11-12', 'Gg. Nanas No. 831, Gorontalo 19653, Babel', 'Marwata Latupono', '0582 3589 3600', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(80, 'NIS0080', 'NISN00080', 'Najam Mansur', 'P', 'Banjar', '1989-01-05', 'Dk. Ujung No. 99, Kotamobagu 44254, Sumut', 'Eluh Halim S.Farm', '(+62) 890 4980 7739', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(81, 'NIS0081', 'NISN00081', 'Gawati Rahayu', 'L', 'Surabaya', '2009-01-26', 'Gg. Baja Raya No. 82, Ambon 92523, DKI', 'Maida Wahyuni', '0270 5909 7953', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(82, 'NIS0082', 'NISN00082', 'Leo Thamrin', 'L', 'Sukabumi', '1993-07-15', 'Ki. Camar No. 783, Metro 14869, Kalsel', 'Cinta Riyanti', '0459 9053 768', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(83, 'NIS0083', 'NISN00083', 'Syahrini Utami', 'P', 'Tanjung Pinang', '1991-12-31', 'Jr. B.Agam Dlm No. 231, Depok 24576, Jabar', 'Puput Astuti S.IP', '0546 3560 8256', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(84, 'NIS0084', 'NISN00084', 'Diah Jane Suryatmi', 'P', 'Bima', '1998-05-22', 'Dk. Babakan No. 815, Probolinggo 87593, Sumut', 'Emas Setiawan', '(+62) 293 3775 610', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(85, 'NIS0085', 'NISN00085', 'Estiawan Estiawan Nashiruddin', 'L', 'Pariaman', '1999-11-14', 'Ki. Salak No. 797, Denpasar 17244, Bengkulu', 'Dewi Hariyah', '(+62) 383 4353 2498', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(86, 'NIS0086', 'NISN00086', 'Gading Kurniawan S.Farm', 'L', 'Banjar', '1981-11-10', 'Ki. Ters. Jakarta No. 410, Administrasi Jakarta Barat 67973, Kalteng', 'Dono Jaeman Hutasoit', '(+62) 200 8991 1096', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(87, 'NIS0087', 'NISN00087', 'Indra Habibi M.TI.', 'P', 'Solok', '2005-01-03', 'Ds. Ters. Buah Batu No. 271, Surakarta 78766, Sumbar', 'Teguh Ardianto', '(+62) 731 3947 988', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(88, 'NIS0088', 'NISN00088', 'Danuja Simbolon', 'P', 'Bontang', '2005-05-12', 'Jln. Jayawijaya No. 948, Langsa 99763, Bali', 'Maras Prasetya', '0789 2962 3941', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(89, 'NIS0089', 'NISN00089', 'Koko Hutasoit', 'P', 'Kotamobagu', '2004-12-14', 'Gg. Rajawali Barat No. 474, Samarinda 23742, Kalsel', 'Clara Ana Anggraini', '0731 6468 9898', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(90, 'NIS0090', 'NISN00090', 'Kezia Suartini', 'P', 'Pariaman', '2002-04-21', 'Kpg. Pelajar Pejuang 45 No. 404, Sorong 61186, Kaltim', 'Chelsea Dewi Palastri S.T.', '021 1401 9745', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(91, 'NIS0091', 'NISN00091', 'Widya Yulianti S.H.', 'L', 'Ternate', '1971-08-21', 'Gg. Hasanuddin No. 306, Sabang 93726, Gorontalo', 'Ana Maryati M.Ak', '024 1885 513', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(92, 'NIS0092', 'NISN00092', 'Bahuwarna Harsana Rajasa S.I.Kom', 'P', 'Banjarbaru', '2002-07-30', 'Jln. M.T. Haryono No. 986, Sawahlunto 89081, NTT', 'Lasmono Dabukke', '(+62) 252 6047 0027', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(93, 'NIS0093', 'NISN00093', 'Najib Jarwadi Hidayanto', 'L', 'Tomohon', '1973-01-08', 'Dk. Barasak No. 350, Tomohon 60043, Babel', 'Unjani Nuraini M.Kom.', '(+62) 333 6491 4816', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(94, 'NIS0094', 'NISN00094', 'Saka Sihombing', 'P', 'Jayapura', '1970-05-25', 'Ds. Madrasah No. 85, Tanjung Pinang 33258, Kalbar', 'Jarwa Emong Waskita', '0404 0357 545', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(95, 'NIS0095', 'NISN00095', 'Prakosa Kurniawan', 'P', 'Palembang', '1985-10-21', 'Dk. Supomo No. 607, Prabumulih 52664, DKI', 'Kasiran Rahmat Mangunsong S.Sos', '0793 2182 043', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(96, 'NIS0096', 'NISN00096', 'Imam Saadat Prayoga S.T.', 'P', 'Banjarbaru', '2001-04-27', 'Dk. Sumpah Pemuda No. 11, Palembang 95052, Sulteng', 'Ilsa Nasyidah', '(+62) 775 2432 8669', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(97, 'NIS0097', 'NISN00097', 'Ulya Pertiwi', 'P', 'Bukittinggi', '1985-01-30', 'Jr. Bagis Utama No. 881, Tangerang 39330, Gorontalo', 'Kemba Rizki Januar', '0874 5700 0751', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(98, 'NIS0098', 'NISN00098', 'Eluh Budi Kusumo', 'L', 'Padang', '2004-04-30', 'Ds. Thamrin No. 784, Binjai 51135, Jatim', 'Bahuwirya Sinaga', '(+62) 343 6915 6354', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(99, 'NIS0099', 'NISN00099', 'Karsa Sitorus', 'P', 'Kediri', '1983-12-05', 'Ki. Cemara No. 90, Semarang 10002, Gorontalo', 'Hilda Wijayanti S.Farm', '(+62) 706 6321 9428', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(100, 'NIS0100', 'NISN00100', 'Viktor Simanjuntak M.Ak', 'L', 'Batu', '1999-05-06', 'Ds. K.H. Wahid Hasyim (Kopo) No. 8, Ternate 14125, DKI', 'Genta Humaira Nasyiah S.Pd', '0575 4693 0955', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(101, 'NIS0101', 'NISN00101', 'Maimunah Pratiwi', 'P', 'Banda Aceh', '2000-01-05', 'Ds. Yos Sudarso No. 469, Banda Aceh 17433, Sumut', 'Mala Purnawati', '0542 8248 6778', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(102, 'NIS0102', 'NISN00102', 'Ami Pudjiastuti', 'P', 'Pangkal Pinang', '2001-09-08', 'Gg. Baranangsiang No. 207, Pariaman 29404, Jateng', 'Mustofa Taswir Sihombing', '0814 3520 228', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(103, 'NIS0103', 'NISN00103', 'Empluk Suryono', 'P', 'Bandar Lampung', '1995-04-20', 'Ki. Abdul Muis No. 115, Prabumulih 52439, Kalteng', 'Bagus Cecep Simanjuntak S.H.', '0504 2804 150', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(104, 'NIS0104', 'NISN00104', 'Devi Anggraini', 'L', 'Surakarta', '1987-09-13', 'Jr. Tentara Pelajar No. 939, Bengkulu 26477, Aceh', 'Padmi Winarsih', '(+62) 632 4759 5259', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(105, 'NIS0105', 'NISN00105', 'Karsa Dabukke', 'P', 'Padangsidempuan', '2004-10-16', 'Psr. B.Agam Dlm No. 202, Bima 97327, Kalsel', 'Heru Lazuardi', '0646 3941 6057', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(106, 'NIS0106', 'NISN00106', 'Pandu Pradana S.Psi', 'P', 'Metro', '1992-09-29', 'Kpg. Labu No. 123, Banjarmasin 48036, NTT', 'Kawaca Januar', '0698 3337 0905', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(107, 'NIS0107', 'NISN00107', 'Garan Wacana', 'P', 'Blitar', '1972-03-19', 'Dk. Banceng Pondok No. 343, Pangkal Pinang 21544, Sumbar', 'Zamira Tantri Pratiwi M.Ak', '0946 8626 8658', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(108, 'NIS0108', 'NISN00108', 'Lutfan Purwa Situmorang S.Pd', 'P', 'Pariaman', '1973-12-31', 'Ki. Sam Ratulangi No. 845, Medan 41285, Maluku', 'Garang Daryani Hidayanto S.Gz', '(+62) 500 0568 681', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(109, 'NIS0109', 'NISN00109', 'Dimas Mustofa M.Farm', 'L', 'Sorong', '1983-07-23', 'Jln. Bak Mandi No. 244, Jambi 83912, Banten', 'Dariati Samosir S.E.I', '0495 3273 7321', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(110, 'NIS0110', 'NISN00110', 'Tira Riyanti', 'L', 'Administrasi Jakarta Selatan', '1988-11-04', 'Ki. Baiduri No. 928, Bengkulu 55011, NTT', 'Tina Handayani S.IP', '(+62) 435 1493 6051', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(111, 'NIS0111', 'NISN00111', 'Jessica Usamah', 'P', 'Padangpanjang', '1977-04-28', 'Kpg. Rumah Sakit No. 816, Depok 10289, Sulsel', 'Suci Pudjiastuti', '(+62) 334 0938 046', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(112, 'NIS0112', 'NISN00112', 'Soleh Rajata', 'P', 'Tarakan', '2007-01-30', 'Ki. Sutarjo No. 340, Metro 50023, Babel', 'Lamar Anggriawan S.I.Kom', '(+62) 457 6041 805', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(113, 'NIS0113', 'NISN00113', 'Usyi Suartini S.Farm', 'L', 'Sawahlunto', '1985-02-19', 'Kpg. Sutoyo No. 72, Tangerang Selatan 54165, Kepri', 'Cakrawangsa Karya Pranowo', '(+62) 29 9308 0672', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(114, 'NIS0114', 'NISN00114', 'Dadi Kurniawan', 'L', 'Banda Aceh', '1972-12-06', 'Ds. Baung No. 457, Palembang 49835, Jambi', 'Legawa Halim M.TI.', '(+62) 825 3908 856', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(115, 'NIS0115', 'NISN00115', 'Yuni Riyanti S.Pd', 'P', 'Lhokseumawe', '2000-12-10', 'Jr. Jend. A. Yani No. 98, Cirebon 18331, Kaltara', 'Sabrina Lailasari S.E.', '(+62) 889 3731 100', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(116, 'NIS0116', 'NISN00116', 'Adiarja Saptono', 'P', 'Tanjungbalai', '1983-10-18', 'Jln. Jend. A. Yani No. 387, Madiun 98131, Sulteng', 'Marsito Prakasa', '(+62) 242 8564 4566', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(117, 'NIS0117', 'NISN00117', 'Halima Patricia Hariyah', 'L', 'Balikpapan', '1998-08-08', 'Gg. Qrisdoren No. 273, Salatiga 52433, Gorontalo', 'Lasmanto Situmorang', '0409 8354 805', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(118, 'NIS0118', 'NISN00118', 'Lamar Bala Widodo', 'L', 'Administrasi Jakarta Utara', '2001-11-11', 'Dk. Hang No. 63, Sabang 94769, Papua', 'Fitria Ade Hartati S.H.', '0224 0781 047', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(119, 'NIS0119', 'NISN00119', 'Zalindra Gilda Purwanti S.Kom', 'P', 'Depok', '2000-06-06', 'Jr. Ciumbuleuit No. 2, Serang 40539, Jabar', 'Ika Winarsih S.E.I', '(+62) 961 1071 4114', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(120, 'NIS0120', 'NISN00120', 'Latika Nuraini', 'L', 'Pagar Alam', '1991-07-01', 'Jr. Teuku Umar No. 974, Dumai 81320, Aceh', 'Luwes Prasasta', '(+62) 934 7943 887', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(121, 'NIS0121', 'NISN00121', 'Rina Riyanti', 'P', 'Serang', '1978-01-22', 'Gg. Jamika No. 82, Surakarta 61713, Bali', 'Yani Riyanti', '(+62) 271 9258 7862', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(122, 'NIS0122', 'NISN00122', 'Vanya Nasyidah S.Gz', 'L', 'Depok', '1997-09-13', 'Psr. Industri No. 910, Kendari 25331, Babel', 'Juli Andriani M.Ak', '(+62) 283 3490 651', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(123, 'NIS0123', 'NISN00123', 'Rahmi Handayani', 'L', 'Padangpanjang', '1975-05-09', 'Ds. Salak No. 540, Payakumbuh 38881, Sultra', 'Indah Siti Wahyuni M.TI.', '0871 670 277', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(124, 'NIS0124', 'NISN00124', 'Mutia Haryanti', 'L', 'Yogyakarta', '1972-04-23', 'Ki. Asia Afrika No. 785, Cirebon 54384, Bengkulu', 'Simon Sidiq Saefullah', '0493 4759 782', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(125, 'NIS0125', 'NISN00125', 'Tasnim Marbun', 'L', 'Bontang', '1975-04-28', 'Gg. Ketandan No. 558, Sukabumi 62090, Gorontalo', 'Jatmiko Putra S.Pt', '024 4943 0213', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(126, 'NIS0126', 'NISN00126', 'Rahmi Nadine Namaga', 'L', 'Palangka Raya', '1973-05-12', 'Jr. Tangkuban Perahu No. 599, Bitung 84561, Kaltara', 'Ade Karimah Melani S.Farm', '(+62) 946 4424 956', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(127, 'NIS0127', 'NISN00127', 'Ridwan Uwais', 'L', 'Mataram', '2004-08-25', 'Psr. Nangka No. 999, Administrasi Jakarta Selatan 17208, Sulteng', 'Galuh Budiman S.Farm', '0989 6609 8204', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(128, 'NIS0128', 'NISN00128', 'Mumpuni Usman Nainggolan S.Gz', 'P', 'Surakarta', '1991-12-08', 'Ds. Salam No. 188, Sorong 97832, Babel', 'Raisa Wijayanti', '(+62) 906 2622 0665', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(129, 'NIS0129', 'NISN00129', 'Siska Agustina', 'L', 'Padangpanjang', '1988-10-03', 'Gg. Kebangkitan Nasional No. 165, Dumai 22398, Kalteng', 'Harsaya Sihombing', '(+62) 583 1471 9453', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(130, 'NIS0130', 'NISN00130', 'Jarwadi Gunawan', 'P', 'Pematangsiantar', '1986-03-28', 'Jln. Nangka No. 973, Yogyakarta 64057, NTB', 'Kunthara Mahendra', '(+62) 369 2094 305', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(131, 'NIS0131', 'NISN00131', 'Ade Shakila Pratiwi S.Kom', 'P', 'Sorong', '1979-01-06', 'Jr. Sutan Syahrir No. 33, Probolinggo 70421, Sulut', 'Cakrawala Harjaya Adriansyah', '(+62) 967 0315 416', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(132, 'NIS0132', 'NISN00132', 'Oliva Raisa Kusmawati', 'L', 'Lubuklinggau', '1998-02-24', 'Psr. Tambak No. 420, Subulussalam 94519, Riau', 'Lili Mayasari', '(+62) 493 1923 084', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(133, 'NIS0133', 'NISN00133', 'Suci Hamima Pratiwi', 'P', 'Ambon', '1989-02-06', 'Ds. Labu No. 945, Bengkulu 68962, DIY', 'Syahrini Zulaika', '0835 5994 2829', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(134, 'NIS0134', 'NISN00134', 'Zulaikha Padmi Suartini', 'L', 'Solok', '1981-08-11', 'Ds. Sutan Syahrir No. 701, Probolinggo 86605, Banten', 'Bakda Simbolon M.Pd', '0735 9764 6765', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(135, 'NIS0135', 'NISN00135', 'Tina Ami Utami M.Ak', 'P', 'Kupang', '1995-06-15', 'Psr. Bakau No. 91, Tegal 22241, Babel', 'Usyi Kiandra Andriani M.M.', '(+62) 725 5667 4342', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(136, 'NIS0136', 'NISN00136', 'Atmaja Rajasa', 'L', 'Kendari', '2008-07-10', 'Dk. Dago No. 630, Sibolga 25263, Babel', 'Raden Wibowo', '0339 4123 5526', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(137, 'NIS0137', 'NISN00137', 'Mala Widiastuti', 'L', 'Bukittinggi', '1974-12-16', 'Gg. Cikutra Timur No. 630, Depok 68401, Gorontalo', 'Victoria Namaga S.Pd', '(+62) 907 1279 4586', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(138, 'NIS0138', 'NISN00138', 'Candra Marbun M.Farm', 'L', 'Padang', '1970-07-24', 'Ds. Taman No. 978, Banda Aceh 61342, Kaltim', 'Digdaya Napitupulu', '(+62) 918 0617 0399', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(139, 'NIS0139', 'NISN00139', 'Laras Aryani', 'P', 'Banjarmasin', '1998-04-09', 'Kpg. Elang No. 916, Tangerang Selatan 40576, Jambi', 'Lala Yuliarti', '(+62) 344 6894 351', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(140, 'NIS0140', 'NISN00140', 'Ilsa Yuliana Laksmiwati S.I.Kom', 'L', 'Bima', '1974-12-24', 'Ki. Thamrin No. 143, Surakarta 21079, Jateng', 'Julia Farida', '0901 5064 506', '2025-06-16 12:03:57', '2025-06-16 12:03:57'),
(141, 'NIS0141', 'NISN00141', 'Narji Hidayanto', 'L', 'Pasuruan', '1987-03-26', 'Gg. Urip Sumoharjo No. 771, Probolinggo 16411, NTB', 'Eli Suryatmi S.E.I', '0923 2449 880', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(142, 'NIS0142', 'NISN00142', 'Kamal Sihombing', 'P', 'Sawahlunto', '2008-01-09', 'Ki. Rajawali Barat No. 168, Bima 19121, Aceh', 'Ana Pudjiastuti', '(+62) 617 8359 9589', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(143, 'NIS0143', 'NISN00143', 'Prabowo Budiman', 'P', 'Jayapura', '1985-06-28', 'Psr. Peta No. 244, Subulussalam 79023, Sulsel', 'Kemba Lasmono Budiyanto', '(+62) 803 1050 6529', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(144, 'NIS0144', 'NISN00144', 'Gamani Thamrin', 'L', 'Lubuklinggau', '1986-02-20', 'Gg. Baladewa No. 468, Pontianak 96405, NTB', 'Cagak Firmansyah', '0874 0411 9102', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(145, 'NIS0145', 'NISN00145', 'Ratna Lestari', 'P', 'Sukabumi', '2008-11-12', 'Kpg. Setiabudhi No. 558, Mojokerto 17795, Jateng', 'Hana Alika Novitasari', '(+62) 846 555 136', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(146, 'NIS0146', 'NISN00146', 'Pardi Wawan Ramadan', 'L', 'Padangsidempuan', '2010-08-30', 'Kpg. Veteran No. 241, Palembang 26271, Kepri', 'Rina Pudjiastuti S.IP', '(+62) 806 8358 988', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(147, 'NIS0147', 'NISN00147', 'Laksana Mahmud Saragih M.Kom.', 'P', 'Binjai', '1974-04-18', 'Kpg. Halim No. 111, Tegal 73295, Papua', 'Carub Jailani S.Gz', '(+62) 876 898 272', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(148, 'NIS0148', 'NISN00148', 'Zelaya Fathonah Yolanda S.T.', 'P', 'Medan', '1993-02-04', 'Jr. Baan No. 140, Lubuklinggau 94250, Maluku', 'Leo Simanjuntak M.Kom.', '(+62) 934 1644 3436', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(149, 'NIS0149', 'NISN00149', 'Eka Pertiwi', 'P', 'Prabumulih', '2003-03-14', 'Kpg. Bahagia No. 419, Tangerang 54953, Jambi', 'Hardana Pranowo', '(+62) 240 4685 5555', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(150, 'NIS0150', 'NISN00150', 'Martani Sinaga', 'L', 'Bontang', '1974-12-28', 'Gg. Lumban Tobing No. 892, Semarang 20946, Sulbar', 'Edi Latupono', '0804 7340 496', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(151, 'NIS0151', 'NISN00151', 'Galih Halim', 'P', 'Pangkal Pinang', '1981-10-17', 'Jln. Ters. Kiaracondong No. 864, Pagar Alam 43742, Papua', 'Leo Saputra', '0563 0167 778', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(152, 'NIS0152', 'NISN00152', 'Kartika Puspasari M.Kom.', 'P', 'Makassar', '1987-10-29', 'Ki. Ciwastra No. 74, Bogor 88037, DIY', 'Halima Riyanti', '(+62) 568 6307 309', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(153, 'NIS0153', 'NISN00153', 'Harto Budiman', 'P', 'Gorontalo', '2004-02-03', 'Jln. Bakhita No. 959, Tomohon 67954, Sultra', 'Gara Setiawan M.Farm', '0817 5094 239', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(154, 'NIS0154', 'NISN00154', 'Anom Haryanto', 'P', 'Jambi', '2002-05-18', 'Ki. Madrasah No. 921, Palembang 76919, Kaltim', 'Faizah Nadia Agustina S.Farm', '025 1568 8834', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(155, 'NIS0155', 'NISN00155', 'Chelsea Yuniar S.E.', 'P', 'Tidore Kepulauan', '1997-07-03', 'Gg. Cikutra Timur No. 961, Serang 99015, Gorontalo', 'Jayeng Cayadi Pranowo', '(+62) 521 3086 314', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(156, 'NIS0156', 'NISN00156', 'Raina Nilam Riyanti M.Kom.', 'P', 'Prabumulih', '1992-12-25', 'Ki. Taman No. 836, Pontianak 94464, Jatim', 'Wakiman Waskita', '0441 6972 854', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(157, 'NIS0157', 'NISN00157', 'Tami Indah Rahimah S.Psi', 'L', 'Pariaman', '1992-06-03', 'Dk. Supomo No. 93, Pangkal Pinang 90396, Sumbar', 'Kasusra Sihombing', '(+62) 399 6758 1419', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(158, 'NIS0158', 'NISN00158', 'Raden Wibisono', 'L', 'Dumai', '1977-02-08', 'Ki. Katamso No. 387, Depok 74968, Kaltara', 'Capa Ade Hutasoit', '0600 8862 744', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(159, 'NIS0159', 'NISN00159', 'Genta Susanti', 'P', 'Kediri', '1973-03-30', 'Jln. Bawal No. 444, Banjar 17576, Sumbar', 'Mahfud Waluyo', '(+62) 865 9748 101', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(160, 'NIS0160', 'NISN00160', 'Wakiman Cemeti Prasasta', 'P', 'Yogyakarta', '1976-04-04', 'Jr. Barat No. 249, Sungai Penuh 56888, NTB', 'Dartono Martani Saptono', '(+62) 21 0596 9427', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(161, 'NIS0161', 'NISN00161', 'Paris Uyainah', 'P', 'Cimahi', '1980-04-05', 'Ki. Karel S. Tubun No. 933, Dumai 75200, Sumsel', 'Emil Maman Mahendra S.E.', '(+62) 237 6561 3139', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(162, 'NIS0162', 'NISN00162', 'Hamima Pertiwi', 'L', 'Bandung', '2005-02-15', 'Psr. Soekarno Hatta No. 601, Palangka Raya 41748, DKI', 'Vanesa Puput Mardhiyah S.T.', '(+62) 222 0117 172', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(163, 'NIS0163', 'NISN00163', 'Adika Siregar', 'P', 'Cirebon', '1972-06-03', 'Ds. Salatiga No. 781, Bontang 38685, Banten', 'Bakiadi Najmudin', '0892 6427 1005', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(164, 'NIS0164', 'NISN00164', 'Eko Firgantoro', 'L', 'Tidore Kepulauan', '1978-02-11', 'Gg. Supomo No. 37, Bontang 47350, Pabar', 'Lala Maida Permata S.Pd', '0365 4018 2142', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(165, 'NIS0165', 'NISN00165', 'Hamima Mandasari', 'L', 'Padang', '1985-01-05', 'Dk. Kebangkitan Nasional No. 556, Administrasi Jakarta Timur 82712, Sulsel', 'Jayeng Haryanto', '(+62) 23 3188 9039', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(166, 'NIS0166', 'NISN00166', 'Prayogo Dongoran S.H.', 'P', 'Balikpapan', '2003-09-17', 'Dk. Moch. Toha No. 381, Makassar 83584, Riau', 'Virman Nababan', '0310 5937 2335', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(167, 'NIS0167', 'NISN00167', 'Zalindra Wulandari', 'P', 'Mataram', '1985-01-14', 'Gg. Setiabudhi No. 676, Surabaya 86013, Babel', 'Wawan Hardiansyah S.Psi', '028 9777 462', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(168, 'NIS0168', 'NISN00168', 'Lanang Nugroho', 'P', 'Probolinggo', '1978-12-09', 'Kpg. Siliwangi No. 555, Cimahi 99977, Gorontalo', 'Edi Maryadi M.M.', '0397 1014 2138', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(169, 'NIS0169', 'NISN00169', 'Karman Megantara S.Kom', 'P', 'Jambi', '1998-04-07', 'Jr. Moch. Toha No. 142, Payakumbuh 43751, Kaltim', 'Yusuf Luwar Pradipta S.T.', '(+62) 505 4720 674', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(170, 'NIS0170', 'NISN00170', 'Carla Laila Wastuti', 'L', 'Padangpanjang', '2001-09-03', 'Psr. Karel S. Tubun No. 886, Bandung 80761, Kalteng', 'Ajimat Nugroho', '0434 0006 272', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(171, 'NIS0171', 'NISN00171', 'Bakiman Najmudin', 'P', 'Tegal', '1997-06-17', 'Gg. Halim No. 588, Bogor 10233, Jateng', 'Ifa Salwa Lestari S.Farm', '(+62) 277 1121 1494', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(172, 'NIS0172', 'NISN00172', 'Endah Umi Hassanah S.Farm', 'L', 'Batam', '1985-01-07', 'Dk. Pacuan Kuda No. 592, Tanjung Pinang 84586, Banten', 'Dwi Damanik', '(+62) 676 4164 0934', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(173, 'NIS0173', 'NISN00173', 'Kiandra Winarsih', 'L', 'Bandung', '1991-06-15', 'Ds. Abdul No. 917, Bandar Lampung 93857, Maluku', 'Ami Rini Prastuti', '(+62) 999 6496 091', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(174, 'NIS0174', 'NISN00174', 'Novi Laksita M.TI.', 'L', 'Surakarta', '1975-10-26', 'Ki. Supono No. 271, Banjarbaru 57035, Riau', 'Vero Latupono', '(+62) 396 0460 998', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(175, 'NIS0175', 'NISN00175', 'Restu Dian Hassanah', 'P', 'Batam', '2004-10-05', 'Gg. Elang No. 279, Pagar Alam 19425, Papua', 'Baktiadi Firgantoro', '0543 3397 823', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(176, 'NIS0176', 'NISN00176', 'Paris Raina Uyainah', 'P', 'Solok', '1978-05-18', 'Ds. Monginsidi No. 56, Jambi 52368, Maluku', 'Uli Andriani', '0825 4792 6842', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(177, 'NIS0177', 'NISN00177', 'Jayadi Samosir S.E.', 'P', 'Kupang', '1991-03-10', 'Jln. Cikapayang No. 713, Tanjung Pinang 72529, Banten', 'Wage Marpaung', '(+62) 486 9872 377', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(178, 'NIS0178', 'NISN00178', 'Ghani Hutasoit S.E.I', 'P', 'Tidore Kepulauan', '1984-01-17', 'Jln. Suryo Pranoto No. 102, Metro 40950, Riau', 'Bahuwarna Cakrabirawa Permadi S.E.I', '(+62) 884 4755 9366', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(179, 'NIS0179', 'NISN00179', 'Ihsan Dongoran', 'L', 'Banjarmasin', '1991-04-25', 'Kpg. Pintu Besar Selatan No. 26, Pematangsiantar 42522, Sumbar', 'Hana Restu Hasanah M.Kom.', '0205 3979 9055', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(180, 'NIS0180', 'NISN00180', 'Puspa Jane Halimah', 'L', 'Palu', '1972-09-17', 'Gg. Astana Anyar No. 435, Dumai 78922, Sumsel', 'Aurora Aryani M.Pd', '(+62) 503 6988 767', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(181, 'NIS0181', 'NISN00181', 'Ifa Fathonah Hassanah', 'L', 'Bitung', '2001-01-06', 'Ki. W.R. Supratman No. 582, Pagar Alam 80795, Jatim', 'Lintang Pratiwi', '0929 4406 484', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(182, 'NIS0182', 'NISN00182', 'Martaka Tugiman Hardiansyah S.H.', 'L', 'Magelang', '1975-09-30', 'Gg. Hang No. 422, Bima 14526, Kaltara', 'Ilsa Puput Puspita', '0291 9973 6570', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(183, 'NIS0183', 'NISN00183', 'Cecep Daruna Permadi', 'P', 'Bukittinggi', '1993-09-27', 'Ki. Sumpah Pemuda No. 549, Manado 41380, NTB', 'Martaka Gandi Mandala', '(+62) 783 7936 812', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(184, 'NIS0184', 'NISN00184', 'Mursinin Tarihoran', 'L', 'Jambi', '1985-07-18', 'Ds. Baha No. 270, Tanjungbalai 72811, Kalsel', 'Elisa Usamah', '(+62) 813 0769 689', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(185, 'NIS0185', 'NISN00185', 'Gabriella Hariyah', 'P', 'Tebing Tinggi', '1980-01-19', 'Ki. Tubagus Ismail No. 713, Denpasar 35703, Sultra', 'Bagiya Damanik', '(+62) 853 938 769', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(186, 'NIS0186', 'NISN00186', 'Jaiman Gamanto Wibisono M.Pd', 'L', 'Bukittinggi', '1973-02-24', 'Dk. Baung No. 715, Palu 77244, Kalteng', 'Garda Prasetya S.Kom', '026 4505 4203', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(187, 'NIS0187', 'NISN00187', 'Purwanto Tamba S.E.I', 'L', 'Kediri', '1975-01-02', 'Psr. Rajawali No. 150, Solok 17440, NTB', 'Suci Fitriani Namaga S.IP', '0974 7091 3608', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(188, 'NIS0188', 'NISN00188', 'Ajimat Kadir Prasetya S.Ked', 'L', 'Subulussalam', '2000-10-26', 'Ds. Bayam No. 915, Palopo 28784, Gorontalo', 'Farhunnisa Padmasari', '(+62) 820 7717 3294', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(189, 'NIS0189', 'NISN00189', 'Luis Kurniawan', 'L', 'Bandar Lampung', '1970-12-18', 'Ds. Banal No. 337, Manado 40728, Jambi', 'Jayeng Pangeran Ramadan', '027 5354 5266', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(190, 'NIS0190', 'NISN00190', 'Rahmi Ina Safitri S.E.I', 'P', 'Sabang', '2008-02-12', 'Dk. Bakaru No. 522, Pontianak 65444, Jateng', 'Bagus Haryanto', '(+62) 493 1822 2454', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(191, 'NIS0191', 'NISN00191', 'Farah Kuswandari', 'L', 'Sawahlunto', '2003-03-26', 'Gg. Monginsidi No. 513, Bandung 17923, Sultra', 'Hesti Hasanah', '(+62) 433 6080 5528', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(192, 'NIS0192', 'NISN00192', 'Anita Aisyah Suryatmi M.Farm', 'P', 'Banda Aceh', '2004-06-30', 'Dk. Radio No. 348, Yogyakarta 91775, DKI', 'Anom Prayoga', '(+62) 374 7215 0316', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(193, 'NIS0193', 'NISN00193', 'Warsa Pradana', 'L', 'Jayapura', '1983-09-20', 'Dk. Setiabudhi No. 117, Tegal 16840, Bali', 'Emong Firmansyah', '(+62) 289 7650 6513', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(194, 'NIS0194', 'NISN00194', 'Kamaria Wastuti', 'P', 'Serang', '2000-11-17', 'Jr. HOS. Cjokroaminoto (Pasirkaliki) No. 959, Batam 90457, Papua', 'Parman Siregar', '0372 5187 516', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(195, 'NIS0195', 'NISN00195', 'Almira Suartini', 'P', 'Gunungsitoli', '2006-09-04', 'Psr. Setia Budi No. 357, Denpasar 16069, Bali', 'Natalia Hartati', '(+62) 303 4856 326', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(196, 'NIS0196', 'NISN00196', 'Alika Tira Kuswandari S.Ked', 'P', 'Samarinda', '1990-02-10', 'Ki. Abdul. Muis No. 512, Prabumulih 20166, Kaltara', 'Harsanto Hardiansyah S.Gz', '(+62) 685 6824 991', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(197, 'NIS0197', 'NISN00197', 'Okta Januar', 'P', 'Tarakan', '2004-05-26', 'Gg. Mulyadi No. 246, Denpasar 39999, Banten', 'Raharja Wijaya', '(+62) 561 4372 493', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(198, 'NIS0198', 'NISN00198', 'Jail Suwarno', 'P', 'Lhokseumawe', '1998-08-29', 'Psr. Suryo No. 866, Bandar Lampung 78559, Kaltim', 'Alika Mandasari', '(+62) 851 4808 278', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(199, 'NIS0199', 'NISN00199', 'Vivi Mulyani', 'P', 'Tual', '1980-11-04', 'Ki. Rajawali No. 294, Blitar 85414, DIY', 'Jaka Adriansyah', '0579 3137 6133', '2025-06-16 12:03:58', '2025-06-16 12:03:58'),
(200, 'NIS0200', 'NISN00200', 'Suci Prastuti', 'P', 'Magelang', '2000-08-22', 'Jr. Adisucipto No. 503, Bengkulu 81329, DIY', 'Farhunnisa Laksmiwati', '0426 1499 226', '2025-06-16 12:03:58', '2025-06-16 12:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` bigint UNSIGNED NOT NULL,
  `nominal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `nominal`, `created_at`, `updated_at`) VALUES
(1, 700000, '2025-06-16 12:07:43', '2025-06-16 12:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `id_pembagian` bigint UNSIGNED NOT NULL,
  `jumlah_tagihan` int NOT NULL,
  `total_bayar` int NOT NULL,
  `sisa` int NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bukti_pembayaran` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','batal','sukses') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `siswa_id`, `id_pembagian`, `jumlah_tagihan`, `total_bayar`, `sisa`, `tanggal_bayar`, `created_at`, `updated_at`, `bukti_pembayaran`, `status`) VALUES
(1, 1, 5, 700000, 200000, 500000, '2025-06-18', '2025-06-19 13:17:06', '2025-06-19 13:17:06', NULL, 'sukses'),
(2, 1, 5, 700000, 150000, 550000, '2025-06-18', '2025-06-19 13:17:34', '2025-06-19 13:17:34', NULL, 'sukses'),
(3, 1, 5, 700000, 350000, 350000, '2025-06-19', '2025-06-19 13:19:07', '2025-06-19 13:19:07', NULL, 'pending'),
(4, 2, 6, 700000, 300000, 400000, '2025-06-18', '2025-06-19 13:20:00', '2025-06-19 13:20:00', NULL, 'pending'),
(5, 2, 6, 700000, 300000, 400000, '2025-06-19', '2025-06-19 13:20:17', '2025-06-19 13:20:17', NULL, 'pending'),
(6, 2, 6, 700000, 600000, 100000, '2025-06-25', '2025-06-19 13:28:45', '2025-06-19 13:28:45', NULL, 'sukses'),
(7, 3, 7, 700000, 300000, 400000, '2025-06-18', '2025-06-19 13:37:51', '2025-06-19 13:37:51', NULL, 'pending'),
(8, 3, 7, 700000, 200000, 500000, '2025-06-19', '2025-06-19 13:38:10', '2025-06-19 13:38:10', NULL, 'sukses'),
(9, 6, 10, 700000, 300000, 400000, '2025-06-21', '2025-06-21 20:11:51', '2025-06-21 20:11:51', NULL, 'pending'),
(10, 6, 10, 700000, 300000, 400000, '2025-06-27', '2025-06-21 20:12:09', '2025-06-21 20:12:09', NULL, 'sukses'),
(11, 1, 5, 700000, 400000, 300000, '2025-06-25', '2025-06-24 14:46:07', '2025-06-24 14:46:07', NULL, 'sukses'),
(12, 6, 10, 700000, 100000, 600000, '2025-06-25', '2025-06-24 14:53:00', '2025-06-24 14:53:00', NULL, 'sukses'),
(13, 5, 9, 700000, 400000, 300000, '2025-06-26', '2025-06-26 02:21:55', '2025-06-26 02:21:55', NULL, 'sukses'),
(14, 1, 5, 700000, 400000, 300000, '2025-06-26', '2025-06-26 03:58:20', '2025-06-26 03:58:20', NULL, 'pending'),
(15, 1, 5, 700000, 10000, 690000, '2025-06-26', '2025-06-26 04:30:53', '2025-06-26 04:30:53', 'bukti_pembayaran/2Gb9tlHLqhEBJ5xtUxfkUjnr8NJDw2NYFzh3BPKX.jpg', 'pending'),
(16, 1, 5, 700000, 20000, 680000, '2025-06-26', '2025-06-26 04:33:56', '2025-06-26 04:33:56', 'images/1750937636_WhatsApp Image 2025-05-15 at 11.27.12_a9eb51a4.jpg', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'siswa', NULL, '$2y$12$CGuhn.C.Z3QK1Tdg5To9A.ix8loQUyt4h8.YAO6Sj3rwn2vaw720W', NULL, '2025-06-16 12:05:02', '2025-06-16 12:05:02'),
(3, 'John BBC', 'john@luminary.com', 'admin', '2025-06-26 05:26:23', '$2y$12$U31IxYGgc/5pY4DLeJ1CpudJoryToPtr34SHZQyPOe8rm6RNJg8O6', '7U9L1y9fSk98cu4njXeZMICrGR8ZFyDxfoJ2PQfiUpiEUMV6EF9Vv9Sr2yVj', '2025-06-26 05:26:24', '2025-06-26 05:26:24'),
(4, 'Irvan', 'example@gmail.com', 'admin', '2025-06-26 05:31:40', '$2y$12$h5lluAee23AjAB4BqhG7lu4m6.62CPkbHskt35K4p6b8vivRU5inu', 'WRgGpPCGYJ', '2025-06-26 05:31:40', '2025-06-26 05:31:40'),
(5, 'Irvan', 'nama@gmail.com', 'admin', '2025-06-26 05:45:35', '$2y$12$354QrMmSgn26e/7l9cnrTejp0NQvrQEfIClhydzlNw2BDBAu/gjAG', 'Kl09KrAiwd', '2025-06-26 05:45:35', '2025-06-26 05:45:35'),
(6, 'Ivy Lott', 'mail@mail.com', 'admin', NULL, '$2y$12$1n3zBb3YwdQQUamkV5r28uUZN.eE3SzKv9UUKjIuGS5CNe4UtziBK', NULL, '2025-06-26 05:52:54', '2025-06-26 05:54:27'),
(7, 'Irvan', 'ii@gmail.com', 'admin', '2025-06-26 05:56:48', '$2y$12$354QrMmSgn26e/7l9cnrTejp0NQvrQEfIClhydzlNw2BDBAu/gjAG', 'uwwhC2K0Ve', '2025-06-26 05:56:48', '2025-06-26 05:56:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

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
-- Indexes for table `pembagian_spp`
--
ALTER TABLE `pembagian_spp`
  ADD PRIMARY KEY (`id_pembagian`),
  ADD UNIQUE KEY `unique_siswa_kelas_per_akademik` (`id_akademik`,`id_kelas`,`siswa_id`),
  ADD KEY `pembagian_spp_id_kelas_foreign` (`id_kelas`),
  ADD KEY `pembagian_spp_id_spp_foreign` (`id_spp`),
  ADD KEY `pembagian_spp_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`),
  ADD UNIQUE KEY `siswa_nisn_unique` (`nisn`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_siswa_id_foreign` (`siswa_id`),
  ADD KEY `transaksi_id_pembagian_foreign` (`id_pembagian`);

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
-- AUTO_INCREMENT for table `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id_akademik` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembagian_spp`
--
ALTER TABLE `pembagian_spp`
  MODIFY `id_pembagian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembagian_spp`
--
ALTER TABLE `pembagian_spp`
  ADD CONSTRAINT `pembagian_spp_id_akademik_foreign` FOREIGN KEY (`id_akademik`) REFERENCES `akademik` (`id_akademik`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembagian_spp_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembagian_spp_id_spp_foreign` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembagian_spp_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_pembagian_foreign` FOREIGN KEY (`id_pembagian`) REFERENCES `pembagian_spp` (`id_pembagian`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
