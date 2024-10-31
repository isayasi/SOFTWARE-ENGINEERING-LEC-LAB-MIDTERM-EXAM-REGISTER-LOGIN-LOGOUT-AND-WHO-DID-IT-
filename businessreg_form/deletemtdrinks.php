<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Drink</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<?php $getDrinksByID = getDrinksByID($pdo, $_GET['mtdrinks_id']); ?>
	<h1 class="delete-title">Are you sure you want to delete this project?</h1>
	<div class="mtcontainer">
		<h2>Milktea Flavor: <?php echo $getDrinksByID['mt_flavor'] ?></h2>
		<h2>Barista: <?php echo $getDrinksByID['maker'] ?></h2>
		<h2>Date Added: <?php echo $getDrinksByID['date_added'] ?></h2>

		<div class="deleteBtn">

			<form action="core/handleForms.php?mtdrinks_id=<?php echo $_GET['mtdrinks_id']; ?>&barista_id=<?php echo $_GET['barista_id']; ?>" method="POST">
				<input type="submit" name="deleteFlavorBtn" value="Delete">
			</form>			
			
		</div>	
	</div>
</body>
</html>
