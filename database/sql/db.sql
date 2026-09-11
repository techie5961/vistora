-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2026 at 01:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vistora`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `tag`, `password`, `remember_token`, `json`, `status`, `updated`, `date`) VALUES
(1, 'master', '$2y$12$9.2R2RU7GN1Sz.n1lbnmI.7y9P4QjjPZONMpxhScf9/bqX.zFGjAS', 'mOT9PPeK909tiJ03IQdKIGY5Mb4D80XHrx8UHAFZMOmDELBj7dQ3d8a3PyjU', NULL, 'active', '2026-03-07 17:02:07', '2026-03-07 17:02:07');

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
-- Table structure for table `gift_codes`
--

CREATE TABLE `gift_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL COMMENT 'The gift code',
  `value` bigint(20) NOT NULL COMMENT 'The gift code value',
  `limit` bigint(20) NOT NULL DEFAULT 100 COMMENT 'The gift code limit i.e total users before being invalid',
  `redeemed` bigint(20) NOT NULL DEFAULT 0 COMMENT 'Totla units redeemed',
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Added details' CHECK (json_valid(`json`)),
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'active'
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

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`url`)),
  `icon` text DEFAULT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`title`)),
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`body`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'json status format for user and admin wether read or unread' CHECK (json_valid(`status`)),
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL COMMENT 'user email',
  `otp` bigint(20) DEFAULT NULL COMMENT 'otp code',
  `purpose` text DEFAULT NULL COMMENT 'Otp purpose',
  `status` varchar(255) NOT NULL DEFAULT 'active' COMMENT 'code status',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `email`, `otp`, `purpose`, `status`, `updated`, `date`) VALUES
(1, 'techie5961@gmail.com', 783333, 'Forgot Password', 'active', '2026-05-19 18:28:05', '2026-05-19 18:28:05'),
(2, 'techie5961@gmail.com', 918698, 'Forgot Password', 'used', '2026-05-19 19:42:35', '2026-05-19 19:41:02'),
(3, 'techie5961@gmail.com', 834136, 'Forgot Password', 'used', '2026-05-19 19:45:18', '2026-05-19 19:44:09');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Product name',
  `photo` varchar(255) NOT NULL COMMENT 'The display photo',
  `category` varchar(255) NOT NULL COMMENT 'The product category',
  `price` double NOT NULL COMMENT 'The product price',
  `location` varchar(255) NOT NULL COMMENT 'The location in state',
  `address` text DEFAULT NULL COMMENT 'Address',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchased_products`
--

CREATE TABLE `purchased_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `product` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'The product json gotten from products table' CHECK (json_valid(`product`)),
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'The status in json for both buyer and seller' CHECK (json_valid(`status`)),
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery_address` text DEFAULT NULL,
  `delivery_state` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redeemed_gift_codes`
--

