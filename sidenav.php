<div id="side-nav">
        <ul>
          <li class="active">
            <div class="link"><a href="index.php">Home</a></div>
          </li>
          <li>
            <div class="link"><a href="#">About Us</a></div>
          </li>
          <li>
          <?php if ( $admin == "admin" ) { ?>
            <div class="link"><a href="admin">Admin</a></div>
            <?php } else { ?>
            <div class="linkempty"></div>
            <?php } ?>
          </li>
          <li>
          <?php if( $loggedin == 'no' )
			{ ?>
            <div class="link"><a href="login.php">Log in</a></div>
          </li>
          <li>
          	<div class="link"><a href="register.php">Register</a></div>
          <?php } else if( $loggedin == 'yes' )
			{ ?>
            <div class="link"><a href="profile.php">Profile</a></div>
            </li>
            <li>
            <div class="link"><a href="index.php?logout">Log out</a></div>
            <?php } ?>
          </li>
        </ul>
</div>