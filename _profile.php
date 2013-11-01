<form id=userform action="edit_profile.php" method="post">
    <?php

		$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
		mysql_select_db(MYSQL_DB);

		
		$users_table = MYSQL_USERS_TABLE;
		$query = "SELECT * FROM users WHERE username='$username'";
		$result = mysql_query($query) or die("Query falied: " . mysql_error());

		$row = mysql_fetch_assoc($result);
		
		if( isset($row['username']) ) // valid user login
		{
			print "<fieldset>";	
    		print "<legend>Personal Info</legend>";
			print "<ol><li>";
			print "<label for=tblname>Name</label>";
			print $row['firstname'] . " " . $row['lastname'];
			print "</li><li>";
			print "<label for=tblemail>Email</label>";
			print $row['email'];
			print "</li><li>";
			print "<label for=tblgender>Gender</label>";
			print $row['gender'];
			print "</li><li>";
			print "<label for=tblbio>Bio</label>";
			print $row['bio'];
			print "</li><li>";
			print "<label for=tblrole>Role</label>";
			print $row['userRole'] . " ";
			if ($row['userRole'] == member){
				print "<a href='upgrade_member.php'>Upgrade?</a>";
				}
			print "</li><ol>";
			print "</fieldset>";
			
			
			print "<fieldset>";
			print "<legend>User Info</legend>";
			print "<ol><li>";
			print "<label for=tblsport>Favorite Sport</label>";
			print $row['sport'];
			print "</li><li>";
			print "<label for=tblteam>Favorite Team</label>";
			print $row['team'];
			print "</li><li>";
			print "<label for=tblplayer>Favorite Player</label>";
			print $row['player'];
			print "</li></ol>";
			print "</fieldset>";
		}
		else {
			print "Invalid";
		}
		

	mysql_close($conn);
?>
<input type="submit" name="submit" value="Edit" />
</form>
