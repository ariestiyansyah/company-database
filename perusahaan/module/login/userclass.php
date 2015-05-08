<?php 
	include "db_config.php";

	class User{
		
		public function login($user, $pass){
        	koneksi_buka();
			//$password=md5($pass);
			$sql="SELECT username from admin where username='$user' and password_user='$pass'";
			$result = mysql_query($sql);
        	$data = mysql_fetch_array($result);
        	
	        if ($data) {
	            $_SESSION['login'] = true; 
	            //$_SESSION['id_user'] = $id_user;
				$_SESSION['username'] = $data['username'];
				$_SESSION['password'] = $pass;
	            return true;
	        }
	        else{
			    return false;
			}
			koneksi_tutup();
    	}

    	
	    public function get_session(){    
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	}
?>