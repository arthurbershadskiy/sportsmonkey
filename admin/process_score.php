<?php
		include 'database.php';
		// Capture any variables that were sent in...
		$SportID = $_POST['SportID'] ;
		$TeamID = $_POST['TeamID'] ;
		$OpponentTeamID = $_POST['OpponentTeamID'] ;
		$day = $_POST['day'] ;
		$HomeTeamScore = $_POST['HomeTeamScore'] ;
		$AwayTeamScore = $_POST['AwayTeamScore'] ;

			
			$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
			$db_found = mysql_select_db(MYSQL_DB);

			if ($db_found)  {		
				$query = "INSERT INTO scores (SportID, TeamID, OpponentTeamID, day, HomeTeamScore, AwayTeamScore) VALUES('"
							. $SportID .
							"','" 
							. $TeamID .
							"','"
							. $OpponentTeamID .
							"','"
							. $day .
							"','"
							. $HomeTeamScore .
							"','"
							. $AwayTeamScore . 
							"')";
				$result = mysql_query($query) or die('Query failed: '.mysql_error());	
				print "<h3> There were " . mysql_affected_rows() . " affected rows after the last update operation </h3>";
			} else {
				print "Database not found";	
			}

			mysql_close($conn);
		
		
		echo "<script> window.location.assign('scores.php'); </script>"
?>