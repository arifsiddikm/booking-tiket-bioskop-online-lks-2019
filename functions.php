<?php
require 'konek.php';
//biar select data menjadi lebih mudah
function query($query) {
	global $konek;
	$result = mysqli_query($konek, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
// search data article
function carifilm($keyword) {
	$query = "SELECT * FROM film WHERE judul LIKE '%$keyword%'";
	return query($query);
}

function uplodevideo() {
	$namafile = $_FILES['video']['name'];
	$error = $_FILES['video']['error'];
	$tmpName = $_FILES['video']['error'];
	if($error === 4) {
		echo "<script>alert('tidak ada video yang dipilih');</script>";
		return false;
	}
	//cek ekstensi
	$ekstensivalid = ['mp4','3gp','3gpp','webm'];
	$ekstensifile = explode('.', $namafile);
	$ekstensifile = strtolower(end($ekstensifile));
	if(!in_array($ekstensifile, $ekstensivalid)) {
		echo "<script>alert('yang ada uplode bukan video');</script>";
		return false;
	}
	//uplode
	move_uploaded_file($tmpName, "bahan/trailer/".$namafile);
	return $namafile;
}

?>