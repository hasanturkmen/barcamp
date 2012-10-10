<?php
	include("_/components/mobile-header.php");
	if ($_GET['s']) {
		$schedule_id = $_GET['s'];
	}

	if ($_GET['v']) {
		$venues_id = $_GET['v'];
	}

	$venuesquery = "SELECT * from venues WHERE venues.id=".$venues_id;
	$venueslink = mysqli_connect($host, $user, $password, $dbname);
	if ($venuesresult = mysqli_query($venueslink, $venuesquery)) :
		while ($venuesrow = mysqli_fetch_assoc($venuesresult)) :

?>
		<div data-role="header" data-position="fixed" data-id="vs_header">
			<h1>Venue Details</h1>
			<a href="index.php" data-icon="home" data-iconpos="notext">Back</a>
		</div><!-- header -->
		<div data-role="content" id="venues_detail">

			<div data-role="controlgroup" data-type="horizontal"  data-mini="true">
				<?php
					//Query the speakers database
					$venueslistquery = "select venues.id, venues.name FROM venues WHERE venues.approved=1";
					$venueslistlink = mysqli_connect($host, $user, $password, $dbname);
					if ($venueslistresult = mysqli_query($venueslistlink, $venueslistquery)) :
						while ($venueslistrow = mysqli_fetch_assoc($venueslistresult)) :
							echo '<a href="venue_details.php?v=',$venueslistrow['id'],'" data-role="button">',$venueslistrow['name'],'</a>';
						endwhile; // get a row from the database
						mysqli_free_result($venueslistresult);
					endif;
					mysqli_close($venueslistlink);
				?>
			</div><!-- navbar -->

			<?php
				//Query the venues database
						echo '<a href="',$venuesrow['link'],'"><img src = "http://barcampdeland.org/images/',$venuesrow['logo'],'" alt="Logo: ',$venuesrow['name'],'" />','</a>';
						echo '<p class = "address" >',$venuesrow['address'],'</p>';
						if ($venuesrow['specials']) {echo '<p class = "special" >',$venuesrow['specials'],'</p>';}
						echo '<p class = "description" >',$venuesrow['description'],'</p>';
			?>

				<?php
					//Query the speakers database
					$schedulequery = "select schedule.id, speakers.firstname, speakers.lastname, speakers.title, venues.name, schedule.time, speakers.photo, speakers.description from schedule LEFT JOIN speakers ON schedule.speakers_id=speakers.id LEFT JOIN venues on schedule.venues_id=venues.id WHERE venues.id=$venues_id
					ORDER BY schedule.time ASC, venues.name ASC";
					$schedulelink = mysqli_connect($host, $user, $password, $dbname);
					if ($scheduleresult = mysqli_query($schedulelink, $schedulequery)) :
						echo'<h3>Scheduled Speakers</h3>';
						echo'<ul data-role="listview">';
						while ($schedulerow = mysqli_fetch_assoc($scheduleresult)) :
							echo '<li>','<a href = "schedule_details.php?s=',$schedulerow['id'],'">';
							echo '<p class = "speaker">',$schedulerow['firstname'],' ',$schedulerow['lastname'],'</p>';
							echo '<img src = "images/',$schedulerow['photo'],'" alt="Photo of speaker: ',$schedulerow['firstname'],' ',$schedulerow['lastname'],'" />';
							echo '<p class = "ui-li-aside time"><strong>',
							date('g:ia', strtotime($schedulerow['time'])),
							'</strong></p>';
							echo '<p class = "title" >',$schedulerow['title'],'</p>';
							echo '<p class = "description" >',$schedulerow['description'],'</p>';
							echo '</a>', '</li>';
						endwhile; // get a row from the database
						echo'</ul>\n';
						mysqli_free_result($scheduleresult);
					endif;
					mysqli_close($schedulelink);
				?>

		<a href="http://maps.google.com/maps?q=<?php echo urlencode($venuesrow['address']) ?>+Deland+FL">
		<img src="http://maps.google.com/maps/api/staticmap?center=<?php echo urlencode($venuesrow['address']) ?>+Deland+FL&amp;zoom=18&amp;size=500x400&amp;format=png32&amp;maptype=roadmap&amp;markers=<?php echo urlencode($venuesrow['address']) ?>+Deland+FL&amp;sensor=false" alt="Map to our facilities" />
		</a>

		</div><!-- content -->
<?php
		endwhile; // get a row from the database
		mysqli_free_result($venuesresult);
	endif;
	mysqli_close($venueslink);	
?>

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