<?php
		include 'database.php';
		// Capture any variables that were sent in...

		$TeamName = $_POST['TeamName'] ;
		$SportID = $_POST['SportID'] ;
		$TeamConference = $_POST['TeamConference'] ;
		$TeamCity = $_POST['TeamCity'] ;
		$TeamArena = $_POST['TeamArena'] ;
		$TeamLogo = $_POST['TeamLogo'] ;
		
		$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
		$db_found = mysql_select_db(MYSQL_DB);

			if ($db_found)  {		
			    $query = "INSERT INTO teams ( TeamName, SportID, TeamConference, TeamCity, TeamArena, TeamLogo) VALUES('"
							. $TeamName .
							"','" 
							. $SportID .
							"','"
							. $TeamConference .
							"','"
							. $TeamCity .
							"','"
							. $TeamArena .
							"','"
							. $TeamLogo . 
							"')";
				$result = mysql_query($query) or die('Query failed: '.mysql_error());	
				print "<h3> There were " . mysql_affected_rows() . " affected rows after the last update operation </h3>";
			} else {
				print "Database not found";	
			}

			mysql_close($conn);
		
		echo "<script> window.location.assign('teams.php'); </script>"
?>