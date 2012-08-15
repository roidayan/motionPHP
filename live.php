<?php
//includes
include('includes/header.php');

?>

<!--<p>Doesn't work in chrome.</p>
<iframe width="660" height="380" frameborder="no" scrolling="no" src="http://192.168.0.8:8081/" />-->

<script type="text/javascript">

$(document).ready(function() {
   setInterval('reloadImages()', 2500); // 60 seconds
   });
function reloadImages()
{

  $('#live_image').attr('src', 'images/camera/lastsnap.jpg?' + Math.random());
}

</script>

<img src="images/camera/lastsnap.jpg" id="live_image"/>
<?php
//includes
include('includes/footer.php');
?>