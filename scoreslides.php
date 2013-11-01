<div id="scrollwide">
<table width="50" height="32" cellpadding="0" cellspacing="0">
<tr>
         <td>
<?php 

	$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	$db_found = mysql_select_db(MYSQL_DB);
	
	if ($db_found)  {	
		if ( $loggedin == 'yes' ){	
			$query = "SELECT * FROM scores WHERE SportID='". $favoriteSport ."' ORDER BY GameID DESC LIMIT 7";
			$result = mysql_query($query) or die('Query failed: '.mysql_error());	
		}
		else {
			$query = "SELECT * FROM scores ORDER BY GameID DESC LIMIT 7";
			$result = mysql_query($query) or die('Query failed: '.mysql_error());	
		}
		
		while ($db_fields = mysql_fetch_assoc($result))  {
			print "<table style='width:101px'>";
				print "<tr><th colspan='2'>". $db_fields['day'] . 
				  " </th></tr><tr><td>" . $db_fields['TeamID'] . 
				  " </td><td>" . $db_fields['OpponentTeamID'] . 
				  " </td></tr><tr><td>" . $db_fields['HomeTeamScore'] .
				  " </td><td>" . $db_fields['AwayTeamScore'] .									  
				  " </td></tr>";
			print "</table>";
			print "</td><td>";
				  
		}
	}
?>
</td>
       </tr>
</table>
</div> 