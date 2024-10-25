<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Drinks</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <a href="viewdrinks.php?barista_id=<?php echo $_GET['barista_id']; ?>">
            View The Drinks
        </a>
        <h1>Edit the Drinks</h1>

        <?php $getDrinksByID = getDrinksByID($pdo, $_GET['mtdrinks_id']); ?>

        <form action="core/handleForms.php?mtdrinks_id=<?php echo $_GET['mtdrinks_id']; ?>&barista_id=<?php echo $_GET['barista_id']; ?>" method="POST">
            <div class="form-group">
                <label for="mt_flavor">Milktea Flavor</label>
                <input type="text" name="mt_flavor" value="<?php echo $getDrinksByID['mt_flavor']; ?>">
            </div>
            <input type="submit" name="editFlavorBtn" value="Submit">
        </form>
    </div>
</body>
</html>
