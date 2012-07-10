<?php

//get current page
$page = basename($_SERVER['REQUEST_URI']);
echo $page;


//option menu
$limit_options = array(6,9,12,15);
$order_sort_options = array('ASC', 'DESC');
$order_criteria_options = array('length','event_time_stamp');
$no_cameras = array(); //gets items for the array in the camera query below

//Cameras
//Find out how many cameras there are in the database.
$query_camera = "SELECT DISTINCT camera FROM security ORDER BY camera ASC";
$result_camera = mysqli_query($connection, $query_camera) or die ("Query Error: $query_camera. ".mysql_error());
while($row_camera = mysqli_fetch_array($result_camera))
{
	array_push($no_cameras,$row_camera['camera']);
	
}



//Check for POST. I.e. check whether any sorting has been applied.
if(isset($_POST['submit_options']))
{
	if(strpos($page, 'index.php') !==false)
	{
		//Set the amount of previews to show
		if(isset($_POST['preview_limit']))
		{
			$limit = $_POST['preview_limit'];
		}
		//but if its not set then set it to the default 6.
		else
		{
			$limit = '%';
		}
	}
	elseif(strpos($page, 'archive.php') !==false)
	{
		//Set the amount of previews to show
		if(isset($_POST['preview_limit']))
		{
			$limit = $_POST['preview_limit'];
		}
		//but if its not set then set it to the default 6.
		else
		{
			$limit = '%';
		}
	}
	//Set the order to show previews in.
	if(isset($_POST['preview_order']))
	{
		$order_by = $_POST['preview_order'];
	}
	//otherwise set it to default DESC
	else
	{
		$order_by = 'DESC';
	}
	//Set the criteria for sorting.
	if(isset($_POST['preview_order_criteria']))
	{
		$order_criteria = $_POST['preview_order_criteria'];
	}
	//otherwise set the criteria as the time of the event.
	else
	{
		$order_criteria = 'event_time_stamp';
	}
	//Set the camera to view
	if(isset($_POST['camera']))
	{
		$camera = $_POST['camera'];
	}
	//else set it to the default of 1.
	else
	{
		$camera = 1;
	}
	
}
else
{
	//defaults if no POST
	$limit = 6;
	$order_by = 'DESC';
	$order_criteria = 'event_time_stamp';
	$camera = 1;
}
?>
<div id="options_menu">
	<form action="<?php echo $_server['PHP_SELF']; ?>" method="post">
		<label>Show:</label>
		<select name="preview_limit">
			
			<?php 
				foreach($limit_options as $l)
				{
					if($limit == $l)
						{echo '<option selected="selected" value="'.$l.'">'.$l.'</option>';}
					else
						{echo '<option value="'.$l.'">'.$l.'</option>';}
				}
			?>
		</select>
		
		<label>camera:</label>
		<select name="camera">
			<?php 
				foreach($no_cameras as $c)
				{
					if($camera == $c)
						{echo '<option selected="selected" value="'.$c.'">'.$c.'</option>';}
					else
						{echo '<option value="'.$c.'">'.$c.'</option>';}
				}
			?>
		</select>
		
		<label>, Sort by:</label>
		<select name="preview_order_criteria">
			<?php 
				foreach($order_criteria_options as $oc)
				{
					
					if($order_criteria == $oc)
						{echo '<option selected="selected" value="'.$oc.'">'.$oc.'</option>';}
					else
						{echo '<option value="'.$oc.'">'.$oc.'</option>';}
				}
			?>
		</select>
		
		<select name="preview_order">
			<?php 
				foreach($order_sort_options as $o)
				{
					
					if($order_by == $o)
						{echo '<option selected="selected" value="'.$o.'">'.$o.'</option>';}
					else
						{echo '<option value="'.$o.'">'.$o.'</option>';}
				}
			?>
		</select>
		
		
		
		<input type="submit" value="Submit" name="submit_options"/>
	</form>
</div>