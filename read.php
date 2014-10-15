<?php
require 'database.php';
$isbn = null;
if (! empty ( $_GET ['isbn'] )) {
	$isbn = $_REQUEST ['isbn'];
}

if (null == $isbn) {
	header ( "Location: index.php" );
} else {
	$pdo = Database::connect ();
	$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "SELECT * FROM book where isbn = ?";
	$q = $pdo->prepare ( $sql );
	$q->execute ( array (
			$isbn 
	) );
	$data = $q->fetch ( PDO::FETCH_ASSOC );
	Database::disconnect ();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Read a Book</h3>
			</div>

			<div class="form-horizontal">
				<div class="control-group">
					<label class="control-label">ISBN</label>
					<div class="controls">
						<label class="checkbox">
                                <?php echo $data['isbn'];?>
                            </label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Title</label>
					<div class="controls">
						<label class="checkbox">
                                <?php echo $data['title'];?>
                            </label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Publisher</label>
					<div class="controls">
						<label class="checkbox">
                                <?php echo $data['publisher'];?>
                            </label>
					</div>
				</div>
				<div class="form-actions">
					<a class="btn" href="index.php">Back</a>
				</div>
			</div>
		</div>

	</div>
	<!-- /container -->
</body>
</html>