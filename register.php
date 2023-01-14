<?php
session_start();
require 'konek.php';
require 'functions.php';
if(isset($_SESSION['login'])) {
	header('location:home');
}
if(isset($_POST['register'])) {
	$username = strtolower(strip_tags($_POST['username']));
	$password = $_POST['password'];
	$cekData = mysqli_query($konek, "SELECT * FROM user WHERE username = '$username'");
	if(mysqli_num_rows($cekData) === 1) {
		echo "<script>alert('Akun dengan username ".$username." sudah terdaftar, harap pakai username lain');document.location.href='register.php';</script>";
	}
	else {
	mysqli_query($konek, "INSERT INTO user VALUES (NULL,'$username','$password')");
		echo "<script>alert('Pendaftaran berhasil, silahkan login untuk menggunakan akun baru anda');document.location.href='login';</script>";
 }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	<title>Tickets - Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="icon/ico" href="image/icon.png">
	<style type="text/css">
	#register {
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
	.formregister label {
		display: block;
		margin: 5px;
		color: #0E037A;
		font-weight: bold;
	}
	.formregister input {
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
	.formregister input:focus {
		color: red;
	}
	.formregister input:hover {
		border-color: red;
	}
	.formregister button {
		margin: 10px;
		font-size: 18px;
		border: 2px solid ;
		color: white;
		padding: 4px 7px;
		border-radius: 5px;
		display: block;
		background: linear-gradient(to left, #061BB6, #0E037A);
		border-image: linear-gradient(to left, #061BB6, #0E037A);
		border-image-slice: 1;
		font-weight: bold;
	}
	.formregister button:hover {
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
		#register {width: 80%;}
	}
	@media screen and (max-width: 300px) {
		#register {width: 80%;}
	}
	</style>
</head>
<body>
<center>
<?php include('navbar.php'); ?>
<div id="register">
<h1 class="jdl">Register</h1>
<form method="post" class="formregister">
	<label for="username">Username :</label>
	<input type="text" name="username" id="username" class="username" autocomplete="off" placeholder="Your Username" autofocus>
	<label for="password">Password :</label>
	<input type="password" name="password" id="password" class="password" autocomplete="off" placeholder="Your Password">
	<button type="submit" id="btnregister" name="register">Register</button>
</form>
<br>
<br>
<a class="btn" href="home"><i class="fa fa-arrow-alt-circle-left"></i> Kembali ke Home</a>
<a class="btn" href="login">Login <i class="fa fa-arrow-alt-circle-right"></i></a>
</div>
<?php include('footer.php'); ?>
</center>
</html>