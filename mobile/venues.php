<?php
	include("_/components/mobile-header.php");
	
	if ($_GET['v']):
		$venuesquery = " WHERE venues.id = " . $_GET['v'];
	else:
		$venuesquery = "";
	endif;
?>
	<!-- Page: home -->
		<div data-role="header" data-position="fixed" data-id="vs_header">
			<h1>BarCampDeland</h1>
			<a href="../" data-icon="home" data-iconpos="notext">Home</a>
		</div><!-- header -->
		<div data-role="content" id="schedulelist">
			<ul data-role="listview">
				<?php
					//Query the speakers database
					$schedulequery = "SELECT * FROM venues WHERE approved=1";
					$schedulelink = mysqli_connect($host, $user, $password, $dbname);
					if ($scheduleresult = mysqli_query($schedulelink, $schedulequery)) :
						while ($schedulerow = mysqli_fetch_assoc($scheduleresult)) :
							echo '<li>','<a href = "venue_details.php?v=',$schedulerow['id'],'">';
							echo '<h3>',$schedulerow['name'],'</h3>';
							echo '<img src = "images/tn/',$schedulerow['logo'],'" alt="Photo of speaker: ',$schedulerow['firstname'],' ',$schedulerow['lastname'],'" />';
							echo '<p class = "description" >',$schedulerow['description'],'</p>';
							echo '</a>', '</li>';
						endwhile; // get a row from the database
						mysqli_free_result($scheduleresult);
					endif;
					mysqli_close($schedulelink);
				?>
			</ul>
		</div><!-- content -->
		<div data-role="footer" data-theme="a" data-position="fixed" data-id="vs_footer">
			<div data-role="navbar">
				<ul>
					<li><a href="index.php" data-role="button" data-icon="home">Home</a></li>
					<li><a href="schedule.php" data-role="button" data-icon="grid">Schedule</a></li>
					<li><a href="venues.php" class="ui-btn-active ui-state-persist" data-role="button" data-icon="grid">Venues</a></li>
					<li><a href="info.php" data-role="button" data-icon="info">Info</a></li>
				</ul>
			</div><!-- navbar -->
		</div><!-- footer -->
<?php include("_/components/mobile-footer.php"); ?>