<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<h3>PHP CRUD Grid</h3>
		</div>
		<div class="row">
			<p>
				<a href="create.php" class="btn btn-success">Create</a>
			</p>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>ISBN</th>
						<th>Title</th>
						<th>Publisher</th>
						<th>action</th>
					</tr>
				</thead>
				<tbody>
	               	<?php
						include 'database.php';
						$pdo = Database::connect ();
						$sql = 'SELECT * FROM book ORDER BY isbn DESC';
						foreach ( $pdo->query ( $sql ) as $row ) {
							echo '<tr>';
							echo '<td>' . $row ['isbn'] . '</td>';
							echo '<td>' . $row ['title'] . '</td>';
							echo '<td>' . $row ['publisher'] . '</td>';
							echo '<td width=250>';
	                        echo '<a class="btn" href="read.php?isbn='.$row['isbn'].'">Read</a>';
	                        echo ' ';
	                        echo '<a class="btn btn-success" href="update.php?isbn='.$row['isbn'].'">Update</a>';
	                        echo ' ';
	                        echo '<a class="btn btn-danger" href="delete.php?isbn='.$row['isbn'].'">Delete</a>';
	                        echo '</td>';
							echo '</tr>';
						}
						Database::disconnect ();
					?>
	            </tbody>
			</table>
		</div>
	</div>
	<!-- /container -->
</body>
</html>