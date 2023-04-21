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
    <title>EXPENSES TRACKER</title>
</head>
<body>

<!-- $user_id = $_SESSION['user_id']; -->
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
      <a class="navbar-brand" href="#">EXPENSES TRACKER</a>
    </div>
    <ul class="nav navbar-nav">
	<li><a href="about.php">ABOUT US</a></li>
      <li class="active"><a href="inc_exp.php">HOME</a></li>
	  <li><a href="select_expense.php">SHOW EXISTING EXPENSES</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT </a></li>
    </ul>
  </div>
</nav>
<div id="box">
<form action="expense.php" method = "POST">
    <fieldset>
	<strong>
		<div style="font-size: 20px;margin: 10px;color: black;"><strong>EXPENSES TRACKER</strong></div><br>

		<div>
			<label for="username"><font color="black">Username: </font><br>
            <input type="text" placeholder="Username" id="username" name="username" required = "true" /></label><br>
		</div>

		<div>
			<label for="date"><font color="black">Date </font><br>
            <input type="date" placeholder="Date" id="date" name="date" required /></label><br>
		</div>

		<div>
			<label for="exp_catagory"><font color="black">Expense Catagory: </font><br>
            <input type="text" placeholder="Expense Catagory" id="exp_catagory" name="exp_catagory" required = "true" /></label><br>
		</div>

		<div>
			<label for="exp_amount"><font color="black">Expense Amount: </font><br>
            <input type="text" placeholder="Expense Amount" id="exp_amount" name="exp_amount" required = "true" ></label><br>
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
	$username = $_POST['username'];
	$date = $_POST['date'];
	$exp_cat = $_POST['exp_catagory'];
	$exp_amount = $_POST['exp_amount'];

	$connection = mysqli_connect("localhost","root","","assignment_web");

	$query = "INSERT INTO expense VALUES ('','$username', '$date', '$exp_cat', '$exp_amount')";

	$result = mysqli_query($connection, $query);

	if ($result)
		{
			?>
			<h3>Added Successfully <a href="income.php">Click Here</a>to Add More</h3>
			<?php
		}

	else
	{
		print "<script>alert('Insert Failed')</script>";
		header("location: expense.php");
	}
}
?>