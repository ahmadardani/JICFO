-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2024 pada 16.56
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jicfo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(13, 'Noodles', 'Food_Category_946.png', 'Yes', 'Yes'),
(14, 'Soups', 'Food_Category_529.jpg', 'Yes', 'Yes'),
(15, 'Hot Pots', 'Food_Category_706.jpg', 'Yes', 'Yes'),
(16, 'Grilled Dishes', 'Food_Category_280.jpg', 'Yes', 'Yes'),
(17, 'Rice Dishes', 'Food_Category_63.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(37, 'Ramen', 'Ramen merupakan salah satu makanan olahan khas Jepang yang terbuat dari bahan dasar berupa mie kuah.', 35000.00, 'Food-Name-2471.jpg', 13, 'Yes', 'Yes'),
(38, 'Udon', 'Udon adalah mi tebal dan kenyal khas Jepang yang terbuat dari tepung terigu, air, dan garam. Udon biasanya disajikan dengan kuah kaldu, seperti kuah bening dari dashi, shoyu, atau miso. \r\n', 45000.00, 'Food-Name-2469.jpg', 13, 'Yes', 'Yes'),
(39, 'Yakisoba', 'Yakisoba adalah masakan mi goreng Jepang dengan bahan mi, kol, sayur-sayuran dan daging, ditambah bumbu saus uster atau saus yakisoba.', 49000.00, 'Food-Name-3675.jpg', 13, 'No', 'Yes'),
(40, 'Miso Soup', 'Sup miso (Miso Soup) adalah masakan Jepang berupa sup dengan bahan dasar dashi ditambah isi sup berupa sedikit makanan laut atau sayur-sayuran, dan diberi miso sebagai perasa.', 25000.00, 'Food-Name-638.jpg', 14, 'Yes', 'Yes'),
(41, 'Kenchinjiru', 'Kenchinjiru adalah sup khas Jepang yang berisi banyak sayuran dan tahu, serta memiliki kuah bening dan hangat. Sup ini merupakan menu favorit di musim dingin dan cocok untuk vegetarian', 55000.00, 'Food-Name-8883.jpg', 14, 'Yes', 'Yes'),
(42, 'Suimono', 'Suimono adalah sup bening khas Jepang yang menggunakan kaldu berkualitas baik dan bahan-bahan yang sedang musim. Sup ini biasanya disajikan dalam mangkuk berpernis dan sering digunakan dalam jamuan makan formal.', 38000.00, 'Food-Name-8873.jpg', 14, 'No', 'Yes'),
(43, 'Yosenabe', 'Yosenabe adalah Sebuah hidangan nabe klasik yang terdiri dari sayuran, makanan laut, dan bahan lainnya yang direbus dalam kaldu dashi Jepang yang menyegarkan.', 60000.00, 'Food-Name-3955.jpg', 15, 'Yes', 'Yes'),
(44, 'Sukiyaki', 'Sukiyaki adalah irisan tipis daging sapi, sayur-sayuran, dan tahu di dalam panci besi yang dimasak di atas meja makan dengan cara direbus. ', 55000.00, 'Food-Name-4859.jpg', 15, 'Yes', 'Yes'),
(45, 'Yakiniku', 'Yakiniku adalah istilah bahasa Jepang untuk daging yang dipanggang atau dibakar di atas api. Dalam arti luas, yakiniku juga mencakup berbagai masakan daging sapi, panggang daging domba (jingisukan), dan barbeque.', 52000.00, 'Food-Name-4760.jpg', 16, 'Yes', 'Yes'),
(46, 'Yakitori', 'Yakitori adalah sate khas dari Jepang yang umumnya menggunakan daging ayam. Potongan daging ayam yang dipotong kecil untuk ukuran sekali gigit, ditusuk dengan tusukan bambu, lalu dibakar dengan api arang atau gas.', 44000.00, 'Food-Name-4553.jpg', 16, 'Yes', 'Yes'),
(47, 'Oyakodon', 'Oyakodon adalah hidangan khas Jepang yang terdiri dari nasi putih, irisan ayam, telur, dan bawang daun yang dimasak bersama dalam kuah mirin manis, kecap, dashi, dan gula.', 59000.00, 'Food-Name-6528.jpg', 17, 'Yes', 'Yes'),
(48, 'Gyudon', 'Gyudon adalah makanan Jepang jenis donburi berupa semangkuk nasi putih yang di atasnya diletakkan irisan daging sapi bagian perut dan bawang bombay yang sudah dimasak dengan kecap asin dan gula.', 46000.00, 'Food-Name-5302.jpg', 17, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `u_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_contact` bigint(25) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `customer_name`, `customer_email`, `customer_contact`, `customer_address`, `created_at`) VALUES
(25, 'akasaka', '$2y$10$AyGMAvyWnvcCeOtv1gMa3.KYA6BIyGgrQe65ojsywf/nMdQ/ZC2FC', 'Akasaka', 'akasaka@2ch.jp', 2, 'Brooklyn St. NY', '2024-11-10 14:01:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
