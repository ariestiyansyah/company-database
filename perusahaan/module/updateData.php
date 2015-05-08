<?php
	require_once 'db.php';

	if(isset($_GET['id'])){
		$dataid = $_GET['id'];
		$nama = $_GET['nama'];
		$deskripsi = $_GET['deskripsi'];
		$alamat = $_GET['alamat'];
		$telepon = $_GET['telepon'];
		$email = $_GET['email'];

		$query="UPDATE company SET nama='$nama',deskripsi= '$deskripsi', alamat='$alamat', contact='$telepon', email='$email' WHERE id_company='$dataid'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$result = $mysqli->affected_rows;

		echo $json_response = json_encode($result);

	}


?>