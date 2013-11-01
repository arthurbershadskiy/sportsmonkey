<?php include 'header.php'; ?>
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
      <?php if( $loggedin == 'yes' )
			{ ?>
      <?php include '_editprofile.php'; }
      else { ?> <script>  window.location = 'login.php';  </script> <?php  } ?>
      <!-- End Main Content -->
      <div class="cl">&nbsp;</div>
    </div>
    <div class="cl">&nbsp;</div>
  </div>
</div>
<!-- End Main -->
<?php include 'footer.php'; ?>