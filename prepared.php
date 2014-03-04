<?
require('password.php');

/*class login{
	public function valipass($username, $password) {
		$succes = false;
		
	   $mysqli = new mysqli('biologi.datx.dk', 'c1biologi', '2012apples!','c1biologi' );

	   if(mysqli_connect_errno()) {
		  echo "Connection Failed: " . mysqli_connect_errno();
		  exit();
	   }
		if($stmt = $mysqli->prepare("SELECT username FROM users WHERE username = ? AND password = ?"))
		{
			$stmt->bind_param("ss", $username, $password);
			
			$stmt->execute();
			
			$stmt->bind_result($returnedName);
			
			$stmt->fetch();
			
			if($returnedName !== null)
			{
				$succes = true;
			}
			
			$stmt->close();
		}
		$mysqli->close();
		
		return $succes;
	}
}

$curSes = new login();

echo $curSes->valipass("shamal","iamverycurly");*/

$timeTarget = 1; 

$options = array(
    'cost' => 9,
);
echo password_hash("test", PASSWORD_DEFAULT, $options);

?>






























