-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2020 pada 04.26
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usecase_psi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktor`
--

CREATE TABLE `aktor` (
  `id_aktor` int(11) NOT NULL,
  `nama_aktor` varchar(100) NOT NULL,
  `id_sistem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aktor`
--

INSERT INTO `aktor` (`id_aktor`, `nama_aktor`, `id_sistem`) VALUES
(16, 'Mahasiswa', 10),
(17, 'Dosen', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `component_view`
--

CREATE TABLE `component_view` (
  `id_component` int(11) NOT NULL,
  `id_view` int(11) NOT NULL,
  `nama_component` varchar(30) NOT NULL,
  `jenis_component` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `component_view`
--

INSERT INTO `component_view` (`id_component`, `id_view`, `nama_component`, `jenis_component`) VALUES
(88, 16, '#form_nim', 'Form'),
(89, 16, '#form_password', 'Form'),
(90, 16, '#tombol_login', 'Tombol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fitur`
--

CREATE TABLE `fitur` (
  `id_fitur` int(11) NOT NULL,
  `nama_fitur` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `kondisi_awal` varchar(100) NOT NULL,
  `kondisi_akhir` varchar(100) NOT NULL,
  `scenario_normal` text NOT NULL,
  `scenario_alternatif` text NOT NULL,
  `scenario_exception` text NOT NULL,
  `id_aktor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fitur`
--

INSERT INTO `fitur` (`id_fitur`, `nama_fitur`, `deskripsi`, `kondisi_awal`, `kondisi_akhir`, `scenario_normal`, `scenario_alternatif`, `scenario_exception`, `id_aktor`) VALUES
(19, 'Melihat Mata Kuliah', '', '', '', '', '', '', 16),
(20, 'Login', 'Fitur yang digunakan untuk login ke dashboard mahasiswa', 'Mahasiswa belum login', 'Mahasiswa sudah login ke dashboard', '1. Mahasiswa membuka @halaman_login_mahasiswa\r\n2. Mahasiswa login menggunakan nim dan password dengan mengisi #form_nim dan #form_password\r\n3. Mahasiswa mengklik #tombol_login', '', '', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `generate`
--

CREATE TABLE `generate` (
  `id_generate` int(11) NOT NULL,
  `id_sistem` int(11) NOT NULL,
  `url_hasil` varchar(100) NOT NULL,
  `tanggal_generate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `generate`
--

INSERT INTO `generate` (`id_generate`, `id_sistem`, `url_hasil`, `tanggal_generate`) VALUES
(36, 10, 'download/5ef5561c7082e.zip', '2020-06-26 01:57:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_form`
--

CREATE TABLE `info_form` (
  `id_info_form` int(11) NOT NULL,
  `id_component_view` int(11) NOT NULL,
  `label_form` varchar(50) NOT NULL,
  `tipe_form` varchar(50) NOT NULL,
  `placeholder_form` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `info_form`
--

INSERT INTO `info_form` (`id_info_form`, `id_component_view`, `label_form`, `tipe_form`, `placeholder_form`) VALUES
(32, 88, 'NIM Anda', 'text', 'Masukkan nim...'),
(33, 89, 'Password', 'password', 'Masukkan password anda...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_tabel`
--

CREATE TABLE `info_tabel` (
  `id_kolom_tabel` int(11) NOT NULL,
  `id_component_view` int(11) NOT NULL,
  `nama_kolom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_tombol`
--

CREATE TABLE `info_tombol` (
  `id_nama_tombol` int(11) NOT NULL,
  `id_component_view` int(11) NOT NULL,
  `nama_tombol` varchar(50) NOT NULL,
  `jenis_tombol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `info_tombol`
--

INSERT INTO `info_tombol` (`id_nama_tombol`, `id_component_view`, `nama_tombol`, `jenis_tombol`) VALUES
(16, 90, 'Login', 'primary');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sistem`
--

CREATE TABLE `sistem` (
  `id_sistem` int(11) NOT NULL,
  `nama_sistem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sistem`
--

INSERT INTO `sistem` (`id_sistem`, `nama_sistem`) VALUES
(10, 'SIM Universitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `view`
--

CREATE TABLE `view` (
  `id_view` int(11) NOT NULL,
  `id_fitur` int(11) NOT NULL,
  `nama_view` varchar(100) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `view`
--

INSERT INTO `view` (`id_view`, `id_fitur`, `nama_view`, `title`) VALUES
(16, 20, '@halaman_login_mahasiswa', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktor`
--
ALTER TABLE `aktor`
  ADD PRIMARY KEY (`id_aktor`),
  ADD KEY `aktor_ibfk_1` (`id_sistem`);

--
-- Indeks untuk tabel `component_view`
--
ALTER TABLE `component_view`
  ADD PRIMARY KEY (`id_component`),
  ADD KEY `component_view_ibfk_1` (`id_view`);

--
-- Indeks untuk tabel `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`id_fitur`),
  ADD KEY `id_aktor` (`id_aktor`);

--
-- Indeks untuk tabel `generate`
--
ALTER TABLE `generate`
  ADD PRIMARY KEY (`id_generate`),
  ADD KEY `generate_ibfk_1` (`id_sistem`);

--
-- Indeks untuk tabel `info_form`
--
ALTER TABLE `info_form`
  ADD PRIMARY KEY (`id_info_form`),
  ADD KEY `info_form_ibfk_1` (`id_component_view`);

--
-- Indeks untuk tabel `info_tabel`
--
ALTER TABLE `info_tabel`
  ADD PRIMARY KEY (`id_kolom_tabel`),
  ADD KEY `info_tabel_ibfk_1` (`id_component_view`);

--
-- Indeks untuk tabel `info_tombol`
--
ALTER TABLE `info_tombol`
  ADD PRIMARY KEY (`id_nama_tombol`),
  ADD KEY `info_tombol_ibfk_1` (`id_component_view`);

--
-- Indeks untuk tabel `sistem`
--
ALTER TABLE `sistem`
  ADD PRIMARY KEY (`id_sistem`);

--
-- Indeks untuk tabel `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`id_view`),
  ADD KEY `view_ibfk_1` (`id_fitur`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktor`
--
ALTER TABLE `aktor`
  MODIFY `id_aktor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `component_view`
--
ALTER TABLE `component_view`
  MODIFY `id_component` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `fitur`
--
ALTER TABLE `fitur`
  MODIFY `id_fitur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `generate`
--
ALTER TABLE `generate`
  MODIFY `id_generate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `info_form`
--
ALTER TABLE `info_form`
  MODIFY `id_info_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `info_tabel`
--
ALTER TABLE `info_tabel`
  MODIFY `id_kolom_tabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `info_tombol`
--
ALTER TABLE `info_tombol`
  MODIFY `id_nama_tombol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `sistem`
--
ALTER TABLE `sistem`
  MODIFY `id_sistem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `view`
--
ALTER TABLE `view`
  MODIFY `id_view` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aktor`
--
ALTER TABLE `aktor`
  ADD CONSTRAINT `aktor_ibfk_1` FOREIGN KEY (`id_sistem`) REFERENCES `sistem` (`id_sistem`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `component_view`
--
ALTER TABLE `component_view`
  ADD CONSTRAINT `component_view_ibfk_1` FOREIGN KEY (`id_view`) REFERENCES `view` (`id_view`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `fitur`
--
ALTER TABLE `fitur`
  ADD CONSTRAINT `fitur_ibfk_1` FOREIGN KEY (`id_aktor`) REFERENCES `aktor` (`id_aktor`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `generate`
--
ALTER TABLE `generate`
  ADD CONSTRAINT `generate_ibfk_1` FOREIGN KEY (`id_sistem`) REFERENCES `sistem` (`id_sistem`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `info_form`
--
ALTER TABLE `info_form`
  ADD CONSTRAINT `info_form_ibfk_1` FOREIGN KEY (`id_component_view`) REFERENCES `component_view` (`id_component`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `info_tabel`
--
ALTER TABLE `info_tabel`
  ADD CONSTRAINT `info_tabel_ibfk_1` FOREIGN KEY (`id_component_view`) REFERENCES `component_view` (`id_component`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `info_tombol`
--
ALTER TABLE `info_tombol`
  ADD CONSTRAINT `info_tombol_ibfk_1` FOREIGN KEY (`id_component_view`) REFERENCES `component_view` (`id_component`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `view`
--
ALTER TABLE `view`
  ADD CONSTRAINT `view_ibfk_1` FOREIGN KEY (`id_fitur`) REFERENCES `fitur` (`id_fitur`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
