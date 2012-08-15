


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
//echo $page;

//echo date();



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link rel='stylesheet'  href="style2.css" type='text/css' media='all' />


<head>

<title>motionPHP Home</title>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jquery.cookie.js"></script>
</head>
<body>
<div id="container">
<div id="header">
	
	<h1>motionPHP</h1>

	<? //menu 
	include('includes/menu.php');
	?>
</div><!--end header-->
<div id="content">