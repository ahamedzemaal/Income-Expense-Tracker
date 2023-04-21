<?php
session_start();

if (isset($_SESSION['username']))
{
	print "Your PIN is 9876";
	?>
	<p><a href="logout.php">Click Here</a> to logout from the system</p>
	<?php
}
else
{
	header("location: signin.php");
}

?>