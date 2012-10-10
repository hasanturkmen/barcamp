<?php
	include("variables.php"); 
	include("../_/components/mobile-header.php"); 
	if (isset($admin)):
?>

	<div data-role="header" data-position="fixed">
		<h1>Add Schedule</h1>
		<a href="admin-menu.php" data-icon="home" data-iconpos="notext">Home</a>
		<a href="schedule-list.php" data-icon="back" data-iconpos="notext">Back</a>
	</div><!-- header -->
	<div id="content" data-role="content">

	<div data-role="content" id="schedulelist">
		<form action="schedule-update.php" data-ajax="false" method="post">
			<?php

							//Times
							echo '<div data-role="fieldcontain">',"\n";
							echo '<label for="mytime">Time</label>',"\n";
							echo '<select name="mytime" id="mytime">',"\n";
							echo '<option>Choose...</option>',"\n";
							?>
	<option value="09:30:00">9:30am</option>
	<option value="10:00:00">10:00am</option>
	<option value="10:30:00">10:30am</option>
	<option value="11:00:00">11:00am</option>
	<option value="11:30:00">11:30am</option>
	<option value="13:00:00">1:00pm</option>
	<option value="13:30:00">1:30pm</option>
	<option value="14:00:00">2:00pm</option>
	<option value="14:30:00">2:30pm</option>
	<option value="15:00:00">3:00pm</option>
	<option value="15:30:00">3:30pm</option>
	<option value="16:00:00">4:00pm</option>
	<option value="16:30:00">4:30pm</option>
<?php
							echo '</select>',"\n";
							echo '</div>',"\n\n";

							//Speakers
							echo '<div data-role="fieldcontain">',"\n";
							echo '<label for="speakers_id">Speaker</label>',"\n";
							echo '<select name="speakers_id" id="speakers_id" required>',"\n";
							echo '<option>Choose...</option>',"\n";

							//Query the speakers database
							$speakersquery = "SELECT * from speakers";
							$speakerslink = mysqli_connect($host, $user, $password, $dbname);
							if ($speakersresult = mysqli_query($speakerslink, $speakersquery)) :
								while ($speakersrow = mysqli_fetch_assoc($speakersresult)) :
									echo "\t",'<option value="',$speakersrow['id'],'"';
									
									if ($_GET['p']==$speakersrow['id']) { echo'selected '; }
									
									echo '>';
									echo $speakersrow['firstname'], ' ' ,$speakersrow['lastname'];
									echo '</option>',"\n";
								endwhile; // get a row from the database
								mysqli_free_result($speakersresult);
							endif;
							mysqli_close($speakerslink);
							echo '</select>',"\n";
							echo '</div>',"\n\n";

							//Venues
							echo "\n\n",'<div data-role="fieldcontain">',"\n";
							echo '<label for="venues_id">Venue</label>',"\n";
							echo '<select name="venues_id" id="venues_id">',"\n";
							echo '<option>Choose...</option>',"\n";
							//Query the venues database
							$venuesquery = "SELECT * from venues WHERE approved = 1";
							$venueslink = mysqli_connect($host, $user, $password, $dbname);
							if ($venuesresult = mysqli_query($venueslink, $venuesquery)) :
								while ($venuesrow = mysqli_fetch_assoc($venuesresult)) :
									echo "\t",'<option value="',$venuesrow['id'],'"';
									echo '>';
									echo $venuesrow['longname'];
									echo '</option>',"\n";
								endwhile; // get a row from the database
								mysqli_free_result($venuesresult);
							endif;
							mysqli_close($venueslink);
							echo '</select>',"\n";
							echo '</div>',"\n";
			?>
			<input type="submit" name="action" value="add">
		</form>
	</div><!-- content -->
<?php
	else: //not an admin
		header("Location:login.php");
	endif; //is it an admin 
	include("../_/components/mobile-footer.php"); 
?>