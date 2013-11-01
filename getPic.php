<?php 
$rand = rand(1,5); 
$sportPic = '';

if ( !isset($_GET['SportID']) && $loggedin == 'yes'){
	$sportPic = $favoriteSport;
}
else if ( $_GET['SportID'] == 'All' || !isset($_GET['SportID'])){
	switch($rand) {
	case 1:
		$sportPic = 'Basketball';
		break;
	case 2:
		$sportPic = 'Football';
		break;
	case 3:
		$sportPic = 'Hockey';
		break;
	case 4:
		$sportPic = 'Baseball';
		break;
	case 5:
		$sportPic = 'Soccer';
		break;
	}
}
	else {
		$sportPic = $_GET['SportID'];
	}
?>