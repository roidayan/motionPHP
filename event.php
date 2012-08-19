
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
$query_frames = "SELECT event_time_stamp,frame, filename FROM security WHERE event_id = $event_id AND file_type = 1 ORDER BY time_stamp ASC";
$result_frames = mysqli_query($connection, $query_frames) or die ("Query Error: $query_frames ".mysql_error());
$row_frames = mysqli_fetch_array($result_frames);

//Query to get filename of movie.

$query_video = "SELECT event_time_stamp,frame, filename FROM security WHERE event_id = $event_id AND file_type = 8";
$result_video = mysqli_query($connection, $query_video) or die ("Query Error: $query_video ".mysql_error());
$row_video = mysqli_fetch_array($result_video);


//Query to get details of the current event in the loop. Use's the above loop's $row[event_id]
//in the WHERE clause. Also gets the latest(max) and earliest(min) timestamps in order to work 
//out the length of an event (which is possibly a second too long).
$query_details = "SELECT COUNT(frame) as frame_count, event_time_stamp, TIMESTAMPDIFF( 
SECOND , MIN( time_stamp ) , MAX( time_stamp ) ) AS length FROM security WHERE file_type = 1 AND event_id = $event_id" ;
$result_details = mysqli_query($connection, $query_details) or die ("Query Error: $query_details. ".mysql_error());


//Add the rows to an array.
$row_details = mysqli_fetch_array($result_details);
//Convert the string timestamp of the event to a php timestamp.
$timestamp = strtotime($row_details[event_time_stamp]);



?>


<?php //do{echo $image_path.$row_frames['filename'].'-0'.$row_frames['frame']. '.jpg, ';}while($row_frames = mysqli_fetch_array($result_frames))?>
<script type="text/javascript" src="flowplayer-3.2.4.min.js"></script>

<h2>Event - <? if(date("Y-m-d",$timestamp) == date("Y-m-d"))
	{
		echo 'Today '.date('h:i:s A',$timestamp);
	}
	else
	{
		echo date('l jS F Y h:i:s A',$timestamp);	
	}?>
</h2>

<div id="video" class="video">
	  <script type="text/javascript">
      $(document).ready(function () {

      flowplayer("player", "scripts/flowplayer-3.2.14.swf");
      });
    </script>
	<div id="video_object">
		<a  
			 href="<?php echo $image_path.$row_video['filename'].'.swf' ?>"
			 style="display:block;width:520px;height:330px"  
			 id="player"> 
		</a>
	</div>
	
		
		
		<!--<object data="<?php echo $image_path.$row_video['filename'].'.avi' ?>" width="640" height="360">
	   		<embed src="<?php echo $image_path.$row_video['filename'].'.avi' ?>" width="640" height="360" />
	  	</object> -->


	<ul id="video-details" class="detail_list">
		<li class="save_item"><span class="save_detail">Save</span><a href="<?php echo $image_path.$row_video['filename'].'.avi' ?>">Download video</a></li>
		<?include('includes/detail_list.php');?>
		<li class"delete_event">
			<?php 
				echo '<form action="'.$_server['PHP_SELF'].'" method="post">';
				if(!isset($_POST['submit_delete']))
				{
					echo '<input type="submit" value="Delete" name="submit_delete"/>';
				}
				else
				{
					echo '<strong>Are you sure?</strong>';
					echo '<input type="submit" value="Yes" name="delete_event"/>';
					echo '<input type="submit" value="No" name="delete_event_false"/>';
					echo '<span>Deleting will not remove the files</span>';
				}
				if(isset($_POST['delete_event']))
					{
						$query_delete = "DELETE FROM security WHERE event_id = $event_id";
						$result_delete = mysqli_query($connection, $query_delete) or die ("Query Error: $query_delete. ".mysql_error());
						header('Location: index.php');
					}
				echo '</form>';
			?>
		</li>
		
	</ul>
</div>

<ol id="frame_list">

<?php

//loop to display all frames.
do{
	echo '<li><a href="'.$image_path.$row_frames['filename'].'-0'.$row_frames['frame']. '.jpg"><img class="frame_event_preview" src="'.$image_path.$row_frames['filename'].'-0'.$row_frames['frame']. '.jpg"/></a></li>';
}while($row_frames = mysqli_fetch_array($result_frames))





?>
</ol>
<?php include('includes/footer.php'); ?>
