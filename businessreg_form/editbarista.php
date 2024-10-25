<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Barista</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div class="container">
		<?php $getBaristaByID = getBaristaByID($pdo, $_GET['barista_id']); ?>
		<h1>Edit Barista</h1>
		<form action="core/handleForms.php?barista_id=<?php echo $_GET['barista_id']; ?>" method="POST">
			<p>
				<label for="firstName">First Name</label> 
				<input type="text" name="first_name" value="<?php echo $getBaristaByID['first_name']; ?>">
			</p>
			<p>
				<label for="firstName">Last Name</label> 
				<input type="text" name="last_name" value="<?php echo $getBaristaByID['last_name']; ?>">
			</p>
			<p>
				<input type="submit" name="editBaristaBtn">
			</p>
		</form>
	</div>
</body>
</html>
