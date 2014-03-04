<html>
	<head>
		<style>
		<?
		$db=mysql_connect(localhost, 'c1biologi', '2012apples!' );
			mysql_select_db('c1biologi',$db);
			$randisplay = 3;
			$qry="SELECT * FROM reservations WHERE contentlistid='" . $randisplay . "'";
			$foresp = mysql_query($qry);
			
			$c=0;
			while($resdata=mysql_fetch_assoc($foresp)){
				$c++;
				$allres[$c]=$resdata;
			}
			//
			//
			//getting data on the item:
			$qry="SELECT * FROM contentlist WHERE contentlistid='" . $randisplay . "'";
			$foresp = mysql_query($qry);
			$cldata=mysql_fetch_assoc($foresp);
			//
			//
			//moar item data:
			$qry="SELECT * FROM items WHERE itemid='" . $cldata['itemid'] . "'";
			$foresp = mysql_query($qry);
			$itemdata=mysql_fetch_assoc($foresp);
			
			
		$uppad = 25;
		$downpad = 25;
		
		for($a=1;$a<6;$a++){
			$downpad = rand(10, 45); 
			$uppad = $downpad;
		echo"
		#ib" . $a . "
		{
		padding-top:" . $uppad . ";
		padding-bottom:" . $downpad . ";
		padding-right:50px;
		padding-left:50px;
		background-color:blue;
		}
		";
		};
		
		?>
		</style>
		
	</head>
	<body>
	<?
	
	print_r($allres);
	echo "<br>" . $c . "<br>";
	print_r($cldata);
	print_r($itemdata);
	
		echo "
		<table>
			";
			for($b=0;$b<$c;$b++){
				$datetime1 = new DateTime($allres[$c]['starttime']);
				$datetime2 = new DateTime($allres[$c]['endtime']);
				$timediff[$b] = $datetime1-> diff($datetime2);
				$minsb = $timediff[$b],
				3,00,
				echo"
					<tr>
						<td id='ib" . $b . "'><p>name/reserver<br>quantity<br></p></td>
					</tr>
				";
			}
			
			echo"
		</table>
		<br>
		";
		print_r($timediff);
	?>
	</body>
</html>
