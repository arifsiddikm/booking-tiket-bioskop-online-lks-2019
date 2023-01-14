<?php
session_start();
require 'konek.php';
require 'functions.php';
if(isset($_SESSION['login'])) {
	header('location:home');
	die();
}

if(isset($_POST['login'])) {
$username = mysqli_real_escape_string($konek, $_POST['username']);
$password = $_POST['password'];
if(empty($username) || empty($password)) {
	echo "<script>alert('Username dan Password tidak boleh kosong');document.location.href='login';</script>";
}
$cekData = mysqli_query($konek, "SELECT * FROM user WHERE username = '$username'");
	if(mysqli_num_rows($cekData) === 1) {
	$Data = mysqli_fetch_assoc($cekData);
		if($password !== $Data['password']) {
			echo "<script>alert('Password Salah');document.location.href='login';</script>";
			return false;
		}
		else {
			$_SESSION['login'] = true;
			$_SESSION['username'] = true;
			$_SESSION['username'] = $username;
			header('location:home');
		}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	<title>Tickets - login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="icon/ico" href="image/icon.png">
	<style type="text/css">
	#login {
		width: 28%;
		padding: 10px;
		margin-top: 70px;
		border: 2px solid ;
		border-image: linear-gradient(to left, #061BB6, #0E037A);
		border-image-slice: 1;
		margin: 100px 0;
	}
	.jdl {
		background: linear-gradient(to left, #061BB6, #0E037A);
		color: white;
		margin: -10px;
		padding-bottom: 6px;
		font-size: 30px;
		margin-bottom: 20px;
	}
	.formlogin label {
		display: block;
		margin: 5px;
		color: #0E037A;
		font-weight: bold;
	}
	.formlogin input {
		border: 1px solid black;
		font-size: 17px;
		padding: 2px 4px;
		border-radius: 5px;
		border: 1px solid #0E037A;
		padding: 2.5px 6px;
		font-size: 18px;
		width: 80%;
		color: #0E037A;
	}
	.formlogin input:focus {
		color: red;
	}
	.formlogin input:hover {
		border-color: red;
	}
	.formlogin button {
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
	.formlogin button:hover {
		color: #0E037A;
		background: white;
	}
	.btn {
		font-size: 18px;
		margin: 5px 0;
		width: 80%;
		text-decoration: none;
		border: 2px solid #0E037A;
		background: #0E037A;
		color: white;
		padding: 4px 7px;
		border-radius: 5px;
		display: block;
		font-weight: bold;
	}
	.btn:hover {
		color: #0E037A;
		background: white;
	}

	@media screen and (max-width: 700px) {
		#login {width: 75%;}
	}
	@media screen and (max-width: 300px) {
		#login {width: 75%;}
	}

	</style>
</head>
<body>
<center>
<?php include('navbar.php'); ?>
<div id="login">
<h1 class="jdl">Login</h1>
<form method="post" class="formlogin">
	<label for="username">Username :</label>
	<input type="text" name="username" id="username" class="username" autocomplete="off" placeholder="Your Username" autofocus>
	<label for="password">Password :</label>
	<input type="password" name="password" id="password" class="password" autocomplete="off" placeholder="Your Password">
	<button type="submit" id="btnlogin" name="login">Login</button>
</form>
<br>
<p style="text-align: left;color: #0E037A;">
<b>Dengan Login anda bisa :</b> <br>
<i class="fa fa-check-circle" style="color: #0e037a;"></i> Melihat Semua Film <br>
<i class="fa fa-check-circle" style="color: #0e037a;"></i> Memesan Tiket Bioskop Online <br>
<i class="fa fa-check-circle" style="color: #0e037a;"></i> Melihat Riwayat Pemesanan Tiket <br>
<i class="fa fa-check-circle" style="color: #0e037a;"></i> Manajemen Riwayat Pemesanan Tiket <br>
</p>
<br>
<br>
<a class="btn" href="home"><i class="fa fa-arrow-alt-circle-left"></i> Kembali ke Home</a>
<a class="btn" href="register">Mendaftar Akun <i class="fa fa-arrow-alt-circle-right"></i></a>
</div>
<?php include('footer.php'); ?>
</center>
</html>