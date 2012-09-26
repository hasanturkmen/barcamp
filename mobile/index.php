<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>View Source</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="apple-touch-icon" href="images/appicon.png" type="" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-startup-image" href="images/splash.png" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />

	<script src="_/js/jquery.js"></script>
	<script src="_/js/jquery.mobile.js"></script>

	<script src="_/js/myscript.js"></script>
	<link rel="stylesheet" href="_/css/jquery.mobile.css" />
	<link rel="stylesheet" href="_/css/mystyles.css" />
</head>
<body>
	<!-- Page: home -->
	<div id="home" data-role="page" data-title="Schedule">
		<div data-role="header" data-position="fixed" data-id="vs_header">
			<h1>Schedule</h1>
			<a href="#home" data-icon="home" data-iconpos="notext">Home</a>
		</div><!-- header -->
		<div data-role="content">
			<div data-role="controlgroup" data-type="horizontal"  data-mini="true">
				<a href="#" data-role="button" >Abbey</a>
				<a href="#" data-role="button">Grotto</a>
				<a href="#" data-role="button">DaVinci</a>
				<a href="#" data-role="button">Alley</a>
			</div>
			<p></p>
			<ul data-role="listview" data-filter="true">
				<li data-role="list-divider">Deland Abbey</li>
				<li>
					<a href="#">
					<h3>Eric Breitenbach</h3>
					<img src="../images/speaker_ericbreitenbach.jpg" />
					<p class="ui-li-aside"><strong>9:00</strong>AM</p>
					<p class="title" style="white-space: normal;">Getting Independent Documentaries off the ground</p>
					</a>
				</li>
				<li>
					<a href="#">
					<h3>Eric Breitenbach</h3>
					<img src="../images/speaker_ericbreitenbach.jpg" />
					<p class="ui-li-aside"><strong>9:00</strong>AM</p>
					<p class="title" style="white-space: normal;">Getting Independent Documentaries off the ground</p>
					</a>
				</li>
				<li data-role="list-divider">The Grotto</li>
				<li>
					<a href="#">
					<h3>Eric Breitenbach</h3>
					<img src="../images/speaker_ericbreitenbach.jpg" />
					<p class="ui-li-aside"><strong>9:00</strong>AM</p>
					<p class="title" style="white-space: normal;">Getting Independent Documentaries off the ground</p>
					</a>
				</li>
				<li data-role="list-divider">DaVinci's Cafe</li>
				<li>
					<a href="#">
					<h3>Eric Breitenbach</h3>
					<img src="../images/speaker_ericbreitenbach.jpg" />
					<p class="ui-li-aside"><strong>9:00</strong>AM</p>
					<p class="title" style="white-space: normal;">Getting Independent Documentaries off the ground</p>
					</a>
				</li>
				<li data-role="list-divider">Artisan Alley</li>
				<li>
					<a href="#">
					<h3>Eric Breitenbach</h3>
					<img src="../images/speaker_ericbreitenbach.jpg" />
					<p class="ui-li-aside"><strong>9:00</strong>AM</p>
					<p class="title" style="white-space: normal;">Getting Independent Documentaries off the ground</p>
					</a>
				</li>
			</ul>
		</div><!-- content -->
		<div data-role="footer" data-position="fixed" data-id="vs_footer">
			<div data-role="navbar">
				<ul>
					<li><a href="#videos" data-role="button" data-icon="vs_video">Schedule</a></li>
					<li><a href="#videos" data-role="button" data-icon="vs_video">Speakers</a></li>
					<li><a href="#photos" data-role="button" data-icon="vs_photo">Sponsors</a></li>
					<li><a href="#tweets" data-role="button" data-icon="vs_twitter">Info</a></li>
				</ul>
			</div><!-- navbar -->
		</div><!-- footer -->
	</div><!-- page -->
</body>
</html>
