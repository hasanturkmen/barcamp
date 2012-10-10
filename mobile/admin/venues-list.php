<?php
	include("variables.php"); 
	include("../_/components/mobile-header.php"); 
	if (isset($admin)):
?>

	<div data-role="header" data-position="fixed">
		<h1>Admin</h1>
		<a href="admin-menu.php" data-icon="back" data-iconpos="notext">Home</a>
	</div><!-- header -->

	<div data-role="content" id="schedulelist">
		<ul data-role="listview" data-filter="true">
			<?php
				//Query the speakers database
				$schedulequery = "SELECT * FROM venues";
				$schedulelink = mysqli_connect($host, $user, $password, $dbname);
				if ($scheduleresult = mysqli_query($schedulelink, $schedulequery)) :
					while ($schedulerow = mysqli_fetch_assoc($scheduleresult)) :
						echo '<li';
						if (($schedulerow['approved']!=1)) { echo ' class="unapproved" '; }
						echo '>';					
						echo '<a href = "venues-edit.php?v=',$schedulerow['id'],'">';
						echo '<h3>',$schedulerow['longname'],'</h3>';
						if (isset($schedulerow['logo'])) { echo '<img src = "/images/tn/',$schedulerow['logo'],'" alt="Venue: ',$schedulerow['longname'],'" />'; }
						echo '<p class = "description" >',$schedulerow['description'],'</p>';
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