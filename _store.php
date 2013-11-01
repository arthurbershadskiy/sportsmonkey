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
			$query = "SELECT * FROM store ORDER BY itemID ASC LIMIT ".$start.", ".$end."";
			$result = mysql_query($query) or die('Query failed: '.mysql_error());
			$right = 0;
			while ($db_fields = mysql_fetch_assoc($result))  {
				print "<form action='OrderProcess.php' method='post'>";
				if ( $right == 0 ){
					print "<div class='storeTable-left'>";
				}
				else print "<div class='storeTable-right'>";
				
					print "<div>";
					print "<input type='hidden' name='team' value='".$db_fields['team']."'>";
					print $db_fields['team'];
					
					print " ";
					print "<input type='hidden' name='category' value='".$db_fields['category']."'>";
					print $db_fields['category'];
					
					print " ";
					print "<input type='hidden' name='size' value='".$db_fields['size']."'>";
					print $db_fields['size'];
					print "</div>";
					
					
					print "<div style='float:right'>";
					print "<b>Quantity </b><input type='int' name='qty' size='2'><br />";
					print "</div>";
					
					print "<div style='clear:right;margin-top:15px;float:right;'>";
					print "<input type='submit' name='submit' value='Add to Cart'/><br />";
					print "</div>";
					
					print "</div>";
					print "</form>";
					
					if ( $right == 1 ) {
						$right = 0;
					}
					else $right = 1;
				}
		}
		
		else
			print "Database not found";		

?>
<?php 
$fquery = "SELECT * FROM store ORDER BY itemID ";
$fresult = mysql_query($fquery) or die('Query failed: '.mysql_error());	
if ( mysql_num_rows($result) == 0 && basename($_SERVER['PHP_SELF'], ".php") != "store") {
	echo "<script> window.location.assign('store.php'); </script>";
}
		?>
        
        </section>

		<div class="select"> <strong>Other Pages: </strong>
          <select onChange="window.location=this.value;">
          	<?php 
			$count = 1;
			$pages = 1; ?>
			<option value='store.php?pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
			<?php 
			for ($count; $count < mysql_num_rows($fresult); $count++) { 
				if ($count % 10 == 0) {
					$pages++; ?>
            		<option value='store.php?pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
				<?php }
          	 } ?>
          </select>
          </div>