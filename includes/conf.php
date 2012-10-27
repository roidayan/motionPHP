<?php
/**phpinfo();**/
ini_set('display_errors', true);

//Enter your database details here
//Name of the machine hosting the mysql database, usually localhost
$host = "localhost";
//Username for the named database
$user = "motion";
//Password
$pass = "motion1";
//Name of database.
$db = "motiondb";
//Table
$table = "security";

//Image path to where Motion stores snapshots. I created a symlink in images to the camera folder. 
//For example: Motion stores images to /media/hdd/camera but it would be dificult to access this via Apache.
//So I created a symlink in ~/public_html/motionPHP/images/camera -> /media/hdd/camera.
//Don't forget the trailing slash!
$image_path = 'images/';
$video_type = 'video/ogg';

//No. of cameras/threads being monitored by Motion
$no_cameras = 1;

//don't modify this line.
$connection = mysqli_connect($host, $user, $pass, $db) or die ("unable to connect");


$strip_path = realpath($image_path);

function baseimage($image) {
	global $strip_path;
	$i = $image;
	if (substr_compare($image, $strip_path, 0))
		$i = substr($image, strlen($strip_path));
	return $i;
}


function secondsToTime($seconds)
{
    // extract hours
    $hours = (int) floor($seconds / (60 * 60));
 
    // extract minutes
    $divisor_for_minutes = $seconds % (60 * 60);
    $minutes = (int) floor($divisor_for_minutes / 60);
 
    // extract the remaining seconds
    $divisor_for_seconds = $divisor_for_minutes % 60;
    $seconds = (int) ceil($divisor_for_seconds);

    $hours = str_pad($hours, 2, '0', STR_PAD_LEFT); 
    $minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT); 
    $seconds = str_pad($seconds, 2, '0', STR_PAD_LEFT); 

    return "$hours:$minutes:$seconds";
}
?>
