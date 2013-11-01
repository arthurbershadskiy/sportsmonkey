<?php 

$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
$db_found = mysql_select_db(MYSQL_DB);

$query = "SELECT * FROM news WHERE SportID='Soccer' ORDER BY NewsID DESC";

$result = mysql_query($query) or die('Query failed: '.mysql_error());

$db_fields = mysql_fetch_assoc($result);

print "<div class='grey-box'>";
print "<h3><a href='news.php?SportID={$db_fields['SportID']}&page={$db_fields['title']}'>{$db_fields['title']}</a></h3>";
print "<img style='width:200px; height:100px;' src={$db_fields['image']} />";
print "<p><span>";
if(strlen($db_fields['excerpt'])>100){
	$db_fields['excerpt']=substr($db_fields['excerpt'],0,100);
}
print "{$db_fields['excerpt']}</span><a href='news.php?SportID={$db_fields['SportID']}&page={$db_fields['title']}' class='button'>Read more</a></p>";
print "</div>";
?>

<?php
$query = "SELECT * FROM news WHERE SportID='Hockey' ORDER BY NewsID DESC";

$result = mysql_query($query) or die('Query failed: '.mysql_error());

$db_fields = mysql_fetch_assoc($result);

print "<div class='grey-box'>";
print "<h3><a href='news.php?SportID={$db_fields['SportID']}&page={$db_fields['title']}'>{$db_fields['title']}</a></h3>";
print "<img style='width:200px; height:100px;' src={$db_fields['image']} />";
print "<p><span>";
if(strlen($db_fields['excerpt'])>100){
	$db_fields['excerpt']=substr($db_fields['excerpt'],0,100);
}
print "{$db_fields['excerpt']}</span><a href='news.php?SportID={$db_fields['SportID']}&page={$db_fields['title']}' class='button'>Read more</a></p>";
print "</div>";
?>

<?php
$query = "SELECT * FROM news WHERE SportID='Baseball' ORDER BY NewsID DESC";

$result = mysql_query($query) or die('Query failed: '.mysql_error());

$db_fields = mysql_fetch_assoc($result);

print "<div class='grey-box last'>";
print "<h3><a href='news.php?SportID={$db_fields['SportID']}&page={$db_fields['title']}'>{$db_fields['title']}</a></h3>";
print "<img style='width:200px; height:100px;' src={$db_fields['image']} />";
print "<p><span>";
if(strlen($db_fields['excerpt'])>100){
	$db_fields['excerpt']=substr($db_fields['excerpt'],0,100);
}
print "{$db_fields['excerpt']}</span><a href='news.php?SportID={$db_fields['SportID']}&page={$db_fields['title']}' class='button'>Read more</a></p>";
print "</div>";
?>


<?php mysql_close($conn); ?>