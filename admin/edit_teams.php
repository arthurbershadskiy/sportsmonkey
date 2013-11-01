<?php include 'header.php'; ?>
      <div class="top-bar">
        <h1>Teams</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="teams.php">Teams</a> / Update Teams
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
	  
      <?php if(($_GET['action'] == 'edit') && isset($_GET['TeamID'])) 
	  {
		
		$editTeam = $_GET['TeamID'];
	  
		$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	    $db_found = mysql_select_db(MYSQL_DB);
	  
		if ($db_found)  
		{		
			$query = "SELECT * FROM teams WHERE TeamID= '". $editTeam ."'";
			$result = mysql_query($query) or die('Query failed: '.mysql_error());
			$db_fields = mysql_fetch_assoc($result);
      
			print "<div class='entryForm'>";
			print "<form action='update_teams.php' method='post'>";
				print "<input type='hidden' name='TeamID' value='".$db_fields['TeamID']."' />";
				print "TeamName: <input type='text' name='TeamName' value='".$db_fields['TeamName']."' /><br />";
				print "<label>SportID</label>";
				print "<select name='SportID'>";
        		?>
            		<option value="Basketball" <?php echo ($db_fields['SportID']=='Basketball')?'selected':'' ?>>Basketball</option>
            		<option value="Football" <?php echo ($db_fields['SportID']=='Football')?'selected':'' ?>>Football</option>
            		<option value="Hockey" <?php echo ($db_fields['SportID']=='Hockey')?'selected':'' ?>>Hockey</option>
            		<option value="Baseball" <?php echo ($db_fields['SportID']=='Baseball')?'selected':'' ?>>Baseball</option>
            		<option value="Soccer" <?php echo ($db_fields['SportID']=='Soccer')?'selected':'' ?>>Soccer</option>
       			<?php   
       		print "</select><br />";
				print "TeamConfrence: <input type='text' name='TeamConference' value='".$db_fields['TeamConference']."' /><br />";
				print "TeamCity: <input type='text' name='TeamCity' value='".$db_fields['TeamCity']."' /><br />";
				print "TeamArena: <input type='text' name='TeamArena' value='".$db_fields['TeamArena']."' /><br />";
				print "TeamLogo: <input type='text' name='TeamLogo' value='".$db_fields['TeamLogo']."' /><br />";
				print "<input type='submit'>";
			print "</form>";
			print "</div>";
			
		}
	
	
    
	mysql_close($conn);
	  } ?>
    </div>
    
    
<?php include 'footer.php'; ?>