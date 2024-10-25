<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div class="container">
		<?php if (isset($_SESSION['message'])) { ?>
			<h3 style="color: black;"><?php echo $_SESSION['message']; ?></h3>
		<?php } unset($_SESSION['message']); ?>

		<h2>Register</h2>
		<form action="core/handleForms.php" method="POST">
			<p>
				<label for="username">Username</label>
				<input type="text" name="username" id="username" required>
			</p>
			<p>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" required>
			</p>
			<p>
				<input type="submit" name="registerUserBtn" value="Register">
			</p>
		</form>
		<p class="register-link">Already have an account? You may log in <a href="login.php">here</a></p>
	</div>
</body>
</html>
