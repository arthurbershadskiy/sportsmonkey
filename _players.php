<?php if ( $_GET['team'] == NULL && basename($_SERVER['PHP_SELF']) == "players.php") { // Checks to see if its on main page or a team page

$playerSport = $favoriteSport;

if (isset($_GET['SportID'])){
	$playerSport = $_GET['SportID'];
}
?>

<div class="select" style="float:right"> <strong>Sort By: </strong>
          <select onChange="window.location=this.value;">
            <option value="players.php?SportID=All" <?php echo ($playerSport=='All')?'selected':'' ?>>All Sports</option>
            <option value="players.php?SportID=Basketball" <?php echo ($playerSport=='Basketball')?'selected':'' ?>>Basketball</option>
            <option value="players.php?SportID=Football" <?php echo ($playerSport=='Football')?'selected':'' ?>>Football</option>
            <option value="players.php?SportID=Hockey" <?php echo ($playerSport=='Hockey')?'selected':'' ?>>Hockey</option>
            <option value="players.php?SportID=Baseball" <?php echo ($playerSport=='Baseball')?'selected':'' ?>>Baseball</option>
            <option value="players.php?SportID=Soccer" <?php echo ($playerSport=='Soccer')?'selected':'' ?>>Soccer</option>
 
          </select>
          </div>
		  
          <br />
          <br />
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
		if ($loggedin == 'yes' && $playerSport != 'All'){	
			$query = "SELECT * FROM teams WHERE SportID='". $playerSport ."' ORDER BY SportID, TeamName ASC LIMIT ".$start.", ".$end."";
		}
		
		else if (!isset($_GET['SportID']) || $playerSport == 'All'){
		$query = "SELECT * FROM teams ORDER BY SportID ASC LIMIT ".$start.", ".$end."";
		}
	
		else if (isset($_GET['SportID'])){
		$query = "SELECT * FROM teams WHERE SportID='". $playerSport ."' ORDER BY SportID, TeamName ASC LIMIT ".$start.", ".$end."";
		}		
				$result = mysql_query($query) or die('Query failed: '.mysql_error());	
				
				while ($db_fields = mysql_fetch_assoc($result))  {
					
					print "<div class='scoreTable'>";
					print "<img style='float:left;width:72px;height:72px;' src='".$db_fields['TeamLogo']."'/>";
					
					print "<div style='width:550px; float:right; margin-top:15px;'>";
					print "<a href='players.php?SportID={$playerSport}&action=display&team={$db_fields['TeamID']}'>{$db_fields['TeamCity']} {$db_fields['TeamName']}</a>";
					
					print "</div>";
					
					print "<div style='float:right'>";
					print $db_fields['SportID'];
					print "</div>";
					
					print "</div>";
					
					print "<br />";
					
				}
		}
		
		else
			print "Database not found";		

?>

<?php 
if ( $playerSport == 'All' ){
	$fquery = "SELECT * FROM teams";
}
else if ( !isset($_GET['SportID'])  && $loggedin == 'no') {
	$fquery = "SELECT * FROM teams";
}
else if ( isset($_GET['SportID']) || $playerSport != 'All') {
	$fquery = "SELECT * FROM teams WHERE TeamID='". $playerSport ."'";
}
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
			<option value='players.php?<?php echo (isset($_GET['SportID']))?'SportID='.$playerSport.'&':'' ?>pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
			<?php 
			for ($count; $count < mysql_num_rows($fresult); $count++) { 
				if ($count % 10 == 0) {
					$pages++; ?>
            		<option value='players.php?<?php echo (isset($_GET['SportID']))?'SportID='.$playerSport.'&':'' ?>pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
				<?php }
          	 } ?>
          </select>
          </div>

<?php }
if($_GET['team'] != NULL) { 
		$team = $_GET['team'];
		$query = "SELECT * FROM players WHERE TeamID = '".$team."' and PlayerStatus = 'Active' ORDER BY PlayerID ASC"; 
		$result = mysql_query($query) or die('Query failed: '.mysql_error());
		
		$tquery = "SELECT TeamLogo FROM teams WHERE TeamID = {$team}";
		$tresult =  mysql_query($tquery) or die('Query failed: '.mysql_error());
		$row = mysql_fetch_assoc($tresult);
		
		print "<div style='width:200px;position:relative;left:230px;'>";
		print "<img style='width:200px;height:150px;' src='".$row['TeamLogo']."'/>";
		print "</div><br />";
		
		print "<div id='scrollwide-players'>";
		while($db_fields = mysql_fetch_assoc($result)) { 
		print "<div class='scoreTable' style='height:50px'>";
					
					print "<div style='width:500px; float:left; margin-top:15px;'>";
					print $db_fields['FirstName'];
					print " ";
					print $db_fields['LastName'];
					print "<span style='float:right'>";
					print $db_fields['PlayerPosition'];
					print "</span>";
					print "</div>";
					
					
					
					print "<div style='float:right'>";
					print $db_fields['PlayerNickname'];
					print "</div>";
					
					print "</div>";
					
					print "<br />";

		} 
	print "</div>";
	}   
?>  
<?php mysql_close($conn); ?>
