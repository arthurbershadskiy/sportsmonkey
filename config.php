<?php include 'database.php';

$loggedin = 'no';

$favoriteSport = '';

$loginmessage = '';

if( isset($_COOKIE['username']) )
{
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	$admin    = $_COOKIE['userRole'];
	$favoriteSport = $_COOKIE['sport'];
	$loggedin = 'yes';
}

if( isset($_POST['login']) )
	{
		
	$username = $_POST['username'];
	$password = $_POST['password'];

	$conn = mysql_connect(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD) or die("Could not connect: " . mysql_error());
	mysql_select_db(MYSQL_DB);


	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	$query = "SELECT username, password, userRole, sport FROM users WHERE username=";
	$query = $query . "'" . "$username" . "'";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	$row = mysql_fetch_assoc($result);

	if( md5($password) == $row['password'] )
	{
		$userRole = $row['userRole'];
		$favoriteSport = $row['sport'];
		setcookie("username", $username);
		setcookie("password", $password);
		setcookie("userRole", $userRole);
		setcookie("sport", $favoriteSport);
		$loggedin = 'yes';
	}
	else
	{
		setcookie("username", "", time()-3600);
		setcookie("password", "", time()-3600);
		setcookie("userRole", "", time()-3600);
		setcookie("sport", "", time()-3600);
		$loginmessage = "Incorrect username or password. Please&nbsp;&nbsp;<a href='login.php'>Sign In<br><br>";
	}

	mysql_free_result($result);

	mysql_close($conn);
	}
	
if( $loggedin == 'yes' )
{
	if( $userRole == 'admin' )
	{
		echo "<script> window.location.assign('admin'); </script>";
	}

}

if( isset($_GET['logout']) ) {
	setcookie("username", "", time()-3600);
	setcookie("password", "", time()-3600);
	setcookie("userRole", "", time()-3600);
	setcookie("sport", "", time()-3600);
	$loggedin = 'no';
	unset($_SESSION);
	session_destroy();
	echo "<script> window.location.assign('index.php'); </script>";
	}

?>