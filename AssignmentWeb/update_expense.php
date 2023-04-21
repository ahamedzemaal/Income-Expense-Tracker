<?php

$uname = $_POST['username'];
$date = $_POST['date'];
$exp_cat = $_POST['exp_catagory'];
$exp_amount = $_POST['exp_amount'];

//print "$id $name $credit $semester";

// CREATE THE DB CONNECTION
$connection = mysqli_connect("localhost","root","","assignment_web");

// SQL Query
$query = "UPDATE income SET username = '$uname',exp_catagory = '$inc_cat', exp_amount = '$inc_amount'  WHERE income_id = '$id'";

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