CREATE TABLE `redeemed_gift_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'The user who redeemed the code',
  `gift_code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Gift code json fetched from the gift codes table based on the code' CHECK (json_valid(`gift_code`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
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
('q4ezuLrtEbf8WkzugpftlBv8tptloK6qfxYNdGyg', NULL, '172.20.10.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.6.1 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic1drRks5TE9JblBhQjNJa2FhZzRlcFVNQkxORGxZazRLbW9teGM4RCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xNzIuMjAuMTAuMy92aXN0b3JhL3B1YmxpYy91c2Vycy9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6Mjc6ImdlbmVyYXRlZDo6SU5USVVUZkNZVDk5aG1UMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX3VzZXJzXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1789124690);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`value`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `json`, `status`, `updated`, `date`) VALUES
(1, 'general_settings', '{\"email_verification\":\"off\",\"maintenance_mode\":\"off\",\"welcome_bonus\":\"400\",\"referral_commission\":\"400\",\"task\":{\"penalty\":\"500\"}}', NULL, 'active', '2026-05-03 17:12:17', '2026-03-24 03:09:32'),
(2, 'social_settings', '{\"whatsapp_community\":\"https:\\/\\/wa.com.sh\",\"telegram_community\":\"https:\\/\\/t.com.edhd\",\"site_notification\":\"Welcome to TaskHub, Your welcome bonus has been added. Complete daily tasks, spin to win cash, and redeem gift codes from our WhatsApp & Telegram groups. For any issues, contact admin anytime. Enjoy!\",\"advert\":{\"telegram\":\"https:\\/\\/telegram.com\\/biz\\/\",\"whatsapp\":\"https:\\/\\/whatsapp.com\\/biz\\/\"}}', NULL, 'active', '2026-05-05 17:36:46', '2026-03-24 03:48:42'),
(3, 'bank_settings', '{\"account_number\":\"5005016577\",\"bank_name\":\"Kuda\",\"account_name\":\"David James\"}', NULL, 'active', '2026-04-30 02:58:30', '2026-04-17 06:16:37'),
(4, 'finance_settings', '{\"withdrawal\":{\"fee\":\"15\",\"count\":\"5\",\"affiliate_balance\":{\"portal\":\"on\",\"minimum\":\"60\",\"maximum\":\"857\"},\"main_balance\":{\"portal\":\"on\",\"minimum\":\"300\",\"maximum\":\"8079\"}},\"vtu\":{\"portal\":\"on\"}}', NULL, 'active', '2026-05-17 20:43:56', '2026-04-29 07:29:09'),
(5, 'upgrade_settings', '{\"upgrade\":{\"fee\":\"1000\",\"cashback\":\"300\",\"portal\":\"on\"}}', NULL, 'active', '2026-09-02 04:46:42', '2026-04-30 02:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `track_id` bigint(20) NOT NULL,
  `track` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'The track streamed as a json' CHECK (json_valid(`track`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `category` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `earning` bigint(20) NOT NULL,
  `slots` bigint(20) NOT NULL DEFAULT 100 COMMENT 'The total proofs needed',
  `completed` bigint(20) NOT NULL DEFAULT 0 COMMENT 'The total proofs submitted',
  `link` varchar(255) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `uniqid`, `user_id`, `category`, `title`, `earning`, `slots`, `completed`, `link`, `caption`, `banner`, `status`, `updated`, `date`) VALUES
(3, 'CUOSNUSY17888624', 0, '{\"id\":6,\"uniqid\":\"R99OQQ9Z17888584\",\"icon\":\"0z9yxzhl17888584.png\",\"name\":\"Like Post\",\"earning\":39,\"platform\":\"Facebook\",\"status\":\"active\",\"updated\":\"2026-09-08 10:06:56\",\"date\":\"2026-09-08 10:06:56\"}', 'Like Post', 39, 20, 0, 'https://whatsapp.com/biz/', NULL, NULL, 'active', '2026-09-08 18:14:31', '2026-09-08 18:14:31'),
(6, 'VM5SMW2S17889467', 0, '{\"id\":6,\"uniqid\":\"R99OQQ9Z17888584\",\"icon\":\"0z9yxzhl17888584.png\",\"name\":\"Like Post\",\"earning\":39,\"platform\":\"Facebook\",\"status\":\"active\",\"updated\":\"2026-09-08 10:06:56\",\"date\":\"2026-09-08 10:06:56\"}', 'Like Post', 39, 50, 0, 'https://www.facebook.com/share/1Cpe2fyRzU/?mibextid=wwXIfr', NULL, NULL, 'active', '2026-09-09 17:39:03', '2026-09-09 17:39:03'),
(7, 'OY8NTIR317889467', 0, '{\"id\":5,\"uniqid\":\"VZNP9PIE17888583\",\"icon\":\"2qbbhuxc17888593.jpeg\",\"name\":\"Follow page\",\"earning\":40,\"platform\":\"Tiktok\",\"status\":\"active\",\"updated\":\"2026-09-08 10:23:03\",\"date\":\"2026-09-08 10:05:59\"}', 'Follow page', 40, 50, 1, 'https://www.facebook.com/share/1Cpe2fyRzU/?mibextid=wwXIfr', NULL, NULL, 'active', '2026-09-09 17:39:14', '2026-09-09 17:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `task_categories`
--

CREATE TABLE `task_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `earning` double NOT NULL DEFAULT 0,
  `platform` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_categories`
--

INSERT INTO `task_categories` (`id`, `uniqid`, `icon`, `name`, `earning`, `platform`, `status`, `updated`, `date`) VALUES
(5, 'VZNP9PIE17888583', '2qbbhuxc17888593.jpeg', 'Follow page', 40, 'Tiktok', 'active', '2026-09-08 17:23:03', '2026-09-08 17:05:59'),
(6, 'R99OQQ9Z17888584', '0z9yxzhl17888584.png', 'Like Post', 39, 'Facebook', 'active', '2026-09-08 17:06:56', '2026-09-08 17:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `task_proofs`
--

CREATE TABLE `task_proofs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `task` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'the task performed in json format fetched from task table based on task id submitted' CHECK (json_valid(`task`)),
  `proofs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'The prrofs submitted in json format' CHECK (json_valid(`proofs`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'added details' CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_proofs`
--

INSERT INTO `task_proofs` (`id`, `uniqid`, `user_id`, `task`, `proofs`, `json`, `status`, `updated`, `date`) VALUES
(1, 'KXCN1IZ517889742', 1, '{\"id\":7,\"uniqid\":\"OY8NTIR317889467\",\"user_id\":0,\"category\":\"{\\\"id\\\":5,\\\"uniqid\\\":\\\"VZNP9PIE17888583\\\",\\\"icon\\\":\\\"2qbbhuxc17888593.jpeg\\\",\\\"name\\\":\\\"Follow page\\\",\\\"earning\\\":40,\\\"platform\\\":\\\"Tiktok\\\",\\\"status\\\":\\\"active\\\",\\\"updated\\\":\\\"2026-09-08 10:23:03\\\",\\\"date\\\":\\\"2026-09-08 10:05:59\\\"}\",\"title\":\"Follow page\",\"earning\":40,\"slots\":50,\"completed\":0,\"link\":\"https:\\/\\/www.facebook.com\\/share\\/1Cpe2fyRzU\\/?mibextid=wwXIfr\",\"caption\":null,\"banner\":null,\"status\":\"active\",\"updated\":\"2026-09-09 10:39:14\",\"date\":\"2026-09-09 10:39:14\"}', '{\"Screenshot\":\" <a href=\\\"http:\\/\\/172.20.10.2\\/vistora\\/public\\/tasks\\/proofs\\/im6sc2sa17889742.jpeg\\\" target=\\\"_blank\\\" class=\\\"c-primary no-select w-fit\\\">\\n                        View Screenshot\\n                        <svg xmlns=\\\"http:\\/\\/www.w3.org\\/2000\\/svg\\\" viewBox=\\\"0 0 256 256\\\" fill=\\\"CurrentColor\\\" height=\\\"15\\\" width=\\\"15\\\"><path d=\\\"M228,104a12,12,0,0,1-24,0V69l-59.51,59.51a12,12,0,0,1-17-17L187,52H152a12,12,0,0,1,0-24h64a12,12,0,0,1,12,12Zm-44,24a12,12,0,0,0-12,12v64H52V84h64a12,12,0,0,0,0-24H48A20,20,0,0,0,28,80V208a20,20,0,0,0,20,20H176a20,20,0,0,0,20-20V140A12,12,0,0,0,184,128Z\\\"><\\/path><\\/svg>\\n\\n                    <\\/a>\"}', NULL, 'pending', '2026-09-10 01:17:30', '2026-09-10 01:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `tracklist`
--

CREATE TABLE `tracklist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL COMMENT 'Display Banner',
  `audio` varchar(255) DEFAULT NULL COMMENT 'Track Audio',
  `name` varchar(255) DEFAULT NULL COMMENT 'Track Name',
  `artist` varchar(255) DEFAULT NULL COMMENT 'Artist/Musician who sang the song',
  `reward` bigint(20) DEFAULT NULL COMMENT 'Streaming Reward',
  `streams` bigint(20) NOT NULL DEFAULT 0 COMMENT 'Total streams',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT 0,
  `fee` float DEFAULT 0,
  `icon` text DEFAULT NULL,
  `wallet` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`wallet`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `uniqid`, `user_id`, `title`, `class`, `type`, `amount`, `fee`, `icon`, `wallet`, `json`, `data`, `status`, `updated`, `date`) VALUES
(1, 'SPS5IRWA17891228', 1, 'API Token', 'credit', 'deposit', 1000, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"15\" width=\"15\"><path d=\"M17 14H12.6586C11.8349 16.3304 9.61244 18 7 18C3.68629 18 1 15.3137 1 12C1 8.68629 3.68629 6 7 6C9.61244 6 11.8349 7.66962 12.6586 10H23V14H21V18H17V14ZM7 14C8.10457 14 9 13.1046 9 12C9 10.8954 8.10457 10 7 10C5.89543 10 5 10.8954 5 12C5 13.1046 5.89543 14 7 14Z\"></path></svg>', '{\"from\":{\"method\":\"bank\",\"account_number\":null,\"bank_name\":null,\"account_name\":null,\"receipt\":\"http:\\/\\/172.20.10.3\\/vistora\\/public\\/receipt\\/1789122818.jpeg\"},\"to\":\"deposit_balance\"}', '{\"balance\":{\"before\":0,\"after\":0},\"primary_wallet\":\"Deposit Wallet\"}', '{\"gateway\":\"Manual\",\"Payment proof\":\"<a target=\\\"_blank\\\" href=\\\"http:\\/\\/172.20.10.3\\/vistora\\/public\\/receipt\\/1789122818.jpeg\\\" class=\\\"c-primary w-fit\\\">View proof<\\/a>\",\"account number\":\"5005016577\",\"bank name\":\"Kuda\",\"account name\":\"David James\"}', 'pending', '2026-09-11 18:33:38', '2026-09-11 18:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `package` varchar(255) NOT NULL DEFAULT 'free',
  `type` varchar(255) DEFAULT 'user',
  `username` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'nigeria',
  `currency` varchar(255) NOT NULL DEFAULT '₦',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `main_balance` float NOT NULL DEFAULT 0,
  `affiliate_balance` double NOT NULL DEFAULT 0,
  `activities_balance` double NOT NULL DEFAULT 0,
  `deposit_balance` float NOT NULL DEFAULT 0,
  `withdrawal_balance` float NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `bank` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`bank`)),
  `status` varchar(255) DEFAULT 'active',
  `api_token` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'api token json' CHECK (json_valid(`api_token`)),
  `user_agent` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `socials` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`socials`)),
  `upgraded` varchar(255) NOT NULL DEFAULT 'no' COMMENT 'Updates to yes if the user is upgraded and no if not',
  `last_spin` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Last daily  spin time to track and make sure the users spin once daily'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uniqid`, `package`, `type`, `username`, `photo`, `phone`, `ref`, `country`, `currency`, `name`, `email`, `main_balance`, `affiliate_balance`, `activities_balance`, `deposit_balance`, `withdrawal_balance`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `json`, `bank`, `status`, `api_token`, `user_agent`, `updated`, `date`, `socials`, `upgraded`, `last_spin`) VALUES
(1, 'QCNRJUEE17874678', 'Free Plan', 'promoter', 'blaady05', '2jlqvcpb17891246.jpeg', '09013350351', NULL, 'nigeria', '₦', 'David James', 'techie5961@gmail.com', 39600, 0, 0, 0, 0, NULL, '$2y$12$FbVBCWVrHikd4R/yOU1QqOvkC0X8JW57puQQemkKD9G67eqvOf4Zu', 'iCgNjLZKcURMp8eOI4MGkKrkuv9Tm3OaYSaLBMKD8FamlqhhWMwNsRGGT4Sa', NULL, NULL, NULL, '{\"account_number\":\"5005016577\",\"bank_name\":\"Standard Chartered Bank\",\"account_name\":\"DAVID JAMES ABAKPA\"}', 'active', '{\"token\":\"1ZV3Q1IJ17891228\",\"status\":\"pending\"}', '', '2026-09-11 19:04:43', '2026-08-23 14:51:06', NULL, 'no', '2026-08-22 07:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gift_codes`
--
ALTER TABLE `gift_codes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased_products`
--
ALTER TABLE `purchased_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeemed_gift_codes`
--
ALTER TABLE `redeemed_gift_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_categories`
--
ALTER TABLE `task_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_proofs`
--
ALTER TABLE `task_proofs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracklist`
--
ALTER TABLE `tracklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gift_codes`
--
ALTER TABLE `gift_codes`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchased_products`
--
ALTER TABLE `purchased_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redeemed_gift_codes`
--
ALTER TABLE `redeemed_gift_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task_categories`
--
ALTER TABLE `task_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task_proofs`
--
ALTER TABLE `task_proofs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tracklist`
--
ALTER TABLE `tracklist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
