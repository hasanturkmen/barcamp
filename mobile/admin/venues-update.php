<?php
include("variables.php");
if ($_POST['action']=='submit'):
	$venueslink = mysqli_connect($host, $user, $password, $dbname);
	$venuesquery = "UPDATE venues SET 
		approved='".htmlspecialchars($_POST['approved'])."',
		name='".htmlspecialchars($_POST['shortname'])."',
		longname='".htmlspecialchars($_POST['longname'])."',
		address='".htmlspecialchars($_POST['address'])."',
		specials='".htmlspecialchars($_POST['specials'])."',
		description='".htmlspecialchars($_POST['description'])."'
	 	WHERE venues.id=".$_POST['id'];
	if ($venuesresult = mysqli_query($venueslink, $venuesquery)):
		header("Location:venues-edit.php?v=".$_POST['id']."&message=Updated");
	else:
		header("Location:venues-edit.php?v=".$_POST['id']."&message=Failed");
		echo "failure: ", $venuesquery;
	endif;
	mysqli_close($venueslink);
endif;
?>