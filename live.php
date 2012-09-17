<?php
include('includes/header.php');
?>
<h2>Live Feed</h2>

<script type="text/javascript">
	$(document).ready(function() {
	   setInterval('reloadImages()', 2500); // 60 seconds
	   });
	function reloadImages()
	{
		<?php
			for($c = 1; $c <= $no_cameras; $c++)
			{
				echo "$('.live_image".$c."').attr('src', 'images/camera/lastsnap_".$c.".jpg?' + Math.random());";
			}
			//echo "$('.live_image1').attr('src', 'images/camera/lastsnap_1.jpg?' + Math.random());";
		?>
	}
</script>

<div class="row">
	<div class="span12">

		<div id="video">
			<?php
			for($c = 1; $c <= $no_cameras; $c++)
			{
				echo '<h3>Camera '.$c.'</h3>';
				echo '<img src="images/camera/lastsnap_'.$c.'.jpg" class="live_image'.$c.'" class="video"/>';
			}
			?>
		</div>
	</div>
</div>

<?php
include('includes/footer.php');
?>