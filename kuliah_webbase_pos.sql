-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2022 pada 13.18
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliah_webbase_pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `no_order` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categorys`
--

CREATE TABLE `categorys` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `categorys`
--

INSERT INTO `categorys` (`category_id`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 'Makanan', '2022-01-17 06:27:08', NULL),
(2, 0, 'Minuman', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-12-28-071514', 'App\\Database\\Migrations\\Users', 'default', 'App', 1641190315, 1),
(2, '2021-12-28-073103', 'App\\Database\\Migrations\\Stores', 'default', 'App', 1641190316, 1),
(3, '2021-12-28-073123', 'App\\Database\\Migrations\\Categorys', 'default', 'App', 1641190317, 1),
(4, '2021-12-28-073131', 'App\\Database\\Migrations\\Products', 'default', 'App', 1641190317, 1),
(5, '2021-12-28-074239', 'App\\Database\\Migrations\\ReturHeaders', 'default', 'App', 1641190318, 1),
(6, '2021-12-28-074243', 'App\\Database\\Migrations\\ReturDetails', 'default', 'App', 1641190319, 1),
(7, '2021-12-28-074828', 'App\\Database\\Migrations\\TransactionHeaders', 'default', 'App', 1641190320, 1),
(8, '2021-12-28-074832', 'App\\Database\\Migrations\\TransactionDetails', 'default', 'App', 1641190320, 1),
(10, '2022-01-19-060539', 'App\\Database\\Migrations\\Carts', 'default', 'App', 1642602779, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `price_buy` int(11) NOT NULL,
  `price_sell` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `sku`, `unit`, `image`, `stok`, `price_buy`, `price_sell`, `discount`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Simba Cereal Choco Chips + Kalsium Susu Coklat 37G', 'SimbaCerealChocoChips+KalsiumSusuCoklat37G', 'pcs', 'Simba Cereal.jpg', 100, 5900, 7000, 0, 'Simba Cereal Choco Chips + Kalsium Susu Coklat 37G', '2022-01-17 06:24:36', NULL),
(2, 1, 'Kinder Joy Chocolate Crispy Boys 20G', 'KinderJoyChocolateCrispyBoys20G', 'pcs', 'Kinder Joy Chocolate Crispy Boys 20G.jpg', 100, 14000, 17000, 500, 'Kinder Joy Chocolate Crispy Boys 20G', '2022-01-17 06:24:36', NULL),
(3, 1, 'Taro Snack Net Teriyaki Bbq 65G', 'TaroSnackNetTeriyakiBbq65G', 'pcs', 'Taro Snack Net Teriyaki Bbq 65G.jpg', 100, 3000, 5000, 0, 'Taro Snack Net Teriyaki Bbq 65G', '2022-01-17 06:24:36', NULL),
(4, 1, 'Silver Queen Chocolate Chunky Bar Cashew 33G', 'SilverQueenChocolateChunkyBarCashew33G', 'pcs', 'Silver Queen Chocolate Chunky Bar Cashew 33G.jpg', 100, 8000, 10000, 0, 'Silver Queen Chocolate Chunky Bar Cashew 33G', NULL, NULL),
(5, 2, 'A&W Soft Drink Sarsaparila 330Ml', 'A&WSoftDrinkSarsaparila330Ml', 'pcs', 'A&W Soft Drink Sarsaparila 330Ml.jpg', 100, 10000, 12000, 0, 'A&W Soft Drink Sarsaparila 330Ml', NULL, NULL),
(6, 2, 'Root Beer Soft Drink 250Ml', 'RootBeerSoftDrink250Ml', 'pcs', 'Root Beer Soft Drink 250Ml.jpg', 100, 20000, 30000, 0, 'Root Beer Soft Drink 250Ml', NULL, NULL),
(7, 0, 'Bintang Soft Drink Radler 0.0% 330Ml', 'BintangSoftDrinkRadler0.0%330Ml', 'pcs', 'Bintang Soft Drink Radler 0.0% 330Ml.jfif', 100, 10000, 20000, 0, 'Bintang Soft Drink Radler 0.0% 330Ml', NULL, NULL),
(8, 0, 'Greenfields Fresh Milk Low Fat Bd 1000Ml', 'GreenfieldsFreshMilkLowFatBd1000Ml', 'pcs', 'Greenfields Fresh Milk Low Fat Bd 1000Ml.jpg', 100, 10000, 15000, 0, 'Greenfields Fresh Milk Low Fat Bd 1000Ml', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_details`
--

