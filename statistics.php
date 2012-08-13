<?php
//includes
include('includes/header.php');


?>



<?php
//initialize variables
$total_events = 0;
$total_length = 0;
$longest_event_length = 0;
$longest_event_id = 0;
$longest_event_time = 0;
$number_of_days = 0;

//Queries
//Query to get amount of days/dates etc.
$query_dates = "SELECT DATE(event_time_stamp) as date, event_time_stamp from security GROUP BY date";
$result_dates = mysqli_query($connection, $query_dates) or die ("Query Error: $query_dates. " .mysqli_error());


while($row_dates =  mysqli_fetch_array($result_da0tes))
{
	$number_of_days ++;
}


//query gets all fields and the length of each event. Is also used to calculate total events in PHP.
$query_length = "SELECT *, TIMESTAMPDIFF(SECOND , MIN(time_stamp ),MAX( time_stamp )) AS length FROM security GROUP BY event_id";
$result_length = mysqli_query($connection, $query_length) or die ("Query Error: $query_length. ".mysql_error());



//Loop to get totals from query. 
while($row_length = mysqli_fetch_array($result_length))
{
	$length = $row_length['length']; //get the length of the current record in loop.
	$total_length += $length; //Increase the total length
	$total_events ++; //increment the total events.
	
	//find out the max length of an event by seeing if current length is greater than the last.
	if($length > $longest_event_length)
	{
		$longest_event_length = $length; //assign the current length to the variable $length
		$longest_event_id = $row_length['event_id']; //assign the current event_id 
		$longest_event_time = strtotime($row_length['event_time_stamp']); //assign the time of the current record 
	}
}

//echo $total_length;


//work out average length of events
$average_length = $total_length / $total_events;

//average events per hour
$total_hours = $total_length / 3600;
//echo $total_hours;
$average_events_hour =  $total_events /$total_hours;


//$query_totals = "SELECT MAX(time_stamp), MIN(time_stamp), event_id FROM security GROUP BY event_id";
//$result_totals = mysqli_query($connection, $query_length) or die ("Query Error: $query_length. ".mysql_error());


?>
<ul id="statistics">
	<li>Total events: <?php echo $total_events ?></li>
	<li>Total time recorded: <?php echo gmdate("H:i:s", $total_length)?></li>
	<li>Average length of event: <?php echo gmdate("H:i:s", $average_length)?></li>
	<li>Longest Event: <?php echo gmdate("H:i:s", $longest_event_length).' On '.'<a href="event.php?id='.$longest_event_id.'">'.date('l jS F Y h:i:s A',$longest_event_time)?></a></li>
	<li>Average events per hour: <?php echo number_format($average_events_hour) ?></li>
	<li>Amount of days in database: <?php echo $number_of_days ?></li>
</ul>






<?php
//footer.
include('includes/footer.php');
?>