var app = angular.module('companyApp', []);
app.controller('dataController', function($scope, $http) {

  
    //update data
    this.tab = 2;
    this.selectTab = function(setTab,setId,setNama,setDeskripsi,setAlamat,setContact,setEmail){
       this.tab = setTab;

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
        });
        //selectTab(2);

    };


	// get data
    $http.get('module/getData.php').success(function(data){
		$scope.records = data;
	});

	//show form input data
    $scope.myadd = true;
    $scope.toggle = function() {
        $scope.myadd = !$scope.myadd;
    };

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