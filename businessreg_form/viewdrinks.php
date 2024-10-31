<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Drinks</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <a href="index.php">Return to home</a>

        <?php 
        // Retrieve barista_id from GET parameters
        $barista_id = isset($_GET['barista_id']) ? $_GET['barista_id'] : null;
        $getAllInfoByBarista = getBaristaByID($pdo, $barista_id); 
        ?>
        <h1>Username: <?php echo htmlspecialchars($getAllInfoByBarista['username']); ?></h1>
        <h1>Add New Drinks</h1>

        <form action="core/handleForms.php?barista_id=<?php echo $barista_id; ?>" method="POST">
            <p>
                <label for="firstName">Milktea Flavor</label> 
                <input type="text" name="mt_flavor">
            </p>
            <p>
                <input type="submit" name="insertFlavorBtn" value="Submit">
            </p>
        </form>

        <table>
            <tr>
                <th>Milktea ID</th>
                <th>Milktea Flavor</th>
                <th>Maker</th>
                <th>Date Added</th>
                <th>Last Updated</th>
                <th>Action</th>
            </tr>

            <?php 
            $getDrinksByBarista = getDrinksByBarista($pdo, $barista_id); 
            if ($getDrinksByBarista): 
                foreach ($getDrinksByBarista as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['mtdrinks_id']); ?></td>    
                        <td><?= htmlspecialchars($row['mt_flavor']); ?></td>    
                        <td><?= htmlspecialchars($row['maker']); ?></td>    
                        <td><?= htmlspecialchars($row['date_added']); ?></td>
                        <td><?= htmlspecialchars($row['date_updated']); ?></td>
                        <td>
                            <a href="editmtdrinks.php?mtdrinks_id=<?= $row['mtdrinks_id']; ?>&barista_id=<?= $barista_id; ?>">Edit</a>
                            <a href="deletemtdrinks.php?mtdrinks_id=<?= $row['mtdrinks_id']; ?>&barista_id=<?= $barista_id; ?>">Delete</a>
                        </td>    
                    </tr>
                <?php endforeach; 
            else: ?>
                <tr>
                    <td colspan="6">No drinks found.</td>
                </tr>
            <?php endif; ?>
        </table>

    </div>
</body>
</html>
