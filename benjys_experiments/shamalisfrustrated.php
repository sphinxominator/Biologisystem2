<?
	class login {
		public $loggedin=false;
		public $username
		public function ($username,$password){
			
		}
	}
?>

<?
	if(isset($_POST['submit'])){
			//sql stuff
			$db=mysql_connect(localhost, 'c1biologi', '2012apples!' );
			mysql_select_db('c1biologi',$db);
			$qry="SELECT * FROM users WHERE username='" . $_POST['username'] . "'";
			$foresp = mysql_query($qry);
			$loginfo=mysql_fetch_assoc($foresp);
			
			if ($loginfo['password']==$_POST['password']){
				$succes=1;
				session_start();
				$_SESSION['username']=$loginfo['username'];
				
			}		
	}
?>

<html>
	<head>
	</head>
	<body>
		<?
		
		if (isset($_POST['submit'])){
			
			//sql error checking
			print_r($qry);
			echo "<br>";
			print_r($_POST);
			echo "<br>";
			print_r($loginfo);
			echo "<br>";
			
			//session error checking
			print_r($_SESSION);
			
			if ($success==1){
				echo "your login was succesfull. please wait while benji develops the rest of the system"; 
			}
		}else{
		echo "
			<table>
			<form action='loginpage.php' method='post'>
				<tr>
					<td>username:</td>
					<td><input type='text' name='username'></td>
				</tr>
				<tr>
					<td>password:</td>
		       			<td><input type='password' name='password'></td>
				</tr>
				<tr>
					<td><input type='submit' name='submit' value='login'></td>
				</tr>
			</form>
			</table>
		";
		}
		
		
		/*
		$db=mysql_connect(localhost, 'c9benjamin', 'salat9337' );
		mysql_select_db('c9benjamin',$db);
		echo "<h1>welcome to the guestbook</h1><br>";
		$qry="SELECT * FROM guestbook";
		$foresp=mysql_query($qry);
		echo "<table align='center' border=10 borderstyle='ridge' bordercolor='#B4B4B4' bgcolor='black'>";
		echo "<tr>
		*/
		
		?>
	</body>
</html>


