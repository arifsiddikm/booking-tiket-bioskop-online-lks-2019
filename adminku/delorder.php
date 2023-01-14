<?php
require '../konek.php';
require '../session_login.php';
	$id = $_GET["id"];
	mysqli_query($konek, "DELETE FROM pesanan WHERE id = $id");
	if(mysqli_affected_rows($konek) > 0 ) {
		header('location:orders');
	}
	else {
		echo "<script>alert('Delete failed');</script>";
		header('location:orders');
	}

?>