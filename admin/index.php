<?php include 'header.php'; ?>
<div class="top-bar">
        <h1>Dashboard</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a>
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
      
      <h1>Latest Users</h1>
      
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
	  
	$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	$db_found = mysql_select_db(MYSQL_DB);

	if ($db_found)  {		
		$query = "SELECT * FROM users ORDER BY id DESC LIMIT 3";
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
	?>
    
    </table>
    </div>
    
    <h1>Latest News</h1>
    
    
    <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
      <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first">NewsID</th>
            <th>Created</th>
            <th>Category</th>
            <th>Image</th>
            <th>Title</th>
            <th>Edit</th>
            <th class="last">Delete</th>
          </tr>
          
          <?php 
	 
	
	
	if ($db_found)  {		
		$query = "SELECT * FROM news ORDER BY NewsID DESC LIMIT 3";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	
			while ($db_fields = mysql_fetch_assoc($result))  {
				print "<tr><td>" . $db_fields['NewsID'] .
          		  " </td><td>" .  $db_fields['creationDate'] .
				  " </td><td>" . $db_fields['SportID'] . 
				  " </td><td>" . $db_fields['image'] . 
				  " </td><td>" . $db_fields['title'] . 
				  " </td><td><a href='edit_news.php?action=edit&NewsID=".$db_fields['NewsID']."'><img src='img/edit-icon.gif' width='16' height='16' alt='edit' /></a>". 	 				
				  " </td><td><a href='news.php?pid=".$page."&action=delete&NewsID=".$db_fields['NewsID']."'><img src='img/hr.gif' width='16' height='16' alt='delete' /></a>".
				  " </td></tr>";
				  
		}
	}
	else
	print "Database not found";
	?>
    </table>
    </div>
    
    <h1>Latest Scores</h1>
    
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
		  
		  
	
	   if ($db_found)  {		
		$query = "SELECT * FROM scores ORDER BY GameID DESC LIMIT 3";
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
	?>
    </table>
    
    </div>
    
    <h1>Latest Teams</h1>
    
    <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
      <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first">Team Name</th>
            <th>Team Conference</th>
            <th>Team City</th>
            <th>Team Arena</th>
            <th>SportID</th>
            <th>Team Logo</th>
            <th>Edit</th>
            <th class="last">Delete</th>
          </tr>
         <?php 
         
	  
	  if ($db_found)  {		
		$query = "SELECT * FROM teams ORDER BY TeamID DESC LIMIT 3";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	
		while ($db_fields = mysql_fetch_assoc($result))  {
			print "<tr><td class='first style1'>" . $db_fields['TeamName'] . 
				  " </td><td>" . $db_fields['TeamConference'] . 
				  " </td><td>" . $db_fields['TeamCity'] .
				  " </td><td>" . $db_fields['TeamArena'] . 
				  " </td><td>" . $db_fields['SportID'] .
				  " </td><td><img width='16' height='16' src=" . $db_fields['TeamLogo'] .
				  " /></td><td><a href='edit_teams.php?action=edit&TeamID=".$db_fields['TeamID']."'><img src='img/edit-icon.gif' width='16' height='16' alt='edit' /></a>". 	 				
				  " </td><td class='last'><a href='teams.php?pid=".$page."&action=delete&TeamID=".$db_fields['TeamID']."'><img src='img/hr.gif' width='16' height='16' alt='delete' /></a>".  				
				  " </td></tr>";
				  
		}

	}
	else
	print "Database not found";
    ?>
    
    </table>
    </div>
    <h1>Latest Players</h1>
    
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
	  
	  
	  
	
	if ($db_found)  {		
		$query = "SELECT * FROM players, teams WHERE players.TeamID = teams.TeamID ORDER BY PlayerID DESC LIMIT 3";
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
	
	?>
    </table>
    </div>
    
    <h1>Latest Products</h1>
    
    <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
      <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first">SKU</th>
            <th>Category</th>
            <th>Size</th>
            <th>Team</th>
            <th>Quantity</th>
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
		$query = "SELECT * FROM store ORDER BY itemID DESC LIMIT 3";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	
		while ($db_fields = mysql_fetch_assoc($result))  {
			print "<tr><td class='first style1'>" . $db_fields['sku'] . 
				  " </td><td>" . $db_fields['category'] . 
				  " </td><td>" . $db_fields['size'] .
				  " </td><td>" . $db_fields['team'] . 
				  " </td><td>" . $db_fields['qty'] .
				  " </td><td><a href='edit_product.php?action=edit&itemID=".$db_fields['itemID']."'><img src='img/edit-icon.gif' width='16' height='16' alt='edit' /></a>". 	 				
				  " </td><td class='last'><a href='store.php?pid=".$page."&action=delete&itemID=".$db_fields['itemID']."'><img src='img/hr.gif' width='16' height='16' alt='delete' /></a>".  				
				  " </td></tr>";
				  
		}

	}
	else
	print "Database not found";
	
	?>
    </table>
    </div>
</div>
    
<?php mysql_close($conn); ?>
<?php include 'footer.php'; ?>