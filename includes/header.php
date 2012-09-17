<?php
require('includes/conf.php');
//get current page
$page = basename($_SERVER['REQUEST_URI']);

$pageTitle = '';

if(strstr($page,'index.php'))
{
	$pageTitle = 'Latest Events';
}
elseif(strstr($page,'event.php'))
{
	$pageTitle = 'Event';
}
elseif(strstr($page,'live.php'))
{
	$pageTitle = 'Live webcam feed';
}
elseif(strstr($page,'statistics.php'))
{
	$pageTitle = 'Statistics';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/jquery-1.8.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<title>motionPHP - <?php echo $pageTitle; ?></title>
</head>
<body>
	
		<div class="navbar navbar-static-top ">
			
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="index.php">motionPHP</a>
					<ul class="nav">
						<li <?php if(strstr($page,'index.php')||strstr($page,'event.php')){echo 'class="active"';}?>><a href="index.php">Events</a></li>
						<li <?php if(strstr($page,'live.php')){echo 'class="active"';}?>><a href="live.php">Live</a></li>
						<li <?php if(strstr($page,'statistics.php')){echo 'class="active"';}?>><a href="statistics.php">Stats</a></li>
						<li><a href="http://robcaw.com/motionphp/">Help</a></li>
					</ul>
				</div>
			</div>
		</div>

<div class="container">