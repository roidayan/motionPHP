<?php

require('conf.php');

//get the original amount of rows.
$query = "SELECT * FROM security";
$result = mysqli_query($connection, $query) or die("Query Error: $query. ".mysql_error());

$original_count = mysqli_num_rows($result);

//echo $original_count;

//perform delete query. Deletes records older than 7 days.
$query_delete = "delete from security where event_time_stamp<DATE_SUB(curdate(), INTERVAL 7 DAY)" ;
$result_delete = mysqli_query($connection, $query_delete)or die ("Query Error: $query_delete. ".mysql_error());

//get the new count of rows.
$result = mysqli_query($connection, $query) or die("Query Error: $query. ".mysql_error());
$new_count = mysqli_num_rows($result);

echo "Deleting rows... ";
//echo $new_count;

//work out the amount of rows deleted.
$rows_deleted = $original_count - $new_count;

//print number of rows deleted
echo "$rows_deleted rows deleted";
?>