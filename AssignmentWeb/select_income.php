<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Income Details</title>
</head>
<body>

	<div class="container mt-3">
	<h1>Income Details</h1>
	<table class="table">
		
		<tr>
			<th>Income ID</th>
			<th>Username </th>
            <th>Date</th>
            <th>Income Catagory</th>
            <th>Income Description</th>
			<th>Income Amount</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	</div>
		<?php

		$connection = mysqli_connect("localhost","root","","assignment_web");

		$query = "SELECT * FROM income";


		$result = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($result))
		{
			?>
			<tr>
				<td><?php print $row['income_id'];  ?></td>
				<td><?php print $row['username'];  ?></td>
                <td><?php print $row['date'];  ?></td>
                <td><?php print $row['Inc_category'];  ?></td>
				<td><?php print $row['inc_description'];  ?></td>
                <td><?php print $row['inc_amount'];  ?></td>
				<td><a href="update_income.php?uid=<?php print $row['income_id'];  ?>">Update</td>
				<td><a href="delete_income.php?uid=<?php print $row['income_id'];  ?>">Delete</td>
			</tr>
			<?php
		}

		?>

	</table>

</body>
</html>