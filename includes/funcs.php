<?php

function baseimage($image) {
	global $image_path;
	$strip_path = realpath($image_path);
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
