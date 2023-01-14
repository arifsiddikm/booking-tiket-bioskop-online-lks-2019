<?php 
require '../konek.php';
require '../functions.php';
require 'session_login.php';
$idfilmnya = $_GET['id'];


$listf = query("SELECT * FROM film WHERE id = $idfilmnya");

//fungsi uplode foto 
function uplodefoto() {
	$namaFile = $_FILES['foto']['name'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];
	if($error === 4) {
		echo "<script>alert('tidak ada foto yang dipilih');</script>";
		return false;
	}
	//cek apakah yang di uplode adalah foto
	$ekstensiquotesValid = ['jpg','jpeg','png','gif'];
	$ekstensiquotes = explode('.', $namaFile);
	$ekstensiquotes = strtolower(end($ekstensiquotes));
	if(!in_array($ekstensiquotes, $ekstensiquotesValid)) {
		echo "<script>alert('yang anda uplode bukan foto');</script>";
		return false;
	}
	//uplode 
	move_uploaded_file($tmpName, "../bahan/foto/".$namaFile);
	return $namaFile;
}
//fungsi uplode trailer 
function uplodetrailer() {
	$namaFile = $_FILES['trailer']['name'];
	$error = $_FILES['trailer']['error'];
	$tmpName = $_FILES['trailer']['tmp_name'];
	if($error === 4) {
		echo "<script>alert('tidak ada trailer yang dipilih');</script>";
		return false;
	}
	//cek apakah yang di uplode adalah trailer
	$ekstensiquotesValid = ['mp4','3gp','3gpp','webm'];
	$ekstensiquotes = explode('.', $namaFile);
	$ekstensiquotes = strtolower(end($ekstensiquotes));
	if(!in_array($ekstensiquotes, $ekstensiquotesValid)) {
		echo "<script>alert('yang anda uplode bukan video');</script>";
		return false;
	}
	//uplode 
	move_uploaded_file($tmpName, "../bahan/trailer/".$namaFile);
	return $namaFile;
}


