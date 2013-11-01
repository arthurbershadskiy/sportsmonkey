<?php include 'header.php'; ?>
	<div class="top-bar">
        <h1>Sports</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="sports.php">Sports</a>
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
            <th class="first">SportID</th>
            <th>Sport Name</th>
            <th>SportPlayed</th>
            <th>SportLevel</th>
            <th>SportRegion</th>
            <th class="last">SportDescription</th>
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
		$query = "SELECT * FROM sport ORDER BY SportID LIMIT ".$start.", ".$end."";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	
		while ($db_fields = mysql_fetch_assoc($result))  {
			print "<tr><td>" . $db_fields['SportID'] . 
				  " </td><td>" . $db_fields['SportName'] .
				  " </td><td>" . $db_fields['SportPlayed'] .
				  " </td><td>" . $db_fields['SportLevel'] . 	 				  
				  " </td><td>" . $db_fields['SportRegion'] . 	 				  
				  " </td><td>" . $db_fields['SportDescription'] . 	 				  
				  " </td></tr>";
				  
		}
	}
	else
	print "Database not found";	
	
	

?>
</table>
<?php $fquery = "SELECT * FROM sport ORDER BY SportID ";
$fresult = mysql_query($fquery) or die('Query failed: '.mysql_error());	
if ( mysql_num_rows($result) == 0 && basename($_SERVER['PHP_SELF'], ".php") != "sports") {
	echo "<script> window.location.assign('sports.php'); </script>";
}
		?>

		<div class="select"> <strong>Other Pages: </strong>
          <select onChange="window.location=this.value;">
          	<?php 
			$count = 1;
			$pages = 1; ?>
			<option value='sports.php?pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
			<?php 
			for ($count; $count < mysql_num_rows($fresult); $count++) { 
				if ($count % 10 == 0) {
					$pages++; ?>
            		<option value='sports.php?pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
				<?php }
          	 } ?>
          </select>
        	</div>
		</div>
	</div>
    
<?php mysql_close($conn); ?>
<?php include 'footer.php'; ?>