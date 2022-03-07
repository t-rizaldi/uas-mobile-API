-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2021 pada 07.02
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resep_makanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `bahan` varchar(250) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `satuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id`, `id_resep`, `bahan`, `jumlah`, `satuan`) VALUES
(2, 21, 'Mie Kuning', '500', 'gr'),
(3, 21, 'Udang', '150', 'gr'),
(4, 21, 'Daging sapi, potong kotak-kotak kecil', '100', 'gr'),
(5, 21, 'Kol putih, iris', '100', 'gr'),
(6, 21, 'Toge', '100', 'gr'),
(7, 21, 'Tomat, potong memanjang', '1', 'buah'),
(8, 21, 'Kecap Asin', '1', 'sdm'),
(9, 21, 'Daun bawang, iris halus', '2', 'batang'),
(10, 21, 'Kecap Manis', '2', 'sdm'),
(11, 21, 'Bawang putih, iris', '4', 'siung'),
(12, 21, 'Bawang merah, iris', '4', 'siung'),
(13, 21, 'Garam secukupnya', 'Secukupnya', '-'),
(14, 21, 'Kaldu jamur secukupnya', 'Secukupnya', '-'),
(15, 21, 'Minyak untuk menumis', '2', 'sdm'),
(16, 22, 'Daging kambing', '1', 'kg'),
(17, 22, 'labu air', '1', 'buah'),
(18, 22, 'Santan', '-', '-'),
(19, 22, 'serai', '1', 'batang'),
(20, 22, 'lengkuas', '2', 'jari'),
(21, 22, 'kayu manis', '10', 'cm'),
(22, 22, 'bunga lawang', '2', 'biji'),
(23, 22, 'daun kari', '1', 'genggam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bumbu`
--

CREATE TABLE `bumbu` (
  `id` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `bumbu` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bumbu`
--

INSERT INTO `bumbu` (`id`, `id_resep`, `bumbu`, `jumlah`) VALUES
(2, 21, 'Garam', '1 sdt'),
(3, 21, 'Merica', '1/2 sdt'),
(4, 21, 'Adas manis', '1/4 sdt'),
(5, 21, 'Kapulaga', '2 buah'),
(6, 21, 'Kemiri', '2 buah'),
(7, 21, 'Bubuk kari india', '2 sdm'),
(8, 21, 'Bawang putih', '3 siung'),
(9, 21, 'Cabai rawit', '5 buah'),
(10, 21, 'Minyak untuk menghaluskan bumbu', '1 sdm'),
(11, 22, 'pala', '1/2 buah'),
(12, 22, 'serai', '1 batang'),
(13, 22, 'lada hitam', '1 sdt'),
(14, 22, 'bawang merah', '12 siung'),
(15, 22, 'jahe', '2 jari'),
(16, 22, 'lengkuas', '2 jari'),
(17, 22, 'ketumbar', '3 sdm'),
(18, 22, 'cengkeh', '6 buah'),
(19, 22, 'kapulaga', '6 buah'),
(20, 22, 'bawang putih', '8 siung'),
(21, 22, 'cabai merah', 'sesuai selera');

-- --------------------------------------------------------

--
-- Struktur dari tabel `langkah`
--

CREATE TABLE `langkah` (
  `id` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `langkah` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `langkah`
--

INSERT INTO `langkah` (`id`, `id_resep`, `langkah`) VALUES
(2, 21, 'Haluskan semua bumbu lalu tambahkan sedikit minyak. Sisihkan.'),
(3, 21, 'Tumis bawang merah dan bawang putih, masukkan udang dan daging. Aduk hingga berubah warna.'),
(4, 21, 'Masukkan bumbu halus dan mie kuning, aduk rata.'),
(5, 21, 'Tambahkan tauge, kecap manis, garam dan kaldu jamur. Koreksi rasa. Angkat'),
(6, 21, 'Sajikan dengan toping di atasnya.'),
(7, 22, 'Haluskan semua bumbu. Geprek serai dan lengkuas.'),
(8, 22, ' Panaskan minyak, masukan bumbu tumis hingga harum, lalu tambahkan bahan bumbu halus.'),
(9, 22, 'Masukkan daging kambing, tutup sebentar dan tambahkan air. Biarkan sampai mendidih sambil diaduk. Angkat dan sajikan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `nama_masakan` varchar(150) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id`, `nama_masakan`, `gambar`) VALUES
(21, 'Mie Aceh', 'http://localhost/uasMobile/rest-server/assets/img/mie-aceh.jpg'),
(22, 'Kari Kambing', 'http://localhost/uasMobile/rest-server/assets/img/kari-kambing.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bumbu`
--
ALTER TABLE `bumbu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `langkah`
--
ALTER TABLE `langkah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `bumbu`
--
ALTER TABLE `bumbu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `langkah`
--
ALTER TABLE `langkah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
