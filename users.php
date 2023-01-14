<?php 
require 'konek.php';
require 'functions.php';
require 'session_login.php';

$users = query("SELECT * FROM user");





?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<title>Tickets - Users</title>
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
	table {
		width: 90%;text-align: center;
	}
	th {
		background: #0E037A;
		color: white;
	}
	table,th,td {
		border: 1.5px solid #0E037A;
	}
	th,td {
		padding: 5px 10px;
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
		.konten table {width: 100%;}
		.jdl-movies {display: block;}
		#container {width: 96%;margin-left: 0;margin-right: 0;padding: 0;margin-top:80px;}
	}
	@media screen and (max-width: 300px) {
		.konten table {width: 100%;}
		.jdl-movies {display: block;}
		#container {width: 96%;margin-left: 0;margin-right: 0;padding: 0;margin-top:80px;}
	}
</style>
</head>
<body>
<?php include('navbar.php'); ?>
<center>
<div id="container">
<h1 class="jdl-movies">USER TERDAFTAR</h1>
<div class="konten" style="">
<table>
	<tr>
		<th>Nama User</th>
	</tr>
		<?php foreach($users as $user) { ?>
	<tr>
		<td><?= $user['username']; ?></td>
	</tr>
		<?php } ?>
</table>
</div>
</div>
</center>

</html>