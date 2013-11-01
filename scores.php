<?php include 'header.php'; ?>
<?php include 'getPic.php'; ?>
<!-- Widget -->
      <div id="heading-box">
      <img src="css/images/<?php echo $sportPic ?>.png" />
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
        <h1>View Scores</h1>
        <form action="scores.php?team=" type="post">
        Show games by team:<input type="text" name="team" placeholder="Team Name"></input>
        <input type="submit"></input>
        </form>
        <form action="scores.php?date=" type="post">
        Show games by date:<input type="date" name="date" placeholder="2000-01-01"></input>
        <input type="submit"></input>      
       	</form>
        <form action="scores.php">
        Show games by sports:
        <input type="submit" value="Filter by Sports"></input>      
       	</form>
       <?php if (!isset($_GET['team']) && !isset($_GET['date'])) { 
			include '_scores.php';} ?>
       <?php if (isset($_GET['team'])) { 
			include '_scoresByTeam.php';} ?>
       <?php if (isset($_GET['date'])) { 
			include '_scoresByDate.php';} ?>
      <!-- End Main Content -->
      <div class="cl">&nbsp;</div>
    </div>
    <div class="cl">&nbsp;</div>
  </div>
</div>
<!-- End Main -->
<?php include 'footer.php'; ?>