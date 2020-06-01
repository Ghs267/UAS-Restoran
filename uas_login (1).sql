-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2020 pada 03.51
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Food'),
(2, 'Drink');

-- --------------------------------------------------------

--
-- Struktur dari tabel `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `category` int(11) NOT NULL,
  `price` int(24) NOT NULL,
  `stock` int(4) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `food`
--

INSERT INTO `food` (`id`, `name`, `category`, `price`, `stock`, `gambar`) VALUES
(15, 'Brown Sugar Fresh Milk Boba', 2, 21000, 19, 'assets/img/gambar/brown_sugar_fresh_milk_boba.jpg'),
(16, 'Brown Sugar Boba Milk Tea', 2, 19000, 15, 'assets/img/gambar/brown_sugar_boba_milk_tea.jpg'),
(17, 'Matcha Boba', 2, 23000, 21, 'assets/img/gambar/matcha_boba.jpg'),
(19, 'Chocolate Chip Cookie (3 cookies)', 1, 24000, 20, 'assets/img/gambar/choco_chip_cookie.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_cart`
--

CREATE TABLE `shop_cart` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_order` datetime NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shop_cart`
--

INSERT INTO `shop_cart` (`id_order`, `id_user`, `tanggal_order`, `rating`) VALUES
(1, 7, '2020-05-25 14:47:17', 5),
(2, 7, '2020-05-25 14:47:35', 4),
(3, 7, '2020-05-30 19:03:28', 5),
(4, 9, '2020-05-31 00:20:50', 4),
(5, 9, '2020-05-31 00:22:40', 5),
(6, 10, '2020-05-31 00:25:31', 5),
(7, 7, '2020-05-31 02:18:12', 4),
(8, 10, '2020-05-31 02:25:33', 4),
(9, 10, '2020-05-31 02:28:33', 5),
(10, 6, '2020-05-31 03:56:12', 5),
(11, 6, '2020-05-31 05:27:51', 5),
(12, 6, '2020-05-31 06:35:02', 5),
(13, 6, '2020-05-31 07:13:20', 4),
(14, 6, '2020-05-31 08:13:54', 5),
(15, 11, '2020-05-31 11:25:10', 5),
(16, 6, '2020-05-31 15:01:32', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_cart_detail`
--

CREATE TABLE `shop_cart_detail` (
  `id_order` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shop_cart_detail`
--

INSERT INTO `shop_cart_detail` (`id_order`, `id_menu`, `qty`) VALUES
(1, 15, 2),
(1, 16, 1),
(1, 17, 1),
(2, 17, 1),
(2, 16, 1),
(3, 16, 1),
(3, 15, 1),
(3, 17, 2),
(4, 19, 2),
(4, 17, 1),
(5, 15, 2),
(6, 16, 1),
(6, 15, 2),
(6, 17, 1),
(7, 17, 1),
(7, 19, 2),
(8, 15, 1),
(8, 16, 1),
(8, 19, 1),
(9, 15, 5),
(10, 16, 2),
(11, 16, 2),
(11, 17, 2),
(12, 20, 2),
(13, 20, 1),
(14, 15, 9),
(15, 16, 2),
(16, 16, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `tgl_lahir`, `alamat`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Gregorius Hariyanto', 'Setiadi', '2000-07-26', 'makan', 'hariyantosetiadi@gmail.com', 'line_73188113827642.jpg', '$2y$10$CEtJ0CPApUyo3C74Hdm3IuzUtojVTkb52W3pKzcTEY2GrP0MCogMC', 1, 1, 1589164612),
(5, 'Kevin Natanel', 'Hendrawan', '2009-01-15', 'konoha', 'hari@student.umn.ac.id', '6722540-m.jpg', '$2y$10$VlMwwpHZLC4f8F/ngr9LhuAHJuPbcsz96tlgGta.9UbgfoliRDx9q', 2, 1, 1589169467),
(6, 'Mickey', 'Mouse', '2020-05-05', 'amrik', 'mickey@gmail.com', '3840x2160-pebble-stone-sea-coast-4k_1551643576.jpg', '$2y$10$QR5mDO78PcNZwa43G0B8U.AHXA1EVC5mUtpiO1sTEBPDvUIsv0xai', 2, 1, 1589369717),
(7, 'Jennie', 'Florensia', '2001-01-01', 'Regensi no. 31', 'jennie@student.umn.ac.id', '70974065_528339501066978_3200452746708779008_n.jpg', '$2y$10$3/n1cRqfKaoWEsnHo8vsH.S9R8rSqZWBwku0HTNJDmUkyI49maShe', 2, 1, 1589640428),
(9, 'Widih', 'Wadaw', '2001-01-01', 'Rawa Kutuk 11', 'widih.wadaw@gmail.com', 'default.jpg', '$2y$10$.DVRk567eTC6pfqWkgmlvOBEP9luNfMKwH6G3JlUeqEepqWd8Pt9W', 2, 1, 1590851492),
(10, 'Panda', 'Bear', '1999-07-13', 'Jalan Apa Banget Dah No. 99', 'pandabear@gmail.com', 'cropped_apollo.png', '$2y$10$8hg8cUNna8QkdcUuA7gP7On9PP6FrYZRjnLvN2/U.xg0092jXOWoa', 2, 1, 1590877459),
(11, 'Juan', 'ifwisgdihi', '2020-05-05', 'fdsknfksz', 'ad@gmail.com', 'default.jpg', '$2y$10$jSytp6lACx0X34cCzpnYneAaOTYt9ltUbqBoBKTlkC6PJ02DOVfuC', 2, 1, 1590905019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(13, 2, 8),
(14, 1, 8),
(15, 1, 9),
(16, 2, 9),
(22, 1, 10),
(28, 2, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(11, 'Food');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-users', 1),
(3, 0, '', '', '', 0),
(7, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(8, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(10, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 0),
(20, 11, 'Food and Drink Menu', 'food', 'fas fa-fw fa-utensils', 1),
(22, 1, 'Food and Drink Management', 'admin/food', 'fas fa-fw fa-utensils', 1),
(26, 11, 'Shopping Cart', 'food/shop', 'fas fa-fw fa-shopping-cart', 1),
(29, 1, 'History of Selling', 'admin/history', 'fas fa-history fa-fw', 1),
(30, 1, 'User Management', 'admin/user', 'fas fa-fw fa-user-tie', 1),
(31, 1, 'My Profile', 'admin/my', 'fas fa-fw fa-users', 1),
(34, 1, 'Edit Profile', 'admin/edit', 'fas fa-fw fa-users', 1),
(35, 1, 'Change Password', 'admin/change', 'fas fa-fw fa-key', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indeks untuk tabel `shop_cart`
--
ALTER TABLE `shop_cart`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Ketidakleluasaan untuk tabel `shop_cart`
--
ALTER TABLE `shop_cart`
  ADD CONSTRAINT `shop_cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
