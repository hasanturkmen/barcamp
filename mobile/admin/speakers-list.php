<?php
	include("variables.php"); 
	include("../_/components/mobile-header.php"); 
	if (isset($admin)):
?>

	<div data-role="header" data-position="fixed">
		<h1>List Speakers</h1>
		<a href="admin-menu.php" data-icon="back" data-iconpos="notext">Home</a>
	</div><!-- header -->

	<div data-role="content" id="speakerslist">
		<ul data-role="listview" data-filter="true">
			<?php
				//Query the speakers database
				$speakersquery = "SELECT speakers.id, speakers.firstname, speakers.lastname, speakers.title FROM speakers ORDER BY speakers.id DESC";
				$speakerslink = mysqli_connect($host, $user, $password, $dbname);
				if ($speakersresult = mysqli_query($speakerslink, $speakersquery)) :
					while ($speakersrow = mysqli_fetch_assoc($speakersresult)) :
						echo '<li>';
						echo '<a href = "speakers-edit.php?p=',$speakersrow['id'],'">';
						echo '<h3>',$speakersrow['firstname'],' ',$speakersrow['lastname'],'</h3>';
						echo '<p>',$speakersrow['title'],'</p>';
						echo '</a>', '</li>';
					endwhile; // get a row from the database
					mysqli_free_result($speakersresult);
				endif;
				mysqli_close($speakerslink);
			?>
		</ul>
	</div><!-- content -->
<?php
	else: //not an admin
		header("Location:login.php");
	endif; //is it an admin 
	include("../_/components/mobile-footer.php"); 
?>