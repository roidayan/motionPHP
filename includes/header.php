<?php
/**
	Page:
	Author:
	Description:
**/
?>
<?php
require('includes/conf.php');

//get current page
$page = basename($_SERVER['REQUEST_URI']);
echo $page;





?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link rel='stylesheet'  href="style.css" type='text/css' media='all' />


<head>

<title>motionPHP Home</title>

</head>
<body>

<div id="header">
	
	<h1>motionPHP</h1>

	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="live.php">Live</a></li>
		<!--<li><a href="archive.php">Archive</a></li>-->
		<li><a href="statistics.php">Stats</a></li>
	</ul>


	
</div>

<div id="content">