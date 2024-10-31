<?php  
require_once 'core/dbConfig.php';
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milktea Management System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <?php 
            if (isset($_SESSION['username'])) { ?>
            <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
            <a href="core/handleForms.php?logoutAUser=1">Logout</a>
        <?php } 
            else { echo "<h1>No user logged in</h1>";}?>
    
        <h2>Welcome To Milktea Management System! Add new Barista!</h2>
        
        <form action="core/handleForms.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label> 
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label for="firstName">First Name</label> 
                <input type="text" name="firstName">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label> 
                <input type="text" name="lastName">
            </div>
                <input type="submit" name="insertBaristaBtn" value="Add Barista">
        </form>

        <h3>List of Baristas:</h3>
        <?php $getAllBarista = getAllBarista($pdo); ?>
        <?php foreach ($getAllBarista as $row) { ?>
            <div class="barista">
                <h3>Username: <?php echo $row['username']; ?></h3>
                <h3>First Name: <?php echo $row['first_name']; ?></h3>
                <h3>Last Name: <?php echo $row['last_name']; ?></h3>
                <h3>Date Added: <?php echo $row['date_added']; ?></h3>
                <h3>Last Updated: <?php echo $row['last_updated']; ?></h3>
                <h3>Added By: <?php echo $row['added_by']; ?></h3>
                
                <div class="editAndDelete">
                    <a href="viewdrinks.php?barista_id=<?php echo $row['barista_id']; ?>">View Projects</a>
                    <a href="editbarista.php?barista_id=<?php echo $row['barista_id']; ?>">Edit</a>
                    <a href="deletebarista.php?barista_id=<?php echo $row['barista_id']; ?>">Delete</a>
                </div>
            </div> 
        <?php } ?>
    
        <h3>Users List</h3>
        <ul>
            <?php $getAllUsers = getAllUsers($pdo); ?>
            <?php foreach ($getAllUsers as $row) { ?>
                <li>
                    <a href="viewuser.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['username']; ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>
