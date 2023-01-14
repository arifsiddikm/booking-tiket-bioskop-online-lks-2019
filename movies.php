<?php 
require 'konek.php';
require 'functions.php';
require 'session_login.php';



$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM film"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['halmoviesnya'])) ? $_GET['halmoviesnya'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$film = query("SELECT * FROM film ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");

if(isset($_POST['search'])) {
	$keyword = $_POST['keyword'];
		if($keyword == '') {
		header('location:movies');
	}
	$film = carifilm($keyword);
}

if(!$_GET['halmoviesnya'] || $_GET['halmoviesnya'] == '') {
	header('location:movies1');
	die();
}
if($_GET['halmoviesnya'] > $jumlahHalaman) {
	header('location:movies1');
	die();
}
if($_GET['halmoviesnya'] < 1) {
	header('location:movies');
	die();
}





?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<title>Tickets - Movies Page <?= $halamanAktif; ?></title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" type="icon/ico" href="image/icon.png">
<style type="text/css">
	body {
		background: url(image/pc.jpg);
		background-size: cover;
		background-attachment: fixed;
	}
	#container {
		width: 100%;
		background: white;
		padding-bottom: 70px;
	}
	.jdl-movies {
		font-size: 50px;
		color: white;
		margin-bottom: 10px;
		font-family: coffea;
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
		border: 1px solid white;
		font-size: 17px;
		color: #061BB6;
		border-radius: 5px;
		padding: 4.5px 7px;
		font-family: roboto;
		outline: none;
	}
	.search input:hover {
		border: 1px solid red;
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
	.list {
		width: 20%;
		height: 500px;
		display: inline-block;
		border: 0.5px solid #0E037A;
		margin: 5px 15px;
		background: #0E037A;
		overflow: auto;
		border-radius: 5px;
    }
    .list:hover {
    	border-color: red;
    	background: red;
    }
	img.fotofilm {
		width: 100%;
		height: 330px;
		top: 0;
	}
	.jdl-film {
		font-weight: bold;
		color: white;
		font-size: 22px;
		padding: 3px 0;
	}
	.genre {
		position: absolute;
		background: linear-gradient(to left, #061BB6, #0E037A);
		padding: 4px;
		margin: none;
		color: white;
		border-radius: 3px 0 5px 0;
		font-size: 15px;
		font-weight: bold;
	}
	.view {
		text-decoration: none;
		border: 2px solid white;
		border-radius: 4px;
		color: white;
		font-size: 16px;
		padding: 4px 15px;
	}
	.view:hover {
		font-weight: bold;
		background: white;
		color: none;
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
	.infopagepop {
		margin-top: 10px;
		border:1px solid #0E037A;
		background:#0E037A;
		color: white;
		font-size: 17px;
		width: 40%;
		padding: 2px;
		border-radius: 5px;
	}
	.head {
		background-size: cover;
		width: 100%;
		margin: 0;
		height: 300px;
		position: relative;
		margin-top: 50px;
		color: white;
	}
	.head p {margin: 10px;}
	@media screen and (max-width: 720px) {
		.jdl-movies {display: block;font-size: 40px;}
		#container {width: 100%;margin-left: 0;margin-right: 0;padding: 0;}
		.logtoview {padding: 5px;}
		.search {width: 100%;margin: 10px 0;}
		.search input {width: 60%}
		.list {width: 43%;margin: 5px;height: 370px;}
		.list img {height: 220px;}
		.infopagepop {width: 70%;}
	}
	@media screen and (max-width: 300px) {
		.jdl-movies {display: block;font-size: 40px;}
		#container {width: 100%;margin-left: 0;margin-right: 0;padding: 0;}
		.logtoview {padding: 5px;}
		.search {width: 100%;margin: 10px 0;}
		.search input {width: 60%}
		.list {width: 43%;margin: 5px;height: 370px;}
		.list img {height: 220px;}
		.infopagepop {width: 70%;}
	}
</style>
</head>
<body>
<?php include('navbar.php'); ?>
<center>
<div class="head">
<h1 class="jdl-movies" style="padding-top: 60px;">MOVIES</h1>
<form class="search" method="post">
	<input type="text" name="keyword" class="keyword" autocomplete="off" placeholder="Search Movie..." autofocus>
	<button type="submit" id="search" name="search">Search</button>
</form>
<br>
</div>	
<div id="container">
<br>
<?php if(isset($_POST['search'])) :?>
	<?php if(!isset($notfound)) { ?>
		<a href="home" class="merput">Kembali</a>
	<?php } ?>
<br>
<?php endif; ?>
<?php foreach($film as $f) { ?>
	<div class="list" title="FILM <?= strtoupper($f['judul']); ?>">
		<span class="genre"><?= strtoupper($f['genre']); ?></span>
		<img src="bahan/foto/<?= $f['foto']; ?>" class='fotofilm'>
		<p class="jdl-film">
		<?php
		$judullama1 = strtolower($f['judul']);
		$pisah1 = explode(" ", $judullama1);
		?>
			<a href="view<?= $f['id']; ?>" style="color: white;text-decoration: none;" >
				<?= strtoupper($f['judul']); ?>
			</a>
		</p>
		<br>
		<a href="view<?= $f['id']; ?>" class="view">Detail</a>
	</div>
<?php } ?>
<br>
<br>
<br>
<!-- Pagination -->
<p class="infopagepop" style="margin-bottom: 10px;">Halaman <?= $halamanAktif; ?></p>
<?php if($halamanAktif > 1): ?>
<a href="movies<?= $halamanAktif - 1; ?>" class="hal hal_left_on"><i class="fa fa-angle-double-left"></i></a>
<?php else : ?>
<a class="hal hal_left_off"><i class="fa fa-angle-double-left"></i></a>
<?php endif; ?>
<?php for($p = 1;$p<=$jumlahHalaman;$p++): ?>
<?php if($p == $halamanAktif) :?>
<a href="movies<?= $p; ?>" class="hal_on hal"><?= $p; ?></a>
<?php else : ?>
<a href="movies<?= $p; ?>" class="hal_off hal"><?= $p; ?></a>
<?php endif; ?>
<?php endfor; ?>
<?php if($halamanAktif < $jumlahHalaman): ?>
<a href="movies<?= $halamanAktif + 1; ?>" class="hal hal_left_on"><i class="fa fa-angle-double-right"></i></a>
<?php else : ?>
<a class="hal hal_left_off"><i class="fa fa-angle-double-right"></i></a>
<?php endif; ?><br>
<div class="infopagepop">
<?php
$cekpoppost = mysqli_query($konek, "SELECT * FROM film");
$jumlahArtPop = mysqli_num_rows($cekpoppost);
echo "$jumlahDataPerHalaman dari $jumlahArtPop Film";
?>
</div>
</div>
<?php include('footer.php'); ?>
</center>
</html>