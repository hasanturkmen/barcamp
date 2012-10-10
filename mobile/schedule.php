<?php
	include("_/components/mobile-header.php");
	
	if (isset($_GET['v'])):
		$venuesquery = " AND venues.id = " . $_GET['v'];
	else:
		$venuesquery = "";
	endif;
?>
		<div data-role="header" data-position="fixed" data-id="vs_header">
			<h1>BarCampDeland</h1>
			<a href="../" data-icon="home" data-ajax="false" data-iconpos="notext">Home</a>
			<a href="<?php echo $_SERVER["PHP_SELF"] ?>" data-icon="refresh" data-iconpos="notext">Login</a>
		</div><!-- header -->

		<div data-role="content" id="schedulelist">
			<div data-role="controlgroup" data-type="horizontal"  data-mini="true">
				<a href="schedule.php" data-role="button">All</a>
				<?php
					//Query the speakers database
					$venueslistquery = "select venues.id, venues.name FROM venues WHERE venues.approved=1";
					$venueslistlink = mysqli_connect($host, $user, $password, $dbname);
					if ($venueslistresult = mysqli_query($venueslistlink, $venueslistquery)) :
						while ($venueslistrow = mysqli_fetch_assoc($venueslistresult)) :
							echo '<a href="schedule.php?v=' , $venueslistrow['id'],'"';

							if ((isset($_GET['v'])) && ($_GET['v']==$venueslistrow['id'])) { echo ' class="ui-btn-active ui-state-persist" '; }
							
							echo ' data-role="button">',$venueslistrow['name'],'</a>';
						endwhile; // get a row from the database
						mysqli_free_result($venueslistresult);
					endif;
					mysqli_close($venueslistlink);
				?>
			</div> <!-- control group -->
			
			<p>Refresh the screen using the icon above to the right.</p>
			<ul data-role="listview" data-filter="true">
				<?php
					//Query the speakers database
					$schedulequery = "select schedule.id, schedule.speakers_id, schedule.time, speakers.firstname, speakers.lastname, speakers.title, venues.name, venues.approved, speakers.photo, speakers.description from schedule LEFT JOIN speakers ON schedule.speakers_id=speakers.id LEFT JOIN venues on schedule.venues_id=venues.id WHERE venues.approved=1 $venuesquery
					ORDER BY schedule.time ASC, venues.name ASC";
					$schedulelink = mysqli_connect($host, $user, $password, $dbname);
					if ($scheduleresult = mysqli_query($schedulelink, $schedulequery)) :
						while ($schedulerow = mysqli_fetch_assoc($scheduleresult)) :
							echo '<li>';
							if (($schedulerow['speakers_id']) && ($schedulerow['description'])): //pre-announced speakers
								echo '<a href = "schedule_details.php?s=',$schedulerow['id'],'" class="speaker preannounced">';
								echo '<p class = "venue">',$schedulerow['name'],'</p>';
								echo '<p class = "speaker">',$schedulerow['firstname'],' ',$schedulerow['lastname'],'</p>';
								echo '<img src = "images/',$schedulerow['photo'],'" alt="Photo of speaker: ',$schedulerow['firstname'],' ',$schedulerow['lastname'],'" />';
								echo '<p class = "title" >',$schedulerow['title'],'</p>';
								echo '<p class = "description" >',$schedulerow['description'],'</p>';
								echo '<p class = "ui-li-aside time"><strong>', date('g:ia', strtotime($schedulerow['time'])), '</strong></p>';
								echo '</a>';
							elseif ($schedulerow['speakers_id']): //speakers at event
								echo '<p class = "venue">',$schedulerow['name'],'</p>';
								echo '<p class = "speaker">',$schedulerow['firstname'],' ',$schedulerow['lastname'],'</p>';
								echo '<h3 class = "title" >',$schedulerow['title'],'</h3>';
								echo '<p class = "ui-li-aside time"><strong>', date('g:ia', strtotime($schedulerow['time'])), '</strong></p>';
							else:
								echo '<h3>Open Spot';
								if (!(isset($_GET['v']))) { echo ' • ' , $schedulerow['name']; }
								echo '</h3>';
								echo '<p>Sign up at the registration table to own this spot</p>';
								echo '<p class = "ui-li-aside time"><strong>', date('g:ia', strtotime($schedulerow['time'])), '</strong></p>';
							endif;
							echo '</li>';
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
					<li><a href="schedule.php" class="ui-btn-active ui-state-persist" data-role="button" data-icon="grid">Schedule</a></li>
					<li><a href="venues.php" data-role="button" data-icon="grid">Venues</a></li>
					<li><a href="info.php" data-role="button" data-icon="info">Info</a></li>
				</ul>
			</div><!-- navbar -->
		</div><!-- footer -->

<?php include("_/components/mobile-footer.php"); ?>