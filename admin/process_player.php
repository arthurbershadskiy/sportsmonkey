<?php
		include 'database.php';
		// Capture any variables that were sent in...
		$firstname = $_POST['FirstName'] ;
		$lastname = $_POST['LastName'] ;
		$teamname = $_POST['TeamID'] ;
		$playerposition = $_POST['PlayerPosition'] ;
		$playernickname = $_POST['PlayerNickname'] ;
		$playerstatus = $_POST['PlayerStatus'];

			
			$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
			$db_found = mysql_select_db(MYSQL_DB);

			if ($db_found)  {		
				$query = "INSERT INTO players (FirstName, LastName, TeamID, PlayerPosition, PlayerNickname, PlayerStatus) VALUES ('"
						. $firstname .
						"','"
						. $lastname .
						"','"
						. $teamname .
						"','"
						. $playerposition .
						"','"
						. $playernickname .
						"','"
						. $playerstatus .
						"')";
				$result = mysql_query($query) or die('Query failed: '.mysql_error());	
				print "<h3> There were " . mysql_affected_rows() . " affected rows after the last update operation </h3>";
			} else {
				print "Database not found";	

			mysql_close($conn);
		}
		
		echo "<script> window.location.assign('players.php'); </script>"
?>