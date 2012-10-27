<?php
require('includes/conf.php');
//get current page
$lastc = substr($_SERVER['REQUEST_URI'], -1);
if ($lastc == '/')
	$page = 'index.php';
else
	$page = basename($_SERVER['REQUEST_URI']);

$pageTitle = '';

if(strstr($page,'index.php') or $page=='/')
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
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<script src="js/jquery-1.8.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<title>motionPHP - <?php echo $pageTitle; ?></title>
</head>
<body>
	
		<div class="navbar navbar-fixed-top ">
			
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="index.php">motionPHP</a>
					<div class="nav-collapse">
						<ul class="nav">
							<li <?php if(strstr($page,'index.php')||strstr($page,'event.php')){echo 'class="active"';}?>><a href="index.php">Events</a></li>
							<li <?php if(strstr($page,'live.php')){echo 'class="active"';}?>><a href="live.php">Live</a></li>
							<li <?php if(strstr($page,'statistics.php')){echo 'class="active"';}?>><a href="statistics.php">Stats</a></li>
							<li><a href="http://robcaw.com/motionphp/">Help</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

<div class="container">
