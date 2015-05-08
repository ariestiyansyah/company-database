<?php
	session_start();
	include_once 'module/login/userclass.php';
	$user = new User();
	if (!$user->get_session()){
	       header("location:index.php");
	    }
		
	if(isset($_POST['logout'])){
		$user->user_logout();
	     header("location:index.php");
		}

?>
<!DOCTYPE html>
<html ng-app="companyApp">
<head>
	<meta charset="UTF-8">
	<title>Home</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style2.css">
	<link rel="stylesheet" type="text/css" href="assets/css/cssfamilyfont.css">
	<script src="assets/angular.min.js"></script>
	<script src="script/app.js"></script>
</head>
<body ng-controller="dataController as dat">
	<header class="navbar  navbar-default" role="navigation" id="header">
		<!-- <nav class="navbar  navbar-default" role="navigation"> -->
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <a class="navbar-brand" href="index.php"><img src="assets/images/administrator.png"  alt="holiday crown" height="50" width="50" id="admin"></a>
		    </div><!-- end  navbar-header-->
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse navbar-left" id="title-hello">
		    	<h5 >Hello, <?php echo $_SESSION['username']; ?></h5>
		    </div><!-- end collapse navbar-collapse navbar-left -->
		    <div class="collapse navbar-collapse navbar-right" >
		    	<form action="home.php" method="post">
		    		<input type="hidden" name="logout" value="true"/>
					<button type="submit" id="logout"  class="btn btn-warning">Log Out</button>
		    	</form>
		    </div><!-- end collapse navbar-collapse navbar-right-->
		  </div><!-- container -->
		<!-- </nav> -->
	</header>

	<div class="container" >
		<button class="btn btn-primary" ng-click="toggle()" >
			<i class="glyphicon  glyphicon-plus"></i> &nbsp;Add Data
		</button>
		<div ng-hide="myadd">
		<h3 id="title-add">Add New Company</h3>
		<div class="col-md-12" id="addform" >
			<form class="form-horizontal" id="add" >
				<div class="form-group">
					<label class="col-sm-2 control-label" id="label-add">Nama Perusahaan</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" ng-model="inputNama">
					</div>
				</div><!-- end form-group -->
				<div class="form-group">
					<label class="col-sm-2 control-label" id="label-add">Deskripsi</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="textarea" ng-model="inputDeskripsi"></textarea>
					</div>
				</div><!-- end form-group -->
				<div class="form-group">
					<label class="col-sm-2 control-label" id="label-add">Alamat</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="textarea" ng-model="inputAlamat"></textarea>
					</div>
				</div><!-- end form-group -->
				<div class="form-group">
					<label class="col-sm-2 control-label" id="label-add">Telepon</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" ng-model="inputTelepon">
					</div>
				</div><!-- end form-group -->
				<div class="form-group">
					<label class="col-sm-2 control-label" id="label-add">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" ng-model="inputEmail">
					</div>
				</div><!-- end form-group -->
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary btn-block" ng-click="addData(inputNama,inputDeskripsi,inputAlamat,inputTelepon,inputEmail)">Add Data</button>
						
					</div>
				</div><!-- end form-group -->
			</form>
		</div><!-- end col-md-12 -->
		</div>
		<div class="col-md-12" id="retrievelagi"  >
				<div class="col-md-6" id="title-list"><h3><span class="glyphicon glyphicon-th-list"></span>&nbsp;List Company</h3></div>
				<div class="col-md-6" id="list">
					
					<ul id="data">
						<li ng-repeat="record in records"> 
							<img src="assets/images/company_building.png" class="img-responsive" alt="Responsive image" width="50" height="50">
							<h5>{{record.nama}}</h5>
							<form id="button-edit">
								<a href="" class="btn btn-info" id="details" ng-click="dat.selectTab(2,record.id_company,record.nama,record.deskripsi,record.alamat,record.contact,record.email)">
									<span class="glyphicon glyphicon-eye-open"></span>
								</a>
								<button type="submit" class="btn btn-warning" ng-click="dat.selectTab(1,record.id_company,record.nama,record.deskripsi,record.alamat,record.contact,record.email)" >
									<span class="glyphicon glyphicon-pencil" ></span>
								</button>
								<button type="submit" class="btn btn-danger" ng-click="deleteData(record.id_company)">
									<span class="glyphicon glyphicon-trash"></span>
								</button>
							</form>
							
						</li>
					</ul>
				</div><!-- end col-md-6 -->
			
				<!-- untuk update -->
					<div class="col-md-6" ng-show="dat.isSelected(1)" id="updateform">
						<div class="col-md-6" id="title-select"><h3><span class="glyphicon glyphicon-pencil"></span>&nbsp;Update Data</h3></div>
						<form class="form-horizontal" >
							<div class="form-group">
								<label class="col-sm-2 control-label" id="label-add">Nama Perusahaan</label>
								<div class="col-sm-10">
									<input type="hidden"  ng-model="idUp" value="{{idUP}}">
									<input type="text" class="form-control" ng-model="namaUp" value="{{namaUP}}">
								</div>
							</div><!-- end form-group -->
							<div class="form-group" >
								<label class="col-sm-2 control-label" id="label-add">Deskripsi</label>
								<div class="col-sm-10">
									<textarea class="form-control" id="textarea2" ng-model="deskripsiUp" >{{deskripsiUp}}</textarea>
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-sm-2 control-label" id="label-add">Alamat</label>
								<div class="col-sm-10">
									<textarea class="form-control" id="textarea2" ng-model="alamatUp" >{{alamatUp}}</textarea>
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-sm-2 control-label" id="label-add">Telepon</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" ng-model="teleponUp" value="{{teleponUp}}">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label class="col-sm-2 control-label" id="label-add">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" ng-model="emailUp" value="{{emailUp}}">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary btn-block" ng-click="updateData(idUp,namaUp,deskripsiUp,alamatUp,teleponUp,emailUp)" >Save</button>
								</div>
							</div><!-- end form-group -->
						</form><!-- end form update -->
					</div><!-- end col-md-6 -->
					<div class="col-md-6" ng-show="dat.isSelected(2)" id="updateform">
						<div class="col-md-6" id="title-select"><h3><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Details</h3></div>
						<ul id="details">
							<li>
								<h4>Nama</h4><p>{{namaUp}}</p>
							</li>
							<li>
								<h4>Deskripsi</h4><p>{{deskripsiUp}}</p>
							</li>
							<li>
								<h4>Alamat</h4><p>{{alamatUp}}</p>
							</li>
							<li>
								<h4>Telepon</h4><p>{{teleponUp}}</p>
							</li>
							<li>
								<h4>Alamat</h4><p>{{emailUp}}</p>
							</li>
						</ul>
					</div> <!-- end col-md-6 -->
					
			
		</div><!-- end retrieve -->

		

	</div><!-- end container -->
	<footer>
		<div class="container">
				<div class="text-center copyright" style="margin-top:16px;">Copyright © 2015. vashty armila winata</div>
		</div>


	</footer>
<!-- script -->
	
	
</body>
</html>