// fungsi 
if(isset($_POST['updatefilm'])) {
$judul = strip_tags($_POST['judul']);
$genre = strip_tags($_POST['genre']);
$durasi = strip_tags($_POST['durasi']);
$direktur = strip_tags($_POST['direktur']);
$casts = strip_tags($_POST['casts']);
$foto = uplodefoto();
if(!$foto) {
	return false;
}
$trailer = uplodetrailer();
if(!$trailer) {
	return false;
}
$sinopsis = strip_tags($_POST['sinopsis']);
$waktu = strip_tags($_POST['waktu']);
$harga = strip_tags($_POST['harga']);


mysqli_query($konek, "UPDATE film SET judul = '$judul', genre = '$genre', durasi = '$durasi', direktur = '$direktur', casts = '$casts', foto = '$foto', trailer = '$trailer', sinopsis = '$sinopsis', waktu = '$waktu', harga = '$harga' WHERE id = $idfilmnya");
if(mysqli_affected_rows($konek)) {
	echo "<script>alert('Berhasil di update');document.location.href='film';</script>";
}
else {
	echo "<script>alert('Gagal di update');document.location.href='film';</script>";
}
}


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
		margin: 50px 0;
	}
	.jdl-movies {
		font-size: 33px;
		color: #0E037A;
		padding-bottom: 10px;
		margin-bottom: 5px;
		border-bottom: 2px solid #0E037A;
	}
	img.fotofilm {
		width: 100%;
		height: 330px;
		top: 0;
	}
	table {width: 100%;border-radius: 3px;}
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
	.formadd {
		width: 80%;
		position: relative;
		padding: 0 7px;
	}
	.formadd table {
		width: 100%;
	}
	td {
		border: none;
	}
	.formadd label {
		display: block;
		font-weight: bold;
		color: #0E037A;
	}
	.formadd h1 {
		font-size: 28px;
		margin: 0 -7px;
		color: white;
		background: #0E037A;
		padding: 3px 0;
	}
	.formadd select {
		width: 100%;
		font-size: 17px;
		color: #0E037A;
		border: 1px solid #0E037A;
		outline: none;
		padding: 1px;
		font-family: roboto;
		border-radius: 4px;
	}
	.formadd select:hover {
		background: #0E037A;
		color: white;
	}
	.formadd button {
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
	.formadd button:hover {
		color: white;
		background: #0E037A;
	}
	.formadd input {
		width: 100%;
		border-radius: 3px;
		margin: 0;
		padding: 3px ;
		border: 1px solid #0E037A;
		font-size: 17px;
		color: #0E037A;
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
<h1 class="jdl-movies"> UPDATE FILM <?= $idfilmnya; ?></h1><br>
<form method="post" class="formadd" enctype="multipart/form-data"><br>
<table>
<?php foreach($listf as $up) { ?>
<tr><td style="width: 10%;background: #0e037a;border-radius: 3px;"><label style="color:white;" for="judul"><?= ucwords('judul'); ?></label></td><td style="width: 1%">:</td>
	<td style="width: 70%;"><input value="<?= $up['judul']; ?>" autocomplete="off" autofocus type="text" name="judul" id="judul" placeholder="judul film"></td></tr>
<tr><td style="width: 10%;background: #0e037a;border-radius: 3px;"><label style="color:white;" for="genre"><?= ucwords('genre'); ?></label></td><td style="width: 1%">:</td>
	<td style="width: 70%;"><input value="<?= $up['genre']; ?>" autocomplete="off" type="text" name="genre" id="genre" placeholder="genre film"></td></tr>
<tr><td style="width: 10%;background: #0e037a;border-radius: 3px;"><label style="color:white;" for="durasi"><?= ucwords('durasi'); ?></label></td><td style="width: 1%">:</td>
	<td style="width: 70%;"><input value="<?= $up['durasi']; ?>" autocomplete="off" type="text" name="durasi" id="durasi" placeholder="durasi film"></td></tr>
<tr><td style="width: 10%;background: #0e037a;border-radius: 3px;"><label style="color:white;" for="direktur"><?= ucwords('direktur'); ?></label></td><td style="width: 1%">:</td>
	<td style="width: 70%;"><input value="<?= $up['direktur']; ?>" autocomplete="off" type="text" name="direktur" id="direktur" placeholder="direktur film"></td></tr>
<tr><td style="width: 10%;background: #0e037a;border-radius: 3px;"><label style="color:white;" for="casts"><?= ucwords('casts'); ?></label></td><td style="width: 1%">:</td>
	<td style="width: 70%;"><input value="<?= $up['casts']; ?>" autocomplete="off" type="text" name="casts" id="casts" placeholder="casts film"></td></tr>
<tr><td style="width: 10%;background: #0e037a;border-radius: 3px;"><label style="color:white;" for="foto"><?= ucwords('foto'); ?></label></td><td style="width: 1%">:</td>
	<td style="width: 70%;"><input value="<?= $up['foto']; ?>" autocomplete="off" type="file" name="foto" id="foto" placeholder="foto film"></td></tr>
<tr><td style="width: 10%;background: #0e037a;border-radius: 3px;"><label style="color:white;" for="trailer"><?= ucwords('trailer'); ?></label></td><td style="width: 1%">:</td>
	<td style="width: 70%;"><input value="<?= $up['trailer']; ?>" autocomplete="off" type="file" name="trailer" id="trailer" placeholder="trailer film"></td></tr>
<tr><td style="width: 10%;background: #0e037a;border-radius: 3px;"><label style="color:white;" for="sinopsis"><?= ucwords('sinopsis'); ?></label></td><td style="width: 1%">:</td>
	<td style="width: 70%;"><input value="<?= $up['sinopsis']; ?>" autocomplete="off" type="text" name="sinopsis" id="sinopsis" placeholder="sinopsis film"></td></tr>
<tr><td style="width: 10%;background: #0e037a;border-radius: 3px;"><label style="color:white;" for="waktu"><?= ucwords('waktu'); ?></label></td><td style="width: 1%">:</td>
	<td style="width: 70%;"><input value="<?= $up['waktu']; ?>" autocomplete="off" type="text" name="waktu" id="waktu" placeholder="waktu tayang, batasi pakai koma, misal : 10:00,19:00,14:00 minimal 3 waktu"></td></tr>
<tr><td style="width: 10%;background: #0e037a;border-radius: 3px;"><label style="color:white;" for="harga"><?= ucwords('harga'); ?></label></td><td style="width: 1%">:</td>
	<td style="width: 70%;"><input value="<?= $up['harga']; ?>" autocomplete="off" type="text" name="harga" id="harga" placeholder="harga tiket film"></td></tr>
<tr><td colspan="3">
	<button type="submit" id="updatefilm" name="updatefilm">Update</button>
</td></tr>
<?php } ?>
</table>
</form>
<br>
<br>
<br>
<br>
</div>
</center>

</html>