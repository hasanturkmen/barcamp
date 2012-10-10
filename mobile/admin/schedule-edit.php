<?php
	include("variables.php"); 
	include("../_/components/mobile-header.php"); 
	if (isset($admin)):
	$myvenue='';
?>

	<div data-role="header" data-position="fixed">
		<h1>Edit Schedule</h1>
		<a href="admin-menu.php" data-icon="home" data-iconpos="notext">Home</a>
		<a href="schedule-list.php" data-icon="back" data-iconpos="notext">Back</a>
	</div><!-- header -->

	<div data-role="content" class="admin" id="schedulelist">
		<form action="schedule-update.php" data-ajax="false" method="post">
			<?php
				if ( isset($_GET['message']) ) {
					echo '<p>', $_GET['message'], '</p>';
				}
				
				echo "\n\n",'<input type="hidden" name="id" value="',$_GET['s'],'">',"\n";

				//Query the speakers database
				$schedulequery = "SELECT * FROM schedule WHERE id=".$_GET['s'];
				$schedulelink = mysqli_connect($host, $user, $password, $dbname);
				if ($scheduleresult = mysqli_query($schedulelink, $schedulequery)) :
					while ($schedulerow = mysqli_fetch_assoc($scheduleresult)) :

							//Times
							echo '<div data-role="fieldcontain">',"\n";
							echo '<label for="mytime">Time</label>',"\n";
							echo '<select name="mytime" id="mytime">',"\n";
							echo '<option>Choose...</option>',"\n";
							?>
	<option value="09:30:00" <?php if ($schedulerow['time']=='09:30:00') { echo " selected "; } ?>>9:30am</option>
	<option value="10:00:00" <?php if ($schedulerow['time']=='10:00:00') { echo " selected "; } ?>>10:00am</option>
	<option value="10:30:00" <?php if ($schedulerow['time']=='10:30:00') { echo " selected "; } ?>>10:30am</option>
	<option value="11:00:00" <?php if ($schedulerow['time']=='11:00:00') { echo " selected "; } ?>>11:00am</option>
	<option value="11:30:00" <?php if ($schedulerow['time']=='11:30:00') { echo " selected "; } ?>>11:30am</option>
	<option value="13:00:00" <?php if ($schedulerow['time']=='13:00:00') { echo " selected "; } ?>>1:00pm</option>
	<option value="13:30:00" <?php if ($schedulerow['time']=='13:30:00') { echo " selected "; } ?>>1:30pm</option>
	<option value="14:00:00" <?php if ($schedulerow['time']=='14:00:00') { echo " selected "; } ?>>2:00pm</option>
	<option value="14:30:00" <?php if ($schedulerow['time']=='14:30:00') { echo " selected "; } ?>>2:30pm</option>
	<option value="15:00:00" <?php if ($schedulerow['time']=='15:00:00') { echo " selected "; } ?>>3:00pm</option>
	<option value="15:30:00" <?php if ($schedulerow['time']=='15:30:00') { echo " selected "; } ?>>3:30pm</option>
	<option value="16:00:00" <?php if ($schedulerow['time']=='16:00:00') { echo " selected "; } ?>>4:00pm</option>
	<option value="16:30:00" <?php if ($schedulerow['time']=='16:30:00') { echo " selected "; } ?>>4:30pm</option>
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
									if ($speakersrow['id']==$schedulerow['speakers_id']) { echo " selected "; }
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
									if ($venuesrow['id']==$schedulerow['venues_id']):
										echo " selected ";
										$myvenue = $venuesrow['id'];
									endif;
									echo '>';
									echo $venuesrow['longname'];
									echo '</option>',"\n";
								endwhile; // get a row from the database
								mysqli_free_result($venuesresult);
							endif;
							mysqli_close($venueslink);
							echo '</select>',"\n";
							echo '</div>',"\n";
					endwhile; // get a row from the database
					mysqli_free_result($scheduleresult);
				endif;
				mysqli_close($schedulelink);
			?>
			<input type="submit" name="action" value="submit">
		</form>
		
		<div id="delete" data-role="fieldcontain">
		<h3>ARE YOU SURE YOU WANT TO</h3>
		<form action="schedule-update.php" data-ajax="false" method="post">
			<input type="hidden" name="venues_id" value="<?php echo $myvenue ?>">
			<input type="hidden" name="id" value="<?php echo $_GET['s']?>">
			<input type="submit" name="action" value="delete">
		</form>
		</div><!-- fieldcontain -->

	</div><!-- content -->
<?php
	else: //not an admin
		header("Location:login.php");
	endif; //is it an admin 
	include("../_/components/mobile-footer.php"); 
?>