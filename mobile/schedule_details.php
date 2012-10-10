<?php
	include("_/components/mobile-header.php");
	if ($_GET['s']) {
		$schedule_id = $_GET['s'];
	}
?>
		<div data-role="header" data-position="fixed" data-id="vs_header">
			<h1>Schedule Details</h1>
			<a href="schedule.php" data-icon="back" data-iconpos="notext">Login</a>
		</div><!-- header -->

		<div data-role="content" class="speakers" id="speakers_detail">
				<?php
					//Query the speakers database
					$schedulequery = "select schedule.id, venues.id AS venuesid, venues.longname, speakers.firstname, speakers.category, speakers.lastname, speakers.title, speakers.bio, speakers.link, venues.name, schedule.time, speakers.photo, speakers.description from schedule LEFT JOIN speakers ON schedule.speakers_id=speakers.id LEFT JOIN venues on schedule.venues_id=venues.id WHERE schedule.id=" . $schedule_id;
					$schedulelink = mysqli_connect($host, $user, $password, $dbname);
					if ($scheduleresult = mysqli_query($schedulelink, $schedulequery)) :
						while ($schedulerow = mysqli_fetch_assoc($scheduleresult)) :
							echo '<p class = "category"> ',$schedulerow['category'];
							echo '</p>';
							if ($schedulerow['title']) { echo '<h2 class = "title" >' , $schedulerow['title'] , '</h2>'; }
							echo '<p class = "speaker">with ',$schedulerow['firstname'] , ' ' ,$schedulerow['lastname'];
							if ($schedulerow['photo']) { echo '<img src = "images/',$schedulerow['photo'],'" alt="Photo of speaker: ',$schedulerow['firstname'],' ',$schedulerow['lastname'],'" />'; }
							echo '</p>';
							echo '<p class = "time">' , date('g:ia', strtotime($schedulerow['time'])),
							' • <a href="venue_details.php?v=' , $schedulerow['venuesid'] , '&amp;s=' , $schedulerow['id'] , '">' , $schedulerow['longname'] , '</a></p>';

							if ($schedulerow['description']) { echo '<p class = "description" >',$schedulerow['description'],'</p>'; }

							if ($schedulerow['bio']) { 
								echo '<h3>About ',$schedulerow['firstname'],'</h3>';
								echo '<p class = "bio" >',$schedulerow['bio'],'</p>'; 
							}

							if ($schedulerow['link']) { echo '<p class = "link"><strong>url:</strong>' , ' <a href="' , $schedulerow['link'] , '">' , $schedulerow['link'] , '</a></p>';
							}

						endwhile; // get a row from the database
						mysqli_free_result($scheduleresult);
					endif;
					mysqli_close($schedulelink);
				?>
		</div><!-- content -->

		<div data-role="footer" data-theme="a" data-position="fixed" data-id="vs_footer">
			<div data-role="navbar">
				<ul>
					<li><a href="index.php" data-role="button" data-icon="home">Home</a></li>
					<li><a href="schedule.php" data-role="button" data-icon="grid">Schedule</a></li>
					<li><a href="venues.php" data-role="button" data-icon="grid">Venues</a></li>
					<li><a href="info.php" data-role="button" data-icon="info">Info</a></li>
				</ul>
			</div><!-- navbar -->
		</div><!-- footer -->

<?php include("_/components/mobile-footer.php"); ?>