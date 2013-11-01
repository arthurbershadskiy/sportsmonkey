<?php
		include 'database.php';
		// Capture any variables that were sent in...
		$NewsID = $_POST['NewsID'] ;
		$category = $_POST['SportID'] ;
		$image = $_POST['image'] ;
		$title = $_POST['title'] ;
		$body = $_POST['body'] ;
		$excerpt = $_POST['excerpt'] ;
		

			
			$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
			$db_found = mysql_select_db(MYSQL_DB);

			if ($db_found)  {		
				$query = "UPDATE news SET 
				NewsID='". $NewsID ."',
				SportID='". $category ."',
				image='". $image ."',
				title='". str_replace("'","",$title) ."',
				excerpt='".mysql_real_escape_string($excerpt) ."',
				body='". mysql_real_escape_string($body) ."'
				WHERE NewsID='". $NewsID ."'";
				$result = mysql_query($query) or die('Query failed: '.mysql_error());	
				print "<h3> There were " . mysql_affected_rows() . " affected rows after the last update operation </h3>";
			} else {
				print "Database not found";	
			}

			mysql_close($conn);
		
		echo "<script> window.location.assign('news.php'); </script>"
?>