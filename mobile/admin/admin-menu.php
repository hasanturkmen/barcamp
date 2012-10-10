<?php
	include("variables.php"); 
	include("../_/components/mobile-header.php"); 
	if (isset($admin)):
?>
	<div id="content" data-role="content">
		<h3>Likely</h3>
		<div data-role="controlgroup">
			<a href="speakers-add.php" data-role="button">New Speaker</a>
			<a href="schedule-list.php" data-role="button">Featured Speakers</a>
		</div><!-- Add -->

		<h3>Less Likely</h3>
		<div data-role="controlgroup">
			<a href="schedule-list.php" data-role="button">Update Schedule</a>
			<a href="speakers-list.php" data-role="button">Edit Speaker Info</a>
		</div><!-- Add -->

		<h3>Unlikely</h3>
		<div data-role="controlgroup">
			<a href="schedule-add.php" data-role="button">Add Time Slot</a>
			<a href="venues-list.php" data-role="button">Edit Venue Info</a>
		</div><!-- Add -->

	</div>
<?php
	else: //not an admin
		header("Location:login.php");
	endif; //is it an admin 
	include("../_/components/mobile-footer.php"); 
?>