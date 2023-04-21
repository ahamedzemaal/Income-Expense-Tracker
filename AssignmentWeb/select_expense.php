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
			<th>Expense ID</th>
			<th>Username </th>
            <th>Date</th>
            <th>Expense Catagory</th>
			<th>Expense Amount</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	</div>
		<?php

		$connection = mysqli_connect("localhost","root","","assignment_web");

		$query = "SELECT * FROM expense";


		$result = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($result))
		{
			?>
			<tr>
				<td><?php print $row['expense_id'];  ?></td>
				<td><?php print $row['username'];  ?></td>
                <td><?php print $row['date'];  ?></td>
                <td><?php print $row['exp_catagory'];  ?></td>
                <td><?php print $row['exp_amount'];  ?></td>
				<td><a href="update_income.php?uid=<?php print $row['expense_id'];  ?>">Update</td>
				<td><a href="delete_income.php?uid=<?php print $row['expense_id'];  ?>">Delete</td>
			</tr>
			<?php
		}

		?>

	</table>

</body>
</html>