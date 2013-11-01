<?php 

$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
$db_found = mysql_select_db(MYSQL_DB);

$query = "SELECT * FROM news WHERE SportID='Basketball' ORDER BY NewsID DESC";

$result = mysql_query($query) or die('Query failed: '.mysql_error());

$db_fields = mysql_fetch_assoc($result);

print "<div class='featured-main'> <a href='news.php?SportID={$db_fields['SportID']}&page={$db_fields['title']}'><img  style='width:438px;height:310px' src={$db_fields['image']} /></a>";

print "<div class='featured-main-details'>";
print "<div class='featured-main-details-cnt'>";

print "<h4><a href='news.php?SportID={$db_fields['SportID']}&page={$db_fields['title']}'>{$db_fields['title']}</a></h4>";
print "<p>";
if(strlen($db_fields['excerpt'])>160){
	$db_fields['excerpt']=substr($db_fields['excerpt'],0,160);
}
print $db_fields['excerpt'];
print "</p>";

print "</div></div></div>";
?>