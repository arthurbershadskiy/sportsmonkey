<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SportsMonkey Admin | <?php echo basename($_SERVER['PHP_SELF'], ".php") ?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/all.css" type="text/css" media="all" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
</head>
<body>
<!-- Header -->
<div id="main">
<?php include 'config.php'; ?>
<?php if( $loggedin == 'no' ) {
	echo "<script> window.location.assign('../login.php'); </script>";
} 
?>
<?php if( $admin != 'admin' ) {
	echo "<script> window.location.assign('../index.php'); </script>";
} 
?>
<div id="header"> <a href="index.php" class="logo"><img src="img/logo.gif" width="101" height="29" alt="" /></a>
    <ul id="top-navigation">
    <?php if (basename($_SERVER['PHP_SELF'], ".php") == "index") { ?>
      	  <li class="active"><span><span>Homepage</span></span></li> 
	  <?php } else { ?>
		  <li><span><span><a href="index.php">Homepage</a></span></span></li>
      <?php } ?>
      <?php if (basename($_SERVER['PHP_SELF'], ".php") == "users") { ?>
      	  <li class="active"><span><span>Users</span></span></li>
      <?php } else { ?>
      	  <li><span><span><a href="users.php">Users</a></span></span></li>
      <?php } ?>
      <?php if (basename($_SERVER['PHP_SELF'], ".php") == "teams") { ?>
      	<li class="active"><span><span>Teams</span></span></li>
        <?php } else { ?>
        <li><span><span><a href="teams.php">Teams</a></span></span></li>
        <?php } ?>
        <?php if (basename($_SERVER['PHP_SELF'], ".php") == "players") { ?>
        <li class="active"><span><span>Players</span></span></li>
        <?php } else { ?>
        <li><span><span><a href="players.php">Players</a></span></span></li>
        <?php } ?>
        <?php if (basename($_SERVER['PHP_SELF'], ".php") == "news") { ?>
      	<li class="active"><span><span>News</span></span></li>
        <?php } else { ?>
        <li><span><span><a href="news.php">News</a></span></span></li>
        <?php } ?>
        <?php if (basename($_SERVER['PHP_SELF'], ".php") == "scores") { ?>
      	<li class="active"><span><span>Scores</span></span></li>
        <?php } else { ?>
        <li><span><span><a href="scores.php">Scores</a></span></span></li>
        <?php } ?>
      <?php if (basename($_SERVER['PHP_SELF'], ".php") == "store") { ?>
      	  <li class="active"><span><span>Store</span></span></li>
      <?php } else { ?>
      	  <li><span><span><a href="store.php">Store</a></span></span></li>
      <?php } ?>
    </ul>
  </div>
  

<!-- End Header -->
<!-- Navigation -->
<!-- End Navigation -->
<!-- Heading -->
<!-- Sub nav -->
<?php include 'sidenav.php'; ?>
<!-- End Sub nav -->
<div id="center-column">