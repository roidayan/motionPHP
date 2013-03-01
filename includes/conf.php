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

//Cameras being monitored by Motion
//Order should be the same as motion threads order
$cameras = array('Kitchen', 'Living Room');

// Only show event frames if there are max X evets.
$show_max_frames = 20;

// For optimizing mysql query limit queries to max records.
$query_max_rows = 1000;
