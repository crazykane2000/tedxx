<?php session_start();
	include 'connection.php';

	$sql = "SELECT * FROM `login` WHERE `user` = '".htmlentities(mysql_real_escape_string($_REQUEST['user']))."' AND `pass`='".htmlentities(mysql_real_escape_string($_REQUEST['pass']))."'";
	$result = mysql_query($sql, $con) or die(mysql_error());
	$num = mysql_num_rows($result);

	if($num >0)
	{	
		//Session Variables Should Be Set Now
		$_SESSION['user'] = $_REQUEST['user'];
		$_SESSION['loged_primitives'] = md5($_REQUEST['pass']);
		header('Location:dashboard.php?choice=success&value=Login Successful, Welcome to Your Own Admin Panel');
	}
	else
	{
		header('Location:index.php?choice=error&value = Plaese Relogin, Previous Supplied Credentials Were Wrong');
	}
?>