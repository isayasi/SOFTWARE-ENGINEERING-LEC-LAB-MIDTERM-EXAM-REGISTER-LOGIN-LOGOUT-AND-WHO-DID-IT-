<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Barista</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getBaristaByID =getBaristaByID($pdo, $_GET['barista_id']); ?>
	<div class="mtcontainer" style="border-style: solid; height: 400px;">
		<h2>Username: <?php echo $getBaristaByID['username']; ?></h2>
		<h2>First Name: <?php echo $getBaristaByID['first_name']; ?></h2>
		<h2>Last Name: <?php echo $getBaristaByID['last_name']; ?></h2>

		<div class="deleteBtn">
			
			<form action="core/handleForms.php?barista_id=<?php echo $_GET['barista_id']; ?>" method="POST">
				<input type="submit" name="deleteBaristaBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>
