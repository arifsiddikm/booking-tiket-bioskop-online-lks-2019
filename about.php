<?php 
require 'konek.php';
require 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<title>Tickets - About</title>
<link rel="stylesheet" type="text/css" href="fonts/fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" type="icon/ico" href="image/icon.png">
<style type="text/css">
	#container {
		width: 90%;
		padding: 10px;
		margin: 60px;
	}
	.jdl-movies {
		font-size: 33px;
		color: #0E037A;
		margin-bottom: 5px;
		border-bottom: 2px solid #0E037A;
		padding-bottom: 10px;
	}
	.logtoview {
		background: #061BB6;
		color: white;
		font-size: 18px;
		border: 2px solid #061BB6;
		text-decoration: none;
		padding: 10px;
		border-radius: 5px;
		color: white;
		margin: 0;
		font-weight: bold;
	}
	.logtoview:hover {
		background: #0E037A;
		border: 2px solid #0E037A;
		color: white;
		transition: all 500ms;
	}
	.konten h3 {
		color: #0E037A;
	}
	.konten .fa,b {color: #0E037A;}
	.konten li {
		list-style: none;
	}
	.konten a {color: red;}
	.konten a:hover {color: green;}
	.konten img.cek {
		width: 20px;
	}
	.btnakun {
		padding: 2px 6px;
		text-decoration: none;
		border-radius: 4px;
	}
	.btnakun:hover {
		text-decoration: underline;
	}
	@media screen and (max-width: 720px) {
		.jdl-movies {display: block;}
		#container {width: 85%;margin-left: 0;margin-right: 0;padding: 0;margin-top:80px;}
	}
	@media screen and (max-width: 300px) {
		.jdl-movies {display: block;}
		#container {width: 85%;margin-left: 0;margin-right: 0;padding: 0;margin-top:80px;}
	}
</style>
</head>
<body>
<?php include('navbar.php'); ?>
<center>
<div id="container">
<h1 class="jdl-movies">ABOUT THIS WEBSITE</h1>
<div class="konten" style="text-align: left;">
	<h3>Intro <i class="fa fa-angle-double-down"></i></h3><br>
	<p><b>Tickets</b> adalah sebuah website tempat dimana orang bisa memesan tiket bioskop secara online dan melihat daftar film bioskop terbaru yang ada disini. Website ini memiliki beberapa fungsi dan isi sebagai berikut <i class="fa fa-angle-double-down"></i></p>
	<br>
	<p>
<img class="cek" src="image/ceklis.jpg"> Login dan Register dengan akun yang bisa dibuat oleh siapa saja <br>
<img class="cek" src="image/ceklis.jpg"> Tampilan website yang sederhana dan user friendly termasuk responsive <br>
<img class="cek" src="image/ceklis.jpg"> Melihat daftar film yang ada di halaman <a href="movies">Movies</a> <br>
<img class="cek" src="image/ceklis.jpg"> Melihat video trailer pada film yang tertera di halaman <a href="movies">Movies</a> <br>
<img class="cek" src="image/ceklis.jpg"> Memesan tiket film bioskop <br>
<img class="cek" src="image/ceklis.jpg"> Manajemen riwayat pemesanan tiket di <a href="orders">Orders</a><br>
<img class="cek" src="image/ceklis.jpg"> Membuat output print to PDF tiket <br>
	</p>
	<br>
	<p>Website ini dibuat hanya sebagai portofolio saya sejak mengikuti Lomba beberapa hari yang lalu.</p>
	<br>
	<p>
		<h3>Profil <i class="fa fa-angle-double-down"></i></h3><br>
		<b>Nama</b> : Arif Siddik Muharam <br>
		<b>Kelas</b> : 11 TKJ 1  <br>
		<b>Sekolah</b> : SMK YP Fatahilah 2 Cilegon <br>
		<b>TTL</b> : - <br>
		<b>Alamat</b> : - <br>
		<b>Hobby</b> : - <br>
		<b>No. Handphone</b> : - <br>
		<b>Jenis Kelamin</b> : - <br>
		<b>Status</b> : - <br>
		<b>Agama</b> : - <br>
		<b>Bio</b> : - <br>
		<b>Motto Hidup</b> : - <br>
		<b>Pendidikan 1</b> : - <br>
		<b>Pendidikan 2</b> : - <br>
		<b>Pendidikan 3</b> : - <br>
		<b>Pendidikan 4</b> : - <br><br>
		<h3>Akun Profile <i class="fa fa-angle-double-down"></i> </h3><br>
<a class='btnakun' style="background: #020766;color: white;" href="https://www.facebook.com/arief15s">Facebook</a><br><br>
<a class='btnakun' style="background: #AF5A07;color: white;" href="https://github.com/Arief15s">Github</a><br><br>
<a class='btnakun' style="background: #1B28D1;color: white;" href="https://linkedin.com/in/arif-siddik-muharam-84b7b215">Linkedin</a><br><br>
<a class='btnakun' style="background: #DD0606;color: white;" href="https://www.youtube.com/channel/UCarS7Qf6yqzc6K7UUg3G-Qg">Youtube</a><br><br>
<a class='btnakun' style="background: #D70878;color: white;" href="https://www.instagram.com/arief_15s/">Instagram</a><br><br>
	</p>
</div>
</div>
<?php include('footer.php'); ?>
</center>
</html>