CREATE TABLE `retur_details` (
  `retur_detail_id` int(10) UNSIGNED NOT NULL,
  `retur_header_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price_buy` int(11) NOT NULL,
  `price_sell` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_headers`
--

CREATE TABLE `retur_headers` (
  `retur_header_id` int(10) UNSIGNED NOT NULL,
  `no_retur` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_retur` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stores`
--

CREATE TABLE `stores` (
  `store_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `about` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transaction_detail_id` int(10) UNSIGNED NOT NULL,
  `transaction_header_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_detail_id`, `transaction_header_id`, `product_id`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 20000, 40000, '2022-01-24 09:06:29', NULL),
(2, 1, 3, 1, 60000, 60000, '2022-01-24 09:06:29', NULL),
(3, 2, 2, 2, 39500, 79000, '2022-01-24 09:13:07', NULL),
(4, 3, 3, 2, 60000, 120000, '2022-01-24 09:20:07', NULL),
(5, 4, 1, 1, 20000, 20000, '2022-01-26 08:36:30', NULL),
(6, 5, 1, 1, 20000, 20000, '2022-02-06 01:10:25', NULL),
(7, 6, 2, 1, 39500, 39500, '2022-02-06 01:10:42', NULL),
(8, 6, 1, 1, 20000, 20000, '2022-02-06 01:10:42', NULL),
(9, 7, 2, 3, 39500, 118500, '2022-02-06 01:18:17', NULL),
(10, 7, 1, 1, 20000, 20000, '2022-02-06 01:18:17', NULL),
(11, 8, 1, 1, 20000, 20000, '2022-02-12 02:28:03', NULL),
(12, 8, 2, 1, 39500, 39500, '2022-02-12 02:28:03', NULL),
(13, 8, 3, 1, 60000, 60000, '2022-02-12 02:28:03', NULL),
(14, 9, 6, 2, 30000, 60000, '2022-02-12 03:24:03', NULL),
(15, 9, 5, 1, 12000, 12000, '2022-02-12 03:24:03', NULL),
(16, 9, 3, 1, 5000, 5000, '2022-02-12 03:24:03', NULL),
(17, 9, 2, 1, 16500, 16500, '2022-02-12 03:24:03', NULL),
(18, 10, 7, 1, 20000, 20000, '2022-02-12 06:02:59', NULL),
(19, 11, 6, 1, 30000, 30000, '2022-02-12 06:03:36', NULL),
(20, 11, 7, 1, 20000, 20000, '2022-02-12 06:03:36', NULL),
(21, 12, 7, 1, 20000, 20000, '2022-02-12 06:27:05', NULL),
(22, 13, 7, 1, 20000, 20000, '2022-02-12 06:27:48', NULL),
(23, 13, 6, 1, 30000, 30000, '2022-02-12 06:27:48', NULL),
(24, 14, 7, 1, 20000, 20000, '2022-02-12 06:40:41', NULL),
(25, 14, 8, 1, 15000, 15000, '2022-02-12 06:40:41', NULL),
(26, 15, 5, 1, 12000, 12000, '2022-02-12 06:46:53', NULL),
(27, 15, 1, 1, 7000, 7000, '2022-02-12 06:46:53', NULL),
(28, 16, 7, 1, 20000, 20000, '2022-02-12 06:49:34', NULL),
(29, 17, 7, 1, 20000, 20000, '2022-02-12 07:10:34', NULL),
(30, 17, 2, 1, 16500, 16500, '2022-02-12 07:10:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_headers`
--

CREATE TABLE `transaction_headers` (
  `transaction_header_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_transaction` varchar(100) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaction_headers`
--

INSERT INTO `transaction_headers` (`transaction_header_id`, `user_id`, `no_transaction`, `discount`, `total`, `created_at`, `updated_at`) VALUES
(1, 0, '1/POS/220100001', 10000, 100000, '2022-01-24 09:06:29', NULL),
(2, 0, '1/POS/220100002', 9000, 79000, '2022-01-24 09:13:07', NULL),
(3, 0, '1/POS/220100003', 20000, 120000, '2022-01-24 09:20:07', NULL),
(4, 4, '1/POS/220100004', 1000, 20000, '2022-01-26 08:36:30', NULL),
(5, 2, '1/POS/220200001', 0, 20000, '2022-02-06 01:10:25', NULL),
(6, 2, '1/POS/220200002', 0, 59500, '2022-02-06 01:10:42', NULL),
(7, 0, '1/POS/220200003', 0, 138500, '2022-02-06 01:18:17', NULL),
(8, 0, '1/POS/220200004', 500, 119500, '2022-02-12 02:28:03', NULL),
(9, 2, '6/POS/220200001', 3500, 93500, '2022-02-12 03:24:03', NULL),
(10, 0, '6/POS/220200002', 0, 20000, '2022-02-12 06:02:59', NULL),
(11, 0, '6/POS/220200003', 0, 50000, '2022-02-12 06:03:36', NULL),
(12, 0, '6/POS/220200004', 0, 20000, '2022-02-12 06:27:05', NULL),
(13, 0, '6/POS/220200005', 0, 50000, '2022-02-12 06:27:48', NULL),
(14, 0, '6/POS/220200006', 0, 35000, '2022-02-12 06:40:41', NULL),
(15, 3, '6/POS/220200007', 9000, 19000, '2022-02-12 06:46:53', NULL),
(16, 2, '6/POS/220200008', 5000, 20000, '2022-02-12 06:49:34', NULL),
(17, 4, '6/POS/220200009', 5000, 36500, '2022-02-12 07:10:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `status`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 2, 'Genta Haetami Putra', 'gentahp', '$2y$10$RGKa0PKF3CDs4bjpHhLGkufqt.nHCpqenQw96c5cgrK/Thz9.0YKy', '2022-01-10 23:08:38', NULL),
(2, 3, 'Aditya Abdillah', 'aditya', '$2a$12$hWZi439It87yNqr9Hlp67um8cUy5b2GmA1YWS9w9Xg876hDPg0CzW', '2022-01-10 23:08:38', NULL),
(3, 3, 'Angga aldiansyah', 'angga', '$2a$12$rpM9WwqnRxL2t/98ERV7.u1hnr1aCBJHx6mEF34GfcSFHdCyJv/V2', '2022-01-10 23:08:38', NULL),
(4, 3, 'Ari Septyan', 'ari', '$2a$12$64n2WCspGL4ZPaeFtZRtGeZTFl0Dd8X.Dl2T0ryy/2f8UusIHryHa', '2022-01-10 23:08:38', NULL),
(5, 2, 'Diaz Nantama', 'diaz', '$2a$12$rubo.2IAY1FPpnKNq5Qbg.qSRyru471Ljr1.bId2/7sqXtj/zLIEe', '2022-01-10 23:08:38', NULL),
(6, 1, 'Kelompok 7', 'kelompok7', '$2a$12$VASdwI7P.lrW9P5ZtFwyL.HsBfydfJzgnKedlCQ.53Fx/G3OAJk8W', '2022-01-10 23:08:38', NULL),
(7, 2, 'Hira Maulana', 'hira', '$2a$12$wLT5Gk4/FfxJqlO0NTJhKukBFockhieV3J0HqIQA//3bXM.sV0Z.m', '2022-01-10 23:08:38', NULL),
(8, 3, 'Lucky Lukman', 'lucky', '$2a$12$8L0n/fvMBJx7MpMT4Tk.d.3pQ2/FKeZ47BCPRT6wubCYmeiLK4HAC', '2022-01-10 23:08:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indeks untuk tabel `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `retur_details`
--
ALTER TABLE `retur_details`
  ADD PRIMARY KEY (`retur_detail_id`);

--
-- Indeks untuk tabel `retur_headers`
--
ALTER TABLE `retur_headers`
  ADD PRIMARY KEY (`retur_header_id`);

--
-- Indeks untuk tabel `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`transaction_detail_id`);

--
-- Indeks untuk tabel `transaction_headers`
--
ALTER TABLE `transaction_headers`
  ADD PRIMARY KEY (`transaction_header_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `categorys`
--
ALTER TABLE `categorys`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `retur_details`
--
ALTER TABLE `retur_details`
  MODIFY `retur_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `retur_headers`
--
ALTER TABLE `retur_headers`
  MODIFY `retur_header_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `transaction_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `transaction_headers`
--
ALTER TABLE `transaction_headers`
  MODIFY `transaction_header_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
