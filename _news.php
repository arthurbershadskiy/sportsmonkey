<?php if ( $_GET['page'] == NULL && basename($_SERVER['PHP_SELF']) == "news.php") { // Checks to see if its on main page or a post page

$newsSport = $favoriteSport;

if (isset($_GET['SportID'])){
	$newsSport = $_GET['SportID'];
}


?>


<div class="select" style="float:right"> <strong>Sort By: </strong>
          <select onChange="window.location=this.value;">
            <option value="news.php?SportID=All" <?php echo ($newsSport=='All')?'selected':'' ?>>All Sports</option>
            <option value="news.php?SportID=Basketball" <?php echo ($newsSport=='Basketball')?'selected':'' ?>>Basketball</option>
            <option value="news.php?SportID=Football" <?php echo ($newsSport=='Football')?'selected':'' ?>>Football</option>
            <option value="news.php?SportID=Hockey" <?php echo ($newsSport=='Hockey')?'selected':'' ?>>Hockey</option>
            <option value="news.php?SportID=Baseball" <?php echo ($newsSport=='Baseball')?'selected':'' ?>>Baseball</option>
            <option value="news.php?SportID=Soccer" <?php echo ($newsSport=='Soccer')?'selected':'' ?>>Soccer</option>
 
          </select>
          </div>
          
		  <section id='entry-container'>
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
		if ($loggedin == 'yes' && $newsSport != 'All'){	
			$query = "SELECT * FROM news WHERE SportID='". $newsSport ."' ORDER BY SportID, NewsID DESC LIMIT ".$start.", ".$end."";
		}
		
		else if (!isset($_GET['SportID']) || $newsSport == 'All'){
		$query = "SELECT * FROM news ORDER BY NewsID DESC LIMIT ".$start.", ".$end."";
		}
	
		else if (isset($_GET['SportID'])){
		$query = "SELECT * FROM news WHERE SportID='". $newsSport ."' ORDER BY SportID, NewsID DESC LIMIT ".$start.", ".$end."";
		}
		$result = mysql_query($query) or die('Query failed: '.mysql_error());	

			while ($db_fields = mysql_fetch_assoc($result))  {
				print "<header class='entry-header'>";
				print "<h2 class='entry-title'>";
				print "<a style='color:#fff' href='news.php?SportID=".$newsSport."&page=".urlencode($db_fields['title'])."'>" . $db_fields['title'] . " </a>";
				print "</h2><!-- .entry-title -->";
				print "</header><!-- .entry-header -->";
				print "<ul class='entry-meta'>";
				print "<li class='date'>". $db_fields['creationDate'] . "</li>";
				print "<li class='categories'>&middot; ". $db_fields['SportID'] ." </li>";
				print "</ul><!-- .entry-meta -->";
				print "<div class='entry-content'>";	
				print "<p>". $db_fields['excerpt'] ."</p>";
				print "</div><!-- .entry-content -->";
				print "<br /><br />";
				  
		}
	}
	else
	print "Database not found";
		
?>	
<?php 
if ( $newsSport == 'All' ){
	$fquery = "SELECT * FROM news ORDER BY NewsID ";
}
else if ( !isset($_GET['SportID'])  && $loggedin == 'no') {
	$fquery = "SELECT * FROM news ORDER BY NewsID ";
}
else if ( isset($_GET['SportID']) || $newsSport != 'All') {
	$fquery = "SELECT * FROM news WHERE SportID='". $newsSport ."' ORDER BY NewsID ";
}
$fresult = mysql_query($fquery) or die('Query failed: '.mysql_error());	
if ( mysql_num_rows($result) == 0 && basename($_SERVER['PHP_SELF'], ".php") != "news") {
	echo "<script> window.location.assign('news.php'); </script>";
}
		?>
        
        </section>

		<div class="select"> <strong>Other Pages: </strong>
          <select onChange="window.location=this.value;">
          	<?php 
			$count = 1;
			$pages = 1; ?>
			<option value='news.php?<?php echo (isset($_GET['SportID']))?'SportID='.$newsSport.'&':'' ?>pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
			<?php 
			for ($count; $count < mysql_num_rows($fresult); $count++) { 
				if ($count % 10 == 0) {
					$pages++; ?>
            		<option value='news.php?<?php echo (isset($_GET['SportID']))?'SportID='.$newsSport.'&':'' ?>pid=<?php echo $pages ?>' <?php echo ($page==$pages)?'selected':'' ?>><?php echo $pages ?></option>
				<?php }
          	 } ?>
          </select>
          </div>
<?php } 
if($_GET['page'] != NULL) { 
		$page = $_GET['page'];
	$query = "SELECT * FROM news WHERE title = '".$page."'"; 
	$result = mysql_query($query) or die('Query failed: '.mysql_error());
	

		if($db_fields = mysql_fetch_assoc($result)) { 
		
		echo '<section id="entry-container">';
		echo '<header class="entry-header">';
		echo '<h1>'.$db_fields['title'].'</h1>';
		echo '</header>';
		echo '<div class="entry-content">'; 
		echo '<img style="float:right" width="50%" height="200" src="'.$db_fields['image'].'"/>'; 
		echo '<div>'.nl2br($db_fields['body']).'</div>';
		echo '</div>';
		echo '</section>';
		

		} 

	}   
?>  
<?php mysql_close($conn); ?>