<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/jquery-1.8.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<title>motionPHP</title>
</head>
<body>
	<div class="container-fluid">
			<div class="navbar navbar-static-top navbar-inverse">
				<div class="navbar-inner">
					<a class="brand" href="index.php">motionPHP</a>
					<ul class="nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="live.php">Live</a></li>
						<li><a href="statistics.php">Stats</a></li>
						<li><a href="#">Help</a></li>
					</ul>
				</div>
			</div>
</div>
<div class="container">
		<div class="row-">
			<div class="span12">
				<div class="well well-small">
					<form class="form-inline">
						<label>Show:</label>
						<select class="input-mini" name="preview_limit">
							<option value="2147483647">All</option>	
							<option selected="selected" value="6">6</option>
							<option value="9">9</option><option value="12">12</option>
							<option value="15">15</option>
						</select>
		
						<label>date:</label>
						<select class="input-small" name="date">
							<option value="%">All</option>
							<option value="2012-08-27">27/08/2012</option>
							<option value="2012-08-26">26/08/2012</option>
							<option value="2012-08-25">25/08/2012</option>
							<option value="2012-08-22">22/08/2012</option>
							<option value="2012-08-21">21/08/2012</option>
							<option value="2012-08-20">20/08/2012</option>
							<option value="2012-08-19">19/08/2012</option>
							<option value="2012-08-18">18/08/2012</option>
							<option value="2012-08-17">17/08/2012</option>
							<option value="2012-08-16">16/08/2012</option>
							<option value="2012-08-15">15/08/2012</option>
							<option value="2012-08-14">14/08/2012</option>
							<option value="2012-08-13">13/08/2012</option>
							<option value="0000-00-00">01/01/1970</option>			
						</select>

						<label>camera:</label>
						<select class="input-mini" name="camera">
							<option value="'%'">All</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
						
						<label>longer than:</label>
						<select class="input-small" name="longer_than">
							<option value="0">00:00</option>
							<option value="5">00:05</option>
							<option value="10">00:10</option>
							<option value="15">00:15</option>
							<option selected="selected" value="30">00:30</option>
							<option value="60">01:00</option>
							<option value="120">02:00</option>
							<option value="240">04:00</option>
						</select>

						<label>Sort by:</label>
						<select class="input-small" name="preview_order_criteria">
							<option value="length">Length</option>
							<option selected="selected" value="event_time_stamp">Date</option>
						</select>
		
						<select class="input-medium" name="preview_order">
							<option value="ASC">Ascending</option>
							<option selected="selected" value="DESC">Descending</option>
						</select>
			
						<input type="submit" class="btn" value="Go" name="submit_options"/>

					</form>
				</div>
			</div>
		</div>
		<div class="row">
				<div class="span12">
				<ul class="thumbnails">
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="#sdfsd" width="100%"  alt=""></a>
							<ul class="unstyled">
								<li><i class="icon-calendar"></i> Monday 27th August 2012 11:56:17 AM</li>
								<li><i class="icon-time"></i> 00:01:55</li>
								<li><i class="icon-camera"></i> #1</li>
								<li><i class="icon-film"></i> 74</li>
							</ul>
						</div>
					</li>
				</ul>
				</div>
		</div>

</body>
</html>