<?php
require '../konek.php';
require '../session_login.php';
	$id = $_GET["id"];
	mysqli_query($konek, "DELETE FROM film WHERE id = $id");
	if(mysqli_affected_rows($konek) > 0 ) {
		header('location:film');
	}
	else {
		echo "<script>alert('Delete failed');</script>";
		header('location:film');
	}

?>