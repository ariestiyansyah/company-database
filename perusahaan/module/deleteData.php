<?php
	require_once 'db.php';

	if(isset($_GET['dataid'])){
		$dataid = $_GET['dataid'];

		$query="delete from company where id_company='$dataid'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$result = $mysqli->affected_rows;

		echo $json_response = json_encode($result);

	}


?>