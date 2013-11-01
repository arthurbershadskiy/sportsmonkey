<?php include 'header.php'; ?>
	<div class="top-bar"> <a href="new_user.php" class="button">ADD NEW</a>
        <h1>Users</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="users.php">Users</a>
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
            <th class="first">Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-Mail</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Creation Date</th>
            <th>Active</th>
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
		$query = "SELECT * FROM users ORDER BY id LIMIT ".$start.", ".$end."";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	
		while ($db_fields = mysql_fetch_assoc($result))  {
			print "<tr><td class='first style1'>" . $db_fields['username'] . 
				  " </td><td>" . $db_fields['firstname'] . 
				  " </td><td>" . $db_fields['lastname'] . 
				  " </td><td>" . $db_fields['email'] .
				  " </td><td>" . $db_fields['gender'] .
				  " </td><td>" . $db_fields['userRole'] . 	 				  
				  " </td><td>" . $db_fields['creationDate'] . 	 				  
				  " </td><td>" . $db_fields['active'] . 	 				  
				  " </td><td><a href='edit_user.php?action=edit&username=".$db_fields['username']."'><img src='img/edit-icon.gif' width='16' height='16' alt='edit' /></a>". 	 				
				  " </td><td class='last'><a href='users.php?pid=".$page."&action=delete&username=".$db_fields['username']."'><img src='img/hr.gif' width='16' height='16' alt='delete' /></a>".  				
				  " </td></tr>";
				  
		}

	}
	else
	print "Database not found";	
	
	
	if(($_GET['action'] == 'delete') && isset($_GET['username'])) { // if delete was requested AND a username is present... 

	$sql = mysql_query("DELETE FROM users WHERE username = '".$_GET['username']."'"); 

		if($sql) { 
	
		echo 'Record deleted!'; 
		echo "<script> window.location.assign('users.php?pid=".$_GET['pid']."'); </script>";

		} 

	} 	

?>
</table>
<?php $fquery = "SELECT * FROM users ORDER BY id ";
$fresult = mysql_query($fquery) or die('Query failed: '.mysql_error());	
if ( mysql_num_rows($result) == 0 && basename($_SERVER['PHP_SELF'], ".php") != "users") {
	echo "<script> window.location.assign('users.php'); </script>";
}
		?>

		<div class="select"> <strong>Other Pages: </strong>
          <select onChange="window.location=this.value;">
          	<?php 
			$count = 1;
			$pages = 1; ?>
			<option value='users.php?pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
			<?php 
			for ($count; $count < mysql_num_rows($fresult); $count++) { 
				if ($count % 10 == 0) {
					$pages++; ?>
            		<option value='users.php?pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
				<?php }
          	 } ?>
          </select>
        	</div>
		</div>
	</div>
    
<?php mysql_close($conn); ?>
<?php include 'footer.php'; ?>