<?php
		include 'database.php';
		// Capture any variables that were sent in...
		$firstname = $_POST['firstname'] ;
		$lastname = $_POST['lastname'] ;
		$password = md5($_POST['password']);
		$userRole = $_POST['userRole'] ;
		$username = $_POST['username'] ;
		$email = $_POST['email'] ;
		$bio = $_POST['bio'];
		$sport = $_POST['sport'];
		$team = $_POST['team'];
		$player = $_POST['player'];

			
			$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
			$db_found = mysql_select_db(MYSQL_DB);

			if ($db_found)  {		
				$query = "UPDATE users SET 
				firstname='". $firstname ."',
				lastname='". $lastname ."',
				email='". $email ."',
				bio='". $bio ."',
				userRole='". $userRole ."',
				sport='". $sport ."',
				team='". $team ."',
				player='". $player ."'
				WHERE username='". $username ."'";
				$result = mysql_query($query) or die('Query failed: '.mysql_error());	
				print "<h3> There were " . mysql_affected_rows() . " affected rows after the last update operation </h3>";
			} else {
				print "Database not found";	
			}

			mysql_close($conn);
		
		echo "<script> window.location.assign('users.php'); </script>"
?>