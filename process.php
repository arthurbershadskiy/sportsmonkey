<?php include 'header.php'; ?>

<?php

		// Capture any variables that were sent in...
		$firstname = $_POST['firstname'] ;
		$lastname = $_POST['lastname'];
		$password = md5($_POST['password']);
		$username = $_POST['username'] ;
		$gender = $_POST['gender'] ;
		$bio = $_POST['bio'] ;
		$email = $_POST['email'] ;
		
		$sport = $_POST['sport'] ;
		$team = $_POST['team'] ;
		$player = $_POST['player'];

		// We can't add anything if we don't have at least the primary key!!!
		if ( !empty($_POST['username']) ) {
			
			$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
			$db_found = mysql_select_db(MYSQL_DB);	

			if ($db_found)  {		
				$query = "INSERT INTO users (username, password, firstname, lastname, email, gender, bio, sport, team, player) VALUES ('"
						. $username .
						"','"
						. $password .
						"','"
						. $firstname .
						"','"
						. $lastname .
						"','"
						. $email .
						"','"
						. $gender .
						"','"
						. $bio .
						"','"
						. $sport .
						"','"
						. $team .
						"','"
						. $player .
						"')";
				$result = mysql_query($query) or die('Query failed: '.mysql_error());	
				print "<h3> There were " . mysql_affected_rows() . " affected rows after the last update operation </h3>";
			} else {
				print "Database not found";	
			}

			mysql_close($conn);
		}
?>
<!-- Widget -->
      <div id="heading-box">
        <div id="heading-box-cnt">
          <div class="cl">&nbsp;</div>
          <!-- Main Slide Item -->
          <?php include 'featured.php'; ?>
          <!-- End Main Slide Item -->
          <div class="featured-side">
          <?php include 'featuredside.php'; ?>  
          </div>
          <div class="cl">&nbsp;</div>
        </div>
      </div>
      <!-- End Widget -->
    </div>
  </div>
</div>
<!-- End Heading -->
<!-- Main -->
<div id="main">
  <div class="shell">
    <div class="cl">&nbsp;</div>
    <!-- News Spot -->
    <?php include 'sidenews.php'; ?>
    <!-- End News Spot -->
    <div id="content">
      <div class="cl">&nbsp;</div>
      <!-- Main Content -->
      <p> Thank you for registering, you can now log in! </p>
      <script type="text/javascript">
                    window.setTimeout(function() {
                        location.href = 'login.php';
                    }, 2000);
        </script>
      <!-- End Main Content -->
      <div class="cl">&nbsp;</div>
<div class="cl">&nbsp;</div>
      </div>
    </div>
    <div class="cl">&nbsp;</div>
  </div>
</div>
<!-- End Main -->
<?php include 'footer.php'; ?>
