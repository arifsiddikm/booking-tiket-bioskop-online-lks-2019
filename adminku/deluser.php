<?php
require '../konek.php';
require '../session_login.php';
	$username = $_GET["username"];
	mysqli_query($konek, "DELETE FROM user WHERE username = '$username'");
	if(mysqli_affected_rows($konek) > 0 ) {
		header('location:users');
	}
	else {
		echo "<script>alert('Delete failed');</script>";
		header('location:users');
	}

?>