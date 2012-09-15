	<?php
	//Get the time of the event.
	if(date("Y-m-d",$timestamp) == date("Y-m-d"))
	{
		echo '	<li class="date_item"><span class="date_detail">Time: </span>Today '.date('h:i:s A',$timestamp).'</li>';
	}
	else
	{
		echo '	<li class="date_item"><span class="date_detail">Time: </span>'.date('l jS F Y h:i:s A',$timestamp).'</li>';	
	}	
	//Format the date to show the length of an event.
	echo '	<li class="length_item"><span class="length_detail">Length: </span>'.date('H:i:s', $row_details['length']).'</li>';
	
	//Camera number
	echo '	<li class="camera_item"><span class="camera_detail">Camera: </span>#'.$row_details['camera'].'</li>';
	echo '<li class="frames_item"><span class="frames_detail">Frames: </span>'.$row_details['frame_count'].'</li>';

