<?php include("_/components/mobile-header.php"); ?>
	<!-- Page: home -->
		<div data-role="header" data-position="fixed" data-id="vs_header">
			<h1>BarCampDeland</h1>
			<a href="../" data-icon="home" data-iconpos="notext">Home</a>
		</div><!-- header -->
		<div  id="info" data-role="content">

		<div data-role="collapsible">
		<?php include("../_/components/sidebar_schedule.php"); ?>
		</div><!-- schedule -->

		<div data-role="collapsible">
			<h3>Registration</h3>
			<p><strong>Starts at 9am in <a href="http://maps.google.com/maps?q=104+North+Artisan+Alley+Deland+FL">Artisan's Alley (113 West New York Avenue)</a></strong>. It's in the Alley next to the Beacon Newspaper's building.</p>
	
			<p><em>Make sure you come to the registration table</em> for your t-shirt, Mainstreet Dollars and to be registered for one of the many free giveaways from our awesome sponsors.</p>
		</div>

		<div data-role="collapsible">
			<h3>Talks</h3>
			<p>The talks wills tart at 9:30 am and will be held at different venues. You can check out the schedules here:</p>
			<ul>
				<li><a href="http://maps.google.com/maps?q=117+North+Woodland+Boulevard+Deland+FL">Abbey • 117 North Woodland Boulevard</a></li>
				<li><a href="http://maps.google.com/maps?q=112+West+Georgia+Avenue+Deland+FL">DaVinci's  • 112 West Georgia Avenue</a></li>
				<li><a href="http://maps.google.com/maps?q=208+North+Woodland+Boulevard+Deland+FL">Grotto • 208 North Woodland Boulevard</a></li>
			</ul>
		</div>

		<div data-role="collapsible">
			<h3>Lunch</h3>
			<p>We'll be breaking for lunch from 12-1. If you registered for the event, you'll receive some Mainstreet dollars. Most of the local venues take them same as cash. Here's a list of some of the spots around the area that for sure do:</p>
	
			<ul>
				<li><a href="http://maps.google.com/maps?q=101+North+Woodland+Boulevard+#101+Deland+FL">Cook's Bistro</a></li>
				<li><a href="http://maps.google.com/maps?q=111+East+Rich+Avenue+Deland+FL">Bellini's</a></li>
				<li><a href="http://maps.google.com/maps?q=109+East+New+York+Avenue+Deland+FL">Boston Coffee</a></li>
				<li><a href="http://maps.google.com/maps?q=142+North+Woodland+Boulevard+Deland+FL">BrickHouse Grill</a></li>
				<li><a href="http://maps.google.com/maps?q=124+North+Woodland+Boulevard+Deland+FL">Casey's on the Corner</a></li>
				<li><a href="http://maps.google.com/maps?q=128+North Woodland+Boulevard+Deland+FL">De La Vega</a></li>
				<li><a href="http://maps.google.com/maps?q=146+North+Woodland+Boulevard+Deland+FL">Dick &amp; Jane's</a></li>
				<li><a href="http://maps.google.com/maps?q=105+West+Indiana+Avenue+Deland+FL">Dublin</a></li>
				<li><a href="http://maps.google.com/maps?q=202+North+Woodland+Boulevard+Deland+FL">Hunter's</a></li>
				<li><a href="http://maps.google.com/maps?q=100+East+New+York+Avenue+Deland+FL">Mainstreet Grill</a></li>
				<li><a href="http://maps.google.com/maps?q=120+North+Woodland+Boulevard+Deland+FL">Manzano's</a></li>
				<li><a href="http://maps.google.com/maps?q=115+East+New+York+Avenue+Deland+FL">Pizza Hut</a></li>
			</ul>
		</div>
				
				<?php
					//Query the speakers database
					$venuesquery = "SELECT * FROM venues WHERE approved=1 AND specials !=''";
					$venueslink = mysqli_connect($host, $user, $password, $dbname);
					if ($venuesresult = mysqli_query($venueslink, $venuesquery)) :
					echo '<div id = "specials" data-role = "collapsible">';
					echo '<h3>Specials</h3>';
						while ($venuesrow = mysqli_fetch_assoc($venuesresult)) :
							echo '<a href="venue_details.php?v=',$venuesrow['id'],'"><img src="http://barcampdeland.org/images/',$venuesrow['logo'],'" alt="',$venuesrow['name'],'" /></a>';
							echo '<p class = "description" >',$venuesrow['specials'],'</p>';
						endwhile; // get a row from the database
						mysqli_free_result($venuesresult);
					echo '</div><!-- specials -->';
					endif;
					mysqli_close($venueslink);
				?>
			</ul>
	</div><!-- content -->

	<div data-role="footer" data-theme="a" data-position="fixed" data-id="vs_footer">
		<div data-role="navbar">
			<ul>
				<li><a href="index.php" data-role="button" data-icon="home">Home</a></li>
				<li><a href="schedule.php" data-role="button" data-icon="grid">Schedule</a></li>
				<li><a href="venues.php" data-role="button" data-icon="grid">Venues</a></li>
				<li><a href="info.php" class="ui-btn-active ui-state-persist" data-role="button" data-icon="info">Info</a></li>
			</ul>
		</div><!-- navbar -->
	</div><!-- footer -->

<?php include("_/components/mobile-footer.php"); ?>