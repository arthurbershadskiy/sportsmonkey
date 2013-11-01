<?php
 		include 'config.php';
		
		// Capture any variables that were sent in...
		$email = $_POST['email'] ;
		$bio = $_POST['bio'] ;
		$sport = $_POST['sport'] ;
		$team = $_POST['team'] ;
		$player = $_POST['player'] ;
		
		$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
		mysql_select_db(MYSQL_DB);
			
		$query = "UPDATE users SET email='$email', bio='$bio', sport='$sport', team='$team', player='$player'  WHERE username='$username'";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());
			
		echo "<script> window.location.assign('profile.php'); </script>";
		
?>