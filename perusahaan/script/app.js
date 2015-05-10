var app = angular.module('companyApp', []);
app.controller('dataController', function($scope, $http) {

  
    //update data
    this.selectTab = function(setTab,setId,setNama,setDeskripsi,setAlamat,setContact,setEmail){
       this.tab = setTab;
       $scope.updatesuccess = false;
       $scope.addsuccess = false;

       $scope.idUp=setId;
       $scope.namaUp=setNama;
       $scope.deskripsiUp=setDeskripsi;
       $scope.alamatUp=setAlamat;
       $scope.teleponUp=setContact;
       $scope.emailUp=setEmail;
    };
    this.isSelected = function(checkTab){
      return this.tab === checkTab;
    };
    $scope.updateData = function(setId,setNama,setDeskripsi,setAlamat,setContact,setEmail){
        // var content = setEmail;
        // window.alert(content);
        $http.post("module/updateData.php?id="+setId+"&"+"nama="+setNama+"&"+"deskripsi="+setDeskripsi+"&"+"alamat="+setAlamat+"&"+"telepon="+setContact+"&"+"email="+setEmail).success(function(data){
          $http.post('module/getData.php').success(function(data){
            $scope.records = data;
            
          });
          $scope.updatesuccess = true;
        });
    };


	// get data
    $http.get('module/getData.php').success(function(data){
  		$scope.records = data;
  	});


    //  add data
    $scope.addData = function (inputNama,inputDeskripsi,inputAlamat,inputTelepon,inputEmail) {
	    $http.post("module/addData.php?nama="+inputNama+"&"+"deskripsi="+inputDeskripsi+"&"+"alamat="+inputAlamat+"&"+"telepon="+inputTelepon+"&"+"email="+inputEmail).success(function(data){
	        $http.post('module/getData.php').success(function(data){
    				$scope.records = data;
    			});
	        $scope.inputNama = "";
    		  $scope.inputDeskripsi = "";
    		  $scope.inputAlamat = "";
    		  $scope.inputTelepon = "";
    		  $scope.inputEmail = "";

          $scope.addsuccess = true;
	    });

  	};

  	//delete data
  	$scope.deleteData = function (id) {
  		$http.post("module/deleteData.php?dataid="+id).success(function(data){
  			$http.post('module/getData.php').success(function(data){
  				$scope.records = data;
  			});
  		});
  	};

});