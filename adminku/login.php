<?php
session_start();
require '../konek.php';
require '../functions.php';
if(isset($_SESSION['admin'])) {
	header('location:home');
	die();
}

if(isset($_POST['login'])) {
$username = $_POST['username'];
if($username !== 'adminarip125') {
	echo "<script>alert('You are not admin');document.location.href='login';</script>";
	die();
}
else {
	$_SESSION['admin'] = true;
	echo "<script>alert('Welcome Admin');document.location.href='home';</script>";
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	<title>Tickets - login</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="icon" type="icon/ico" href="../image/icon.png">
	<style type="text/css">
	#login {
		width: 28%;
		padding: 10px;
		border: 2px solid ;
		border-image: linear-gradient(to left, #061BB6, #0E037A);
		border-image-slice: 1;
		margin: 80px 0;
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
<div id="login">
<h1 class="jdl">Login Admin</h1>
<form method="post" class="formlogin">
	<input type="text" name="username" id="username" class="username" autocomplete="off" placeholder="Username Admin" autofocus>
	<button type="submit" id="btnlogin" name="login">Login</button>
</form>
</div>
</center>
</html>