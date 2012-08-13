<<<<<<< HEAD
<?php
//includes
include('includes/header.php');
include('includes/option_menu.php');




//query
//Get latest events from database. The order and limit of the results are defined by what is set in
//the drop down list in /includes/option_menu.php. If nothing is set defaults are used.
			
$query = "SELECT id, camera, event_id, filename, frame, file_type, time_stamp, event_time_stamp, TIMESTAMPDIFF( 
SECOND , MIN( time_stamp ) , MAX( time_stamp ) ) AS length
FROM security WHERE DATE(event_time_stamp) LIKE '$date' AND camera LIKE $camera GROUP BY event_id 
ORDER BY $order_criteria $order_by 
LIMIT $limit";

//echo $query;			

$result = mysqli_query($connection, $query) or die ("Query Error: $query. ".mysql_error());
?>





<?php
//include main loop that displays the event preview images and details
include('includes/event_preview.php');

?>




<?php
//footer.
include('includes/footer.php');
?>
=======
<?php
//includes
include('includes/header.php');
include('includes/option_menu.php');




//query
//Get latest events from database. The order and limit of the results are defined by what is set in
//the drop down list in /includes/option_menu.php. If nothing is set defaults are used.
			
$query = "SELECT id, camera, event_id, filename, frame, file_type, time_stamp, event_time_stamp, TIMESTAMPDIFF( 
SECOND , MIN( time_stamp ) , MAX( time_stamp ) ) AS length
FROM security WHERE DATE(event_time_stamp) LIKE '$date' AND camera LIKE $camera GROUP BY event_id 
ORDER BY $order_criteria $order_by 
LIMIT $limit";

//echo $query;			

$result = mysqli_query($connection, $query) or die ("Query Error: $query. ".mysql_error());
?>





<?php
//include main loop that displays the event preview images and details
include('includes/event_preview.php');

?>




<?php
//footer.
include('includes/footer.php');
?>
>>>>>>> fbec3a280f7f814f7d12047b29114e762d4c5601
