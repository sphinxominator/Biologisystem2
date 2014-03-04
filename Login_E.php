<?php
class Login {
	public $username, $password, $user;
	public $loggedin;
	
	public static function login($username, $password) {
		if (validateLogin($username, $password)) {
			$session_id = session_id();
			$qry = "UPDATE users SET sessionid=" . $session_id . " WHERE username='" . $username . "'";
			mysql_query($qry);
			$_SESSION['id'] = $session_id;
			$loggedin = true;
			header('Location: XXX');
		} else {
			echo "Exception: Login failed!";
			header('Location: XXX');
		}
	}
	
	public static function logout() {
		$qry = "UPDATE users SET sessionid=0 WHERE username='" . $username . "'";
		mysql_query($qry);
	}
	
	/*public static function hashPassword($password) {
		//HASH IT
		return md5($password . 'a}{!@#' . $this->username);
	}
	
	public static function authenticate($password) {
		return $this->hashPassword($password) == $this->password;
	}*/
	
	public static function validateLogin() {
		//Viktors script
	}
}
?>