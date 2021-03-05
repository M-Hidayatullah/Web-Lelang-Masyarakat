-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2021 pada 08.41
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_lelang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `tgl` date NOT NULL,
  `harga_awal` int(20) NOT NULL,
  `gambar_barang` varchar(200) NOT NULL,
  `deskripsi_barang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `tgl`, `harga_awal`, `gambar_barang`, `deskripsi_barang`) VALUES
(5, 'contoh', '2021-03-01', 0, '1614606287_dayat.jpg', 'tes dwg'),
(6, 'laptop programmer', '2020-04-01', 5000000, '1614775600_5.png', 'laptop versi programmer'),
(7, 'laptop programmer', '2020-11-17', 50000000, '1614775662_1.png', 'laptop programmer'),
(8, 'laptop programmer', '2020-11-17', 2000000, '1614775732_6.png', 'laptop ori');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `lelang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penawaran_harga` varchar(200) NOT NULL,
  `status_lelang` enum('tunda','dipilih','tidak_dipilih') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `lelang_id`, `user_id`, `penawaran_harga`, `status_lelang`) VALUES
(8, 7, 14, '50000', 'tidak_dipilih'),
(9, 8, 14, '60000', 'dipilih'),
(10, 7, 15, '55000', 'dipilih'),
(11, 8, 15, '55000', 'tidak_dipilih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lelang`
--

CREATE TABLE `lelang` (
  `id_lelang` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `harga_akhir` int(20) NOT NULL DEFAULT 0,
  `lelang_masyarakat_id` int(11) DEFAULT 0,
  `lelang_petugas_id` int(11) NOT NULL,
  `status` enum('dibuka','ditutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lelang`
--

INSERT INTO `lelang` (`id_lelang`, `barang_id`, `tgl_lelang`, `harga_akhir`, `lelang_masyarakat_id`, `lelang_petugas_id`, `status`) VALUES
(7, 5, '2020-04-05', 55000, 15, 13, 'ditutup'),
(8, 6, '2020-04-05', 60000, 14, 13, 'ditutup'),
(9, 7, '2020-11-17', 0, 0, 13, 'dibuka'),
(10, 5, '2020-11-17', 0, 0, 13, 'dibuka'),
(11, 6, '2020-11-17', 0, 0, 13, 'dibuka'),
(12, 8, '2020-11-17', 0, 0, 13, 'dibuka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` enum('administrator','petugas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `telp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_masyarakat`, `nama_lengkap`, `telp`) VALUES
(14, 'masyarakat', '081214373106'),
(15, 'masyarakat2', '081214373106'),
(18, 'hawary', '081627728726');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`) VALUES
(13, 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('administrator','petugas','masyarakat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$BDX6zCMWFW98eDHy4MPGIO7g6AGjh5qCeOg2fvZIgsaBNvAWyA9nS', 'administrator', NULL, NULL, NULL),
(13, 'Petugas', 'petugas@gmail.com', NULL, '$2y$10$LMuPsWEbHPj/P1cPimAo0.iRSm6n9KCpRZQmnxueiyCGmD7wJxjVW', 'petugas', NULL, NULL, NULL),
(14, 'masyarakat', 'masyarakat@gmail.com', NULL, '$2y$10$QKtK99LcBivy82PYlpZPBuKqV4fCDkEz/wBuMPQvVW6J7nZ7hI82O', 'masyarakat', NULL, NULL, NULL),
(15, 'masyarakat2', 'masyarakat2@gmail.com', NULL, '$2y$10$GvNURMeoR407F0aUGveNb.GstmGamgXyeyebWXTY9qIT1ovqqBRXG', 'masyarakat', NULL, NULL, NULL),
(16, 'M.Hidayatullah', 'hidayatullahblk@gmail.com', '2021-03-01 13:50:17', '1855c11f044cc8944e8cdac9cae5def8', 'administrator', NULL, '2021-02-11 13:51:17', '2021-02-11 13:51:17'),
(17, 'dayat', 'coba@gmail.com', NULL, '$2y$10$cetqCJmHtVssQ957RfIgOuSxo0pujPmdwDFQ4R5KievC1CUbMXxBq', 'masyarakat', NULL, NULL, NULL),
(18, 'hawary', 'hawaryubg@gmail.com', NULL, '$2y$10$s9lEGpXi3dVkDjFDCeSOE.p9rWjKaAkIYNYKK6v08D9KBp.J2Jbgq', 'masyarakat', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id_lelang`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
