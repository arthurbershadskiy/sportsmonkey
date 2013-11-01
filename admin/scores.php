<?php include 'header.php'; ?>
<div class="top-bar"> <a href="new_score.php" class="button">ADD NEW</a>
        <h1>Scores</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="scores.php">Scores</a>
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
            <th class="first">GameID</th>
            <th>SportID</th>
            <th>Home Team</th>
            <th>Away Team</th>
            <th>Date</th>
            <th>Home Team Score</th>
            <th>Away Team Score</th>
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
		$query = "SELECT * FROM scores ORDER BY GameID LIMIT ".$start.", ".$end."";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	
			while ($db_fields = mysql_fetch_assoc($result))  {
				print "<tr><td>" . $db_fields['GameID'] .
          		  " </td><td>" .  $db_fields['SportID'] .
				  " </td><td>" . $db_fields['TeamID'] . 
				  " </td><td>" . $db_fields['OpponentTeamID'] . 
				  " </td><td>" . $db_fields['day'] . 
				  " </td><td>" . $db_fields['HomeTeamScore'] .
				  " </td><td>" . $db_fields['AwayTeamScore'] .									  
				  " </td><td><a href='edit_score.php?action=edit&GameID=".$db_fields['GameID']."'><img src='img/edit-icon.gif' width='16' height='16' alt='edit' /></a>". 	 				
				  " </td><td><a href='scores.php?pid=".$page."&action=delete&GameID=".$db_fields['GameID']."'><img src='img/hr.gif' width='16' height='16' alt='delete' /></a>".  				  
				  " </td></tr>";
				  
		}
	}
	else
	print "Database not found";	
	
	if(($_GET['action'] == 'delete') && isset($_GET['GameID'])) { // if delete was requested AND a username is present... 

	$sql = mysql_query("DELETE FROM scores WHERE GameID = '".$_GET['GameID']."'"); 

		if($sql) { 
	
		echo 'Record deleted!'; 
		echo "<script> window.location.assign('scores.php?pid=".$_GET['pid']."'); </script>";

		} 

	} 	
?>
</table>
<?php $fquery = "SELECT * FROM scores ORDER BY GameID ";
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
			<option value='scores.php?pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
			<?php 
			for ($count; $count < mysql_num_rows($fresult); $count++) { 
				if ($count % 10 == 0) {
					$pages++; ?>
            		<option value='scores.php?pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
				<?php }
          	 } ?>
          </select>
        	</div>
      
      </div>
      
	</div>
<?php mysql_close($conn); ?>
<?php include 'footer.php'; ?>