<?php
require 'konek.php';
require 'functions.php';
require 'session_login.php';

$username = $_SESSION['username'];
$idorderannya = $_GET['idorderannya'];
$view = query("SELECT * FROM pesanan WHERE id = $idorderannya");
if(!$_GET['idorderannya'] || $_GET['idorderannya'] == '') {
	header('location:orders1');
	die();
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<title>Tickets - View Tiket <?= $idorderannya; ?></title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" type="icon/ico" href="image/icon.png">
<style type="text/css">
	body {
		margin: 50px 0;
	}
	table {
		width: 40%;
	}
	table img {
		width: 100%;
	}
	table,th,td {
		border: 1px solid #0E037A;
	}
	th , td {
		padding: 0 4px;
	}
	td {font-size: 17px;}
	th {
		color: white;
		background: #0E037A;
		font-size: 19px;
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
	@media screen and (max-width: 700px) {
		table {width: 98%;}
	}
	@media screen and (max-width: 300px) {
		table {width: 98%;}
	}
</style>
<body>
<center>
<?php foreach($view as $v) :?>
<table>
	<tr>
		<th colspan="4" style="padding: 5px;">Tiket Bioskop</th>
	</tr>
	<tr>
		<td>Judul</td><td>:</td><td><?= ucwords($v['film']); ?></td>
		<td rowspan="6" style="width: 35%;"><img src="bahan/foto/<?= $v['gambarfilm']; ?>"></td>
	</tr>
	<tr>
		<td>Hari</td><td>:</td><td><?= ucwords($v['hari']); ?></td>
	</tr>
	<tr>
		<td>Waktu</td><td>:</td><td><?= $v['waktu']; ?></td>
	</tr>
	<tr>
		<td>Harga</td><td>:</td><td><?= $v['harga']; ?></td>
	</tr>
	<tr>
		<td>Tempat</td><td>:</td><td><?= ucwords($v['tempat']); ?></td>
	</tr>
	<tr>
		<td>No.Tiket</td><td>:</td><td><?= $v['id']; ?></td>
	</tr>
</table>
<?php endforeach; ?>
<br><br><br><br><br><br>
<a onclick="window.print()" class="logtoview">Print to PDF</a>
</html>
