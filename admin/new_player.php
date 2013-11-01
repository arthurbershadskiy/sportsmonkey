<?php include 'header.php'; ?>
<div class="top-bar">
        <h1>Players</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="players.php">Players</a> / <a href="new_player.php">New Player</a>
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
      
      <div class="entryForm">
        <form action="process_player.php" method="post">
        <input type="text" name="FirstName" placeholder="First Name"><br />
        <input type="text" name="LastName" placeholder="Last Name" /><br />
        <input type="text" name="PlayerPosition" placeholder="Position"/><br />
        <input type="text" name="PlayerNickname" placeholder="Nickname"/><br />
        <label>Status:</label>
        <select name="PlayerStatus">
        <optgroup label="Status">
        	<option value="Active">Active</option>
            <option value="Retired">Retired</option>
        </optgroup>
        </select>
        <br />
        <label>Team Name:</label>
    <select name="TeamID">
      <optgroup label="TeamName">
      
      <?php 
	  $conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	  $db_found = mysql_select_db(MYSQL_DB);
	  
	  if ($db_found)  {		
		$query = "SELECT TeamID, TeamName FROM teams ";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	
		while ($db_fields = mysql_fetch_assoc($result))  {
			print "<option value='".$db_fields['TeamID']."'>".$db_fields['TeamName']."</option>";
		}
		
	  }
	  mysql_close($conn);
	  ?>
        
      </optgroup>
    </select>
    <br />
    <br />
        <input type="submit">
        </form>
    </div>
    </div>
    
<?php include 'footer.php'; ?>