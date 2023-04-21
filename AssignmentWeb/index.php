<?php require_once("Template/Header.php")?>
<?php

if (!isset($_POST['submit']))
{
?>
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
      <a class="navbar-brand" href="#">SIGN UP</a>
    </div>
  </div>
</nav>
<div id="box">
<form action="index.php" method = "POST">
    <fieldset>
	<strong>
		<div style="font-size: 30px;margin: 10px;color: black;"><strong>SIGN UP</strong></div><br>
		<div>
			<label for="name"><font color="black">Full Name: </font><br>
            <input type="text" placeholder="Full Name" id="name" name="name" required /></label><br>
		</div>

		<div>
			<label for="username"><font color="black">Username: </font><br>
            <input type="text" placeholder="Username" id="username" name="username" required = "true" /></label><br>
		</div>

		<div>
			<label for="email"><font color="black">Email Address: </font><br>
            <input type="text" placeholder="Email Address" id="email" name="email" required = "true" /></label><br>
		</div>

		<div>
			<label for="password"><font color="black">Password: </font><br>
            <input type="password" placeholder="Password" id="password" name="password" required = "true" /></label><br>
		</div>

		<div>
			<label for="password_confirmation"><font color="black">Re Enter Password: </font><br>
            <input type="password" placeholder="Re Enter Password" id="password_confirmation" name="password_confirmation" required = "true" ></label><br>
		</div>

		<p>
			<button class="button-2" type="submit" value="submit" name="submit">Sign Up</button>
			<button class="button-2" type="reset" value="Clear Form" name="submit">Clear All</button>
		</p>
		<div style="font-size: 13px;margin: 10px;"><strong>IF YOU HAVE AN ACCOUNT
		<a href="Signin.php"><font color="black">Click Here</font></a> TO SIGN IN
		</strong>
		</div>
	</strong>
	</fieldset>
</form>
</div>

<?php require_once("Template/Footer.php")?>

<?php
}
else
{
	$name = $_POST['name'];
	$username = ($_POST['username']);
	$email = ($_POST['email']);
	$password = md5($_POST['password']);
	$repassword = md5($_POST['password_confirmation']);

	if ($password == $repassword)
	{
		
		//Create the connection
		$connection = mysqli_connect("localhost","root","","assignment_web");
		//Create the query
		$query = "INSERT INTO user_details VALUES ('','$name','$username', '$email' ,'$password')";

		$result = mysqli_query($connection,$query);

		if ($result)
		{
			?>
				<h6>Accout is created successfully</h6>
				<p><a href="signin.php">Click Here</a> to sign in.</p>
			<?php
		}


	}
	else
	{
		print "<script>alert('Password Mismatch');</script>";
		header("location: index.php");
	}
}

?>
    
