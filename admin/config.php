<?php include 'database.php';

$loggedin = 'no';

if( isset($_COOKIE['username']) )
{
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	$admin    = $_COOKIE['userRole'];
	$favoriteSport = $_COOKIE['sport'];
	$loggedin = 'yes';
}

?>