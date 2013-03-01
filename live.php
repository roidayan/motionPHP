<?php
include('includes/header.php');
?>
<h2>Live Feed</h2>

<script type="text/javascript">
	$(document).ready(function() {
	   //setInterval('reloadImages()', 2500); // 60 seconds
	   });
	function reloadImages()
	{
		<?php
			//echo "$('.live_image1').attr('src', 'images/camera/lastsnap_1.jpg?' + Math.random());";
		?>
	}
</script>

<div class="row">
	<div class="span12">
			<?php
			for($c = 1; count($cameras); $c++)
			{
				echo '<div class="span4">';
				echo '<h3>'.$cameras[$c-1].'</h3>';
				//echo '<img src="images/camera/lastsnap_'.$c.'.jpg" class="live_image'.$c.'" class="video"/>';
				$cam = 'http://'.$_SERVER['HTTP_HOST'].'/cam'.$c;
				echo '<iframe class="live_cam" style="width:640px;height:480px;" src="'.$cam.'"></iframe>';
				echo '</div>';
			}
			?>
	</div>
</div>

<?php
include('includes/footer.php');
?>
