-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2021 pada 10.26
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suratbpprd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `balas_surat`
--

CREATE TABLE `balas_surat` (
  `id_balas` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `balas_surat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `balas_surat`
--

INSERT INTO `balas_surat` (`id_balas`, `id`, `id_surat`, `balas_surat`) VALUES
(1, 0, 0, 'Oke lanjutkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_create`) VALUES
(1, 'Afdhan Muhammad Risyaf', 'afdhanmrisyaf@yahoo.com', '20191215_070935.jpg', '$2y$10$xq8x/F5GdRuMa0x.iZT0MeTy6ltv.dHsVqGweY/kbQKM8tsWOawaG', 1, 1, 1604339252),
(3, 'Rafif Pandya', 'afdhanrisyaf@yahoo.co.id', '20191222_124413.jpg', '$2y$10$07Gp9QKzMbrTplYxDPnXGeITgDXDrkoNPFoOETN5W/V8JMooTs6I6', 2, 1, 1604339982),
(17, 'Afdhan Muhammad Risyaf', 'afdhanmr@gmail.com', 'default.jpg', '$2y$10$YlQh6tsc.2ejJoHS77z0yOFp7l0uRaJBgE1Dzgi04qMY1MCga4y6q', 2, 1, 1604481932),
(19, 'Admin Super', 'admin@gmail.com', 'default.jpg', '$2y$10$TmlyeNS.VOmCiqSpRWdjX.5egmzvULngqvbfWSaFgFmDpbVVoJg9O', 1, 1, 1611107632),
(20, 'BPPRD', 'Bpprderwan@gmail.com', 'default.jpg', '$2y$10$Wr0vJZvWAjDO7KJXxnWg8Ox7SGDkH6aDMdg/892EOTeIL7Pof9vB.', 3, 1, 1611109067);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(6, 1, 3),
(10, 2, 5),
(11, 2, 2),
(17, 3, 6),
(18, 3, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_data_surat`
--

CREATE TABLE `user_data_surat` (
  `id_surat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_surat` int(25) NOT NULL,
  `nama_surat` varchar(50) NOT NULL,
  `keterangan_surat` varchar(225) NOT NULL,
  `gambar_surat` text NOT NULL,
  `balas_surat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_data_surat`
--

INSERT INTO `user_data_surat` (`id_surat`, `id`, `no_surat`, `nama_surat`, `keterangan_surat`, `gambar_surat`, `balas_surat`) VALUES
(1, 0, 205, 'Abcd', 'Mencoba saja', 'A13.jpg', ''),
(3, 0, 234, 'Tes', 'Oke', 'A13.jpg', ''),
(6, 0, 1, 'Percobaan', 'Ini hanya pemanis saja', 'A135.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Data Surat'),
(6, 'Bpprd'),
(7, 'Data Surat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Bpprd');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/editprofile', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 5, 'Data Surat', 'user/datasurat', 'fas fa-fw fa-info', 1),
(10, 6, 'My Profile', 'bpprd', 'fas fa-fw fa-user', 1),
(11, 6, 'Edit Profile', 'bpprd/editprofile', 'fas fa-fw fa-user-edit', 1),
(12, 6, 'Change Password', 'bpprd/changepassword', 'fas fa-fw fa-key', 1),
(13, 7, 'Data Surat', 'bpprd/datasurat', 'fas fa-fw fa-info', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_create`) VALUES
(6, 'afdhanmr@gmail.com', 'fLU3WfWPYTNp6Bu5lHENbD7OJulaPTsCzGT+W6NkCyo=', 1604481932),
(7, 'afdhanmr@gmail.com', '+by23hZBaA6/e8zkxEpTNVm8kvn7nDJXSXbqmqSPIqM=', 1604486104),
(8, 'admin@gmail.com', 'lScXzgMx/nEjVobE13pVp7JuLAoEctDLlRjlpRZ5+wQ=', 1611107632),
(9, 'Bpprderwan@gmail.com', 'KoGugv8DT7jGiCFsVE1HGF8hZqFTRb90rpZOcjLxqeg=', 1611109067);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `balas_surat`
--
ALTER TABLE `balas_surat`
  ADD PRIMARY KEY (`id_balas`);

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
-- Indeks untuk tabel `user_data_surat`
--
ALTER TABLE `user_data_surat`
  ADD PRIMARY KEY (`id_surat`);

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
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `balas_surat`
--
ALTER TABLE `balas_surat`
  MODIFY `id_balas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_data_surat`
--
ALTER TABLE `user_data_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
