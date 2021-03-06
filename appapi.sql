-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 02:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_contacts`
--

CREATE TABLE `admin_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('user','visitor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` blob NOT NULL,
  `reply` blob DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/uploads/placeholder/default_image.png',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('internal','external') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'internal',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/uploads/placeholder/media_cover_avatar.png',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE `continents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`id`, `en_name`, `ar_name`, `status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Asia', '????????', 'active', '2020-02-15 09:00:33', '2020-02-15 09:00:33', NULL),
(2, 'Africa', '??????????????', 'active', '2020-02-15 09:00:33', '2020-02-15 09:00:33', NULL),
(3, 'Europe', '????????????', 'active', '2020-02-15 09:00:33', '2020-02-15 09:00:33', NULL),
(4, 'North America', '???????????? ????????????????', 'active', '2020-02-15 09:00:33', '2020-02-15 09:00:33', NULL),
(5, 'South America', '???????????? ????????????????', 'active', '2020-02-15 09:00:33', '2020-02-15 09:00:33', NULL),
(6, 'Australia', '????????????????', 'active', '2020-02-15 09:00:33', '2020-02-15 09:00:33', NULL),
(7, 'Antarctica', '????????????????????', 'active', '2020-02-15 09:00:33', '2020-02-15 09:00:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/uploads/placeholder/flag_avatar.png',
  `native_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `continent_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `en_name`, `ar_name`, `flag_image`, `native_name`, `code`, `continent_id`, `status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(9, 'Algeria', '??????????????', '/uploads/photos/countries/flags/2020-04-09/0Y8MWnh8Rvu9R71B.png', '??????????????', 'DZ', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(10, 'Angola', '????????????', '/uploads/photos/countries/flags/2020-04-09/cbKYWAWjylbcmiYN.png', 'Angola', 'AO', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(11, 'Benin', '????????', '/uploads/photos/countries/flags/2020-04-09/MIYunYZfAgyIRp8Q.png', 'Benin', 'BJ', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(12, 'Botswana', '????????????????', '/uploads/photos/countries/flags/2020-04-09/urI9NtO8pCfjMJuX.png', '????????????????', 'BW', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(13, 'Burkina Faso', '?????????????? ????????', '/uploads/photos/countries/flags/2020-04-09/CSL66Brd1gkU7dRw.png', '?????????????? ????????', 'BF', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(14, 'Burundi', '??????????????', '/uploads/photos/countries/flags/2020-04-09/2oeVmO8NAM3GkcjF.png', '??????????????', 'BI', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(15, 'Cameroon', '??????????????????', '/uploads/photos/countries/flags/2020-04-09/yqgwVuwxZiUa1tkX.png', '??????????????????', 'CM', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(16, 'Cape Verde', '?????????? ????????????', '/uploads/photos/countries/flags/2020-04-09/y2Llj1gEmlYSCVQf.png', '?????????? ????????????', 'CV', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(17, 'Central African Republic', '?????????????? ?????????????? ????????????', '/uploads/photos/countries/flags/2020-04-09/sTOKOyKsABDADTHx.png', '?????????????? ?????????????? ????????????', 'CF', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(18, 'Chad', '????????', '/uploads/photos/countries/flags/2020-04-09/3asSIC1gm25y5Xri.png', '????????', 'TD', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(19, 'Comoros', '?????? ??????????', '/uploads/photos/countries/flags/2020-04-09/qajUO5nm4GbGZyQf.png', '?????? ??????????', 'KM', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(20, 'Congo', '??????????????', '/uploads/photos/countries/flags/2020-04-09/tO4x3qJB6h44RzPE.png', '??????????????', 'CG', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(21, 'Congo, The Democratic Republic Of The', '?????????????? ?????????????? ??????????????????????', '/uploads/photos/countries/flags/2020-04-09/kpXgDCYYDyVXrRRo.png', '?????????????? ?????????????? ??????????????????????', 'CD', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(22, 'Djibouti', '????????????', '/uploads/photos/countries/flags/2020-04-09/64eklPSpbJ6nFTPF.png', '????????????', 'DJ', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(23, 'Egypt', '??????', '/uploads/photos/countries/flags/2020-04-09/YVwrM8KWwSyPUHQx.png', '??????', 'EG', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(24, 'Equatorial Guinea', '?????????? ????????????????????', '/uploads/photos/countries/flags/2020-04-09/avDWEN4rL9CQ2ho3.png', '?????????? ????????????????????', 'GQ', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(25, 'Eritrea', '??????????????', '/uploads/photos/countries/flags/2020-04-09/U6wO1l9kjfViqBrj.png', '??????????????', 'ER', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(26, 'Ethiopia', '??????????????', '/uploads/photos/countries/flags/2020-04-09/sFDzygAlDo7h8X2b.png', '??????????????', 'ET', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(27, 'Gabon', '??????????????', '/uploads/photos/countries/flags/2020-04-09/Hpj6dkKv1E5D7SAB.png', '??????????????', 'GA', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(28, 'Gambia', '????????????', '/uploads/photos/countries/flags/2020-04-09/tRyfIoQqJQFJPWZq.png', '????????????', 'GM', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(29, 'Ghana', '????????', '/uploads/photos/countries/flags/2020-04-09/ZalWDrlrllCQgS96.png', '????????', 'GH', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(30, 'Guinea', '??????????', '/uploads/photos/countries/flags/2020-04-09/5TK47JnQXI4aDQtb.png', '??????????', 'GN', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(31, 'Guinea-Bissau', '?????????? - ??????????', '/uploads/photos/countries/flags/2020-04-09/iJCi9CusO9IIzlf5.png', '?????????? - ??????????', 'GW', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(32, 'Ivory Coast', '???????? ??????????', '/uploads/photos/countries/flags/2020-04-09/OPC0WXJD3NLlXF2z.png', 'C??te d\'Ivoire', 'CI', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(33, 'Kenya', '??????????', '/uploads/photos/countries/flags/2020-04-09/MoerJGaltsRMOIuZ.png', '??????????', 'KE', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(34, 'Lesotho', '????????????', '/uploads/photos/countries/flags/2020-04-09/Eb6v2fYU6KeMc4NP.png', '????????????', 'LS', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(35, 'Liberia', '??????????????', '/uploads/photos/countries/flags/2020-04-09/gafQ97S1I2p0jRsc.png', '??????????????', 'LR', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(36, 'Libya', '??????????', '/uploads/photos/countries/flags/2020-04-09/ljcMfDAepZ5xZJLM.png', '??????????', 'LY', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(37, 'Madagascar', '????????????', '/uploads/photos/countries/flags/2020-04-09/cCkEpPp9hZUeQ1Jd.png', '????????????', 'MG', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(38, 'Malawi', '??????????', '/uploads/photos/countries/flags/2020-04-09/GUsPQ9BuF1vnai3f.png', '??????????', 'MW', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(39, 'Mali', '????????', '/uploads/photos/countries/flags/2020-04-09/ShdxwWvo2lvFsew5.png', '????????', 'ML', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(40, 'Mauritania', '??????????????????', '/uploads/photos/countries/flags/2020-04-09/LbFRUSrbKhehGZUS.png', '??????????????????', 'MR', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(41, 'Mauritius', '????????????????', '/uploads/photos/countries/flags/2020-04-09/dHiCEqtQqRHLluiq.png', '????????????????', 'MU', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(42, 'Mayotte', '??????????', '/uploads/photos/countries/flags/2020-04-09/SKNcC9O8MloAERf9.png', '??????????', 'YT', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(43, 'Morocco', '????????????', '/uploads/photos/countries/flags/2020-04-09/bTxvDhQTjxvC4wza.png', '????????????', 'MA', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(44, 'Mozambique', '??????????????', '/uploads/photos/countries/flags/2020-04-09/JuBpAuETKqasK31r.png', '??????????????', 'MZ', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(45, 'Namibia', '??????????????', '/uploads/photos/countries/flags/2020-04-09/7Y9kn2SgwfRByrdN.png', '??????????????', 'NA', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(46, 'Niger', '????????????', '/uploads/photos/countries/flags/2020-04-09/rV24RELCqwnNOiMU.png', '????????????', 'NE', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(47, 'Nigeria', '??????????????', '/uploads/photos/countries/flags/2020-04-09/EoqqwWf8iY4fZqt0.png', '??????????????', 'NG', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(48, 'Reunion', '??????????????', '/uploads/photos/countries/flags/2020-04-09/pyfF6ikpFNhmHXSe.png', '??????????????', 'RE', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(49, 'Rwanda', '????????????', '/uploads/photos/countries/flags/2020-04-09/cekiaoCjNx6lG037.png', '????????????', 'RW', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(50, 'Saint Helena', '???????? ????????????', '/uploads/photos/countries/flags/2020-04-09/Ww0b3STFfQk2Oh4A.png', '???????? ????????????', 'SH', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(51, 'Sao Tome And Principe', 'Sao Tome And Principe', '/uploads/photos/countries/flags/2020-04-09/XTNAhCO9ahdQP5gM.png', 'Sao Tome And Principe', 'ST', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(52, 'Senegal', '??????????????', '/uploads/photos/countries/flags/2020-04-09/mABeIMGFO78nFGYQ.png', '??????????????', 'SN', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(53, 'Seychelles', '??????????', '/uploads/photos/countries/flags/2020-04-09/ilcwycNE9K3UJcL6.png', '??????????', 'SC', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(54, 'Sierra Leone', '???????? ????????', '/uploads/photos/countries/flags/2020-04-09/HYkkUeacNcon5yJE.png', '???????? ????????', 'SL', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(55, 'Somalia', '??????????????', '/uploads/photos/countries/flags/2020-04-09/F117PlJXSoaIgBZI.png', '??????????????', 'SO', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(56, 'South Africa', '???????? ??????????????', '/uploads/photos/countries/flags/2020-04-09/Ix4DnWROCSmXKQcM.png', '???????? ??????????????', 'ZA', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(57, 'Sudan', '??????????????', '/uploads/photos/countries/flags/2020-04-09/KnViRG8r2YTvARpH.png', '??????????????', 'SD', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(58, 'Swaziland', '??????????????????', '/uploads/photos/countries/flags/2020-04-09/czWPOzKLstgeD2ka.png', '??????????????????', 'SZ', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(59, 'Tanzania', '??????????????', '/uploads/photos/countries/flags/2020-04-09/W03y4obsv92MxTHn.png', '??????????????', 'TZ', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(60, 'Togo', '????????', '/uploads/photos/countries/flags/2020-04-11/3O7wlRrEu8l8UNCx.png', '????????', 'TG', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(61, 'Tunisia', '????????', '/uploads/photos/countries/flags/2020-04-11/u65Bspu4Du3aD9h8.png', '????????', 'TN', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(62, 'Uganda', '????????????', '/uploads/photos/countries/flags/2020-04-11/851N1kQuKYIB3NlF.png', '????????????', 'UG', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(63, 'Zambia', '????????????', '/uploads/photos/countries/flags/2020-04-11/lYgYEE56cUHcCXzf.png', '????????????', 'ZM', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(64, 'Zimbabwe', '????????????????', '/uploads/photos/countries/flags/2020-04-11/1fSFjoOiNfjWjRvO.png', '????????????????', 'ZW', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(65, 'Afghanistan', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/srNkgkXtCLotC1V2.png', '??????????????????', 'AF', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(66, 'Armenia', '??????????????', '/uploads/photos/countries/flags/2020-04-11/bJ6h2AnF3xD1F2bx.png', '??????????????', 'AM', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(67, 'Azerbaijan', '????????????????', '/uploads/photos/countries/flags/2020-04-11/cshU4LpSIaUqun2I.png', '????????????????', 'AZ', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(68, 'Bahrain', '??????????????', '/uploads/photos/countries/flags/2020-04-11/RMTazcKZvGMCj4rh.png', '??????????????', 'BH', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(69, 'Bangladesh', '????????????????', '/uploads/photos/countries/flags/2020-04-11/09ffedYzjVyE8RwS.png', '????????????????', 'BD', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(70, 'Bhutan', '??????????', '/uploads/photos/countries/flags/2020-04-11/8s73zYBeBOq8XIjJ.png', '??????????', 'BT', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(71, 'Brunei', '????????????', '/uploads/photos/countries/flags/2020-04-11/4CH37v0P6BeJANCh.png', '????????????', 'BN', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(72, 'Cambodia', '??????????????', '/uploads/photos/countries/flags/2020-04-11/07oVBfnhZaLdvS1H.png', '??????????????', 'KH', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(73, 'China', '??????????', '/uploads/photos/countries/flags/2020-04-11/xy087GCozdBoBBOB.png', '??????????', 'CN', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(74, 'East Timor', '?????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/e6TQfdJbrdmhWFy4.png', '?????????? ??????????????', 'TL', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(75, 'Georgia', '????????????', '/uploads/photos/countries/flags/2020-04-11/3LJxqRoF4eSIGjTP.png', '????????????', 'GE', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(76, 'Hong Kong', '???????? ????????', '/uploads/photos/countries/flags/2020-04-11/SF2w0OgarD1onNBN.png', '???????? ????????', 'HK', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(77, 'India', '??????????', '/uploads/photos/countries/flags/2020-04-11/BzEbLLuYUF2kUZHo.png', '??????????', 'IN', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(78, 'Indonesia', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/gzfsfxkxmVfMbDYw.png', '??????????????????', 'ID', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(79, 'Iran', '??????????', '/uploads/photos/countries/flags/2020-04-11/ca89oGWzdQi6187N.png', '??????????', 'IR', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(80, 'Iraq', '????????????', '/uploads/photos/countries/flags/2020-04-11/u1elLKYmygQmFW1m.png', '????????????', 'IQ', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(81, 'Israel', '??????????????', '/uploads/photos/countries/flags/2020-04-11/7u08q4yahRjogGVT.png', '??????????????', 'IL', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(82, 'Japan', '??????????????', '/uploads/photos/countries/flags/2020-04-11/g00A2cuWCrDhy7o7.png', '??????????????', 'JP', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(83, 'Jordan', '????????????', '/uploads/photos/countries/flags/2020-04-11/ov9Pl3fosWXH2vxA.png', '????????????', 'JO', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(84, 'Kazakhstan', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/P25lzWSUXZEuYi0S.png', '??????????????????', 'KZ', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(85, 'Kuwait', '????????????', '/uploads/photos/countries/flags/2020-04-11/ZVuZLnGO4xt5HXK3.png', '????????????', 'KW', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(86, 'Kyrgyzstan', '????????????????????', '/uploads/photos/countries/flags/2020-04-11/uaEyYf0kZCGIFDfQ.png', '????????????????????', 'KG', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(87, 'Laos', '????????', '/uploads/photos/countries/flags/2020-04-11/BD6UBbqNYtuCWZZ2.png', '????????', 'LA', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(88, 'Lebanon', '??????????', '/uploads/photos/countries/flags/2020-04-11/IDi96kSRSWA5QfPx.png', '??????????', 'LB', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(89, 'Macau', '??????????', '/uploads/photos/countries/flags/2020-04-11/0G2dMXDyRzp5wvmR.png', '??????????', 'MO', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(90, 'Malaysia', '??????????????', '/uploads/photos/countries/flags/2020-04-11/ezbHD5py5Nii0fCm.png', '??????????????', 'MY', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(91, 'Maldives', '?????? ????????????????', '/uploads/photos/countries/flags/2020-04-11/hYRg0gsYwtJXSWCf.png', '?????? ????????????????', 'MV', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(92, 'Mongolia', '??????????????', '/uploads/photos/countries/flags/2020-04-11/wDP31bIr4oxgcYzR.png', '??????????????', 'MN', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(93, 'Myanmar', '??????????????', '/uploads/photos/countries/flags/2020-04-11/2qvAD2V26WINinIQ.png', '??????????????', 'MM', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(94, 'Nepal', '??????????', '/uploads/photos/countries/flags/2020-04-11/TvtsItAMn0Bmqo5D.png', '??????????', 'NP', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(95, 'North Korea', '?????????? ????????????????', '/uploads/photos/countries/flags/2020-04-11/3kIVPPhNXlJ65nBT.png', '?????????? ????????????????', 'KP', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(96, 'Oman', '?????????? ????????', '/uploads/photos/countries/flags/2020-04-11/xIHM3UcCvXuExMal.png', '?????????? ????????', 'OM', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(97, 'Pakistan', '??????????????', '/uploads/photos/countries/flags/2020-04-11/9KZFeZquAsrnDkam.png', '??????????????', 'PK', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(98, 'Palestine', '????????????', '/uploads/photos/countries/flags/2020-04-11/PySa7JdrJm4orqmh.png', '????????????', 'PS', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(99, 'Philippines', '??????????????', '/uploads/photos/countries/flags/2020-04-11/bgfgcnt47rxpM7Fr.png', '??????????????', 'PH', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(100, 'Qatar', '??????', '/uploads/photos/countries/flags/2020-04-11/c9G4rLODzqy60iAs.png', '??????', 'QA', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(101, 'Saudi Arabia', '????????????????', '/uploads/photos/countries/flags/2020-04-11/Jgg6wa5iIzoxkXU4.png', '????????????????', 'SA', 1, 'active', '2020-06-02 07:59:28', '2020-04-09 09:01:29', NULL),
(102, 'Singapore', '????????????????', '/uploads/photos/countries/flags/2020-04-11/yjyoiTc7LapWY0B5.png', '????????????????', 'SG', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(103, 'South Korea', '?????????? ????????????????', '/uploads/photos/countries/flags/2020-04-11/Sb9qOAxCcQz9GbKr.png', '?????????? ????????????????', 'KR', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(104, 'Sri Lanka', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/2Ynr1rF6DfwxVjOC.png', '??????????????????', 'LK', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(105, 'Syria', '??????????', '/uploads/photos/countries/flags/2020-04-11/7lytovBJXIig2832.png', '??????????', 'SY', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(106, 'Taiwan', '????????????', '/uploads/photos/countries/flags/2020-04-11/nQ93Cbq1NoiZO2il.png', '????????????', 'TW', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(107, 'Tajikistan', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/P0WXJb3nyeUiS2gr.png', '??????????????????', 'TJ', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(108, 'Thailand', '??????????????', '/uploads/photos/countries/flags/2020-04-11/pUTGRSDTS4hQfxKf.png', '??????????????', 'TH', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(109, 'Turkey', '??????????', '/uploads/photos/countries/flags/2020-04-11/iVkO5sFtz9ES9w68.png', '??????????', 'TR', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(110, 'Turkmenistan', '????????????????????', '/uploads/photos/countries/flags/2020-04-11/1R4tK1qRtZeIBeCX.png', '????????????????????', 'TM', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(111, 'United Arab Emirates', '????????????????', '/uploads/photos/countries/flags/2020-04-11/QhT2rxmto4jTUfzE.png', '????????????????', 'AE', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(112, 'Uzbekistan', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/81zE9DK7OW3Fmkv4.png', '??????????????????', 'UZ', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(113, 'Vietnam', '????????????', '/uploads/photos/countries/flags/2020-04-11/FV4t8N20DHXsaNzl.png', '????????????', 'VN', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(114, 'Yemen', '??????????', '/uploads/photos/countries/flags/2020-04-11/r4ulQWASb2zbjzyf.png', '??????????', 'YE', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(115, 'Anguilla', '??????????????', '/uploads/photos/countries/flags/2020-04-11/ouhr2065CjL7Ah5U.png', '??????????????', 'AI', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(116, 'Antigua And Barbuda', '?????????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/4D2ChelXZT0eOOBN.png', '?????????????? ??????????????', 'AG', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(117, 'Aruba', '??????????', '/uploads/photos/countries/flags/2020-04-11/p3CIaJET2mMtSC57.png', '??????????', 'AW', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(118, 'Bahamas', '?????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/yPxA7p6rVtUdmpqD.png', '?????? ??????????????', 'BS', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(119, 'Barbados', '??????????????', '/uploads/photos/countries/flags/2020-04-11/JRVjmqFm1OQ0398T.png', '??????????????', 'BB', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(120, 'Belize', '????????', '/uploads/photos/countries/flags/2020-04-11/MDbQZyrl0G4ujLnl.png', '????????', 'BZ', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(121, 'Bermuda', '????????????', '/uploads/photos/countries/flags/2020-04-11/6BZXPW2rQVP33bEd.png', '????????????', 'BM', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(122, 'Canada', '????????', '/uploads/photos/countries/flags/2020-04-11/KTvauRxd7XcNniTg.png', '????????', 'CA', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(123, 'Cayman Islands', '?????? ????????????', '/uploads/photos/countries/flags/2020-04-11/lcsd19IpLr7d5ZgA.png', '?????? ????????????', 'KY', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(124, 'Costa Rica', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/7Vhe3WqejeFDBdrD.png', '??????????????????', 'CR', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(125, 'Cuba', '????????', '/uploads/photos/countries/flags/2020-04-11/filRwLCrMCcCzsiS.png', '????????', 'CU', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(126, 'Dominica', '????????????????', '/uploads/photos/countries/flags/2020-04-11/7Z1qmFPLa37YvxJL.png', '????????????????', 'DM', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(127, 'Dominican Republic', '?????????????? ????????????????????', '/uploads/photos/countries/flags/2020-04-11/sE3mu8n9D7GzZLQR.png', '?????????????? ????????????????????', 'DO', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(128, 'El Salvador', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/mjHycWaVo8Iko2u5.png', '??????????????????', 'SV', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(129, 'Greenland', '????????????????', '/uploads/photos/countries/flags/2020-04-11/O3PwanEoxVsyeXSY.png', '????????????????', 'GL', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(130, 'Grenada', '??????????????', '/uploads/photos/countries/flags/2020-04-11/1rzZmwbaufHqRSZD.png', '??????????????', 'GD', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(131, 'Guadeloupe', '??????????????', '/uploads/photos/countries/flags/2020-04-11/XMVjxBPsPEWK2U7w.jpg', '??????????????', 'GP', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(132, 'Guatemala', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/K9EyrK5NRJ1pPBi6.png', '??????????????????', 'GT', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(133, 'Haiti', '??????????', '/uploads/photos/countries/flags/2020-04-11/W4Ii91ZE9NOmHZ0r.png', '??????????', 'HT', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(134, 'Honduras', '??????????????', '/uploads/photos/countries/flags/2020-04-11/q3DrUHGowaZiVQXG.png', '??????????????', 'HN', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(135, 'Jamaica', '??????????????', '/uploads/photos/countries/flags/2020-04-11/Y3mOHrpm6dPAQPLf.png', '??????????????', 'JM', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(136, 'Martinique', '????????????????', '/uploads/photos/countries/flags/2020-04-11/1GAUXnH4dwp7GCbt.png', '????????????????', 'MQ', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(137, 'Mexico', '??????????????', '/uploads/photos/countries/flags/2020-04-11/ajMoLI21Ha38lOgt.png', '??????????????', 'MX', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(138, 'Montserrat', '????????????????', '/uploads/photos/countries/flags/2020-04-11/VXm54zb8jEpqb30Q.png', '????????????????', 'MS', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(139, 'Netherlands Antilles', '?????? ?????????????? ??????????????????', '/uploads/photos/countries/flags/2020-04-11/Y1WrL9VM8ndnXtjg.png', '?????? ?????????????? ??????????????????', 'SX', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(140, 'Nicaragua', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/wrdW7qSDyby5zzPa.png', '??????????????????', 'NI', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(141, 'Panama', '????????', '/uploads/photos/countries/flags/2020-04-11/nr9Hd9ceTzZegM9F.png', '????????', 'PA', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(142, 'Saint Kitts and Nevis', '???????? ???????? ????????????', '/uploads/photos/countries/flags/2020-04-11/X9z2mx5AMcYAeR8V.png', '???????? ???????? ????????????', 'KN', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(143, 'Saint Lucia', '???????? ??????????', '/uploads/photos/countries/flags/2020-04-11/YaPX3CqUyDnkPWjH.png', '???????? ??????????', 'LC', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(144, 'Saint Pierre And Miquelon', '?????? ???????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/GsG71EaMAUpDQ3dH.png', '?????? ???????? ??????????????', 'PM', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(145, 'Saint Vincent and The Grenadines', '???????? ?????????? ????????????????????????', '/uploads/photos/countries/flags/2020-04-11/3ObEtEOlyUUVra9R.png', '???????? ?????????? ????????????????????????', 'VC', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(146, 'Trinidad And Tobago', '???????????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/Vrc3RHbyNYqq3BpI.png', '???????????????? ??????????????', 'TT', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(147, 'Turks And Caicos Islands', '?????? ???????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/eBv37i97po7jXQTG.png', '?????? ???????? ??????????????', 'TC', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(148, 'United States', '???????????????? ?????????????? ??????????????????', '/uploads/photos/countries/flags/2020-04-11/oxQpr90olLzx0gkY.png', '???????????????? ?????????????? ??????????????????', 'US', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(149, 'Virgin Islands, British', '?????? ?????????? ????????????????????', '/uploads/photos/countries/flags/2020-04-11/Vw88JDPu2iXstjr3.png', '?????? ?????????? ????????????????????', 'VG', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(150, 'Virgin Islands, U.S.', '?????? ?????????????? ??????????????????', '/uploads/photos/countries/flags/2020-04-11/NywwmH8L30UCFp1y.png', '?????? ?????????????? ??????????????????', 'VI', 4, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(151, 'Albania', '??????????????', '/uploads/photos/countries/flags/2020-04-11/utPbGJYZ1we0jdYt.png', '??????????????', 'AL', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(152, 'Andorra', '????????????', '/uploads/photos/countries/flags/2020-04-11/2jtDN5F0aMBgqMjO.png', '????????????', 'AD', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(153, 'Austria', '????????????', '/uploads/photos/countries/flags/2020-04-11/RgkSY3BReg0eRZbF.png', '????????????', 'AT', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(154, 'Belarus', '?????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/eYh0bjtEut7wznu3.png', '?????????? ??????????????', 'BY', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(155, 'Belgium', '????????????', '/uploads/photos/countries/flags/2020-04-11/xgfFvS1DPxXofT2r.png', '????????????', 'BE', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(156, 'Bosnia And Herzegovina', '?????????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/FLwGAguVdX5NOSlg.png', '?????????????? ??????????????', 'BA', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(157, 'Bulgaria', '??????????????', '/uploads/photos/countries/flags/2020-04-11/I3kSJRMynsUteP78.png', '??????????????', 'BG', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(158, 'Croatia', '??????????????', '/uploads/photos/countries/flags/2020-04-11/EoIurfeN6XT8rAfh.png', '??????????????', 'HR', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(159, 'Cyprus', '????????', '/uploads/photos/countries/flags/2020-04-11/1XDg9cHZRLkY9T7h.png', '????????', 'CY', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(160, 'Czech Republic', '?????????????? ????????????', '/uploads/photos/countries/flags/2020-04-11/ncb4hleFbGc0a7Fi.png', '?????????????? ????????????', 'CZ', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(161, 'Denmark', '????????????????', '/uploads/photos/countries/flags/2020-04-11/KsOkJAr0YScpy8BS.png', '????????????????', 'DK', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(162, 'Estonia', '??????????????', '/uploads/photos/countries/flags/2020-04-11/Fb0gdPmZSmVlewKg.png', '??????????????', 'EE', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(163, 'Finland', '????????????', '/uploads/photos/countries/flags/2020-04-11/hiKXEgaS4MhoHxYE.png', '????????????', 'FI', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(164, 'France', '??????????', '/uploads/photos/countries/flags/2020-04-11/OMkByq1MDvCXNoJm.png', '??????????', 'FR', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(165, 'Germany', '??????????????', '/uploads/photos/countries/flags/2020-04-11/weTlbWXi0fhDBgRc.png', '??????????????', 'DE', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(166, 'Gibraltar', '?????? ????????', '/uploads/photos/countries/flags/2020-04-11/xCagSScpk6AUsWeZ.png', '?????? ????????', 'GI', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(167, 'Greece', '??????????????', '/uploads/photos/countries/flags/2020-04-11/sUAX4wgP9nVVbkF6.png', '??????????????', 'GR', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(168, 'Hungary', '??????????', '/uploads/photos/countries/flags/2020-04-11/aHEh0hDqTfluoEhr.png', '??????????', 'HU', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(169, 'Iceland', '??????????????', '/uploads/photos/countries/flags/2020-04-11/KLQzMkRrjMwP7euh.png', '??????????????', 'IS', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(170, 'Ireland', '??????????????', '/uploads/photos/countries/flags/2020-04-11/eD0JsXoVayfy6KfR.png', '??????????????', 'IE', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(171, 'Italy', '??????????????', '/uploads/photos/countries/flags/2020-04-11/TjbozdBs1DXZPABH.png', '??????????????', 'IT', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(172, 'Latvia', '????????????', '/uploads/photos/countries/flags/2020-04-11/XPyYNeFceNG3q4wZ.png', '????????????', 'LV', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(173, 'Liechtenstein', '????????????????????', '/uploads/photos/countries/flags/2020-04-11/2gOXfgQNcDAoStfJ.png', '????????????????????', 'LI', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(174, 'Lithuania', '????????????????', '/uploads/photos/countries/flags/2020-04-11/DsM8lRErKiVz6gKM.png', '????????????????', 'LT', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(175, 'Luxembourg', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/MgMgXMrEkETvKMLh.png', '??????????????????', 'LU', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(176, 'Macedonia', '??????????????', '/uploads/photos/countries/flags/2020-04-11/T63BUP02lOVHNnzH.png', '??????????????', 'MK', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(177, 'Moldova', '??????????????', '/uploads/photos/countries/flags/2020-04-11/zhTTopBhWE8wAbtx.png', '??????????????', 'MD', 1, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(178, 'Monaco', '????????????', '/uploads/photos/countries/flags/2020-04-11/BLfPBzq5v5M9pP87.png', '????????????', 'MC', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(179, 'Montenegro', '?????????? ????????????', '/uploads/photos/countries/flags/2020-04-11/nikivBd89hdwcTWD.png', '?????????? ????????????', 'ME', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(180, 'Netherlands', '????????????', '/uploads/photos/countries/flags/2020-04-11/9BAVfqcJoKsY1z15.png', '????????????', 'NL', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(181, 'Norway', '??????????????', '/uploads/photos/countries/flags/2020-04-11/krAmqCCWOF9uDY9T.png', '??????????????', 'NO', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(182, 'Poland', '????????????', '/uploads/photos/countries/flags/2020-04-11/gogipfEGXkpsPdTk.png', '????????????', 'PL', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(183, 'Portugal', '????????????????', '/uploads/photos/countries/flags/2020-04-11/xJMTscQr3D4Kjafr.png', '????????????????', 'PT', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(184, 'Republic of Malta', '??????????', '/uploads/photos/countries/flags/2020-04-11/jNHRWZ7vAUXUpLwQ.png', '??????????', 'MT', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(185, 'Romania', '??????????????', '/uploads/photos/countries/flags/2020-04-11/SpL9yFDhDZvC4NOJ.png', '??????????????', 'RO', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(186, 'Russia', '??????????', '/uploads/photos/countries/flags/2020-04-11/6GNyttz87R8Kc07Z.png', '??????????', 'RU', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(187, 'San Marino', '?????? ????????????', '/uploads/photos/countries/flags/2020-04-11/le18R3gyycRy65N8.png', '?????? ????????????', 'SM', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(188, 'Serbia', '??????????', '/uploads/photos/countries/flags/2020-04-11/oyxaaeQGSkrFSgBw.png', '??????????', 'RS', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(189, 'Slovakia', '????????????????', '/uploads/photos/countries/flags/2020-04-11/8XDqOFANDYwpUe1w.png', '????????????????', 'SK', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(190, 'Slovenia', '????????????????', '/uploads/photos/countries/flags/2020-04-11/aRJPxI4StGZQgw8K.png', '????????????????', 'SI', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(191, 'Spain', '??????????????', '/uploads/photos/countries/flags/2020-04-11/EJVL83hFYb2gB2lB.png', '??????????????', 'ES', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(192, 'Sweden', '????????????', '/uploads/photos/countries/flags/2020-04-11/pJYABk8pCVtk8ARN.png', '????????????', 'SE', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(193, 'Switzerland', '????????????', '/uploads/photos/countries/flags/2020-04-11/atZ0p6bgoviijwHj.png', '????????????', 'CH', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(194, 'Ukraine', '????????????????', '/uploads/photos/countries/flags/2020-04-11/DZQh93K993wKoqVS.png', '????????????????', 'UA', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(195, 'United Kingdom', '?????????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/b6l8C79U4usUuuyk.png', '?????????????? ??????????????', 'GB', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(196, 'Vatican City', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/1yjK8ovAR8K7xI8M.png', '??????????????????', 'VA', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(197, 'American Samoa', '?????????? ??????????????????', '/uploads/photos/countries/flags/2020-04-11/1Jmz36XI8a2UwSQr.png', '?????????? ??????????????????', 'AS', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(198, 'Australia', '????????????????', '/uploads/photos/countries/flags/2020-04-11/Oznwurk3hcYl8T0J.png', '????????????????', 'AU', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(199, 'Christmas Island', '?????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/ZnjkiiAAJmKMexRH.png', '?????????? ??????????????', 'CX', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(200, 'Cocos (Keeling) Islands', '?????? ???????? (????????????)', '/uploads/photos/countries/flags/2020-04-11/DhOpp5lopeNyg1wq.png', '?????? ???????? (????????????)', 'CC', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(201, 'Cook Islands', '?????? ??????', '/uploads/photos/countries/flags/2020-04-11/DXIoPoIspWfiknie.png', '?????? ??????', 'CK', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(202, 'Fiji', '????????', '/uploads/photos/countries/flags/2020-04-11/MHIIAnJj20uPykqt.png', '????????', 'FJ', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(203, 'French Polynesia', '?????????????????? ????????????????', '/uploads/photos/countries/flags/2020-04-11/HEVqwsEmBC4AfzjJ.png', '?????????????????? ????????????????', 'PF', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(204, 'Guam', '????????', '/uploads/photos/countries/flags/2020-04-11/vTWjylFQUuP31VYB.png', '????????', 'GU', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(205, 'Heard Island And Mcdonald Islands', '?????????? ???????? ???????? ??????????????????', '/uploads/photos/countries/flags/2020-04-11/3IdKdBfzDZZT0wIP.png', '?????????? ???????? ???????? ??????????????????', 'HM', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(206, 'Kiribati', '??????????????', '/uploads/photos/countries/flags/2020-04-11/0Wxdh2i4864moYtk.png', '??????????????', 'KI', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(207, 'Marshall Islands', '?????? ????????????', '/uploads/photos/countries/flags/2020-04-11/XY0Sa95af5DUCiJE.png', '?????? ????????????', 'MH', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(208, 'Federated States of Micronesia', '???????????? ???????????????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/pvjvHr1aGUB3dJZu.png', '???????????? ???????????????????? ??????????????', 'FM', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(209, 'Nauru', '??????????', '/uploads/photos/countries/flags/2020-04-11/HcgKLyQJyZl8Crk9.png', '??????????', 'NR', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(210, 'New Caledonia', '?????????????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/tIcQF7VnO99iKJjJ.png', '?????????????????? ??????????????', 'NC', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(211, 'New Zealand', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/7hZ9PDoDSc4jjfMB.png', '??????????????????', 'NZ', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(212, 'Niue', '??????????', '/uploads/photos/countries/flags/2020-04-11/GXHCiaaT9yFlnN54.png', '??????????', 'NU', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(213, 'Norfolk', '?????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/Qxo5grdU36lqg78z.png', '?????????? ??????????????', 'NF', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(214, 'Northern Mariana Islands', '?????? ?????????????? ????????????????', '/uploads/photos/countries/flags/2020-04-11/6DssHYgM5pEhv1Du.png', '?????? ?????????????? ????????????????', 'MP', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(215, 'Palau', '??????????', '/uploads/photos/countries/flags/2020-04-11/LqXwGp85CSVsbc17.png', '??????????', 'PW', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(216, 'Papua New Guinea', '?????????? ?????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/G5lgj8oKXZ9Ke365.png', '?????????? ?????????? ??????????????', 'PG', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(217, 'Pitcairn', '?????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/14OeXtvi2Upud66V.png', '?????? ??????????????', 'PN', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(218, 'Samoa', '??????????', '/uploads/photos/countries/flags/2020-04-11/e1ZxVGSyatJnt0nz.png', '??????????', 'WS', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(219, 'Solomon Islands', '?????? ????????????', '/uploads/photos/countries/flags/2020-04-11/oGLGgDMLsqeFzbtN.png', '?????? ????????????', 'SB', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(220, 'Tokelau', '??????????', '/uploads/photos/countries/flags/2020-04-11/xUbZt6OUNyvJGJ2X.png', '??????????', 'TK', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(221, 'Tonga', '??????????', '/uploads/photos/countries/flags/2020-04-11/jbBEAKrLdZOCqQNm.png', '??????????', 'TO', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(222, 'Tuvalu', '????????????', '/uploads/photos/countries/flags/2020-04-11/lptUwmiSltqmfrPm.png', '????????????', 'TV', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(223, 'Vanuatu', '??????????????', '/uploads/photos/countries/flags/2020-04-11/iMbNVfWOrslqO3sa.png', '??????????????', 'VU', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(224, 'Wallis And Futuna', '?????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/e0DPvHpKFsHCor9i.png', '?????????? ??????????????', 'WF', 6, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(225, 'Argentina', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/a5pV1CrCWXa2cC3f.png', '??????????????????', 'AR', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(226, 'Bolivia', '??????????????', '/uploads/photos/countries/flags/2020-04-11/m9TU8OuAboRahk7B.png', '??????????????', 'BO', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(227, 'Brazil', '????????????????', '/uploads/photos/countries/flags/2020-04-11/uOM15msjD1jNJsuz.png', '????????????????', 'BR', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(228, 'Chile', '??????????', '/uploads/photos/countries/flags/2020-04-11/cMe0nyb1fHuVzQIE.png', '??????????', 'CL', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(229, 'Colombia', '????????????????', '/uploads/photos/countries/flags/2020-04-11/B53TKKXq6X4wTOyi.png', '????????????????', 'CO', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(230, 'Ecuador', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/2hDuUHl0UcaKttd0.png', '??????????????????', 'EC', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(231, 'French Guiana', '?????????? ????????????????', '/uploads/photos/countries/flags/2020-04-11/ddpw8cIQzC9KXE9E.png', '?????????? ????????????????', 'GF', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(232, 'Guyana', '????????????', '/uploads/photos/countries/flags/2020-04-11/gD6O6OobWPsPz0nP.png', '????????????', 'GY', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(233, 'Paraguay', '????????????????', '/uploads/photos/countries/flags/2020-04-11/JBtgK3WYm7kblZuf.png', '????????????????', 'PY', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(234, 'Peru', '????????', '/uploads/photos/countries/flags/2020-04-11/OOmn7e7sS7za08YG.png', '????????', 'PE', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(235, 'Suriname', '??????????????', '/uploads/photos/countries/flags/2020-04-11/zQkbp7yLpoEPwy85.png', '??????????????', 'SR', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(236, 'Uruguay', '????????????????', '/uploads/photos/countries/flags/2020-04-11/7tqn9tr9EaMWxw1B.png', '????????????????', 'UY', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(237, 'Venezuela', '??????????????', '/uploads/photos/countries/flags/2020-04-11/YSTCJciRdLR2oHpH.png', '??????????????', 'VE', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(305, 'Puerto Rico', '??????????????????', '/uploads/photos/countries/flags/2020-04-11/2OD9YUyei2W1h15o.png', '??????????????????', 'PR', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(1416515, 'French Southern and Antarctic Lands', '???????? ???????????? ???????????? ??????????????????????', '/uploads/photos/countries/flags/2020-04-11/n30U655WxYxqrC8q.png', '???????? ???????????? ???????????? ??????????????????????', 'TF', 7, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(1416516, 'South Georgia and the South Sandwich Islands', '???????????? ???????????????? ???????? ???????????????? ????????????????', '/uploads/photos/countries/flags/2020-04-11/kSnKeCEJel9CIiFz.png', '???????????? ???????????????? ???????? ???????????????? ????????????????', 'GS', 5, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(1416517, 'Western Sahara', '?????????????? ??????????????', '/uploads/photos/countries/flags/2020-04-11/iPTg0DYno0ewhFyJ.png', '?????????????? ??????????????', 'EH', 2, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(1467199, 'Autonomous Republic of Crimea', '?????????????? ??????????', '/uploads/photos/countries/flags/2020-04-11/DXfKj8BAeUqAWijj.png', '?????????????? ??????????', 'XC', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(1473228, 'Abkhazia', '??????????????', '/uploads/photos/countries/flags/2020-04-11/TpUv8yf4QTKV93S4.png', '??????????????', 'AB', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:30', NULL),
(1495187, 'Kosovo', '????????????', '/uploads/photos/countries/flags/2020-04-11/vwxHNhlDfDkiuAg0.png', '????????????', 'XK', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL),
(1505439, 'Northern Cyprus', '???????? ????????', '/uploads/photos/countries/flags/2020-04-11/lgDVMnBnmFjrLRnV.png', '???????? ????????', 'XY', 3, 'inactive', '2020-06-02 07:58:27', '2020-04-09 09:01:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country_phone_codes`
--

CREATE TABLE `country_phone_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_phone_codes`
--

INSERT INTO `country_phone_codes` (`id`, `country_id`, `code`, `status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 9, '213', 'active', '2020-04-09 09:36:51', '2020-04-09 09:36:51', NULL),
(2, 10, '244', 'active', '2020-04-09 09:39:18', '2020-04-09 09:39:18', NULL),
(3, 11, '229', 'active', '2020-04-09 09:40:23', '2020-04-09 09:40:23', NULL),
(4, 12, '267', 'active', '2020-04-09 09:41:28', '2020-04-09 09:41:28', NULL),
(5, 13, '226', 'active', '2020-04-09 09:42:28', '2020-04-09 09:42:28', NULL),
(6, 14, '257', 'active', '2020-04-09 09:43:23', '2020-04-09 09:43:23', NULL),
(7, 15, '237', 'active', '2020-04-09 09:43:58', '2020-04-09 09:43:58', NULL),
(8, 16, '238', 'active', '2020-04-09 09:45:14', '2020-04-09 09:45:14', NULL),
(9, 17, '236', 'active', '2020-04-09 09:46:44', '2020-04-09 09:46:44', NULL),
(10, 18, '235', 'active', '2020-04-09 09:47:56', '2020-04-09 09:47:56', NULL),
(11, 19, '269', 'active', '2020-04-09 09:49:13', '2020-04-09 09:49:13', NULL),
(12, 21, '243', 'active', '2020-04-09 09:53:33', '2020-04-09 09:53:33', NULL),
(13, 22, '253', 'active', '2020-04-09 09:54:42', '2020-04-09 09:54:42', NULL),
(14, 20, '242', 'active', '2020-04-09 09:55:43', '2020-04-09 09:55:43', NULL),
(15, 23, '20', 'active', '2020-04-09 09:56:23', '2020-04-09 09:56:23', NULL),
(16, 24, '240', 'active', '2020-04-09 09:57:26', '2020-04-09 09:57:26', NULL),
(17, 25, '291', 'active', '2020-04-09 09:58:14', '2020-04-09 09:58:14', NULL),
(18, 26, '251', 'active', '2020-04-09 09:58:55', '2020-04-09 09:58:55', NULL),
(19, 27, '241', 'active', '2020-04-09 09:59:53', '2020-04-09 09:59:53', NULL),
(20, 28, '220', 'active', '2020-04-09 10:00:49', '2020-04-09 10:00:49', NULL),
(21, 29, '233', 'active', '2020-04-09 10:01:54', '2020-04-09 10:01:54', NULL),
(22, 30, '244', 'active', '2020-04-09 10:02:46', '2020-04-09 10:02:46', NULL),
(23, 31, '245', 'active', '2020-04-09 10:03:37', '2020-04-09 10:03:37', NULL),
(24, 32, '225', 'active', '2020-04-09 10:05:29', '2020-04-09 10:05:29', NULL),
(25, 33, '254', 'active', '2020-04-09 10:06:05', '2020-04-09 10:06:05', NULL),
(26, 34, '266', 'active', '2020-04-09 10:07:05', '2020-04-09 10:07:05', NULL),
(27, 35, '231', 'active', '2020-04-09 10:07:47', '2020-04-09 10:07:47', NULL),
(28, 36, '218', 'active', '2020-04-09 10:08:41', '2020-04-09 10:08:41', NULL),
(29, 37, '261', 'active', '2020-04-09 10:09:37', '2020-04-09 10:09:37', NULL),
(30, 38, '265', 'active', '2020-04-09 10:10:31', '2020-04-09 10:10:31', NULL),
(31, 39, '223', 'active', '2020-04-09 10:11:32', '2020-04-09 10:11:32', NULL),
(32, 40, '222', 'active', '2020-04-09 10:12:19', '2020-04-09 10:12:19', NULL),
(33, 41, '230', 'active', '2020-04-09 10:13:07', '2020-04-09 10:13:07', NULL),
(34, 42, '262', 'active', '2020-04-09 10:15:00', '2020-04-09 10:15:00', NULL),
(35, 43, '212', 'active', '2020-04-09 10:15:36', '2020-04-09 10:15:36', NULL),
(36, 44, '258', 'active', '2020-04-09 10:16:45', '2020-04-09 10:16:45', NULL),
(37, 45, '264', 'active', '2020-04-09 10:17:27', '2020-04-09 10:17:27', NULL),
(38, 46, '227', 'active', '2020-04-09 10:18:24', '2020-04-09 10:18:24', NULL),
(39, 47, '234', 'active', '2020-04-09 10:19:02', '2020-04-09 10:19:02', NULL),
(40, 48, '262', 'active', '2020-04-09 10:24:11', '2020-04-09 10:24:11', NULL),
(41, 49, '250', 'active', '2020-04-09 10:25:33', '2020-04-09 10:25:33', NULL),
(42, 50, '290', 'active', '2020-04-09 10:29:12', '2020-04-09 10:29:12', NULL),
(43, 51, '239', 'active', '2020-04-09 10:30:45', '2020-04-09 10:30:45', NULL),
(44, 52, '221', 'active', '2020-04-09 10:32:28', '2020-04-09 10:32:28', NULL),
(45, 53, '248', 'active', '2020-04-09 10:33:35', '2020-04-09 10:33:35', NULL),
(46, 54, '232', 'active', '2020-04-09 10:37:02', '2020-04-09 10:37:02', NULL),
(47, 55, '252', 'active', '2020-04-09 10:37:41', '2020-04-09 10:37:41', NULL),
(48, 56, '27', 'active', '2020-04-09 10:38:28', '2020-04-09 10:38:28', NULL),
(49, 57, '211', 'active', '2020-04-09 10:39:07', '2020-04-09 10:39:07', NULL),
(50, 58, '268', 'active', '2020-04-09 10:39:56', '2020-04-09 10:39:56', NULL),
(51, 59, '255', 'active', '2020-04-09 10:42:05', '2020-04-09 10:42:05', NULL),
(52, 60, '228', 'active', '2020-04-11 04:54:35', '2020-04-11 04:54:35', NULL),
(53, 61, '216', 'active', '2020-04-11 04:55:23', '2020-04-11 04:55:23', NULL),
(54, 62, '256', 'active', '2020-04-11 04:56:20', '2020-04-11 04:56:20', NULL),
(55, 63, '260', 'active', '2020-04-11 04:57:02', '2020-04-11 04:57:02', NULL),
(56, 64, '263', 'active', '2020-04-11 04:57:46', '2020-04-11 04:57:46', NULL),
(57, 65, '93', 'active', '2020-04-11 04:58:25', '2020-04-11 04:58:25', NULL),
(58, 66, '374', 'active', '2020-04-11 04:59:11', '2020-04-11 04:59:11', NULL),
(59, 67, '994', 'active', '2020-04-11 05:00:07', '2020-04-11 05:00:07', NULL),
(60, 68, '973', 'active', '2020-04-11 05:00:48', '2020-04-11 05:00:48', NULL),
(61, 69, '880', 'active', '2020-04-11 05:01:23', '2020-04-11 05:01:23', NULL),
(62, 70, '975', 'active', '2020-04-11 05:02:12', '2020-04-11 05:02:12', NULL),
(63, 71, '673', 'active', '2020-04-11 05:02:49', '2020-04-11 05:02:49', NULL),
(64, 72, '855', 'active', '2020-04-11 05:03:37', '2020-04-11 05:03:37', NULL),
(65, 73, '86', 'active', '2020-04-11 05:04:21', '2020-04-11 05:04:21', NULL),
(66, 74, '670', 'active', '2020-04-11 05:05:50', '2020-04-11 05:05:50', NULL),
(67, 75, '995', 'active', '2020-04-11 05:06:55', '2020-04-11 05:06:55', NULL),
(68, 76, '852', 'active', '2020-04-11 05:07:51', '2020-04-11 05:07:51', NULL),
(69, 77, '91', 'active', '2020-04-11 05:08:28', '2020-04-11 05:08:28', NULL),
(70, 78, '62', 'active', '2020-04-11 05:09:15', '2020-04-11 05:09:15', NULL),
(71, 79, '98', 'active', '2020-04-11 05:09:58', '2020-04-11 05:09:58', NULL),
(72, 80, '964', 'active', '2020-04-11 05:10:43', '2020-04-11 05:10:43', NULL),
(73, 81, '972', 'active', '2020-04-11 05:11:55', '2020-04-11 05:11:55', NULL),
(74, 82, '81', 'active', '2020-04-11 05:12:29', '2020-04-11 05:12:29', NULL),
(75, 83, '962', 'active', '2020-04-11 05:13:05', '2020-04-11 05:13:05', NULL),
(76, 84, '77', 'active', '2020-04-11 05:13:57', '2020-04-11 05:13:57', NULL),
(77, 85, '965', 'active', '2020-04-11 05:14:38', '2020-04-11 05:14:38', NULL),
(78, 86, '996', 'active', '2020-04-11 05:15:20', '2020-04-11 05:15:20', NULL),
(79, 87, '856', 'active', '2020-04-11 05:16:03', '2020-04-11 05:16:03', NULL),
(80, 88, '961', 'active', '2020-04-11 05:16:37', '2020-04-11 05:16:37', NULL),
(81, 89, '853', 'active', '2020-04-11 05:17:20', '2020-04-11 05:17:20', NULL),
(82, 90, '60', 'active', '2020-04-11 05:18:01', '2020-04-11 05:18:01', NULL),
(83, 91, '960', 'active', '2020-04-11 05:21:29', '2020-04-11 05:21:29', NULL),
(84, 92, '976', 'active', '2020-04-11 05:22:07', '2020-04-11 05:22:07', NULL),
(85, 93, '95', 'active', '2020-04-11 05:25:01', '2020-04-11 05:25:01', NULL),
(86, 94, '977', 'active', '2020-04-11 05:25:36', '2020-04-11 05:25:36', NULL),
(87, 95, '850', 'active', '2020-04-11 05:26:16', '2020-04-11 05:26:16', NULL),
(88, 96, '968', 'active', '2020-04-11 05:26:55', '2020-04-11 05:26:55', NULL),
(89, 97, '92', 'active', '2020-04-11 05:27:31', '2020-04-11 05:27:31', NULL),
(90, 98, '970', 'active', '2020-04-11 05:31:26', '2020-04-11 05:31:26', NULL),
(91, 99, '63', 'active', '2020-04-11 05:31:59', '2020-04-11 05:31:59', NULL),
(92, 100, '974', 'active', '2020-04-11 05:32:39', '2020-04-11 05:32:39', NULL),
(93, 101, '966', 'active', '2020-04-11 05:33:20', '2020-04-11 05:33:20', NULL),
(94, 102, '65', 'active', '2020-04-11 05:33:49', '2020-04-11 05:33:49', NULL),
(95, 103, '82', 'active', '2020-04-11 05:34:17', '2020-04-11 05:34:17', NULL),
(96, 104, '94', 'active', '2020-04-11 05:35:06', '2020-04-11 05:35:06', NULL),
(97, 105, '963', 'active', '2020-04-11 05:35:38', '2020-04-11 05:35:38', NULL),
(98, 106, '886', 'active', '2020-04-11 05:36:16', '2020-04-11 05:36:16', NULL),
(99, 107, '992', 'active', '2020-04-11 05:37:13', '2020-04-11 05:37:13', NULL),
(100, 108, '66', 'active', '2020-04-11 05:37:48', '2020-04-11 05:37:48', NULL),
(101, 109, '90', 'active', '2020-04-11 05:40:50', '2020-04-11 05:40:50', NULL),
(102, 110, '993', 'active', '2020-04-11 05:41:22', '2020-04-11 05:41:22', NULL),
(103, 111, '971', 'active', '2020-04-11 05:42:07', '2020-04-11 05:42:07', NULL),
(104, 112, '998', 'active', '2020-04-11 05:42:44', '2020-04-11 05:42:44', NULL),
(105, 113, '84', 'active', '2020-04-11 05:43:18', '2020-04-11 05:43:18', NULL),
(106, 114, '967', 'active', '2020-04-11 05:43:54', '2020-04-11 05:43:54', NULL),
(107, 115, '1264', 'active', '2020-04-11 05:46:45', '2020-04-11 05:46:45', NULL),
(108, 116, '1268', 'active', '2020-04-11 05:48:08', '2020-04-11 05:48:08', NULL),
(109, 117, '297', 'active', '2020-04-11 05:49:17', '2020-04-11 05:49:17', NULL),
(110, 118, '1242', 'active', '2020-04-11 05:50:09', '2020-04-11 05:50:09', NULL),
(111, 119, '1246', 'active', '2020-04-11 05:51:22', '2020-04-11 05:51:22', NULL),
(112, 120, '501', 'active', '2020-04-11 05:52:14', '2020-04-11 05:52:14', NULL),
(113, 121, '1441', 'active', '2020-04-11 05:53:16', '2020-04-11 05:53:16', NULL),
(114, 122, '1', 'active', '2020-04-11 05:53:55', '2020-04-11 05:53:55', NULL),
(115, 123, '1345', 'active', '2020-04-11 05:54:43', '2020-04-11 05:54:43', NULL),
(116, 124, '506', 'active', '2020-04-11 05:55:39', '2020-04-11 05:55:39', NULL),
(117, 125, '53', 'active', '2020-04-11 05:56:43', '2020-04-11 05:56:43', NULL),
(118, 126, '767', 'active', '2020-04-11 05:58:19', '2020-04-11 05:58:19', NULL),
(119, 127, '809', 'active', '2020-04-11 05:59:43', '2020-04-11 05:59:43', NULL),
(120, 128, '503', 'active', '2020-04-11 06:00:44', '2020-04-11 06:00:44', NULL),
(121, 129, '299', 'active', '2020-04-11 06:02:15', '2020-04-11 06:02:15', NULL),
(122, 130, '1473', 'active', '2020-04-11 06:06:19', '2020-04-11 06:06:19', NULL),
(123, 131, '590', 'active', '2020-04-11 06:08:32', '2020-04-11 06:08:32', NULL),
(124, 132, '502', 'active', '2020-04-11 06:12:24', '2020-04-11 06:12:24', NULL),
(125, 133, '509', 'active', '2020-04-11 06:13:13', '2020-04-11 06:13:13', NULL),
(126, 134, '504', 'active', '2020-04-11 06:14:04', '2020-04-11 06:14:04', NULL),
(127, 135, '876', 'active', '2020-04-11 06:14:51', '2020-04-11 06:14:51', NULL),
(128, 136, '596', 'active', '2020-04-11 06:16:59', '2020-04-11 06:16:59', NULL),
(129, 137, '52', 'active', '2020-04-11 06:17:44', '2020-04-11 06:17:44', NULL),
(130, 138, '1', 'active', '2020-04-11 06:19:37', '2020-04-11 06:19:37', NULL),
(131, 139, '599', 'active', '2020-04-11 06:22:28', '2020-04-11 06:22:28', NULL),
(132, 140, '505', 'active', '2020-04-11 06:23:29', '2020-04-11 06:23:29', NULL),
(133, 141, '507', 'active', '2020-04-11 06:24:22', '2020-04-11 06:24:22', NULL),
(134, 142, '1869', 'active', '2020-04-11 06:25:27', '2020-04-11 06:25:27', NULL),
(135, 143, '1758', 'active', '2020-04-11 06:26:30', '2020-04-11 06:26:30', NULL),
(136, 144, '508', 'active', '2020-04-11 06:27:20', '2020-04-11 06:27:20', NULL),
(137, 145, '1784', 'active', '2020-04-11 06:28:26', '2020-04-11 06:28:26', NULL),
(138, 146, '868', 'active', '2020-04-11 06:29:27', '2020-04-11 06:29:27', NULL),
(139, 147, '1', 'active', '2020-04-11 06:30:18', '2020-04-11 06:30:18', NULL),
(140, 148, '1', 'active', '2020-04-11 06:32:07', '2020-04-11 06:32:07', NULL),
(141, 149, '1284', 'active', '2020-04-11 06:32:57', '2020-04-11 06:32:57', NULL),
(142, 150, '1', 'active', '2020-04-11 06:33:51', '2020-04-11 06:33:51', NULL),
(143, 151, '355', 'active', '2020-04-11 06:34:41', '2020-04-11 06:34:41', NULL),
(144, 152, '376', 'active', '2020-04-11 06:35:23', '2020-04-11 06:35:23', NULL),
(145, 153, '43', 'active', '2020-04-11 06:35:55', '2020-04-11 06:35:55', NULL),
(146, 154, '375', 'active', '2020-04-11 06:36:27', '2020-04-11 06:36:27', NULL),
(147, 155, '32', 'active', '2020-04-11 06:36:56', '2020-04-11 06:36:56', NULL),
(148, 156, '387', 'active', '2020-04-11 06:37:38', '2020-04-11 06:37:38', NULL),
(149, 157, '359', 'active', '2020-04-11 06:38:09', '2020-04-11 06:38:09', NULL),
(150, 158, '385', 'active', '2020-04-11 06:38:36', '2020-04-11 06:38:36', NULL),
(151, 159, '357', 'active', '2020-04-11 06:40:45', '2020-04-11 06:40:45', NULL),
(152, 160, '420', 'active', '2020-04-11 06:41:20', '2020-04-11 06:41:20', NULL),
(153, 161, '45', 'active', '2020-04-11 06:42:12', '2020-04-11 06:42:12', NULL),
(154, 162, '372', 'active', '2020-04-11 06:42:40', '2020-04-11 06:42:40', NULL),
(155, 163, '358', 'active', '2020-04-11 06:43:11', '2020-04-11 06:43:11', NULL),
(156, 164, '33', 'active', '2020-04-11 06:43:42', '2020-04-11 06:43:42', NULL),
(157, 165, '49', 'active', '2020-04-11 06:44:42', '2020-04-11 06:44:42', NULL),
(158, 166, '350', 'active', '2020-04-11 06:45:37', '2020-04-11 06:45:37', NULL),
(159, 167, '30', 'active', '2020-04-11 06:46:11', '2020-04-11 06:46:11', NULL),
(160, 168, '36', 'active', '2020-04-11 06:46:50', '2020-04-11 06:46:50', NULL),
(161, 169, '354', 'active', '2020-04-11 06:50:00', '2020-04-11 06:50:00', NULL),
(162, 170, '353', 'active', '2020-04-11 06:50:39', '2020-04-11 06:50:39', NULL),
(163, 171, '39', 'active', '2020-04-11 06:51:12', '2020-04-11 06:51:12', NULL),
(164, 172, '371', 'active', '2020-04-11 06:51:56', '2020-04-11 06:51:56', NULL),
(165, 173, '423', 'active', '2020-04-11 06:52:29', '2020-04-11 06:52:29', NULL),
(166, 174, '370', 'active', '2020-04-11 06:53:08', '2020-04-11 06:53:08', NULL),
(167, 175, '352', 'active', '2020-04-11 06:53:36', '2020-04-11 06:53:36', NULL),
(168, 176, '389', 'active', '2020-04-11 06:54:11', '2020-04-11 06:54:11', NULL),
(169, 177, '373', 'active', '2020-04-11 06:54:44', '2020-04-11 06:54:44', NULL),
(170, 178, '377', 'active', '2020-04-11 06:55:13', '2020-04-11 06:55:13', NULL),
(171, 179, '382', 'active', '2020-04-11 06:55:47', '2020-04-11 06:55:47', NULL),
(172, 180, '31', 'active', '2020-04-11 06:56:16', '2020-04-11 06:56:16', NULL),
(173, 181, '47', 'active', '2020-04-11 06:56:46', '2020-04-11 06:56:46', NULL),
(174, 182, '48', 'active', '2020-04-11 06:57:20', '2020-04-11 06:57:20', NULL),
(175, 183, '351', 'active', '2020-04-11 06:57:50', '2020-04-11 06:57:50', NULL),
(176, 184, '356', 'active', '2020-04-11 06:58:23', '2020-04-11 06:58:23', NULL),
(177, 185, '40', 'active', '2020-04-11 06:58:53', '2020-04-11 06:58:53', NULL),
(178, 186, '7', 'active', '2020-04-11 06:59:44', '2020-04-11 06:59:44', NULL),
(179, 187, '378', 'active', '2020-04-11 07:00:21', '2020-04-11 07:00:21', NULL),
(180, 188, '381', 'active', '2020-04-11 07:07:12', '2020-04-11 07:07:12', NULL),
(181, 189, '421', 'active', '2020-04-11 07:07:53', '2020-04-11 07:07:53', NULL),
(182, 190, '386', 'active', '2020-04-11 07:08:25', '2020-04-11 07:08:25', NULL),
(183, 191, '34', 'active', '2020-04-11 07:08:56', '2020-04-11 07:08:56', NULL),
(184, 192, '46', 'active', '2020-04-11 07:09:25', '2020-04-11 07:09:25', NULL),
(185, 193, '41', 'active', '2020-04-11 07:09:54', '2020-04-11 07:09:54', NULL),
(186, 194, '380', 'active', '2020-04-11 07:10:22', '2020-04-11 07:10:22', NULL),
(187, 195, '44', 'active', '2020-04-11 07:11:07', '2020-04-11 07:11:07', NULL),
(188, 196, '379', 'active', '2020-04-11 07:11:38', '2020-04-11 07:11:38', NULL),
(189, 197, '684', 'active', '2020-04-11 07:13:05', '2020-04-11 07:13:05', NULL),
(190, 198, '61', 'active', '2020-04-11 07:13:45', '2020-04-11 07:13:45', NULL),
(191, 199, '61', 'active', '2020-04-11 07:15:16', '2020-04-11 07:15:16', NULL),
(192, 200, '61.', 'active', '2020-04-11 07:16:40', '2020-04-11 07:16:40', NULL),
(193, 201, '682', 'active', '2020-04-11 07:17:50', '2020-04-11 07:17:50', NULL),
(194, 202, '679', 'active', '2020-04-11 07:18:28', '2020-04-11 07:18:28', NULL),
(195, 203, '689', 'active', '2020-04-11 07:19:33', '2020-04-11 07:19:33', NULL),
(196, 204, '1671', 'active', '2020-04-11 07:20:48', '2020-04-11 07:20:48', NULL),
(197, 205, '672', 'active', '2020-04-11 07:24:33', '2020-04-11 07:24:33', NULL),
(198, 206, '686', 'active', '2020-04-11 07:25:13', '2020-04-11 07:25:13', NULL),
(199, 207, '692', 'active', '2020-04-11 07:25:59', '2020-04-11 07:25:59', NULL),
(200, 208, '691', 'active', '2020-04-11 07:27:49', '2020-04-11 07:27:49', NULL),
(201, 209, '674', 'active', '2020-04-11 07:31:11', '2020-04-11 07:31:11', NULL),
(202, 210, '687', 'active', '2020-04-11 07:32:58', '2020-04-11 07:32:58', NULL),
(203, 211, '64', 'active', '2020-04-11 07:34:00', '2020-04-11 07:34:00', NULL),
(204, 212, '683', 'active', '2020-04-11 07:35:19', '2020-04-11 07:35:19', NULL),
(205, 213, '672', 'active', '2020-04-11 07:37:00', '2020-04-11 07:37:00', NULL),
(206, 214, '.1670', 'active', '2020-04-11 07:38:06', '2020-04-11 07:38:06', NULL),
(207, 215, '680', 'active', '2020-04-11 07:39:10', '2020-04-11 07:39:10', NULL),
(208, 216, '675', 'active', '2020-04-11 07:39:49', '2020-04-11 07:39:49', NULL),
(209, 217, '64', 'active', '2020-04-11 07:40:35', '2020-04-11 07:40:35', NULL),
(210, 218, '685', 'active', '2020-04-11 07:41:38', '2020-04-11 07:41:38', NULL),
(211, 219, '677', 'active', '2020-04-11 07:42:11', '2020-04-11 07:42:11', NULL),
(212, 220, '690', 'active', '2020-04-11 07:44:43', '2020-04-11 07:44:43', NULL),
(213, 221, '676', 'active', '2020-04-11 07:45:18', '2020-04-11 07:45:18', NULL),
(214, 222, '688', 'active', '2020-04-11 07:45:59', '2020-04-11 07:45:59', NULL),
(215, 223, '678', 'active', '2020-04-11 07:46:56', '2020-04-11 07:46:56', NULL),
(216, 224, '681', 'active', '2020-04-11 07:47:49', '2020-04-11 07:47:49', NULL),
(217, 225, '54', 'active', '2020-04-11 07:48:20', '2020-04-11 07:48:20', NULL),
(218, 226, '591', 'active', '2020-04-11 07:48:52', '2020-04-11 07:48:52', NULL),
(219, 227, '55', 'active', '2020-04-11 07:49:23', '2020-04-11 07:49:23', NULL),
(220, 228, '56', 'active', '2020-04-11 07:49:53', '2020-04-11 07:49:53', NULL),
(221, 229, '57', 'active', '2020-04-11 07:50:31', '2020-04-11 07:50:31', NULL),
(222, 230, '593', 'active', '2020-04-11 07:51:12', '2020-04-11 07:51:12', NULL),
(223, 231, '594', 'active', '2020-04-11 07:54:23', '2020-04-11 07:54:23', NULL),
(224, 232, '592', 'active', '2020-04-11 07:55:03', '2020-04-11 07:55:03', NULL),
(225, 233, '595', 'active', '2020-04-11 07:55:33', '2020-04-11 07:55:33', NULL),
(226, 234, '51', 'active', '2020-04-11 07:56:09', '2020-04-11 07:56:09', NULL),
(227, 235, '597', 'active', '2020-04-11 07:56:40', '2020-04-11 07:56:40', NULL),
(228, 236, '598', 'active', '2020-04-11 07:57:13', '2020-04-11 07:57:13', NULL),
(229, 237, '58', 'active', '2020-04-11 07:57:43', '2020-04-11 07:57:43', NULL),
(230, 305, '1', 'active', '2020-04-11 07:59:17', '2020-04-11 07:59:17', NULL),
(231, 1416515, '262', 'active', '2020-04-11 08:09:24', '2020-04-11 08:09:24', NULL),
(232, 1416516, '500', 'active', '2020-04-11 08:12:39', '2020-04-11 08:12:39', NULL),
(233, 1416517, '212', 'active', '2020-04-11 08:15:39', '2020-04-11 08:15:39', NULL),
(234, 1467199, '365', 'active', '2020-04-11 08:20:41', '2020-04-11 08:20:41', NULL),
(235, 1473228, '995', 'active', '2020-04-11 08:24:36', '2020-04-11 08:24:36', NULL),
(236, 1495187, '383', 'active', '2020-04-11 08:25:31', '2020-04-11 08:25:31', NULL),
(237, 1505439, '90392', 'active', '2020-04-11 08:28:13', '2020-04-11 08:28:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `en_name`, `ar_name`, `iso`, `status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Saudi Riyal', '???????? ??????????', 'SAR', 'active', '2020-06-02 09:17:25', '2020-06-02 09:17:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currency_rates`
--

CREATE TABLE `currency_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `change_factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency_rates`
--

INSERT INTO `currency_rates` (`id`, `currency_id`, `change_factor`, `status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 1, '1', 'active', '2020-06-02 09:17:36', '2020-06-02 09:17:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_value` blob NOT NULL,
  `en_value` blob NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` blob DEFAULT NULL,
  `en_description` blob DEFAULT NULL,
  `ar_company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_ratio` decimal(9,6) NOT NULL DEFAULT 0.000000,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `ar_name`, `en_name`, `ar_description`, `en_description`, `ar_company_name`, `en_company_name`, `ar_address`, `en_address`, `mobile`, `email`, `fax`, `telephone`, `whatsapp`, `viber`, `snapchat`, `facebook`, `twitter`, `instagram`, `google`, `linkedin`, `app_url`, `app_ratio`, `status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, '??????????????', 'App', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.000000', 'active', '2020-06-02 08:27:37', '2020-06-02 08:27:37', NULL);

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
(1, '2020_06_02_073237_create_continents_table', 1),
(2, '2020_06_02_074804_create_countries_table', 2),
(3, '2020_06_02_080406_create_country_phone_codes_table', 3),
(4, '2020_06_02_080822_create_cities_table', 4),
(5, '2020_06_02_082117_create_general_settings_table', 5),
(6, '2020_06_02_082911_create_faqs_table', 6),
(7, '2020_06_02_083200_create_pages_table', 7),
(8, '2020_06_02_083523_create_currencies_table', 8),
(10, '2020_06_02_083807_create_currency_rates_table', 9),
(11, '2020_06_02_084518_create_walkthroughs_table', 9),
(12, '2020_06_02_090025_create_banners_table', 10),
(13, '2020_06_02_091245_create_roles_table', 11),
(14, '2020_06_02_091907_create_users_table', 12),
(15, '2020_06_02_110142_create_categories_table', 13),
(16, '2020_06_02_110724_create_sub_categories_table', 13),
(17, '2020_06_02_111322_create_admin_contacts_table', 14),
(18, '2016_06_01_000001_create_oauth_auth_codes_table', 15),
(19, '2016_06_01_000002_create_oauth_access_tokens_table', 15),
(20, '2016_06_01_000003_create_oauth_refresh_tokens_table', 15),
(21, '2016_06_01_000004_create_oauth_clients_table', 15),
(22, '2016_06_01_000005_create_oauth_personal_access_clients_table', 15),
(23, '2014_10_12_100000_create_password_resets_table', 16),
(24, '2020_06_10_091036_add_app_url_to_general_settings', 16);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'm4lp0aeGL04v5KXNmq5lmIjR0oDQsTDpLhn6jjp7', NULL, 'http://localhost', 1, 0, 0, '2020-06-02 10:20:12', '2020-06-02 10:20:12'),
(2, NULL, 'Laravel Password Grant Client', 'NlqWWn80DO3gsLbQ6qrQaipWFN8HURB0Ez9Q9zcd', 'users', 'http://localhost', 0, 1, 0, '2020-06-02 10:20:12', '2020-06-02 10:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-06-02 10:20:12', '2020-06-02 10:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_value` blob NOT NULL,
  `en_value` blob NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `ar_name`, `en_name`, `status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, '????????', 'admin', 'active', '2020-06-02 09:15:58', '2020-06-02 09:15:58', NULL),
(2, '???????????? ??????????????', 'member', 'active', '2020-06-02 09:15:58', '2020-06-02 09:15:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/uploads/placeholder/media_cover_avatar.png',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/uploads/placeholder/user_avatar.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code_id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `main_language` enum('ar','en') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `time_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `profile_image`, `password`, `is_admin`, `country_id`, `mobile`, `phone_code_id`, `currency_id`, `main_language`, `role_id`, `status`, `time_zone`, `remember_token`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', '/uploads/placeholder/user_avatar.png', '$2y$10$ZfaZqmg/XJCjKiVWUuOp5eOz04mbxI3HZU1AO/RqqskLrtOmvX0aG', 1, 101, '123456789', 93, 1, 'ar', 1, 'active', NULL, NULL, '2020-06-02 11:32:34', '2020-06-02 11:32:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `walkthroughs`
--

CREATE TABLE `walkthroughs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` blob NOT NULL,
  `ar_description` blob NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/uploads/placeholder/default_image.png',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_contacts`
--
ALTER TABLE `admin_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_continent_id_foreign` (`continent_id`);

--
-- Indexes for table `country_phone_codes`
--
ALTER TABLE `country_phone_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_phone_codes_country_id_foreign` (`country_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_rates`
--
ALTER TABLE `currency_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency_rates_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_currency_id_foreign` (`currency_id`),
  ADD KEY `users_phone_code_id_foreign` (`phone_code_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `walkthroughs`
--
ALTER TABLE `walkthroughs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_contacts`
--
ALTER TABLE `admin_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `continents`
--
ALTER TABLE `continents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1505440;

--
-- AUTO_INCREMENT for table `country_phone_codes`
--
ALTER TABLE `country_phone_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency_rates`
--
ALTER TABLE `currency_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `walkthroughs`
--
ALTER TABLE `walkthroughs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_contacts`
--
ALTER TABLE `admin_contacts`
  ADD CONSTRAINT `admin_contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_continent_id_foreign` FOREIGN KEY (`continent_id`) REFERENCES `continents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `country_phone_codes`
--
ALTER TABLE `country_phone_codes`
  ADD CONSTRAINT `country_phone_codes_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `currency_rates`
--
ALTER TABLE `currency_rates`
  ADD CONSTRAINT `currency_rates_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_phone_code_id_foreign` FOREIGN KEY (`phone_code_id`) REFERENCES `country_phone_codes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
