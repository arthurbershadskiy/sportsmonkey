<?php 
$scoreSport = $favoriteSport;

if (isset($_GET['SportID'])){
	$scoreSport = $_GET['SportID'];
}
?>

<div class="select" style="float:right"> <strong>Sort By: </strong>
          <select onChange="window.location=this.value;">
            <option value="scores.php?SportID=All" <?php echo ($scoreSport=='All')?'selected':'' ?>>All Sports</option>
            <option value="scores.php?SportID=Basketball" <?php echo ($scoreSport=='Basketball')?'selected':'' ?>>Basketball</option>
            <option value="scores.php?SportID=Football" <?php echo ($scoreSport=='Football')?'selected':'' ?>>Football</option>
            <option value="scores.php?SportID=Hockey" <?php echo ($scoreSport=='Hockey')?'selected':'' ?>>Hockey</option>
            <option value="scores.php?SportID=Baseball" <?php echo ($scoreSport=='Baseball')?'selected':'' ?>>Baseball</option>
            <option value="scores.php?SportID=Soccer" <?php echo ($scoreSport=='Soccer')?'selected':'' ?>>Soccer</option>
 
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
		if ($loggedin == 'yes' && $scoreSport != 'All'){	
			$query = "SELECT * FROM scores WHERE SportID='". $scoreSport ."' ORDER BY SportID, day DESC LIMIT ".$start.", ".$end."";
		}
		
		else if (!isset($_GET['SportID']) || $scoreSport == 'All'){
		$query = "SELECT * FROM scores ORDER BY day DESC LIMIT ".$start.", ".$end."";
		}
	
		else if (isset($_GET['SportID'])){
		$query = "SELECT * FROM scores WHERE SportID='". $scoreSport ."' ORDER BY SportID, day DESC LIMIT ".$start.", ".$end."";
		}		
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
if ( $scoreSport == 'All' ){
	$fquery = "SELECT * FROM scores";
}
else if ( !isset($_GET['SportID'])  && $loggedin == 'no') {
	$fquery = "SELECT * FROM scores";
}
else if ( isset($_GET['SportID']) || $scoreSport != 'All') {
	$fquery = "SELECT * FROM scores WHERE GameID='". $newsSport ."'";
}
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
			<option value='scores.php?<?php echo (isset($_GET['SportID']))?'SportID='.$scoreSport.'&':'' ?>pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
			<?php 
			for ($count; $count < mysql_num_rows($fresult); $count++) { 
				if ($count % 10 == 0) {
					$pages++; ?>
            		<option value='scores.php?<?php echo (isset($_GET['SportID']))?'SportID='.$scoreSport.'&':'' ?>pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
				<?php }
          	 } ?>
          </select>
          </div>


<?php mysql_close($conn); ?>
