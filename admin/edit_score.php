<?php include 'header.php'; ?>
      <div class="top-bar">
        <h1>Scores</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="scores.php">Scores</a> / Update Scores
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
      
      <?php if(($_GET['action'] == 'edit') && isset($_GET['GameID'])) { 
	  
	  $editGame = $_GET['GameID'];
	  
	  $conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	  $db_found = mysql_select_db(MYSQL_DB);
	  
	  if ($db_found)  {		
		$query = "SELECT * FROM scores WHERE GameID= '". $editGame ."'";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());
		$db_fields = mysql_fetch_assoc($result);
		
      
      print "<div class='entryForm'>";
        print "<form action='update_score.php' method='post'>";
		print "<input type='hidden' name='GameID' value='".$db_fields['GameID']."'><br />";
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
		
		$new_query = "SELECT TeamName FROM teams";
		$new_result = mysql_query($new_query) or die('Query failed: '.mysql_error());
		
		print "<label>Home Team Name</label>";
        print "<select name='TeamID'>";
      		print "<optgroup label='Home TeamName'>";
			while($new_db_fields = mysql_fetch_assoc($new_result)){
				print "<option value='".$new_db_fields['TeamName']."' "; ?>
                <?php echo ($new_db_fields['TeamName']==$db_fields['TeamID'])?'selected':'' ?>
				<?php print ">".$new_db_fields['TeamName']."</option>";
			}
            print "</optgroup>";
   			print "</select>";
			 print "<br />";
			 
			 $new_query = "SELECT TeamName FROM teams";
		$new_result = mysql_query($new_query) or die('Query failed: '.mysql_error());
		print "<label>Away Team Name</label>";
        print "<select name='OpponentTeamID'>";
      		print "<optgroup label='Away TeamName'>";
			while($new_db_fields = mysql_fetch_assoc($new_result)){
				print "<option value='".$new_db_fields['TeamName']."' "; ?>
                <?php echo ($new_db_fields['TeamName']==$db_fields['OpponentTeamID'])?'selected':'' ?>
				<?php print ">".$new_db_fields['TeamName']."</option>";
			}
            print "</optgroup>";
   			print "</select>";
			 
            
		print "<br />";
		print "<label>Day</label>";
        print "<input type='date' name='day' value='".$db_fields['day']."'/><br />";
		print "<label>HomeTeamScore</label>";
        print "<input type='text' name='HomeTeamScore' value='".$db_fields['HomeTeamScore']."'/><br />";
		print "<label>AwayTeamScore</label>";
        print "<input type='text' name='AwayTeamScore' value='".$db_fields['AwayTeamScore']."'/><br />";
   		print "</select>";
        print "<input type='submit'>";
        print "</form>";
    print "</div>";
	  }
    
	mysql_close($conn);
	  } ?>
    </div>
    
    
<?php include 'footer.php'; ?>