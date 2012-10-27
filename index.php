<?php
include('includes/header.php');
?>

	<h2>Latest events</h2>
	<div class="row"><!--Start Option menu-->
	<?php include('includes/option_menu.php');?>
	</div>

	<div class="row">
		<div class="span12">
			<?php
				//include options menu
				//include main loop that displays the event preview images and details
				include('includes/event_preview.php');
			?>
		</div>
	</div>


<?php
include('includes/footer.php');
?>