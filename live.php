<?php
//includes
include('includes/header.php');

?>

<!--<p>Doesn't work in chrome.</p>
<iframe width="660" height="380" frameborder="no" scrolling="no" src="http://192.168.0.8:8081/" />-->

<h2>Live</h2>
<script type="text/javascript">

$(document).ready(function() {
   setInterval('reloadImages()', 2500); // 60 seconds
   });
function reloadImages()
{
	<?
		for($c = 1; $c <= $no_cameras; $c++)
		{
			echo "$('.live_image".$c."').attr('src', 'images/camera/lastsnap_".$c.".jpg?' + Math.random());";
		}
		//echo "$('.live_image1').attr('src', 'images/camera/lastsnap_1.jpg?' + Math.random());";
	?>
  
}

</script>
<div id="video">
		<?
		for($c = 1; $c <= $no_cameras; $c++)
		{
			echo '<h3>Camera '.$c.'</h3>';
			echo '<img src="images/camera/lastsnap_'.$c.'.jpg" class="live_image'.$c.'" class="video"/>';
		}
	?>
</div>
<?php
//includes
include('includes/footer.php');
?>