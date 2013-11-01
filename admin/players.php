<?php include 'header.php'; ?>
<div class="top-bar"> <a href="new_player.php" class="button">ADD NEW</a>
        <h1>Players</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="players.php">Players</a>
        </div>
      </div>
      <br />
      <div class="select-bar">
        <label>
        <input type="text" name="textfield" />
        </label>
        <label>
        <input type="submit" name="Submit" value="Search" />
        </label>
      </div>
      
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
      <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first">First Name</th>
            <th>Last Name</th>
            <th>Team Name</th>
            <th>Sport</th>
            <th>Player Position</th>
            <th>Player Nickname</th>
            <th>Player Status</th>
            <th>Edit</th>
            <th class="last">Delete</th>
          </tr>
          
          <?php	
	  
	  if ( isset($_GET['pid']) ) {
		  $page = $_GET['pid'];
	  }
	  else {
	  	$page = 1;
	  }
	  
	  if ( $page == 1 ) {
		  $start = 0;
	  }
	  if ( $page >= 2 ){
		  $start = ($page*10)-10; 
	  }
	  
	  $end = 10;
	  
	  $conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	  $db_found = mysql_select_db(MYSQL_DB);
	
	if ($db_found)  {		
		$query = "SELECT * FROM players, teams WHERE players.TeamID = teams.TeamID ORDER BY PlayerID LIMIT ".$start.", ".$end."";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	
		while ($db_fields = mysql_fetch_assoc($result))  {
			print "<tr><td class='first style1'>" . $db_fields['FirstName'] . 
				  " </td><td>" . $db_fields['LastName'] . 
				  " </td><td>" . $db_fields['TeamName'] .
				  " </td><td>" . $db_fields['SportID'] . 
				  " </td><td>" . $db_fields['PlayerPosition'] .
				  " </td><td>" . $db_fields['PlayerNickname'] .
				  " </td><td>" . $db_fields['PlayerStatus'] . 	 				  
				  " </td><td><a href='edit_player.php?action=edit&PlayerID=".$db_fields['PlayerID']."&TeamID=".$db_fields['TeamID']."&SportID=".$db_fields['SportID']."'><img src='img/edit-icon.gif' width='16' height='16' alt='edit' /></a>". 	 				
				  " </td><td class='last'><a href='players.php?pid=".$page."&action=delete&PlayerID=".$db_fields['PlayerID']."'><img src='img/hr.gif' width='16' height='16' alt='delete' /></a>".  				
				  " </td></tr>";
				  
		}

	}
	else
	print "Database not found";	
	
	if(($_GET['action'] == 'delete') && isset($_GET['PlayerID'])) { // if delete was requested AND a username is present... 

	$sql = mysql_query("DELETE FROM players WHERE PlayerID = '".$_GET['PlayerID']."'"); 

		if($sql) { 
	
		echo 'Record deleted!'; 
		echo "<script> window.location.assign('players.php?pid=".$_GET['pid']."'); </script>";

		} 

	} 
      
?>
</table>
<?php $fquery = "SELECT * FROM players ORDER BY PlayerID ";
$fresult = mysql_query($fquery) or die('Query failed: '.mysql_error());	
if ( mysql_num_rows($result) == 0 && basename($_SERVER['PHP_SELF'], ".php") != "players") {
	echo "<script> window.location.assign('players.php'); </script>";
}
		?>

		<div class="select"> <strong>Other Pages: </strong>
          <select onChange="window.location=this.value;">
          	<?php 
			$count = 1;
			$pages = 1; ?>
			<option value='players.php?pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
			<?php 
			for ($count; $count < mysql_num_rows($fresult); $count++) { 
				if ($count % 10 == 0) {
					$pages++; ?>
            		<option value='players.php?pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
				<?php }
          	 } ?>
          </select>
        	</div>
		</div>
	</div>
    
<?php mysql_close($conn); ?>
    
<?php include 'footer.php'; ?>