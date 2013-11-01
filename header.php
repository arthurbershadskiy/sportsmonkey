<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SportsMonkey | <?php echo basename($_SERVER['PHP_SELF'], ".php") ?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
</head>
<body>
<!-- Header -->
<div id="header">
  <div class="shell">
    <!-- Logo -->
    <h1 id="logo" class="notext"><a href="index.php">SportsMonkey</a></h1>
    <!-- End Logo -->
  </div>
</div>

<!-- End Header -->
<!-- Navigation -->
<?php include 'config.php'; ?>
<div id="navigation">
  <div class="shell">
    <div class="cl">&nbsp;</div>
    <ul>
      <li><a href="news.php">news</a></li>
      <li><a href="teams.php">teams</a></li>
      <li><a href="players.php">players</a></li>
      <li><a href="scores.php">scores</a></li>
      <li><a href="store.php">store</a></li>
    </ul>
    <div class="cl">&nbsp;</div>
  </div>
</div>
<!-- End Navigation -->
<!-- Heading -->
<div id="heading">
  <div class="shell">
    <div id="heading-cnt">
      <!-- Sub nav -->
      <?php include 'sidenav.php'; ?>
      <!-- End Sub nav -->