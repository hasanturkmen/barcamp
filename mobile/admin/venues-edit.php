<?php
	include("variables.php"); 
	include("../_/components/mobile-header.php"); 
	if (isset($admin)):
?>

	<div data-role="header" data-position="fixed">
		<h1>Admin</h1>
		<a href="admin-menu.php" data-icon="home" data-iconpos="notext">Home</a>
		<a href="venues-list.php" data-icon="back" data-iconpos="notext">Back</a>
	</div><!-- header -->
	<div id="content" data-role="content">

	<div data-role="content" id="schedulelist">
		<form action="venues-update.php" data-ajax="false" method="post">
			<?php
				if ( isset($_GET['message']) ) {
					echo '<p>', $_GET['message'], '</p>';
				}
				
				echo'<input type="hidden" name="id" value="',$_GET['v'],'">';

				//Query the speakers database
				$schedulequery = "SELECT * FROM venues WHERE venues.id=".$_GET['v'];
				$schedulelink = mysqli_connect($host, $user, $password, $dbname);
				if ($scheduleresult = mysqli_query($schedulelink, $schedulequery)) :
					while ($schedulerow = mysqli_fetch_assoc($scheduleresult)) :

						echo '<div data-role="fieldcontain">';
						echo '<label for="approved">Approved</label>';						
						echo '<select name="approved" id="approved" data-role="slider">';
						echo '	<option value="0"';
						if ((!isset($schedulerow['approved'])) || ($schedulerow['approved']==0)) { echo " selected "; }
						echo '>Off</option>';
						echo '	<option value="1"';
						if (($schedulerow['approved']==1)) { echo " selected "; }
						echo '>On</option>';
						echo '</select>';
						echo '</div>';

						echo '<div data-role="fieldcontain">';
						echo '<label for="shortname">Short Name</label>';
						echo '<input type="text" name="shortname" id="shortname" value="',$schedulerow['name'],'" placeholder="Short Name"/>';
						echo '</div>';

						echo '<div data-role="fieldcontain">';
						echo '<label for="longname">Long Name</label>';
						echo '<input type="text" name="longname" id="longname" value="',$schedulerow['longname'],'" placeholder="Long Name"/>';
						echo '</div>';

						echo '<div data-role="fieldcontain">';
						echo '<label for="address">Address</label>';
						echo '<input type="text" name="address" id="address" value="',$schedulerow['address'],'" placeholder="Address"/>';
						echo '</div>';

						echo '<div data-role="fieldcontain">';
						echo '<label for="specials">specials</label>';
						echo '<textarea name="bio" id="specials" placeholder="specials" >',$schedulerow['specials'],'</textarea>';
						echo '</div>';

						echo '<div data-role="fieldcontain">';
						echo '<label for="description">description</label>';
						echo '<textarea name="description" id="description" placeholder="description" >',$schedulerow['description'],'</textarea>';
						echo '</div>';

					endwhile; // get a row from the database
					mysqli_free_result($scheduleresult);
				endif;
				mysqli_close($schedulelink);
			?>
			<input type="submit" name="action" value="submit">
		</form>
	</div><!-- content -->
<?php
	else: //not an admin
		header("Location:login.php");
	endif; //is it an admin 
	include("../_/components/mobile-footer.php"); 
?>