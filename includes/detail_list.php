<?php
	//Get the time of the event.
	if(date("Y-m-d",$timestamp) == date("Y-m-d"))
	{
		echo '	<li><i class="icon-calendar"></i> '.date('H:i:s',$timestamp).'</li>';
	}
	else
	{
		echo '	<li><i class="icon-calendar"></i> '.date('j/n/y H:i:s',$timestamp).'</li>';	
	}	
	//Format the date to show the length of an event.
	echo '	<li><i title="Length" class="icon-time"></i> '.secondsToTime($row_details['length']).'</li>';
	
	//Camera number
	echo '	<li><i title="Camera id" class="icon-camera"></i> '.$row_details['camera'].'</li>';
	echo '	<li><i title="Frame count" class="icon-film"></i> '.$row_details['frame_count'].'</li>';
