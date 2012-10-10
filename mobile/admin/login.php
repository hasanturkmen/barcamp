<?php
if (isset($_COOKIE['username'])) :
	$uname=$_COOKIE['username'];
	setcookie("username",$uname, time()-3600,'/');
endif; //check cookie

if (isset($_GET['message'])) :
	$message .= $_GET['message'];
else:
	$message = '';
endif;

if ((isset($_POST['login'])) && ($_POST['login'] == 'submit')):
	include("variables.php");
	$myusername=$_POST['username'];

	//Query the password database
	$passwordquery = "SELECT * from users where (username='".mysql_real_escape_string($myusername)."')";
	$passwordlink = mysqli_connect($host, $user, $password, $dbname);
	if ($passwordresult = mysqli_query($passwordlink, $passwordquery)) :
		while ($passwordrow = mysqli_fetch_assoc($passwordresult)) :
			if (($_POST['password']) == ($passwordrow['password']) ):
				setcookie("username", $passwordrow['username'], time()+(60*60*24*15),'/');
				header("Location:admin-menu.php");
			else:
				$message = "Your login info is invalid. Please try again";
			endif; // if there's at least one result
		endwhile; // get a row from the database
		mysqli_free_result($passwordresult);
	endif;
	mysqli_close($passwordlink);
endif; // if there's at least one result
include("../_/components/mobile-header.php");
?>
<div id="home" data-role="page" data-title="Schedule">
	<div data-role="content">
	<h2>Login</h2>
	<?php print "<p>".$message."</p>" ?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input type="hidden" name="returnto" value="<?php echo $_GET['returnto'] ?>">
				<label for="username">Username</label>
				<input id="username" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" />
	
				<label for="password">Password</label>
				<input id="password" name="password" value="<?php if (isset($_POST['password'])) ?>" type="password"/>
			<input type="submit" name="login" value="submit">
		</form>
	</div> <!-- content -->
</div> <!-- page -->
<?php include("../_/components/mobile-footer.php"); ?>