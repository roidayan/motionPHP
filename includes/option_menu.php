<?php
/**
	Page:
	Author:
	Description:
**/
?>
<?php
//option menu


$limit_options = array(6,9,12,15);
$order_sort_options = array('ASC', 'DESC');
$order_criteria_options = array('length','event_time_stamp');
$no_cameras = array(); //gets items for the array in the camera query below
$dates = array(); // stores the dates in database in an arary
$longer_than_options = array(0,5,10,15,30,60,120,240); //time in seconds to filter by
//Queries for filling some dropdown lists.

//Find out how many cameras there are in the database.
$query_camera = "SELECT DISTINCT camera FROM security ORDER BY camera ASC";
$result_camera = mysqli_query($connection, $query_camera) or die ("Query Error: $query_camera. ".mysql_error());

//Find out dates stored 
$query_dates = "SELECT DATE(event_time_stamp) as date, event_time_stamp from security GROUP BY date";
$result_dates = mysqli_query($connection, $query_dates) or die ("Query Error: $query_dates. " .mysqli_error());

//Add cameras to array
while($row_camera = mysqli_fetch_array($result_camera))
{
	array_push($no_cameras,$row_camera['camera']);
}
//Add dates to array
while($row_dates = mysqli_fetch_array($result_dates))
{
	array_push($dates,$row_dates['date']);
}

//Check for POST. I.e. check whether any sorting has been applied.
if(!isset($_POST['submit_options']))
{
	$limit = 6;
	$order_by = 'DESC';
	$order_criteria = 'event_time_stamp';
	$camera = 1;
	$date = '%';
	$longer_than = 30;
}
else
{

	//Set the amount of previews to show
	if(isset($_POST['preview_limit']))
	{
		$limit = $_POST['preview_limit'];
	}
	//but if its not set then set it to the default 6.
	else
	{
		$limit = 6;
	}
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
	//Set date to view
	if(isset($_POST['date']))
	{
		$date = $_POST['date'];
	}
	//else set it to the default of 1.
	else
	{
		$date = '%';
	}
	//Set longer than filter.
	if(isset($_POST['longer_than']))
	{
		$longer_than = $_POST['longer_than'];
	}
	//else set it to the default of 30.
	else
	{
		$longer_than = 30;
	}
}
?>

<!--<script type="text/javascript">
$(document).ready(function() {
 // hides the slickbox as soon as the DOM is ready
  $('#options_menu').hide(); 
 // toggles the slickbox on clicking the noted link  
  $('#filter_toggle').click(function() {
    $('#options_menu').slideToggle(400);
    return false;
  });
});
</script>-->

<script type="text/javascript">
$(document).ready(function() {

 
	//$options_menu_status = .cookie('options_menu_status');
	
	//$('#testing').text($.cookie('options_menu_status'));


	if($.cookie('options_menu_status').indexOf( 'hidden' ) > -1 ) //if menu is hidden
	{
		$('#options_menu').hide(); 
		$('#testing').text($.cookie('options_menu_status'));
	}
	else if($.cookie('options_menu_status').indexOf( 'visible' ) > -1 )
	{
		$('#options_menu').show();
		$('#testing').text($.cookie('options_menu_status'));
	}





  	$('#filter_toggle').click(function() {
	  	if($('#options_menu').is(":visible"))
	  	{	
	  		$('.filter_button').text('Show Filters');
	  		$.cookie('options_menu_status','hidden');
			$('#options_menu').slideUp(400);
	  	}
	  	else
	  	{	
	  		$('.filter_button').text('Hide Filters');
	  		$.cookie('options_menu_status','visible');
	  		$('#options_menu').slideDown(400);
	  	}
    
    	return false;
  	});
});
</script>

<!--<code id="testing"></code>-->

<div id="options_menu">
	<form action="<?php echo $_server['PHP_SELF']; ?>" method="post">
		<label>Show:</label>
		<select name="preview_limit">
		<option value="2147483647">All</option>	
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
		
		<label>date:</label>
		<select name="date">
		<option value="%">All</option>
			<?php 
				foreach($dates as $d)
				{
					$timestamp = strtotime($d);

					if($date == $d)
						{
							if(date("Y-m-d",$timestamp) == date("Y-m-d"))
							{
								echo '<option selected="selected" value="'.$d.'">Today</option>';
							}
							else
							{
								echo '<option selected="selected" value="'.$d.'">'.date('d/m/Y',$timestamp).'</option>';
							}
							
						}
					else
						{
							if(date("Y-m-d",$timestamp) == date("Y-m-d"))
							{
								echo '<option value="'.$d.'">Today</option>';
							}
							else
							{
								echo '<option value="'.$d.'">'.date('d/m/Y',$timestamp).'</option>';
							}
							
						}
				}
			?>
			
		</select>
		<label>camera:</label>

		<select name="camera">
		<option value="'%'">All</option>
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

		<label>longer than:</label>
		<select name="longer_than">
			<?php 
				foreach($longer_than_options as $lt)
				{
					if($longer_than == $lt)
						{echo '<option selected="selected" value="'.$lt.'">'.date('i:s', $lt).'</option>';}
					else
						{echo '<option value="'.$lt.'">'.date('i:s', $lt).'</option>';}
				}
			?>
		</select>


		<label>Sort by:</label>
		<select name="preview_order_criteria">
			<?php 
				foreach($order_criteria_options as $oc)
				{
					if($oc == "event_time_stamp")
					{
						$oc_e = "Date";
					}
					elseif($oc =="length")
					{
						$oc_e = "Length";
					}
					if($order_criteria == $oc)
						{echo '<option selected="selected" value="'.$oc.'">'.$oc_e.'</option>';}
					else
						{echo '<option value="'.$oc.'">'.$oc_e.'</option>';}
				}
			?>
		</select>
		
		<select name="preview_order">
			<?php 
				foreach($order_sort_options as $o)
				{
					if($o == "ASC")
					{
						$o_e = "Ascending";
					}
					elseif($o =="DESC")
					{
						$o_e = "Descending";
					}
					if($order_by == $o)
						{echo '<option selected="selected" value="'.$o.'">'.$o_e.'</option>';}
					else
						{echo '<option value="'.$o.'">'.$o_e.'</option>';}
				}
			?>
		</select>
		
		
		
		<input type="submit" value="Go" name="submit_options"/>
	</form>
</div>