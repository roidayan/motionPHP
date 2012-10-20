<?php
//includes
include('includes/header.php');

//page variables

//check that an id is set in GET and store it for use.
if(isset($_GET['id']))
	{
		$event_id  = $_GET['id'];
		//echo $event_id;
	}
else
{
	echo "No event selected";
}

//queries
//Query to get all the frames and event_time_stamp from the specified event id.
$query_frames = "SELECT event_time_stamp,frame, filename FROM $table WHERE event_id = $event_id AND file_type = 1 ORDER BY time_stamp ASC";
$result_frames = mysqli_query($connection, $query_frames) or die ("Query Error: $query_frames ".mysql_error());
$row_frames = mysqli_fetch_array($result_frames);

//Query to get filename of movie.

$query_video = "SELECT event_time_stamp,frame, filename FROM $table WHERE event_id = $event_id AND file_type = 8";
$result_video = mysqli_query($connection, $query_video) or die ("Query Error: $query_video ".mysql_error());
$row_video = mysqli_fetch_array($result_video);


//Query to get details of the current event in the loop. Use's the above loop's $row[event_id]
//in the WHERE clause. Also gets the latest(max) and earliest(min) timestamps in order to work 
//out the length of an event (which is possibly a second too long).
$query_details = "SELECT camera, COUNT(frame) as frame_count, event_time_stamp, TIMESTAMPDIFF( 
SECOND , MIN( time_stamp ) , MAX( time_stamp ) ) AS length FROM $table WHERE file_type = 1 AND event_id = $event_id" ;
$result_details = mysqli_query($connection, $query_details) or die ("Query Error: $query_details. ".mysql_error());
//echo $query_details;

//Add the rows to an array.
$row_details = mysqli_fetch_array($result_details);
//Convert the string timestamp of the event to a php timestamp.
$timestamp = strtotime($row_details['event_time_stamp']);

//echo  $query_details.'<br />';
//echo 'Today '.date('h:i:s A',$timestamp);
?>



<h2>Event - <?php if(date("Y-m-d",$timestamp) == date("Y-m-d"))
	{
		echo 'Today '.date('h:i:s A',$timestamp);
	}
	else
	{
		echo date('l jS F Y h:i:s A',$timestamp);	
	}?>
</h2>

<div class="row">
	<div class="span9">
		<video controls="true" width="50%">
<?
//		<img width="100%" class="event_preview" src="http://www.placehold.it/300x200"/>
	echo '<source src="' . $image_path.baseimage($row_video['filename']) . '" type="' . $video_type . '">';
?>
			No support for video playback.
		</video>
	</div>
	<div class="span3">
	<div class="well">
	<ul class="unstyled">

		<?php include('includes/detail_list.php');?>
		<li><a style="margin-bottom:5px;" class="btn btn-primary btn-block" href="<?php echo $image_path.baseimage($row_video['filename']) ?>"><i class="icon-download icon-white"></i> Download</a></li>
		<li class"delete_event">
			<?php 
				echo '<form action="'.$_SERVER['PHP_SELF'].'?id='.$event_id.'" method="post">';
				
				if(!isset($_POST['submit_delete']))
				{
					echo '<button style="margin-bottom:5px;" class="btn btn-danger btn-block" type="submit"  name="submit_delete"><i class="icon-remove icon-white"></i> Delete</button>';
				}
				else
				{
					echo '<button style="margin-bottom:5px;" class="btn disabled btn-block" type="submit"  name="submit_delete"><i class="icon-remove"></i> Delete</button>';
					echo '<div style="padding:5px; margin-bottom:0px;" class="alert alert-error"><h4>Are you sure?</h4> Deleting will not remove the image files.<br />';
					echo '<div style="text-align:center;"><button style="margin-right:5px;"class="btn btn-danger" type="submit" name="delete_event">Delete</button>';
					echo '<button class="btn btn-success" type="submit" name="delete_event_false">Cancel</button></div></div>';

				}
				if(isset($_POST['delete_event']))
					{
						$query_delete = "DELETE FROM $table WHERE event_id = $event_id";
						$result_delete = mysqli_query($connection, $query_delete) or die ("Query Error: $query_delete. ".mysql_error());
						header('Location: index.php');
					}
				echo '</form>';
			?>
		</li>
		<div class="clearfix"></div>
	</ul>
</div>
</div>
</div>

<div class="row">
	<div class="span12">
		<ol class="frame_list">

<?php

//loop to display all frames.
do{
	$f=$image_path.baseimage($row_frames['filename']);
	echo '<li><a href="'.$f. '"><img class="frame_event_preview" src="'.$f. '"/></a></li>';
}while($row_frames = mysqli_fetch_array($result_frames))





?>
		</ol>
	</div>
</div>
<?php include('includes/footer.php'); ?>
