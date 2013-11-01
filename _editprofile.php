<form id=userform action="_update.php" method="post">
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
			print "<input id=tblemail name=email type=email value=". $row['email']." required>";
			print "</li><li>";
			print "<label for=tblname>Gender</label>";
			print $row['gender'];
			print "</li><li>";
			print "<label for=tblbio>Bio</label>";
			print "<textarea cols='40' rows='10' name='bio'>". $row['bio'] ."</textarea>";
			print "</li><ol>";
			print "</fieldset>";
			
			print "<fieldset>";
			print "<legend>User Info</legend>";
			print "<ol><li>";
			print "<label for=tblsport>Favorite Sport</label>";
			?> 
            <fieldset>
            	<ol>
                    <li>
                        <input id=basketball name="sport" type=radio value=Basketball <?php echo ($row['sport']=='Basketball')?'checked':'' ?>>
                        <label for=basketball>Basketball</label>
                    </li>
                    
                    <li>
                        <input id=football name="sport" type=radio value=Football <?php echo ($row['sport']=='Football')?'checked':'' ?>>
                        <label for=football>Football</label>
                    </li>

                    <li>
                        <input id=hockey name="sport" type=radio value=Hockey <?php echo ($row['sport']=='Hockey')?'checked':'' ?>>
                        <label for=hockey>Hockey</label>
                    </li>

                    <li>
                        <input id=baseball name="sport" type=radio value=Baseball <?php echo ($row['sport']=='Baseball')?'checked':'' ?>>
                        <label for=baseball>Baseball</label>
                    </li>

                    <li>
                        <input id=golf name="sport" type=radio value=Soccer <?php echo ($row['sport']=='Soccer')?'checked':'' ?>>
                        <label for=soccer>Soccer</label>
                    </li>

                </ol>
               </fieldset>
                <?php
			print "</li><li>";
			print "<label for=tblteam>Favorite Team</label>";
			print "<input id=tblsports name=team type=text value='".$row['team']."'>";
			print "</li><li>";
			print "<label for=tblplayer>Favorite Player</label>";
			print "<input id=tblplayer name=player type=text value='".$row['player']."'>";
			print "</li></ol>";
			print "</fieldset>";
		}
		else {
			print "Invalid";
		}
		

	mysql_close($conn);
?>
<input type="submit" name="submit" value="Update" />
</form>
