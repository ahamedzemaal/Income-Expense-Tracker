<?php session_start(); ?>

<?php
if (!isset($_POST['submit']))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>INCOME TRACKER</title>
</head>
<body>

<?php

$user_id = $_SESSION['user_id']; 

?>
	<style>
	#box
	{
		background-color: #e1dbde;
		margin: auto;
		margin-top: 50px;
		margin-bottom: 50px;
		width: 500px;
		padding: 30px;
		line-height: 20px;
		border: 5px solid black;
        background-size: cover;

	}
	</style>
	<style>
	body {
		background-image: url('img.jpg');
	}
	</style>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">INCOMES TRACKER</a>
    </div>
    <ul class="nav navbar-nav">
	<li><a href="about.php">ABOUT US</a></li>
      <li class="active"><a href="income.php">HOME</a></li>
	  <li><a href="select_income.php">SHOW EXISTING INCOMES</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT </a></li>
    </ul>
  </div>
</nav>
<div id="box">
<form action="income.php" method = "POST">
    <fieldset>
	<strong>
		<div style="font-size: 20px;margin: 10px;color: black;"><strong>INCOMES TRACKER</strong></div><br>

		<div>
			<label for="username"><font color="black">Username: </font><br>
            <input type="text" placeholder="Username" id="username" name="username" required = "true" /></label><br>
		</div>

		<div>
			<label for="date"><font color="black">Date </font><br>
            <input type="date" placeholder="Date" id="date" name="date" required /></label><br>
		</div>

		<div>
			<label for="inc_cat"><font color="black">Income Catagory: </font><br>
            <input type="text" placeholder="Income Catagory" id="inc_cat" name="inc_cat" required = "true" /></label><br>
		</div>

		<div>
			<label for="inc_desc"><font color="black">Income Description: </font><br>
            <textarea rows="4" cols="50" name="inc_desc" placeholder = "Income Description" id="inc_desc"></textarea><br>
		</div>

		<div>
			<label for="inc_amount"><font color="black">Income Amount: </font><br>
            <input type="text" placeholder="Income Amount" id="inc_amount" name="inc_amount" required = "true" /></label><br>
		</div>

		<p>
			<button class="button-2" type="submit" value="submit" name="submit">Add Details</button>
			<button class="button-2" type="reset" value="Clear Form" name="submit">Clear All</button>
		</p>
	</strong>
	</fieldset>
</form>
</body>
</html>

<?php
}
else{
	$uname = $_POST['username'];
	$date = $_POST['date'];
	$inc_cat = $_POST['inc_cat'];
	$inc_desc = $_POST['inc_desc'];
	$inc_amount = $_POST['inc_amount'];

	$connection = mysqli_connect("localhost","root","","assignment_web");

	$query = "INSERT INTO income VALUES ('','$uname', '$date','$inc_cat', '$inc_desc' ,'$inc_amount')";

	$result = mysqli_query($connection, $query);

	if ($result)
		{
			print "<script>alert('Successfully Added')</script>";
			header("location: expense.php");
		}

	else
	{

		print "<script>alert('Insert Failed')</script>";
		header("location: income.php");
	}
}
?>