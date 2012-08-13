<div id="event_preview_container">
<?php

//Main loop displays the latest events and their details. 
//Ensure $result matches the page it is being included on.
while($row = mysqli_fetch_array($result))
{

	//convert the event's time stamp from a string to a timestamp.
	$timestamp = strtotime($row[event_time_stamp]);
	
	//Display each event and its details.
	echo '<div class="image_container">
';	//Display an image of the event and link to the event page for that event.
	echo '	<a href="event.php?id='.$row[event_id].'"><img class="event_preview" src="'.$image_path.$row[filename].'-0'.$row[frame]. '.jpg"/></a>
';
	echo '	<ul class=class="detail-list">
	';
	//Format the date to show the length of an event.
	echo '	<li>Length: '.date('H:i:s', $row[length]).'</li>
	';
	//Get the time of the event.
	echo '	<li>Time: '.date('l jS F Y h:i:s A',$timestamp).'</li>
	';
	//Camera number
	echo '	<li>Camera: '.$row[camera].'</li>
	';
	echo '</div>
';
}


?>
</div>