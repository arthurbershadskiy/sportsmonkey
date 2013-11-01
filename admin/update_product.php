<?php
		include 'database.php';
		// Capture any variables that were sent in...
		$itemID = $_POST['itemID'] ;
		$sku = $_POST['sku'];
		$category = $_POST['category'] ;
		$team = $_POST['team'] ;
		$size = $_POST['size'] ;
		$qty = $_POST['qty'] ;
			
	  		$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
			$db_found = mysql_select_db(MYSQL_DB);

			if ($db_found)  {		
				$query = "UPDATE store SET 
				sku='". $sku ."', 
				category='". $category ."',
				team='". $team ."',
				size='". $size ."',
				qty ='". $qty. "' 
				WHERE itemID='". $itemID ."'";
				$result = mysql_query($query) or die('Query failed: '.mysql_error());	
				print "<h3> There were " . mysql_affected_rows() . " affected rows after the last update operation </h3>";
			} else {
				print "Database not found";	
			}

			mysql_close($conn);
		
		echo "<script> window.location.assign('store.php'); </script>"
?>