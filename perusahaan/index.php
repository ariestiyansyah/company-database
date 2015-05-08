<?php
	if(isset($_POST['username'])){
		session_start();
		include_once 'module/login/userclass.php';
		$user = new User();
		$result=$user->login($_POST['username'],$_POST['password']);
		if($result){
			//login success
			header("location:home.php");
		}
		else{
			//login failed
			echo '<p class="col-md-4" style="color:#fff; text-align:center; color: #f00;text-align: center;position: relative;top: 458px;left: 450px; border:solid 1px #f00;padding:5px;">Wrong username or password.</p>';
		}
	}
?>

<!DOCTYPE html>
<html ng-app="AlamatPerusahaan">
<head>
	<meta charset="UTF-8">
	<title>Company Address Application</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style2.css">
	<link rel="stylesheet" type="text/css" href="assets/css/cssfamilyfont.css">

	<script src="assets/angular.min.js"></script>
	<script src="script/app.js"></script>
</head>

<body id="log">
	<header>
		
	</header>
	<div class="container">
		<h1 id="title-log">Welcome to Our Company Address Application</h1>
		<h4 id="title-form">Please, login first</h4>
		<div class="col-md-4 col-md-offset-4 col-login">
			<form action="index.php" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="username" required placeholder="Enter Username">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" required placeholder="Enter Passsword">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary btn-block" value="LOGIN">
				</div>
			</form>
		</div>
	</div>
	<footer>
		
	</footer>
<!-- script -->
	
</body>
</html>