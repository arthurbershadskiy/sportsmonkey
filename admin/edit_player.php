<?php include 'header.php'; ?>
      <div class="top-bar">
        <h1>Players</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="players.php">Players</a> / Update Players
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
      
      <?php if(($_GET['action'] == 'edit') && isset($_GET['PlayerID']) && isset($_GET['SportID']) && isset($_GET['TeamID'])) { 
	  
	  $editPlayer = $_GET['PlayerID'];
	  $Sport = $_GET['SportID'];
	  $Team = $_GET['TeamID'];
	  
	  $conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	  $db_found = mysql_select_db(MYSQL_DB);
	  
	  if ($db_found)  {		
		$query = "SELECT * FROM players, teams WHERE PlayerID= '". $editPlayer ."'";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());
		$db_fields = mysql_fetch_assoc($result);
				
		$new_query = "SELECT * FROM teams WHERE SportID ='".$Sport."'";
		$new_result = mysql_query($new_query) or die('Query failed: '.mysql_error());
		
		
      print "<div class='entryForm'>";
        print "<form action='update_player.php' method='post'>";
        print "<input type='hidden' name='PlayerID' value='".$db_fields['PlayerID']."'><br />";
		print "<label>First Name</label>";
        print "<input type='text' name='FirstName' value='".$db_fields['FirstName']."'><br />";
		print "<label>Last Name</label>";
        print "<input type='text' name='LastName' value='".$db_fields['LastName']."'/><br />";
		print "<label>Player Position</label>";
        print "<input type='text' name='PlayerPosition' value='".$db_fields['PlayerPosition']."'/><br />";
		print "<label>Player Nickname</label>";
        print "<input type='text' name='PlayerNickname' value='".$db_fields['PlayerNickname']."'/><br />";
		print "<label>Player Status</label>";
		print "<select name='PlayerStatus'>";
      		print "<optgroup label='Status'>";
            ?>
            <option value='Active' <?php echo ($db_fields['PlayerStatus']=='Active')?'selected':'' ?>>Active</option>
        	<option value='Retired' <?php  echo ($db_fields['PlayerStatus']=='Retired')?'selected':'' ?>>Retired</option>
      		<?php
            print "</optgroup>";
   		print "</select>";
		print "<br />";
		print "<label>Team Name</label>";
        print "<select name='TeamID'>";
      		print "<optgroup label='TeamName'>";
			while($new_db_fields = mysql_fetch_assoc($new_result)){
				print "<option value='".$new_db_fields['TeamID']."' "; ?>
                <?php echo ($new_db_fields['TeamID']==$Team)?'selected':'' ?>
				<?php print ">".$new_db_fields['TeamName']."</option>";
			}
            print "</optgroup>";
   			print "</select>";
			?> 
            
                <?php
		print "<br />";
        print "<input type='submit'>";
        print "</form>";
    print "</div>";
	  }
    
	mysql_close($conn);
	  } ?>
    </div>
    
    
<?php include 'footer.php'; ?>