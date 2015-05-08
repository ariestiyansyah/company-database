<?php
	require_once 'db.php';

	$query = "select id_company,nama,deskripsi,alamat,contact,email from company order by id_company desc";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$arr = array();
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$arr[] = $row;	
		}
	}

	# JSON-encode the response
	$json_response = json_encode($arr);

	echo $json_response;

?>