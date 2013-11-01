<?php
		include 'database.php';
		// Capture any variables that were sent in...
		$category = $_POST['category'];
		$team = $_POST['team'];
		$size = $_POST['size'];
		$qty = $_POST['qty'];
		
		print "You have chosen to purchase: ".$qty." ".$size." ".$team." ".$category."(s)"."\n";
		
		print "would you like to Check-out or would you like to continue shopping?";
		?><br>
		
		<input type = "submit" name = "submit" value = "Continue Shopping"/><tab>
		<input type = "submit" name = "submit" value = "Checkout"/><br>
		
