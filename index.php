
<?php
//header
include('includes/header.php');

?>



<h2>Latest events</h2><a class="link_button filter_button" id="filter_toggle" href="#">Show Filters</a>

<?php

include('includes/option_menu.php');
//include main loop that displays the event preview images and details
include('includes/event_preview.php');

?>




<?php
//footer.
include('includes/footer.php');
?>
