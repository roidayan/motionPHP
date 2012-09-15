<div id="event_preview_container">
<?php
//query
//Get latest events from database. The order and limit of the results are defined by what is set in
//the drop down list in /includes/option_menu.php. If nothing is set defaults are used.
			
$query_details = "SELECT COUNT(frame) as frame_count,id, camera, event_id, filename, frame, file_type, time_stamp, event_time_stamp, TIMESTAMPDIFF( 
SECOND , MIN( time_stamp ) , MAX( time_stamp ) ) AS length
FROM $table WHERE DATE(event_time_stamp) LIKE '$date' AND camera LIKE $camera 
GROUP BY event_id 
HAVING TIMESTAMPDIFF( SECOND , MIN( time_stamp ) , MAX( time_stamp ) ) > $longer_than
ORDER BY $order_criteria $order_by 
LIMIT $limit";

//echo $query;			

$result = mysqli_query($connection, $query_details) or die ("Query Error: $query_details. ".mysql_error());
//Main loop displays the latest events and their details. 
//Ensure $result matches the page it is being included on.
while($row_details = mysqli_fetch_array($result))
{

	//convert the event's time stamp from a string to a timestamp.
	$timestamp = strtotime($row_details['event_time_stamp']);
	
	//Display each event and its details.
	echo '<div class="image_container">';	//Display an image of the event and link to the event page for that event.
	echo '	<a href="event.php?id='.$row_details['event_id'].'"><img class="event_preview" src="'.$image_path.$row_details['filename'].'-0'.$row_details['frame']. '.jpg"/></a>';
	echo '	<ul class="detail_list">';
	include('includes/detail_list.php');
	echo '</ul>';
	echo '</div>';
}


?>
</div>
