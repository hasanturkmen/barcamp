<?php
	include("variables.php"); 
	include("../_/components/mobile-header.php"); 
	if (isset($admin)):
?>

	<div data-role="header" data-position="fixed">
		<h1>Add Speakers</h1>
		<a href="admin-menu.php" data-icon="home" data-iconpos="notext">Home</a>
		<a href="speakers-list.php" data-icon="back" data-iconpos="notext">Back</a>
	</div><!-- header -->

	<div data-role="content" class="admin" id="speakerlist">
		<form action="speakers-update.php" data-ajax="false" method="post">
			<?php
				if ( isset($_GET['message']) ) {
					echo '<p>', $_GET['message'], '</p>';
				}
				
				echo '<div data-role="fieldcontain">';
				echo '<label for="firstname">First Name</label>';
				echo '<input type="text" name="firstname" id="firstname" value="" />';
				echo '</div>';

				echo '<div data-role="fieldcontain">';
				echo '<label for="lastname">Last Name</label>';
				echo '<input type="text" name="lastname" id="firstname" value="" />';
				echo '</div>';

				echo '<div data-role="fieldcontain">';
				echo '<label for="title">Title</label>';
				echo '<input type="text" name="title" id="firstname" value="" />';
				echo '</div>';

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