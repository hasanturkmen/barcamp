<?php
include("variables.php");
if ($_POST['action']=='submit'):
	$schedulelink = mysqli_connect($host, $user, $password, $dbname);
	$schedulequery = "UPDATE schedule SET 
		speakers_id='".$_POST['speakers_id']."',
		venues_id='".$_POST['venues_id']."',
		time='".$_POST['mytime']."'
	 	WHERE schedule.id=".$_POST['id'];
	if ($scheduleresult = mysqli_query($schedulelink, $schedulequery)):
		header("Location:schedule-list.php?v=".$_POST['venues_id']."&message=Updated");
	else:
		header("Location:schedule-edit.php?s=".$_POST['id']."&message=Failed");
		echo "failure: ", $schedulequery;
	endif;
	mysqli_close($schedulelink);
endif;

if ($_POST['action']=='add'):
	$schedulelink = mysqli_connect($host, $user, $password, $dbname);
	$schedulequery = "INSERT INTO schedule (
			speakers_id,
			venues_id,
			time
		) 
		VALUES (
			'".$_POST['speakers_id']."',
			'".$_POST['venues_id']."',
			'".$_POST['mytime']."'
		)";
	if ($scheduleresult = mysqli_query($schedulelink, $schedulequery)):
		header("Location:schedule-list.php?v=".$_POST['venues_id']."&message=Added");
	else:
		header("Location:schedule-edit.php?s=".$_POST['id']."&message=Failed");
		echo "failure: ", $schedulequery;
	endif;
	mysqli_close($schedulelink);
endif;

if ($_POST['action']=='delete'):
	$schedulelink = mysqli_connect($host, $user, $password, $dbname);
	$schedulequery = "DELETE FROM schedule WHERE schedule.id=".$_POST['id'];
	if ($scheduleresult = mysqli_query($schedulelink, $schedulequery)):
		header("Location:schedule-list.php?v=".$_POST['venues_id']."&message=Deleted");
	else:
		header("Location:schedule-edit.php?s=".$_POST['id']."&message=Failed");
		echo "failure: ", $schedulequery;
	endif;
	mysqli_close($schedulelink);
endif;
?>