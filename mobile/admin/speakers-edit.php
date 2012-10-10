<?php
	include("variables.php"); 
	include("../_/components/mobile-header.php"); 
	if (isset($admin)):
?>

	<div data-role="header" data-position="fixed">
		<h1>Edit Speakers</h1>
		<a href="admin-menu.php" data-icon="home" data-iconpos="notext">Home</a>
		<a href="speakers-list.php" data-icon="back" data-iconpos="notext">Back</a>
	</div><!-- header -->

	<div data-role="content" class="admin" id="speakerlist">
		<form action="speakers-update.php" data-ajax="false" method="post">
			<?php
				if ( isset($_GET['message']) ) {
					echo '<p>', $_GET['message'], '</p>';
				}
				
				echo "\n\n",'<input type="hidden" name="id" value="',$_GET['p'],'">',"\n";

				//Query the speakers database
				$speakersquery = "SELECT * FROM speakers WHERE id=".$_GET['p'];
				$speakerslink = mysqli_connect($host, $user, $password, $dbname);
				if ($speakersresult = mysqli_query($speakerslink, $speakersquery)) :
					while ($speakersrow = mysqli_fetch_assoc($speakersresult)) :

						echo '<div data-role="fieldcontain">';
						echo '<label for="firstname">First Name</label>';
						echo '<input type="text" name="firstname" id="firstname" value="',$speakersrow['firstname'],'" />';
						echo '</div>';

						echo '<div data-role="fieldcontain">';
						echo '<label for="lastname">Last Name</label>';
						echo '<input type="text" name="lastname" id="firstname" value="',$speakersrow['lastname'],'" />';
						echo '</div>';

						echo '<div data-role="fieldcontain">';
						echo '<label for="title">Title</label>';
						echo '<input type="text" name="title" id="firstname" value="',$speakersrow['title'],'" />';
						echo '</div>';

						echo '<div data-role="fieldcontain">';
						echo '<label for="category">Category</label>';
						echo '<input type="text" name="category" id="firstname" value="',$speakersrow['category'],'" />';
						echo '</div>';

						echo '<div data-role="fieldcontain">';
						echo '<label for="bio">bio</label>';
						echo '<textarea name="bio" id="bio" placeholder="bio" >',$speakersrow['bio'],'</textarea>';
						echo '</div>';

						echo '<div data-role="fieldcontain">';
						echo '<label for="description">description</label>';
						echo '<textarea name="description" id="description" placeholder="description" >',$speakersrow['description'],'</textarea>';
						echo '</div>';


					endwhile; // get a row from the database
					mysqli_free_result($speakersresult);
				endif;
				mysqli_close($speakerslink);
			?>
			<input type="submit" name="action" value="submit">
		</form>
		
		<div id="delete" data-role="fieldcontain">
		<h3>ARE YOU SURE YOU WANT TO</h3>
		<form action="speakers-update.php" data-ajax="false" method="post">
			<input type="hidden" name="id" value="<?php echo $_GET['p']?>">
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