<?php
/**phpinfo();**/
//ini_set('display_errors', true);

//database
$host = "localhost";
$user = "rob";
$pass = "motion";
$db = "camera";

$connection = mysqli_connect($host, $user, $pass, $db) or die ("unable to connect");


//global variables
$image_path = 'images/camera/';

?>

