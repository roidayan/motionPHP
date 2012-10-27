<?php
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
$query_dates = "SELECT DATE(event_time_stamp) as date, event_time_stamp from $table GROUP BY date";
$result_dates = mysqli_query($connection, $query_dates) or die ("Query Error: $query_dates. " .mysqli_error());


while($row_dates =  mysqli_fetch_array($result_dates))
{
	$number_of_days ++;
}


//query gets all fields and the length of each event. Is also used to calculate total events in PHP.
$query_length = "SELECT event_id, event_time_stamp, TIMESTAMPDIFF(SECOND , MIN(time_stamp ),MAX( time_stamp )) AS length FROM $table WHERE file_type = 1 GROUP BY event_id";
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


//$query_totals = "SELECT MAX(time_stamp), MIN(time_stamp), event_id FROM $table GROUP BY event_id";
//$result_totals = mysqli_query($connection, $query_length) or die ("Query Error: $query_length. ".mysql_error());


?>

<h2>Statistics</h2>
<div class="row">

	<div class="span8">
		<table class="table table-hover table-bordered">
			<tbody>
			<tr>
				<th>Total events</th>
				<td><?php echo $total_events ?></td>
			</tr>
			<tr>
				<th>Total time recorded</th>
				<td><?php echo gmdate("H:i:s", $total_length)?></td>
			</tr>
			<tr>
				<th>Average length of event</th>
				<td><?php echo gmdate("H:i:s", $average_length)?></td>
			</tr>
			<tr>
				<th>Longest Event</th>
				<td><?php 
			echo secondsToTime($longest_event_length);
			
			if(date("Y-m-d",$longest_event_time) == date("Y-m-d"))
			{
				echo ' <a href="event.php?id='.$longest_event_id.'">Today '.date('h:i:s A',$longest_event_time).'</a>';	
			}
			else
			{
				echo ' On '.'<a href="event.php?id='.$longest_event_id.'">'.date('l jS F Y h:i:s A',$longest_event_time).'</a>';	
			}
			
		?></td>
			</tr>
			<tr>
				<th>Average events per hour</th>
				<td><?php echo number_format($average_events_hour) ?></td>
			</tr>
			<tr>
				<th>Amount of days in database</th>
				<td><?php echo $number_of_days ?></td>
			</tr>
		</tbody>
		</table>
	</div>
</div>

<?php
include('includes/footer.php');
?>
