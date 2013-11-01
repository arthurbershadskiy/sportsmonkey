<?php 
$scoreSport = $favoriteSport;


$team = $_GET['team'];

?>
		  
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
				$query = "SELECT * FROM scores where TeamID='{$team}' or OpponentTeamID='{$team}' ORDER BY GameID DESC";
				$result = mysql_query($query) or die('Query failed: '.mysql_error());	
				while ($db_fields = mysql_fetch_assoc($result))  {
					print "<div class='scoreTable'>";
					print "<table class='scores' style='width:200px;float:left;'>";
					
					print "<tr><td>";
					print $db_fields['TeamID'];
					print "</td><td rowspan='2'>";
					print " Vs. ";
					print "</td><td>";
					print $db_fields['OpponentTeamID'];
					print "</td></tr>";
					
					print "<tr><td>";
					print $db_fields['HomeTeamScore'];
					print "</td><td>";
					print $db_fields['AwayTeamScore'];
					print "</td></tr>";
					print "</table>";
					
					print "<div style='float:right'>";
					print $db_fields['day'];
					print "</div>";					
					
					print "<div style='clear:right'></div>";
					
					print "<div class='sportC'>";
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

 
$fquery = "SELECT * FROM scores WHERE TeamID='{$team}' or OpponentTeamID='{$team}'";
$fresult = mysql_query($fquery) or die('Query failed: '.mysql_error());	
if ( mysql_num_rows($result) == 0 && basename($_SERVER['PHP_SELF'], ".php") != "scores") {
	echo "<script> window.location.assign('scores.php'); </script>";
}
		?>
        

		<div class="select"> <strong>Other Pages: </strong>
          <select onChange="window.location=this.value;">
          	<?php 
			$count = 1;
			$pages = 1; ?>
			<option value='scores.php?team=<?php echo $team ?>&pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
			<?php 
			for ($count; $count < mysql_num_rows($fresult); $count++) { 
				if ($count % 10 == 0) {
					$pages++; ?>
            		<option value='scores.php?team=<?php echo $team ?>&pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
				<?php }
          	 } ?>
          </select>
          </div>


<?php mysql_close($conn); ?>
