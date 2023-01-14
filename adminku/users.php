<?php 
require '../konek.php';
require '../functions.php';
require 'session_login.php';

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM pesanan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$orders = query("SELECT * FROM user ORDER BY id ASC LIMIT $awalData, $jumlahDataPerHalaman");



// fungsi ganti password

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<title>Tickets</title>
<link rel="stylesheet" type="text/css" href="../fonts/fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="icon" type="icon/ico" href="../image/icon.png">
<style type="text/css">
	#container {
		width: 90%;
		padding: 10px;
		margin: 100px 0;
	}
	.jdl-movies {
		font-size: 33px;
		color: #0E037A;
		padding-bottom: 10px;
		margin-bottom: 5px;
		border-bottom: 2px solid #0E037A;
	}
	.search {
		display: block;
		position: relative;
		width: 100%;
		padding: 0;
		margin: 15px;
	}
	.search input {
		width: 70%;
		border: 1.5px solid #061BB6;
		font-size: 17px;
		color: #061BB6;
		border-radius: 5px;
		padding: 5px 7px;
		font-family: roboto;
		outline: none;
	}
	.search input:hover {
		border: 1.5px solid red;
	}
	.search input:focus {
		color: red;
	}
	.search button {
		border: 1.5px solid #061BB6;
		font-size: 17px;
		font-family: roboto;
		outline: none;
		padding: 5px 7px;
		border-radius: 5px;
		background: #061BB6;
		color: white;
		font-weight: bold;
	}
	.search button:hover {
		color: #061BB6;
		background: white;
	}
	img.fotofilm {
		width: 100%;
		height: 330px;
		top: 0;
	}
	table {width: 100%;}
	th {
		color: white;
		background: #0E037A;
	}
	table,th,td {
		text-align: center;
		border: 1px solid #0E037A;
	}
	td,th {padding: 3px;}
	.vt {
		text-decoration: none;
		color: white;
		background: #0E037A;
		padding: 1px 5px;
		border-radius: 3px;
		border: 1px solid #0E037A;
	}
	.vt:hover {
		background: white;
		color: #0E037A;
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
	.formganti label {
		display: block;
		margin: 5px;
		color: #0E037A;
		font-weight: bold;
	}
	.formganti input {
		border: 1px solid black;
		font-size: 17px;
		padding: 2px 4px;
		border-radius: 5px;
		border: 1px solid #0E037A;
		padding: 2.5px 6px;
		font-size: 18px;
		width: 30%;
		color: #0E037A;
	}
	.formganti input:focus {
		color: red;
	}
	.formganti input:hover {
		border-color: red;
	}
	.formganti button {
		margin: 10px;
		font-size: 18px;
		border: 2px solid ;
		background: #0E037A;
		color: white;
		padding: 4px 7px;
		border-radius: 5px;
		display: block;
		font-weight: bold;
		background: linear-gradient(to left, #061BB6, #0E037A);
		border-image: linear-gradient(to left, #061BB6, #0E037A);
		border-image-slice: 1;
	}
	.formganti button:hover {
		color: #0E037A;
		background: white;
	}
	@media screen and (max-width: 720px) {
		.jdl-movies {display: block;}
		#container {width: 95%;}
		.search {width: 100%;margin: 10px 0;}
		.search input {width: 60%}
		.formganti input {width: 80%;}
		.list {width: 43%;margin: 5px;height: 370px;}
		.list img {height: 220px}
	}
	@media screen and (max-width: 300px) {
		.jdl-movies {display: block;}
		#container {width: 95%;}
		.search {width: 100%;margin: 10px 0;}
		.formganti input {width: 80%;}
		.search input {width: 60%}
		.list {width: 43%;margin: 5px;height: 370px;}
		.list img {height: 220px}
	}
</style>
</head>
<body>
<?php include('navbar.php'); ?>
<center>
<div id="container">
<h1 class="jdl-movies">USERS</h1>
<table class="orders">
	<tr>
		<th style="width: 10%;">No</th>
		<th style="width: 30%;">Username</th>
		<th style="width: 30%;">Password</th>
		<th style="width: 30%;">Aksi</th>
	</tr>
	<?php foreach($orders as $o): ?>
	<tr>
		<td><?= $o['id']; ?></td>
		<td><?= ucwords($o['username']); ?></td>
		<td><?= ucwords($o['password']); ?></td>
		<td>
			<a class="vt" href="deluser.php?username=<?= $o['username']; ?>" onclick="return confirm('Hapus Tiket Film <?= ucwords($o['film']); ?>?');">Delete</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<br>
<!-- Pagination -->
<p class="infopagepop" style="margin-bottom: 10px;">Halaman <?= $halamanAktif; ?></p>
<?php if($halamanAktif > 1): ?>
<a href="orders<?= $halamanAktif - 1; ?>" class="hal hal_left_on"><i class="fa fa-angle-double-left"></i></a>
<?php else : ?>
<a class="hal hal_left_off"><i class="fa fa-angle-double-left"></i></a>
<?php endif; ?>
<?php for($p = 1;$p<=$jumlahHalaman;$p++): ?>
<?php if($p == $halamanAktif) :?>
<a href="orders<?= $p; ?>" class="hal_on hal"><?= $p; ?></a>
<?php else : ?>
<a href="orders<?= $p; ?>" class="hal_off hal"><?= $p; ?></a>
<?php endif; ?>
<?php endfor; ?>
<?php if($halamanAktif < $jumlahHalaman): ?>
<a href="orders<?= $halamanAktif + 1; ?>" class="hal hal_left_on"><i class="fa fa-angle-double-right"></i></a>
<?php else : ?>
<a class="hal hal_left_off"><i class="fa fa-angle-double-right"></i></a>
<?php endif; ?><br>
<br><br><br><br>
</div>
</center>

</html>