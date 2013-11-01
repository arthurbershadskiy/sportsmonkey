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
      <?php include '_store.php'; ?>
      <!-- End Main Content -->
      <div class="cl">&nbsp;</div>
    </div>
    <div class="cl">&nbsp;</div>
  </div>
</div>
<!-- End Main -->
<?php include 'footer.php'; ?>