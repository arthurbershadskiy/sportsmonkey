<?php include 'header.php'; ?>
      <div class="top-bar">
        <h1>Users</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="users.php">Users</a> / Update Users
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
      
      <?php if(($_GET['action'] == 'edit') && isset($_GET['username'])) { 
	  
	  $editUser = $_GET['username'];
	  
	  $conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	  $db_found = mysql_select_db(MYSQL_DB);
	  
	  if ($db_found)  {		
		$query = "SELECT * FROM users WHERE username= '". $editUser ."'";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());
		$db_fields = mysql_fetch_assoc($result);
      
      print "<div class='entryForm'>";
        print "<form action='update_user.php' method='post'>";
        print "<input type='hidden' name='username' value='".$db_fields['username']."'><br />";
		print "<label>First Name</label>";
        print "<input type='text' name='firstname' value='".$db_fields['firstname']."'/><br />";
		print "<label>Last Name</label>";
        print "<input type='text' name='lastname' value='".$db_fields['lastname']."'/><br />";
    	print "<br />";
		print "<label>E-Mail</label>";
        print "<input type='text' name='email' value='".$db_fields['email']."'/><br />";
        print "<br />";
		print "<label for=tblbio>Bio</label>";
		print "<textarea cols='40' rows='10' name='bio'>". $db_fields['bio'] ."</textarea>";
		print "</li><ol>";
		print "<label>Role</label>";
        print "<select name='userRole'>";
      		print "<optgroup label='userRole'>";
            ?>
            <option value='member' <?php echo ($db_fields['userRole']=='member')?'selected':'' ?>>Member</option>
        	<option value='premium' <?php  echo ($db_fields['userRole']=='premium')?'selected':'' ?>>Premium</option>
        	<option value='admin'   <?php echo ($db_fields['userRole']=='admin')?'selected':'' ?>>Admin</option>
      		<?php
            print "</optgroup>";
   		print "</select>";
    	print "<br />";
        print "<br />";
		
		
			print "<legend>User Info</legend>";
			print "<ol><li>";
			print "<label for=tblsport>Favorite Sport</label>";
			?> 
            <fieldset>
            	<ol>
                    <li>
                        <input id=basketball name="sport" type=radio value=Basketball <?php echo ($db_fields['sport']=='Basketball')?'checked':'' ?>>
                        <label for=basketball>Basketball</label>
                    </li>
                    
                    <li>
                        <input id=football name="sport" type=radio value=Football <?php echo ($db_fields['sport']=='Football')?'checked':'' ?>>
                        <label for=football>Football</label>
                    </li>

                    <li>
                        <input id=hockey name="sport" type=radio value=Hockey <?php echo ($db_fields['sport']=='Hockey')?'checked':'' ?>>
                        <label for=hockey>Hockey</label>
                    </li>

                    <li>
                        <input id=baseball name="sport" type=radio value=Baseball <?php echo ($db_fields['sport']=='Baseball')?'checked':'' ?>>
                        <label for=baseball>Baseball</label>
                    </li>

                    <li>
                        <input id=golf name="sport" type=radio value=Soccer <?php echo ($db_fields['sport']=='Soccer')?'checked':'' ?>>
                        <label for=soccer>Soccer</label>
                    </li>

                </ol>
               </fieldset>
                <?php
		print "</li><li>";
			print "<label for=tblteam>Favorite Team</label>";
			print "<input id=tblsports name=team type=text value='".$db_fields['team']."'>";
			print "</li><li>";
			print "<label for=tblplayer>Favorite Player</label>";
			print "<input id=tblplayer name=player type=text value='".$db_fields['player']."'>";
			print "</li></ol>";
        print "<input type='submit'>";
        print "</form>";
    print "</div>";
	  }
    
	mysql_close($conn);
	  } ?>
    </div>
    
    
<?php include 'footer.php'; ?>