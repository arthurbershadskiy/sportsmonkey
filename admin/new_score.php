<?php include 'header.php'; ?>
<div class="top-bar">
        <h1>Scores</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="scores.php">Scores</a> / <a href="new_score.php">New Scores</a>
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
      
      <div class="entryForm">
        <form action="process_score.php" method="post">
        SportID:
          <select name="SportID">
            <option value="Basketball">Basketball</option>
            <option value="Football">Football</option>
            <option value="Hockey">Hockey</option>
            <option value="Baseball">Baseball</option>
            <option value="Soccer">Soccer</option>
          </select>
          <br />
          <label>Home Team Name:</label>
    <select name="TeamID">
      <optgroup label="Home TeamName">
      
      <?php 
	  $conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	  $db_found = mysql_select_db(MYSQL_DB);
	  
	  if ($db_found)  {		
		$query = "SELECT TeamName FROM teams ";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	
		while ($db_fields = mysql_fetch_assoc($result))  {
			print "<option value='".$db_fields['TeamName']."'>".$db_fields['TeamName']."</option>";
		}
		
	  }
	  mysql_close($conn);
	  ?>
        
      </optgroup>
    </select>
            <br />
            <label>Away Team Name:</label>
    <select name="OpponentTeamID">
      <optgroup label="Away TeamName">
      
      <?php 
	  $conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	  $db_found = mysql_select_db(MYSQL_DB);
	  
	  if ($db_found)  {		
		$query = "SELECT TeamName FROM teams ";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	
		while ($db_fields = mysql_fetch_assoc($result))  {
			print "<option value='".$db_fields['TeamName']."'>".$db_fields['TeamName']."</option>";
		}
		
	  }
	  mysql_close($conn);
	  ?>
        
      </optgroup>
    </select>
              <br />
              Date of game: <input type="date" name="day" placeholder="2000-01-01">
                <br />
                <input type="number" name="HomeTeamScore" placeholder="Home Team Score">
                  <br />
                  <input type="number" name="AwayTeamScore" placeholder="Away Team Score">
                    <br />
                    <input type="submit">
        </form>
    </div>
    </div>
    
<?php include 'footer.php'; ?>