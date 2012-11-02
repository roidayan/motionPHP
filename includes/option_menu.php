<?php
//option menu


$limit_options = array(8,9,12,15,30,60,90,120);
$order_sort_options = array('ASC', 'DESC');
$order_criteria_options = array('length','event_time_stamp');
$dates = array(); // stores the dates in database in an arary
$longer_than_options = array(0,5,10,15,30,60,120,240); //time in seconds to filter by
//Queries for filling some dropdown lists.


//Find out dates stored 
$query_dates = "SELECT DATE(event_time_stamp) as date, event_time_stamp from $table  GROUP BY date ORDER BY date DESC";
$result_dates = mysqli_query($connection, $query_dates) or die ("Query Error: $query_dates. " .mysqli_error());

//Add dates to array
while($row_dates = mysqli_fetch_array($result_dates))
{
	array_push($dates,$row_dates['date']);
}

$limit = $limit_options[0];
$order_by = $order_sort_options[1]; 
$order_criteria = $order_criteria_options[1];
$camera = '%';
$date = '%';
$longer_than = $longer_than_options[0];

if (isset($_GET['submit_options'])) {
	//Set the amount of previews to show
	if(isset($_GET['preview_limit']))
	{
		$limit = $_GET['preview_limit'];
	}
	if(isset($_GET['preview_order']))
	{
		$order_by = $_GET['preview_order'];
	}
	//Set the criteria for sorting.
	if(isset($_GET['preview_order_criteria']))
	{
		$order_criteria = $_GET['preview_order_criteria'];
	}
	//Set the camera to view
	if(isset($_GET['camera']))
	{
		$camera = $_GET['camera'];
	}
	//Set date to view
	if(isset($_GET['date']))
	{
		$date = $_GET['date'];
	}
	//Set longer than filter.
	if(isset($_GET['longer_than']))
	{
		$longer_than = $_GET['longer_than'];
	}
}
?>
		<div class="span12">
			<div class="">
				<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
			<fieldset>
			<label>Show:</label>
			<select class="input-mini" name="preview_limit">
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
			<select class="input-small" name="date">
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
			<select class="input-mini" name="camera">
			<option value="%">All</option>
				<?php 
					for($c = 1; $c <= $no_cameras; $c++)
					{
						if($camera == $c)
							{echo '<option selected="selected" value="'.$c.'">'.$c.'</option>';}
						else
							{echo '<option value="'.$c.'">'.$c.'</option>';}
					}
				?>
			</select>



			<label>longer than:</label>
			<select class="input-small" name="longer_than">
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
			<select class="input-small" name="preview_order_criteria">
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
			
			<select class="input-medium" name="preview_order">
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
			
			
			
			<input class="btn" type="submit" value="Go" name="submit_options"/>
			</fieldset>
				</form>
			</div>
		</div>

