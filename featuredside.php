<?php 

$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
$db_found = mysql_select_db(MYSQL_DB);

$query = "SELECT * FROM news WHERE SportID='Football' ORDER BY NewsID DESC Limit 4";

$result = mysql_query($query) or die('Query failed: '.mysql_error());

while($db_fields = mysql_fetch_assoc($result)){

/* Slide Item 1 */
print "<div class='featured-side-item'>";
print "<div class='cl'>&nbsp;</div>";

print "<a href='news.php?SportID={$db_fields['SportID']}&page={$db_fields['title']}' class='left'><img style ='width:68px;height:68px;' src={$db_fields['image']} /></a>";

print "<h4><a href='news.php?SportID={$db_fields['SportID']}&page={$db_fields['title']}'>";
print $db_fields['title'];
print "</a></h4>";

print "<p>";
if(strlen($db_fields['excerpt'])>80){
	$db_fields['excerpt']=substr($db_fields['excerpt'],0,80);
}
print $db_fields['excerpt'];
print "</p>";

print "<div class='cl'>&nbsp;</div>";
print "</div>";

/* End Slide Item 1 */

}
?>