<?php
//includes
include('includes/header.php');
include('includes/option_menu.php');


if(isset($_GET['date']))
{
$date = $_GET['date'];

 $date_sql_str = "'$date'";

}
else
{
	$date_sql_str = "'%'";
}

$query_dates = "SELECT DATE(event_time_stamp) as date, event_time_stamp from security GROUP BY date";
$result_dates = mysqli_query($connection, $query_dates) or die ("Query Error: $query_dates. " .mysqli_error());



//query
//Get latest events from database. The order and limit of the results are defined by what is set in
//the drop down list in /includes/option_menu.php. If nothing is set defaults are used.
			
$query = "SELECT id, camera, event_id, filename, frame, file_type, time_stamp, event_time_stamp, TIMESTAMPDIFF( 
SECOND , MIN( time_stamp ) , MAX( time_stamp ) ) AS length
FROM security WHERE DATE(event_time_stamp) LIKE $date_sql_str AND camera = $camera GROUP BY event_id 
ORDER BY $order_criteria $order_by 
LIMIT $limit";

$result = mysqli_query($connection, $query) or die ("Query Error: $query. ".mysql_error());




?>

<ul>
<?php
//print days.
while($row = mysqli_fetch_array($result_dates))
{

	//get date from query
	$date_archive = $row['date'];

	echo '<li><a href="?date='.$date_archive.'">'.$date_archive.'</a></li>';

}


//include main loop that displays the event preview images and details
include('includes/event_preview.php');

?>
</ul>



<?php
//footer.
include('includes/footer.php');
?>