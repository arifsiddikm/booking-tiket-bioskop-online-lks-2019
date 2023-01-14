<?php

function uplode() {
	global $label;
	$namaFile = $_FILES['quotes']['name'];
	$error = $_FILES['quotes']['error'];
	$tmpName = $_FILES['quotes']['tmp_name'];
	if($error === 4) {
		echo "<script>alert('tidak ada quotes yang dipilih');</script>";
		return false;
	}
	//cek apakah yang di uplode adalah quotes
	$ekstensiquotesValid = ['jpg','jpeg','png','gif'];
	$ekstensiquotes = explode('.', $namaFile);
	$ekstensiquotes = strtolower(end($ekstensiquotes));
	if(!in_array($ekstensiquotes, $ekstensiquotesValid)) {
		echo "<script>alert('yang anda uplode bukan quotes');</script>";
		return false;
	}
	//uplode 
	move_uploaded_file($tmpName, "quotes/$label/".$namaFile);
	return $namaFile;
}

?>