<?php
require 'konek.php';
require 'session_login.php';
session_start();
$id = $_GET["id"];
$username = $_SESSION['username'];
$cekuser = mysqli_fetch_assoc(mysqli_query($konek, "SELECT * FROM pesanan WHERE id = $id"));
if($cekuser['nama'] !== $username) {
	echo "<script>alert('Maaf seharusnya anda tidak melakukan hal ini');document.location.href='orders';</script>";
}
else {
	mysqli_query($konek, "DELETE FROM pesanan WHERE id = $id");
	if(mysqli_affected_rows($konek) > 0 ) {
		header('location:orders');
	}
	else {
		echo "<script>alert('Delete failed');</script>";
		header('location:orders');
	}
}


?>