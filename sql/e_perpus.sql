-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2020 pada 07.43
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ebook`
--

CREATE TABLE `ebook` (
  `id_ebook` int(11) NOT NULL,
  `session_id` varchar(250) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `sinopsis` text NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tebal_halaman` int(11) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `bahasa` varchar(100) NOT NULL,
  `nama_upload` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `file` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ebook`
--

INSERT INTO `ebook` (`id_ebook`, `session_id`, `judul`, `sinopsis`, `kategori`, `tebal_halaman`, `penulis`, `bahasa`, `nama_upload`, `gambar`, `file`) VALUES
(3, 'cj9s4as4ifhmkj6kt3rai2te21', 'The Power Of Kepepet', 'Buku ini telah lama di nanti-nanti oleh entrepreuneur dan calon-calon entrepreuneur, penulisnya bukan entrepreuneur \'kabitan\', melainkan entrepreuneur yang merintis bisnisnya dari nol jatuh bangun dan akhirnya berhasil mempunyai banyak bisnis dengan omset milyaran', 'bussines', 97, 'Jaya Setiabudi', 'Indonesia', 'Zamzam Saputra', 'thepower.png', 'The-Power-Of-Kepepet.pdf'),
(4, 'cj9s4as4ifhmkj6kt3rai2te21', 'Sebuah Seni Untuk Bersikap Bodo Amat', 'Manson melontarkan argumen bahwa manusia tidak sempurna dan terbatas, begini tulisannya \"tidak semua orang bisa menjadi luar biasa ada para pemenang dan pecundang masyarakat, dan beberapa diantaranya tidak adil dan bukan akibat kesalahan anda\", mason mengajak kita untuk mengerti batasan-batasan diri dan menerima-baginya, inilah sumber kekuatan yang paling nyata, tepat saat kita mampu mengakrapi ketakutan, kegagalan dan ketidak pastian.', 'out-category', 243, 'Mark Manson', 'Indonesia', 'Zamzam Saputra', 'sebuahseni.png', 'Sebuah-Seni-Untuk-Bersikap-Bodo-Amat.pdf'),
(5, 'cj9s4as4ifhmkj6kt3rai2te21', 'Rich Dad Poor Dad', 'Sewaktu saya masih duduk di sekolah menengah, pada waktu itu saya tidak membacanya sampai habis, tetapi saya ingat benar cerita itu, yaitu kisah bagaimana seorang dua pelajar memulai bisnis, kisah ini berhasil menangkap imajinasi saya, buku ini seolah olah memberi saya keyakinan.', 'bussines', 213, 'Robert Kiyosaki', 'Melayu', 'Zamzam Saputra', 'richdadpor.png', 'Rich-Dad-Poor-Dad-Melayu.pdf'),
(7, 'cj9s4as4ifhmkj6kt3rai2te22', 'Rindu', 'Apalah arti memiliki, ketika diri kami sendiri bukanlah milik kami?\r\n\r\nApalah arti kehilangan, ketika kami sebenarnya menemukan banyak saat kehilangan, dan sebaliknya, kehilangan banyak pula saat menemukan?\r\n\r\nApalah arti cinta, ketika menangis terluka atas perasaan yg seharusnya indah? Bagaimana mungkin, kami terduduk patah hati atas sesuatu yg seharusnya suci dan tidak menuntut apa pun?\r\n\r\nWahai, bukankah banyak kerinduan saat kami hendak melupakan? Dan tidak terbilang keinginan melupakan saat kami dalam rindu? Hingga rindu dan melupakan jaraknya setipis benang saja\r\n\r\nRindu - Tere Liye. Lima kisah dalam sebuah perjalanan panjang kerinduan. Mencari makna rindu yang sebenarnya.', 'novel', 668, 'Tere Liye', 'Indonesia', 'Hasan Balong', 'tereliye-rindu.jpg', 'tereliye-rindu.pdf'),
(9, 'cj9s4as4ifhmkj6kt3rai2te21', 'Belajar Javascript Untuk Pemula', '<p><strong>Javascript</strong> adalah bahasa script yang biasa jalan di browser, orang-orang biasa bilang client side programming. Client di sini adalah browser, seperti: Internet Explorer, Firefox, Safari dan sebagainya. Kode javascript biasanya disisipkan diantara kode-kode HTML. Â </p><p>Â </p><p><strong>Di mana saya bisa menulis kode javascript?Â </strong></p><p>Anda bisa menulis kode javascript di teks editor seperti notepad dan sebagainya. Â </p><p>Â </p><p><strong>Apakah saya butuh compiler untuk menjalankan javascript?Â </strong></p><p>Tidak perlu, anda cukup menjalankan javascript menggunakan browser. Semua browser mempunyai engine yang menginterpretasikan kode javascript kita</p>', 'it-sofware', 49, 'Desrizal', 'Indonesia', 'Zamzam Saputra', 'javascript-guides.png', 'Belajar Javascript.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `session_id` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `aktif` varchar(15) NOT NULL,
  `password` varchar(350) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `session_id`, `username`, `email`, `no_hp`, `aktif`, `password`, `type`) VALUES
(9, 'cj9s4as4ifhmkj6kt3rai2te21', 'Zamzam Saputra', 'zansyh.work@gmail.com', '089602362015', 'offline', '$2y$10$CqYgT6geC8jJpMxcdqzrNeLEfwRk8VzjouEf20DHdH3cFFZod5r5m', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id_ebook`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ebook`
--
ALTER TABLE `ebook`
  MODIFY `id_ebook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
