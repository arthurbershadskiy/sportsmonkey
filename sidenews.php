<div id="sidebar">
      <h2>news spot</h2>
      
      <?php $conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	$db_found = mysql_select_db(MYSQL_DB);
	
	if ($db_found)  {		
		$query = "SELECT * FROM news ORDER BY NewsID DESC LIMIT 6";
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	
			while ($db_fields = mysql_fetch_assoc($result))  {
				print "<ul><li><small class='date'>" . $db_fields['creationDate'] .
          		  " </small><p><a style='color:#fff;word-wrap:break-word;' href='news.php?page=".$db_fields['title']."'>" .  $db_fields['title'] .
				  " </a></p></li></ul>";
				  
		}
	}
	else
	print "Database not found";
	?>
</div>