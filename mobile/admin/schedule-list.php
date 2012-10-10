<?php
	include("variables.php"); 
	include("../_/components/mobile-header.php"); 
	if (isset($admin)):


	if (isset($_GET['v'])):
		$venuesquery = " WHERE venues.id = " . $_GET['v'];
	else:
		$venuesquery = "";
	endif;

?>

	<div data-role="header" data-position="fixed">
		<h1>List Schedule</h1>
		<a href="admin-menu.php" data-icon="back" data-iconpos="notext">Home</a>
	</div><!-- header -->

	<div data-role="content" id="schedulelist">
			<div data-role="controlgroup" data-type="horizontal"  data-mini="true">
				<a href="schedule-list.php" data-role="button">All</a>
				<?php
					//Query the speakers database
					$venueslistquery = "select venues.id, venues.name FROM venues WHERE venues.approved=1";
					$venueslistlink = mysqli_connect($host, $user, $password, $dbname);
					if ($venueslistresult = mysqli_query($venueslistlink, $venueslistquery)) :
						while ($venueslistrow = mysqli_fetch_assoc($venueslistresult)) :
							echo '<a href="schedule-list.php?v=' , $venueslistrow['id'],'"';
							if ((isset($_GET['v'])) && ($_GET['v']==$venueslistrow['id'])) { echo ' class="ui-btn-active ui-state-persist" '; }
							echo ' data-role="button">',$venueslistrow['name'],'</a>';
						endwhile; // get a row from the database
						mysqli_free_result($venueslistresult);
					endif;
					mysqli_close($venueslistlink);
				?>
			</div> <!-- control group -->
		<p>Edit or search for speaking spots</p>
		<ul data-role="listview" data-filter="true">
			<?php
				//Query the speakers database
				$schedulequery = "SELECT schedule.speakers_id, speakers.firstname, speakers.lastname, schedule.venues_id, venues.name, schedule.id, schedule.time FROM schedule LEFT JOIN venues ON schedule.venues_id = venues.id LEFT JOIN speakers ON schedule.speakers_id = speakers.id $venuesquery ORDER BY schedule.time, venues.id";
				$schedulelink = mysqli_connect($host, $user, $password, $dbname);
				if ($scheduleresult = mysqli_query($schedulelink, $schedulequery)) :
					while ($schedulerow = mysqli_fetch_assoc($scheduleresult)) :
						echo '<li>';
						echo '<a href = "schedule-edit.php?s=',$schedulerow['id'],'">';
						if ($schedulerow['firstname']):
							echo '<h3>',$schedulerow['firstname'],' ',$schedulerow['lastname'],'</h3>';
						else:
							echo '<h3>Open Spot</h3>';
						endif;
						if (!(isset($_GET['v']))){ echo '<p>',$schedulerow['name'],'</p>'; }
						echo '<p class = "ui-li-aside time"><strong>', date('g:ia', strtotime($schedulerow['time'])), '</strong></p>';
						echo '</a>', '</li>';
					endwhile; // get a row from the database
					mysqli_free_result($scheduleresult);
				endif;
				mysqli_close($schedulelink);
			?>
		</ul>
	</div><!-- content -->
<?php
	else: //not an admin
		header("Location:login.php");
	endif; //is it an admin 
	include("../_/components/mobile-footer.php"); 
?>
