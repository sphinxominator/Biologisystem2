<?php
require("password.php");

class Login {
	public $username, $userId;
	public $loggedIn;
	
	private $password = "";
	private $mysqliv;
	
	
	public function __construct($arr)
	{
        $this->mysqliv = new mysqli('biologi.datx.dk', 'c1biologi', '2012apples!','c1biologi' );
		if(isset($arr['username']))
		{
			$this->username = $arr['username'];
			$this->password = $arr['password'];
			self::loginNow();
		}
		else
		{
			if(self::getUserId())
			{				
				$this->loggedIn = true;
                echo $this->userId;
			}
            else
            {
               header("http://biologi.datx.dk/loginfiles/loginpage.php");
            }
		}
	}
	
	public function loginNow() {
	
		 if(mysqli_connect_errno()) 
		 {
		 	 echo "Connection Failed: " . mysqli_connect_errno();
		 	 exit();
		 }
		 
		 if (self::validateLogin()) 
		 {
		 	if(self::setSessionID())
			{
				$this->loggedIn = true;
			}
		 } 
		 else 
		 {
			echo "Exception: Login failed!";
		 }
	}
	
	public function setSessionId()
	{
		session_start();
		
		if($stmt = $this->mysqliv->prepare("UPDATE users SET sessionid=? WHERE username=?"))
		{
			$stmt->bind_param("ss",session_id(),$this->username);
			
			$stmt->execute();
			
			$stmt->close();	
			
			return true;
		}	
		
		return false;
	}
	
	public function getUserId()
	{
		session_start();
		
		if($stmt = $this->mysqliv->prepare("SELECT userid FROM users WHERE sessionid=?"))
		{
			$stmt->bind_param("s",session_id());
			
			$stmt->execute;
			
			$stmt->bind_result($userid);
			
			$stmt->fetch();
			
			$stmt->close();

            echo $userid;

			if($userid !== "")
			{
				$this->userid = $userid;
				return true;
			}
			else return false;
		}
	
	}
	
	public function logout() {

        if($stmt = $this->mysqliv->prepare("UPDATE users SET sessionid=0 WHERE username=?"))
        {
            $stmt->bind_param("s",$this->username);

            $stmt->execute();

            $stmt->close();
        }
	}
	
	public function validateLogin() {
		$succes = false;
		
		if($stmt = $this->mysqliv->prepare("SELECT password FROM users WHERE username = ?"))
		{
			$stmt->bind_param("s", $this->username);
				
			$stmt->execute();
				
			$stmt->bind_result($returnedPass);
				
			$stmt->fetch();
			
			$options = array(
    '				cost' => 9,
    			);

			if(password_verify($this->password, $returnedPass))
			{
				$succes = true;
			}
				
			$stmt->close();
		}
			
			
		return $succes;
	}
}

$array = array("username" => $_POST['username'], "password" => $_POST['password']);
 
$login = new Login($array);
