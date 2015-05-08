<?php
	require_once 'db.php';


	if(isset($_GET['nama'])){

		$nama = $_GET['nama'];
		$deskripsi = $_GET['deskripsi'];
		$alamat = $_GET['alamat'];
		$telepon = $_GET['telepon'];
		$email = $_GET['email'];

		$query = "INSERT INTO company(nama,deskripsi,alamat,contact,email) VALUES('$nama','$deskripsi','$alamat','$telepon','$email')";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$result = $mysqli->affected_rows;

		echo $json_response = json_encode($result);
	}
?>