<?php

$id = $_POST['income_id'];

$connection = mysqli_connect("localhost","root","","assignment_web");

$query = "DELETE FROM income WHERE income_id = '$id'";

$result = mysqli_query($connection,$query);

if ($result)
{
	?>
	<h3>Income with ID <?php print $id; ?> is deleted successfully!</h3>
	<a href="select_income.php">Click Here</a> to view all Inserts
	<?php
}

?>