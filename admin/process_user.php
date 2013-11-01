<?php
		include 'database.php';
		// Capture any variables that were sent in...
		$firstname = $_POST['firstname'] ;
		$lastname = $_POST['lastname'];
		$password = md5($_POST['password']);
		$username = $_POST['username'] ;
		$gender = $_POST['gender'] ;
		$bio = $_POST['bio'] ;
		$email = $_POST['email'] ;
		$userRole = $_POST['userRole'] ;
		
		$sport = $_POST['sport'] ;
		$team = $_POST['team'] ;
		$player = $_POST['player'];

		// We can't add anything if we don't have at least the primary key!!!
		if ( !empty($_POST['username']) ) {
			
			$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
			$db_found = mysql_select_db(MYSQL_DB);

			if ($db_found)  {		
				$query = "INSERT INTO users (username, password, firstname, lastname, email, gender, bio, sport, team, player, userRole) VALUES ('"
						. $username .
						"','"
						. $password .
						"','"
						. $firstname .
						"','"
						. $lastname .
						"','"
						. $email .
						"','"
						. $gender .
						"','"
						. $bio .
						"','"
						. $sport .
						"','"
						. $team .
						"','"
						. $player .
						"','"
						. $userRole .
						"')";
				$result = mysql_query($query) or die('Query failed: '.mysql_error());	
				print "<h3> There were " . mysql_affected_rows() . " affected rows after the last update operation </h3>";
			} else {
				print "Database not found";	
			}

			mysql_close($conn);
		}
		
		echo "<script> window.location.assign('users.php'); </script>"
?>