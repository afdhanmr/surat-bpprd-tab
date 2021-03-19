-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2021 pada 02.09
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(3, 'Afdhan M Risyaf', 'afdhanrisyaf@yahoo.co.id', '20191222_124413.jpg', '$2y$10$07Gp9QKzMbrTplYxDPnXGeITgDXDrkoNPFoOETN5W/V8JMooTs6I6', 2, 1, 1604339982),
(17, 'Afdhan Muhammad Risyaf', 'afdhanmr@gmail.com', 'default.jpg', '$2y$10$YlQh6tsc.2ejJoHS77z0yOFp7l0uRaJBgE1Dzgi04qMY1MCga4y6q', 2, 1, 1604481932),
(19, 'Admin Super', 'admin@gmail.com', 'default.jpg', '$2y$10$TmlyeNS.VOmCiqSpRWdjX.5egmzvULngqvbfWSaFgFmDpbVVoJg9O', 1, 1, 1611107632),
(20, 'Dr. H. Erwan SH, M.AP', 'Bpprderwan@gmail.com', 'default.jpg', '$2y$10$Wr0vJZvWAjDO7KJXxnWg8Ox7SGDkH6aDMdg/892EOTeIL7Pof9vB.', 3, 1, 1611109067),
(21, 'Adinda', 'adinda@gmail.com', 'default.jpg', '$2y$10$1IAGmv1IiNaaqcxM7QBe8.yRVr0SqK6r2V9L.hTS5l5b9j6bdzgim', 3, 1, 1615272643);

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
  `no_surat` varchar(25) NOT NULL,
  `tgl_surat` varchar(100) NOT NULL,
  `tgl_terima_surat` varchar(100) NOT NULL,
  `dari_surat` varchar(50) NOT NULL,
  `perihal_surat` varchar(225) NOT NULL,
  `gambar_surat_1` text NOT NULL,
  `gambar_surat_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_data_surat`
--

INSERT INTO `user_data_surat` (`id_surat`, `id`, `no_surat`, `tgl_surat`, `tgl_terima_surat`, `dari_surat`, `perihal_surat`, `gambar_surat_1`, `gambar_surat_2`) VALUES
(32, 3, '001/adc/87xx', '05 February 2021', '01 February 2021', 'Bendahara Keuangan', 'Acara semat tahun 2021', 'Disposisi112.jpeg', 'Surat111.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_komentar`
--

CREATE TABLE `user_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `komentar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_komentar`
--

INSERT INTO `user_komentar` (`id_komentar`, `id`, `id_surat`, `komentar`) VALUES
(1, 20, 0, '0'),
(2, 20, 0, 'Oke'),
(4, 20, 56, ''),
(11, 20, 32, 'Oke Lanjutkan'),
(13, 20, 57, 'Siap'),
(22, 20, 59, 'Okey'),
(23, 20, 59, 'Lanjutkan');

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
(2, 2, 'Dashboard', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/editprofile', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 5, 'Data Surat', 'user/datasurat', 'fas fa-fw fa-info', 1),
(10, 6, 'My Profile', 'bpprd', 'fas fa-fw fa-user', 1),
(11, 6, 'Edit Profile', 'bpprd/editprofile', 'fas fa-fw fa-user-edit', 1),
(12, 6, 'Change Password', 'bpprd/changepassword', 'fas fa-fw fa-key', 1),
(13, 7, 'Data Surat', 'bpprd/datasurat', 'fas fa-fw fa-info', 1),
(14, 2, 'My Profile', 'user/myprofile', 'fas fa-fw fa-user', 1);

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
(9, 'Bpprderwan@gmail.com', 'KoGugv8DT7jGiCFsVE1HGF8hZqFTRb90rpZOcjLxqeg=', 1611109067),
(10, 'adinda@gmail.com', 'uaIhFnSQpzwViMa+bDOUgrm1y+jX67UWXyVyz99z6oo=', 1615272643);

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
-- Indeks untuk tabel `user_komentar`
--
ALTER TABLE `user_komentar`
  ADD PRIMARY KEY (`id_komentar`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_data_surat`
--
ALTER TABLE `user_data_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `user_komentar`
--
ALTER TABLE `user_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
