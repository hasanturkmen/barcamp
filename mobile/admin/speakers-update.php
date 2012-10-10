<?php
include("variables.php");
if ($_POST['action']=='submit'):
	$speakerslink = mysqli_connect($host, $user, $password, $dbname);
	$speakersquery = "UPDATE speakers SET 
		id=".$_POST['id'].",
		firstname='".htmlspecialchars($_POST['firstname'])."',
		lastname='".htmlspecialchars($_POST['lastname'])."',
		category='".htmlspecialchars($_POST['category'])."',
		title='".htmlspecialchars($_POST['title'])."',
		bio='".htmlspecialchars($_POST['bio'])."',
		description='".htmlspecialchars($_POST['description'])."'
	 	WHERE speakers.id=".$_POST['id'];
	if ($speakersresult = mysqli_query($speakerslink, $speakersquery)):
		header("Location:speakers-list.php?p=".$_POST['id']."&message=Updated");
	else:
		header("Location:speakers-edit.php?p=".$_POST['id']."&message=Failed");
		echo "failure: ", $speakersquery;
	endif;
	mysqli_close($speakerslink);
endif;

if ($_POST['action']=='add'):
	$speakerslink = mysqli_connect($host, $user, $password, $dbname);
	$speakersquery = "INSERT INTO speakers (
			firstname,
			lastname,
			title
		) 
		VALUES (
			'".$_POST['firstname']."',
			'".$_POST['lastname']."',
			'".$_POST['title']."'
		)";
	if ($speakersresult = mysqli_query($speakerslink, $speakersquery)):
		header("Location:schedule-add.php?p=".mysqli_insert_id($speakerslink)."&message=Added");
	else:
		header("Location:speakers-add.php?s=".$_POST['id']."&message=Failed");
		echo "failure: ", $speakersquery;
	endif;
	mysqli_close($speakerslink);
endif;

if ($_POST['action']=='delete'):
	$speakerslink = mysqli_connect($host, $user, $password, $dbname);
	$speakersquery = "DELETE FROM speakers WHERE speakers.id=".$_POST['id'];
	if ($speakersresult = mysqli_query($speakerslink, $speakersquery)):
		header("Location:speakers-list.php?message=Deleted");
	else:
		header("Location:speakers-edit.php?p=".$_POST['id']."&message=Failed");
		echo "failure: ", $speakersquery;
	endif;
	mysqli_close($speakerslink);
endif;
?>