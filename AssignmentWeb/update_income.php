<?php

$uname = $_POST['username'];
$date = $_POST['date'];
$inc_cat = $_POST['Inc_category'];
$inc_desc = $_POST['inc_description'];
$inc_amount = $_POST['inc_amount'];

//print "$id $name $credit $semester";

// CREATE THE DB CONNECTION
$connection = mysqli_connect("localhost","root","","assignment_web");

// SQL Query
$query = "UPDATE income SET username = '$uname',Inc_category = '$inc_amount',inc_description ='$inc_desc' WHERE income_id = '$id'";

// EXECUTE QUERY
$result = mysqli_query($connection,$query);

if ($result)
{
	?>
	<h3>Course is updated successfully!</h3>
	<a href="select_income.php">Click Here</a> to view all courses
	<?php
}

?>