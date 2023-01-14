-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2019 pada 04.07
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
-- Database: `tickets`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `genre` varchar(1000) NOT NULL,
  `durasi` varchar(1000) NOT NULL,
  `direktur` varchar(1000) NOT NULL,
  `casts` varchar(1000) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `trailer` varchar(1000) NOT NULL,
  `sinopsis` longtext NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `harga` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id`, `judul`, `genre`, `durasi`, `direktur`, `casts`, `foto`, `trailer`, `sinopsis`, `waktu`, `harga`) VALUES
(67, 'Avengers Endgame', 'ACTION', '3 Jam 5 Menit', 'Anthony Russo, Joe Russo', 'Robert Downey Jr., Chris Hemsworth, Chris Evans, Mark Ruffalo, Scarlett Johansson', 'avengersendgame.jpg', 'avengersendgame.mp4', 'Setelah setengah makhluk di alam semesta terbunuh oleh Thanos di Avengers: Infinity War, anggota Avengers mereka harus bersatu kembali dengan sekutu mereka untuk memulihkan situasi, dengan perlawanan terakhir mereka Usai separuh makhluk di alam semesta terbunuh akibat perbuatan-perbuatan Thanos di Avengers: Infinity War, para anggota Avengers yang tersisa bersama sekutu mereka harus bersatu kembali demi memulihkan keadaan, dengan sebuah perlawanan terakhir.', 'waktu', '45.000'),
(68, 'my stupid boss 2 ', 'COMEDY', '1 Jam 37 Menit', 'Upi .', 'Bunga Citra Lestari, Reza Rahadian, Chew Kin Wah', 'mystupidboss2.jpg', 'mystupidboss2.mp4', 'Bahasa Indonesia - Karena krisis kekurangan karyawan pabrik, akhirnya Bossman berniat untuk mencari karyawan pabrik baru di Vietnam. Berangkatlah Bossman, Diana, Mr.Kho, dan Adrian ke Vietnam. Di Vietnam alih-alih mendapatkan karyawan, justru mereka mendapatkan masalah demi masalah bertubi-tubi karena ulah Bossman. Mulai dari Bossman melanggar kesepakatan jumlah gaji yang membuat para calon pekerja Vietnam mengamuk, sampai dengan ditahan di kantor Polisi. Sementara itu di Kuala Lumpur, Norahsikin dan Azahari pun juga harus menghadapi masalah. Keduanya disandera oleh Gangster sampai Bossman mau melunasi hutangnya. Kali ini ulah Bossman sudah membuat Diana cs geram dan berpikir untuk melakukan sesuatu. ', 'waktu', '45.000'),
(69, 'rumput tetangga ', 'COMEDY', '1 Jam 44 Menit', 'Guntur Soeharjanto', 'Raffi Ahmad, Titi Kamal, Donita .', 'rumputtetangga.jpg', 'rumputtetangga.mp4', 'Bahasa Indonesia - Menjelang reuni SMA, Kirana yang dulu adalah murid paling populer dan berprestasi di sekolah khawatir akan pendapat teman-temannya terhadap kehidupannya yang anti-klimaks, dan hanya menjadi ibu rumah tangga dengan dua anak. Bagaimana kehidupannya bila semua yang diidam-idamkan menjadi kenyataan? Apa harga yang harus dibayarkan agar keinginannya terwujud?', 'waktu', '45.000'),
(70, 'police evo ', 'ACTION', '2 Jam+', '-', '-', 'policeevo.jpg', 'policeevo.mp4', 'Rian (Raline Shah) sedang melakukan penyamaran dalam misi khusus pemberantasan mafia narkoba. Rian bekerja sama dengan Inspektur Khai (Shaheizy Sam) dan Inspektur Sani (Zizan Razak) mengikuti jejak petunjuk kasus ke sebuah pulau terpencil. Keadaan semakin pelik saat mereka harus berhadapan dengan sekelompok teroris yang menyandera 200 penduduk di pulau itu Mereka meminta tebusan kepada pemerintah. Mampukah Rian dan kedua rekannya menuntaskan misinya sekaligus menyelamatkan penduduk pulau tersebut?', 'waktu', '45.000'),
(71, 'sunyi ', 'HORROR', '1 Jam 32 Menit', '-', 'Arya Vasco, Angga Aldi, Naomi Paulinda', 'sunyi.jpg', 'sunyi.mp4', 'Being accepted in ?Abdi Bangsa? High School is something special for most students. But for ALEX (Angga Aldi), being accepted there is nothing special, in fact it?s a disaster. The Culture of seniority at Abdi Bangsa? HighSchool is nothing but physical and mental violence - Bullying, becomes Alex daily ?routine? at school. Luckily, Alex has found MAGGIE (Amanda Rawles), a junior student who becomes his best friend. Maggie makes life livable even in the unpleasant situation caused by the senior students. Creepy incidents and hauntings are nonstop after ANDRE (Aarya Vasco), ERIKA (Naomi Paulinda) and FAHRI (Teuku Rizki), force Alex to do participate in a ritual to call the spirits. The favorite school becomes scary, creepy and deadly.', 'waktu', '45.000'),
(72, 'pocong the origin', 'HORROR', '1 Jam 33 Menit', '-', 'Della Dartyan,', 'pocongtheorigin.jpg', 'pocongtheorigin.mp4', 'Ananta, seorang pembunuh berdarah dingin telah dieksekusi mati oleh Negara. Sasthi, putri satu-satunya harus mengantarkan jenazah sang ayah untuk dikuburkan di kampung halamannya. Dengan ditemani oleh Yama, seorang sipir penjara, keduanya berpacu dengan waktu untuk mencapai kampung Ananta. Hal ini menjadi semakin sulit karna berbagai gangguan ghoib menghalangi mereka di sepanjang perjalanan.', 'waktu', '45.000'),
(73, 'friend zone ', 'DRAMA', '2 Jam+', 'Chayanop ?Mu? Boonprakob', 'Naphat Siangsomboon , Pimchanok Luevisadpaibul', 'friendzone.jpg', 'friendzone.mp4', 'Dari produser pembuat I FINE THANK YOU LOVE YOU dengan sutradara film SUCKSEED dan MAY WHO Palm (Naphat Nine) terjebak di zona pertemanan dengan sahabatnya Gink (Pimchanok Luevisadpaibul) selama 10 tahun. Di SMA, Palm mencoba mengungkapkan perasaanya namun Gink menolaknya dengan mengatakan menjadi teman sudah cukup baik?. Setiap kali Palm putus dengan salah satu pacarnya yang tak terhitung jumlahnya, Gink akan menasehatinya sebagai sahabat. Setiap kali Gink berkelahi dengan pacarnya di mana pun Palm berada, Myanmar, Malaysia, atau Hong Kong ia (Gink) akan menelepon Palm dan memaksanya menggunakan tunjangan pramugari miliknya untuk naik pesawat menemani Gink. <br>Palm (Naphat Siangsomboon) is one of those who has been stuck in the friend zone with his best friend, Gink (Pimchanok Luevisadpaibul), for 10 years. During high school, he tried to cross the line by confessing his feelings for her. But Gink simply rejected him, saying that ?being friends is good enough.? Since then, Palm and Gink have grown closer as true best friends. Every time Palm breaks up with any of his countless girlfriends, Gink will tell him off, talking some sense into him. And every time Gink fights with her boyfriend, no matter where she happens to be in Myanmar, Malaysia, or Hong Kong. All she has to do is make a call to Palm, who uses his perks as a flight attendant to catch flights to be with her.', 'waktu', '45.000'),
(74, 'THE CURSE OF THE WEEPING WOMAN', 'HORROR', '1 Jam 33 Menit', '-', 'Marisol Ramirez', 'thecurse.jpg', 'thecurseoftheweepingwoman.mp4', 'Mengabaikan peringatan menakutkan dari seorang ibu yang dicurigai membahayakan anak, seorang pekerja sosial dan anak-anaknya sendiri ditarik ke alam gaib yang menakutkan. Satu-satunya harapan mereka untuk bertahan hidup dari kemarahan La Llorona yang mematikan mungkin hanya seorang pendeta dengan kemampuan mistis yang ia lakukan untuk mencegah kejahatan, Ignoring the eerie warning of a troubled mother suspected of child endangerment, a social worker and her own small kids are soon drawn into a frightening supernatural realm. Their only hope to survive La Lloronas deadly wrath may be a disillusioned priest and the mysticism he practices to keep evil at bay, on the fringes where fear and faith collide.', 'waktu', '45.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `komentar` longtext NOT NULL,
  `idfilm` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `film` varchar(1000) NOT NULL,
  `hari` varchar(1000) NOT NULL,
  `waktu` varchar(1000) NOT NULL,
  `tempat` varchar(1000) NOT NULL,
  `harga` varchar(1000) NOT NULL,
  `gambarfilm` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `film`, `hari`, `waktu`, `tempat`, `harga`, `gambarfilm`) VALUES
(80, 'arip', 'police evo', 'selasa', '20:10', 'Cilegon Center Mall XXI', '40.000', 'policeevo.jpg'),
(81, 'arief', 'sunyi ', 'selasa', 'waktu', 'Cilegon Center Mall XXI', '45.000', 'sunyi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'arief', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
