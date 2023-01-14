<?php 
session_start();
require '../konek.php';
require '../functions.php';

$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM film"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$film = query("SELECT * FROM film ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");

if(isset($_POST['search'])) {
	$keyword = $_POST['keyword'];
	if($keyword == '') {
		header('location:home');
	}
	if(empty($keyword)) {
		header('location:home');
		return false;
	}
	$film = carifilm($keyword);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<title>Tickets</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="icon" type="icon/ico" href="../image/icon.png">
<style type="text/css">
	#container {
		width: 100%;
		background: white;
		margin: 80px 0;
	}
	.jdl-movies {
		font-size: 33px;
		color: #0E037A;
		margin-bottom: 5px;
		padding-top: 10px;
		border-bottom: 2px solid #0E037A;
		padding-bottom: 10px;
	}
	.search {
		display: block;
		position: relative;
		width: 100%;
		padding: 0;
		margin: 15px 0;
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
	.logmenu {
		background: #061BB6;
		color: white;
		font-size: 18px;
		border: 2px solid #061BB6;
		text-decoration: none;
		padding: 10px;
		border-radius: 5px;
		color: white;
		margin: 5px 0;
		width: 15%;
		font-weight: bold;
	}
	.logmenu:hover {
		background: #0E037A;
		border: 2px solid #0E037A;
		color: white;
		transition: all 500ms;
	}
	@media screen and (max-width: 720px) {
		.jdl-movies {display: block;}
		#container {width: 100%;margin-left: 0;margin-right: 0;padding: 0;}
		.logtoview {padding: 5px;}
		.search {width: 100%;margin: 10px 0;}
		.search input {width: 60%}
		.head h1 {font-size: 40px;}
		.head p {font-size: 16px;}
		.list {width: 43%;margin: 5px;height: 370px;}
		.list img {height: 220px}
	}
	@media screen and (max-width: 300px) {
		.jdl-movies {display: block;}
		#container {width: 100%;margin-left: 0;margin-right: 0;padding: 0;}
		.logtoview {padding: 5px;}
		.search {width: 100%;margin: 10px 0;}
		.head h1 {font-size: 40px;}
		.head p {font-size: 16px;}
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
<h1 class="jdl-movies">HOME ADMIN</h1>
	<ul>
				<li><button class="logmenu" onclick="document.location.href='home'">HOME</button></li>
				<li><button class="logmenu" onclick="document.location.href='users'">USERS</button></li>
				<li><button class="logmenu" onclick="document.location.href='film'">FILM</button></li>
				<li><button class="logmenu" onclick="document.location.href='orders'">ORDERS</button></li>
				<li><button class="logmenu" onclick="document.location.href='logout'">LOGOUT</button></li>
		</ul>
</div>
<?php include('../footer.php'); ?>
</center>
</html>