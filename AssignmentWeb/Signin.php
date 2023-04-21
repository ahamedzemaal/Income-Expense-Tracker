<?php session_start(); ?>

<!DOCTYPE html>

<?php

if (!isset($_POST['submit']))
{
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>SIGN IN PAGE</title>
</head>
<body>
<style>
    #box
	{
		background-color: #e1dbde;
		margin: auto;
		margin-top: 100px;
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
      <a class="navbar-brand" href="#">SIGN IN</a>
    </div>
  </div>
</nav>
<div id="box">
<form action="Signin.php" method = "POST">
    <fieldset>
	<strong>
		<div style="font-size: 30px;margin: 10px;color: black;"><strong>SIGN IN</strong></div><br>

		<div>
			<label for="username"><font color="black">Username: </font><br>
            <input type="text" placeholder="Username" id="username" name="username" required = "true" /></label><br>
		</div>

		<div>
			<label for="password"><font color="black">Password: </font><br>
            <input type="password" placeholder="Password" id="password" name="password" required = "true" /></label><br>
		</div>

		<p>
			<button class="button-2" type="submit" value="submit" name="submit">Sign In</button>
		</p>
		<div style="font-size: 13px;margin: 10px;"><strong>IF YOU DON'T HAVE AN ACCOUNT
		<a href="index.php"><font color="black">Click Here</font></a> TO CREATE
		</strong>
		</div>
	</strong>
	</fieldset>
</form>
</div>

</body>
</html>

<?php
}
else
{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
	
		//Create the connection
		$connection = mysqli_connect("localhost","root","","assignment_web");
		//Create the query
		$query = "SELECT * FROM user_details WHERE username = '$username' AND userpassword = '$password'";

		$result = mysqli_query($connection,$query);

		if (mysqli_num_rows($result) > 0)
		{
            while($user_data = mysqli_fetch_assoc($result))
			{
				$_SESSION['username'] = $user_data['username'];
				$_SESSION['password'] = $user_data['userpassword'];
				$_SESSION['user_id'] = $user_data['user_id'];
			}			
			header("location: income.php"); 
		}
		else
		{
			print "Login Unsuccessful";
		}
}

?>