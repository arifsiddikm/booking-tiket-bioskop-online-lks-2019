<?php 
session_start();
require '../konek.php';
require '../functions.php';

if(!$_GET['filmnya']) {
	header('location:movies1');
	die();
}
if($_GET['filmnya'] == '') {
	header('location:movies1');
	die();
}

$id = $_GET['filmnya'];
$film = mysqli_query($konek, "SELECT * FROM film WHERE id = $id");
$ambiljudul = mysqli_fetch_assoc(mysqli_query($konek, "SELECT judul FROM film WHERE id = $id"));
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM film"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$othermovie = query("SELECT * FROM film ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");
// buton order 
if(isset($_POST['order'])) {
$username = strip_tags(strtolower(mysqli_real_escape_string($konek, $_POST['username'])));
$judul = strip_tags(strtolower(mysqli_real_escape_string($konek, $_POST['judul'])));
$harga = strip_tags(mysqli_real_escape_string($konek, $_POST['harga']));
$gambarfilm = strip_tags($_POST['gambarfilm']);
if($harga == 'kosong') {
	echo "<script>alert('Order gagal, harap lengkapi pengisian form order');document.location.href='';</script>";
	return false;
}
$hari = strip_tags(strtolower(mysqli_real_escape_string($konek, $_POST['hari'])));
$waktu = strip_tags(mysqli_real_escape_string($konek, $_POST['waktu']));
if($waktu == 'kosong') {
	echo "<script>alert('Order gagal, harap lengkapi pengisian form order');document.location.href='';</script>";
	return false;
}
$tempat = strip_tags(mysqli_real_escape_string($konek, $_POST['tempat']));
if($tempat == 'kosong') {
	echo "<script>alert('Order gagal, harap lengkapi pengisian form order');document.location.href='';</script>";
	return false;
}
mysqli_query($konek, "INSERT INTO pesanan VALUES ('','$username','$judul','$hari','$waktu','$tempat','$harga','$gambarfilm')");
if(mysqli_affected_rows($konek)) {
	echo "<script>alert('Order berhasil');document.location.href='orders';</script>";
}
else {
	echo "<script>alert('Order gagal');</script>";
	return false;
}
}

// proses komentar
if(isset($_POST['kirimkomentar'])) {
	$komentar = strip_tags($_POST['komentar']);
	$username = $_SESSION['username'];
	$idfilm = $_GET['filmnya'];
	mysqli_query($konek, "INSERT INTO komentar VALUES ('','$username','$komentar','$idfilm')");
	$id = $_GET['filmnya'];
	header('location:view'.$id.'');
}
$komentar = mysqli_query($konek, "SELECT * FROM komentar WHERE idfilm = $id");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<title>Tickets - Film <?= ucwords($ambiljudul['judul']); ?></title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="icon" type="icon/ico" href="../image/icon.png">
<style type="text/css">
	#container {
		width: 90%;
		padding: 10px;
		margin-top: 70px;
	}
	.jdl-movies {
		font-size: 33px;
		color: #0E037A;
		margin-bottom: 5px;
		border-bottom: 2px solid #0E037A;
	}
	.imgfilm {
		width: 25%;
		border: 1px solid #0E037A;
	}
	.desc {
		text-align: left;
	}
	.desc b {color: #0E037A;}
	#container video {
		width: 60%;
		border: 1px solid #0E037A;
	}
	.pesantiket {
		padding: 6px 8px;
		font-weight: bold;
		background: #061BB6;
		color: white;
		border-radius: 5px;
		border: 2px solid #061BB6;
		box-shadow: 0.5px 0.5px 0.5px #2E920B;
	}
	.pesantiket:hover {
		background: white;
		color: #061BB6;
		box-shadow: none;
	}
	#boxpesan {
		width: 35%;
		border: 2px solid #0E037A;
		position: relative;
		border-radius: 3px;
		padding: 0 7px;
	}
	#boxpesan table {
		width: 100%;
	}
	#boxpesan label {
		margin: 10px;
		font-weight: bold;
		color: #0E037A;
	}
	#boxpesan h1 {
		font-size: 28px;
		margin: 0 -7px;
		color: white;
		background: #0E037A;
		padding: 3px 0;
		margin-bottom: 20px;
	}
	#boxpesan select {
		width: 100%;
		font-size: 17px;
		color: #0E037A;
		border: 1px solid #0E037A;
		outline: none;
		padding: 1px;
		font-family: roboto;
		border-radius: 4px;
	}
	#boxpesan select:hover {
		background: #0E037A;
		color: white;
	}
	#boxpesan button {
		width: 50%;
		margin: 10px;
		padding: 8px 0;
		font-size: 17px;
		font-family: roboto;
		border: 1.5px solid #0E037A;
		background: white;
		color: #0E037A;
		font-weight: bold;
		border-radius: 5px;
	}
	#boxpesan button:hover {
		color: white;
		background: #0E037A;
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
	.komentar {
		position: relative;
	}
	.komentar textarea {
		width: 80%;
		margin: 5px;
		border: 1.5px solid #0E037A;
		padding: 6px;
		font-family: roboto;
		font-size: 17px;
		outline: none;
		color: #0E037A;
		border-radius: 5px;
	}
	.komentar textarea:focus {
		color: red;
		border-color: red;
	}
	.komentar button {
		display: block;
		font-size: 17px;
	}
	.hasilkomentar, .hasilkomentar td {
		width: 100%;
		text-align: left;
		margin: 5px;
	}
	.hasilkomentar {
		border: 1px solid #0E037A;
		border-radius: 5px;
		padding: 4px;
	}
	@media screen and (max-width: 720px) {
	.imgfilm {width: 90%;}
	#container video {width: 100%;}
	#boxpesan {width: 95%;}
	.logtoview {padding: 5px;}
	.list {width: 43%;margin: 5px;height: 370px;}
	.list img {height: 220px}
	}
	@media screen and (max-width: 300px) {
	.imgfilm {width: 90%;}
	#container video {width: 100%;}
	#boxpesan {width: 95%;}
	.logtoview {padding: 5px;}
	.list {width: 43%;margin: 5px;height: 370px;}
	.list img {height: 220px}
	}
</style>
</head>
<body>
<?php include('navbar.php'); ?>
<center>
<div id="container">
	<?php while($f = mysqli_fetch_assoc($film)) { ?>
	<h1 class="jdl-movies"><?= strtoupper($f['judul']); ?></h1><br>
		<img src="../bahan/foto/<?= $f['foto']; ?>" class='imgfilm'>
	<h1 class="jdl-movies" style="margin: 20px 0 0 0;"></h1>
		<div class="desc">
			<br>
			<span><b>Judul</b> : <?= ucwords($f['judul']); ?> </span><br>
			<span><b>Genre</b> : <?= ucwords(strtolower($f['genre'])); ?> </span><br>
			<span><b>Durasi</b> : <?= ucwords($f['durasi']); ?> </span><br>
			<span><b>Direktur</b> : <?= ucwords($f['direktur']); ?> </span><br>
			<span><b>Casts</b> : <?= ucwords($f['casts']); ?> </span><br>
			<span><b>Sinopsis</b> : <?= $f['sinopsis']; ?> </span><br>
		</div>
<br>
<br>
<h1 class="jdl-movies">Trailer</h1><br>
<video controls="controls" src="../bahan/trailer/<?= $f['trailer']; ?>" id='trailer' style='display:;'></video>
<br>
<br>
<?php } ?>
<br>
<br>
<a href="film" class="logtoview">Kembali Ke Film</a>
<br>
<br>
<br>
</div>
</center>
</html>