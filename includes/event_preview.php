
<?php
//query
//Get latest events from database. The order and limit of the results are defined by what is set in
//the drop down list in /includes/option_menu.php. If nothing is set defaults are used.
			
$query_details = "SELECT COUNT(frame) as frame_count,id, camera, event_id, filename, frame, file_type, time_stamp, event_time_stamp, TIMESTAMPDIFF( 
SECOND , MIN( time_stamp ) , MAX( time_stamp ) ) AS length
FROM $table WHERE DATE(event_time_stamp) LIKE '$date' AND camera LIKE '$camera'
AND file_type = 1
GROUP BY event_id 
HAVING length >= $longer_than
ORDER BY $order_criteria $order_by 
LIMIT $limit";

//echo $query_details;

$result = mysqli_query($connection, $query_details) or die ("Query Error: $query_details. ".mysqli_error($connection));
//Main loop displays the latest events and their details. 
//Ensure $result matches the page it is being included on.
?>

				<ul class="thumbnails">
<?php
	while($row_details = mysqli_fetch_array($result))
	{
	$timestamp = strtotime($row_details['event_time_stamp']); //convert the event's time stamp from a string to a timestamp.
	echo '<li class="span3">';
	echo '<div class="thumbnail">';
	//Display an image of the event and link to the event page for that event.
	echo '<a href="event.php?id='.$row_details['event_id'].'"><img style="width:100%" src="'.$image_path.baseimage($row_details['filename']).'"/></a>';
	//echo '<a href="event.php?id='.$row_details['event_id'].'"><img width="100%" src="http://www.placehold.it/300x200"/></a>';
	echo '<ul class="unstyled">';
	include('includes/detail_list.php');

	echo '</ul></div></li>';
	}

?>

				</ul>
