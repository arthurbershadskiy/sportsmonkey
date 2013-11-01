<?php 
$teamSport = $favoriteSport;

if (isset($_GET['SportID'])){
	$teamSport = $_GET['SportID'];
}
?>

<div class="select" style="float:right"> <strong>Sort By: </strong>
          <select onChange="window.location=this.value;">
            <option value="teams.php?SportID=All" <?php echo ($teamSport=='All')?'selected':'' ?>>All Sports</option>
            <option value="teams.php?SportID=Basketball" <?php echo ($teamSport=='Basketball')?'selected':'' ?>>Basketball</option>
            <option value="teams.php?SportID=Football" <?php echo ($teamSport=='Football')?'selected':'' ?>>Football</option>
            <option value="teams.php?SportID=Hockey" <?php echo ($teamSport=='Hockey')?'selected':'' ?>>Hockey</option>
            <option value="teams.php?SportID=Baseball" <?php echo ($teamSport=='Baseball')?'selected':'' ?>>Baseball</option>
            <option value="teams.php?SportID=Soccer" <?php echo ($teamSport=='Soccer')?'selected':'' ?>>Soccer</option>
 
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
		if ($loggedin == 'yes' && $teamSport != 'All'){	
			$query = "SELECT * FROM teams WHERE SportID='". $teamSport ."' ORDER BY SportID, TeamName ASC LIMIT ".$start.", ".$end."";
		}
		
		else if (!isset($_GET['SportID']) || $teamSport == 'All'){
		$query = "SELECT * FROM teams ORDER BY TeamName ASC LIMIT ".$start.", ".$end."";
		}
	
		else if (isset($_GET['SportID'])){
		$query = "SELECT * FROM teams WHERE SportID='". $teamSport ."' ORDER BY SportID, TeamName ASC LIMIT ".$start.", ".$end."";
		}		
				$result = mysql_query($query) or die('Query failed: '.mysql_error());	
				
				while ($db_fields = mysql_fetch_assoc($result))  {
					
					print "<div class='scoreTable'>";
					print "<img style='float:left;width:72px;height:72px;' src='".$db_fields['TeamLogo']."'/>";
					print "<table class='scores' style='width:200px;float:left;'>";
					
					print "<tr height='40px'><td>";
					print $db_fields['TeamCity'];
					print "</td><td>";
					print $db_fields['TeamName'];
					print "</td></tr>";
					
					
					print "<tr><td>";
					print "<a href='players.php?SportID={$teamSport}&action=display&team={$db_fields['TeamID']}'>Roster</a>";
					print "</td><td>";
					print "<a href='scores.php?team={$db_fields['TeamName']}'>Scores</a>";
					print "</td></tr>";
					
					
					print "</table>";
					
					
					print "<div style='float:right'>";
					print "<table class='scores' style='width:200px;'>";
					
					print "<tr><td rowspan='2' style='border-right:1px solid white;'>";
					print $db_fields['TeamConference'];
					print "</td></tr>";
					
					print "<tr><td>";
					print $db_fields['SportID'];
					print "</td></tr>";
					
					print "</table>";
					print "</div>";					
					
					print "<div style='clear:right'></div>";
					
					
					print "</div>";
					
					print "<br />";
					
				}
		}
		
		else
			print "Database not found";		

?>

<?php 
if ( $teamSport == 'All' ){
	$fquery = "SELECT * FROM teams";
}
else if ( !isset($_GET['SportID'])  && $loggedin == 'no') {
	$fquery = "SELECT * FROM teams";
}
else if ( isset($_GET['SportID']) || $scoreSport != 'All') {
	$fquery = "SELECT * FROM teams WHERE TeamID='". $teamSport ."'";
}
$fresult = mysql_query($fquery) or die('Query failed: '.mysql_error());	
if ( mysql_num_rows($result) == 0 && basename($_SERVER['PHP_SELF'], ".php") != "teams") {
	echo "<script> window.location.assign('teams.php'); </script>";
}
		?>
        

		<div class="select"> <strong>Other Pages: </strong>
          <select onChange="window.location=this.value;">
          	<?php 
			$count = 1;
			$pages = 1; ?>
			<option value='teams.php?<?php echo (isset($_GET['SportID']))?'SportID='.$teamSport.'&':'' ?>pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
			<?php 
			for ($count; $count < mysql_num_rows($fresult); $count++) { 
				if ($count % 10 == 0) {
					$pages++; ?>
            		<option value='teams.php?<?php echo (isset($_GET['SportID']))?'SportID='.$teamSport.'&':'' ?>pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
				<?php }
          	 } ?>
          </select>
          </div>


<?php mysql_close($conn); ?>
