<?php
require 'database.php';

if (! empty ( $_POST )) {
	// keep track validation errors
	$isbnError = null;
	$titleError = null;
	$publisherError = null;
	
	// keep track post values
	$isbn = $_POST ['isbn'];
	$title = $_POST ['title'];
	$publisher = $_POST ['publisher'];
	
	// validate input
	$valid = true;
	if (empty ( $isbn )) {
		$isbnError = 'Please enter isbn';
		$valid = false;
	}
	
	if (empty ( $title )) {
		$titleError = 'Please enter title';
		$valid = false;
	}
	
	if (empty ( $publisher )) {
		$publisherError = 'Please enter publisher';
		$valid = false;
	}
	
	// insert data
	if ($valid) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = "INSERT INTO book (isbn,title,publisher) values(?, ?, ?)";
		$q = $pdo->prepare ( $sql );
		$q->execute ( array (
				$isbn,
				$title,
				$publisher 
		) );
		Database::disconnect ();
		header ( "Location: index.php" );
	}
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
				<h3>Create a Book</h3>
			</div>

			<form class="form-horizontal" action="create.php" method="post">
				<div
					class="control-group <?php echo !empty($isbnError)?'error':'';?>">
					<label class="control-label">ISBN</label>
					<div class="controls">
						<input name="isbn" type="text" placeholder="ISBN"
							value="<?php echo !empty($isbn)?$isbn:'';?>">
                            <?php if (!empty($isbnError)): ?>
                                <span class="help-inline"><?php echo $isbnError;?></span>
                            <?php endif; ?>
                        </div>
				</div>
				<div
					class="control-group <?php echo !empty($titleError)?'error':'';?>">
					<label class="control-label">Title</label>
					<div class="controls">
						<input name="title" type="text" placeholder="Title"
							value="<?php echo !empty($title)?$title:'';?>">
                            <?php if (!empty($titleError)): ?>
                                <span class="help-inline"><?php echo $titleError;?></span>
                            <?php endif;?>
                        </div>
				</div>
				<div
					class="control-group <?php echo !empty($publisherError)?'error':'';?>">
					<label class="control-label">Publisher</label>
					<div class="controls">
						<input name="publisher" type="text" placeholder="Publisher"
							value="<?php echo !empty($publisher)?$publisher:'';?>">
                            <?php if (!empty($publisherError)): ?>
                                <span class="help-inline"><?php echo $publisherError;?></span>
                            <?php endif;?>
                        </div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Create</button>
					<a class="btn" href="index.php">Back</a>
				</div>
			</form>
		</div>

	</div>
	<!-- /container -->
</body>
</html>

