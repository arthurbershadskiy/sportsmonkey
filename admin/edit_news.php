<?php include 'header.php'; ?>
      <div class="top-bar">
        <h1>News</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="news.php">News</a> / Update News
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
      
      <?php if(($_GET['action'] == 'edit') && isset($_GET['NewsID'])) { 
	  
	  $editNews = $_GET['NewsID'];
	  
	  $conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	  $db_found = mysql_select_db(MYSQL_DB);
	  
	  if ($db_found)  {		
		$query = "SELECT * FROM news WHERE NewsID= '". $editNews ."'";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());
		$db_fields = mysql_fetch_assoc($result);
      
      print "<div class='entryForm'>";
        print "<form action='update_news.php' method='post'>";
		print "<input type='hidden' name='NewsID' value='".$db_fields['NewsID']."'><br />";
		print "<label>Category</label>";
		print "<select name='SportID'>";
        ?>
            <option value="Basketball" <?php echo ($db_fields['SportID']=='Basketball')?'selected':'' ?>>Basketball</option>
            <option value="Football" <?php echo ($db_fields['SportID']=='Football')?'selected':'' ?>>Football</option>
            <option value="Hockey" <?php echo ($db_fields['SportID']=='Hockey')?'selected':'' ?>>Hockey</option>
            <option value="Baseball" <?php echo ($db_fields['SportID']=='Baseball')?'selected':'' ?>>Baseball</option>
            <option value="Soccer" <?php echo ($db_fields['SportID']=='Soccer')?'selected':'' ?>>Soccer</option>
        <?php   
        print "</select><br />";
		print "<label>Image</label>";
        print "<input type='text' name='image' value='".$db_fields['image']."' /><br />";
		print "<label>Title</label>";
        print "<input style='width:200px;'type='text' name='title' value='".$db_fields['title']."'/><br />";
		print "<label>Excerpt</label><br />";
        print "<textarea style='width:600px;' cols='40' rows='3' name='excerpt'>". $db_fields['excerpt'] ."</textarea><br />";
		print "<label>Body</label><br />";
        print "<textarea style='width:600px;height:300px' cols='40' rows='10' name='body'>". $db_fields['body'] ."</textarea>";
   		print "</select>";
    	print "<br />";
        print "<input type='submit'>";
        print "</form>";
    print "</div>";
	  }
    
	mysql_close($conn);
	  } ?>
    </div>
    
    
<?php include 'footer.php'; ?>