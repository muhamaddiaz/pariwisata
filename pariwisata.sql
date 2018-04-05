-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2018 pada 09.12
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama_hotel` varchar(50) NOT NULL,
  `deskripsi_hotel` varchar(100) NOT NULL,
  `photo_hotel` varchar(50) NOT NULL,
  `lokasi_hotel` varchar(50) NOT NULL,
  `kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nama_hotel`, `deskripsi_hotel`, `photo_hotel`, `lokasi_hotel`, `kamar`) VALUES
(1, 'Hotel Melati', 'Something', 'https://bit.ly/2uLFuvB', 'Bali', 40),
(2, 'Hotel Mawar', 'Something', 'https://bit.ly/2GB2lvh', 'Malang', 40),
(3, 'Louise Kienne', 'Salah satu hotel mewah berbintang 4 di semarang lokasi di strategis di tengah kota', 'https://bit.ly/2q3oQmx', 'Semarang', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_wisata`, `id_user`, `isi_komentar`) VALUES
(1, 1, 3, 'Keren pisan!'),
(2, 1, 3, 'Kekinian lah!'),
(3, 2, 3, 'barbar'),
(5, 3, 3, 'Keren boi!'),
(6, 3, 4, 'skuylay'),
(7, 3, 3, 'keren nih'),
(8, 4, 3, 'Sabi nih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transport`
--

CREATE TABLE `transport` (
  `id_transport` int(11) NOT NULL,
  `nama_transport` varchar(50) NOT NULL,
  `jenis_transport` varchar(50) NOT NULL,
  `tujuan_transport` varchar(50) NOT NULL,
  `photo_transport` varchar(50) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transport`
--

INSERT INTO `transport` (`id_transport`, `nama_transport`, `jenis_transport`, `tujuan_transport`, `photo_transport`, `kapasitas`) VALUES
(1, 'Garuda Indonesia', 'Pesawat', 'Bali', 'https://bit.ly/2q2tUaB', 40),
(2, 'Lion Air', 'Pesawat', 'Malang', 'https://bit.ly/2uFBvAE', 40),
(3, 'Garuda Indonesia', 'Pesawat', 'Semarang', 'https://bit.ly/2q2tUaB', 40),
(4, 'Lion Air', 'Pesawat', 'Semarang', 'https://bit.ly/2uFBvAE', 40),
(5, 'Parahyangan', 'Kereta Api', 'Semarang', 'https://bit.ly/2Gwy8lc', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `username`, `email`, `password`) VALUES
(3, 'Muhamad Diaz', 'diazram', 'muhamaddiaz10@gmail.com', 'helloworld'),
(4, 'Muhamad Diaz', 'diazram2', 'muhamaddiaz11@gmail.com', 'helloworld'),
(6, 'Hanif', 'snip', 'hello.com', 'helloworld');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(40) NOT NULL,
  `lokasi_wisata` varchar(40) NOT NULL,
  `deskripsi_wisata` varchar(10000) NOT NULL,
  `gambar_wisata` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `lokasi_wisata`, `deskripsi_wisata`, `gambar_wisata`) VALUES
(1, 'Bromo', 'Malang', 'Something', 'https://bit.ly/2Gva1PJ'),
(2, 'Pantai Kuta', 'Bali', 'Somethin', 'https://bit.ly/2Gvdths'),
(3, 'Lawang Sewu', 'Semarang', 'Salah satu tempat wisata di kota semarang yang memiliki sejarah pada masa penjajahan belanda dan jepang, ini adalah salah satu tempat wisata yang unik karena terdapat 1000 pintu didalamnya makanya diberi nama lawang sewu kalo ga percaya itung sendiri - sumber orang semarang asli (hanip)', 'https://bit.ly/2GyUqmj'),
(4, 'Klenteng Sam Po Kong', 'Semarang', 'Kelenteng Sam Po Kong merupakan bekas tempat persinggahan dan pendaratan pertama seorang Laksamana Tiongkok yang bernama Zheng He / Cheng Ho. Tempat ini biasa disebut Gedung Batu, karena bentuknya merupakan sebuah Gua Batu besar yang terletak pada sebuah bukit batu. Terletak di daerah Simongan, sebelah barat daya Kota Semarang.', 'https://bit.ly/2GAOXva');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `wisata_fk` (`id_wisata`),
  ADD KEY `user_fk` (`id_user`);

--
-- Indeks untuk tabel `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id_transport`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transport`
--
ALTER TABLE `transport`
  MODIFY `id_transport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `wisata_fk` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
