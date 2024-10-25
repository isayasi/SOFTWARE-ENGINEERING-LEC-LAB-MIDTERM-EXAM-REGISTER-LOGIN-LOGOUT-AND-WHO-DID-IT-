<?php  

require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['message'])) { ?>
            <h3 style="color: black;"><?php echo $_SESSION['message']; ?></h3>
            <?php unset($_SESSION['message']); ?>
        <?php } ?>

        <h2>Login</h2>
        <form action="core/handleForms.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <input type="submit" name="loginUserBtn" value="Login">
            </div>
        </form>
        <p class="register-link">Don't have an account? You may register <a href="register.php">here</a></p>
    </div>
</body>
</html>
