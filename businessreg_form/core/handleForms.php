<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['registerUserBtn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (!empty($username) && !empty($hashedPassword)) {

        $insertQuery = insertNewUser($pdo, $username, $hashedPassword);

        if ($insertQuery) {
            header("Location: ../login.php");
        }
        else {
            header("Location: ../register.php");
        }
    }
    else {
        $_SESSION['message'] = "Please make sure the input fields are not empty for registration!";
        header("Location: ../login.php");
    }
}

if (isset($_POST['loginUserBtn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {

        $loginQuery = loginUser($pdo, $username, $password);

        if ($loginQuery) {
            header("Location: ../index.php");
        } else {
            $_SESSION['message'] = "No account registered or invalid credentials!";
            header("Location: ../login.php");
        }

    } else {
        $_SESSION['message'] = "Please make sure the input fields are not empty for the login!";
        header("Location: ../login.php");
    }
}

if (isset($_GET['logoutAUser'])) {
    unset($_SESSION['username']);
    header('Location: ../login.php');
}



if (isset($_POST['insertBaristaBtn'])) {

	$query = insertBarista($pdo, $_POST['username'], $_POST['firstName'], 
		$_POST['lastName']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editBaristaBtn'])) {
    $query = updateBarista($pdo, $_POST['first_name'], $_POST['last_name'], 
    $_GET['barista_id']);

    if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Edit failed";
	}
}

if (isset($_POST['deleteBaristaBtn'])) {
    $query = deleteBarista($pdo, $_GET['barista_id']);

    if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertFlavorBtn'])) {
    $query = insertDrinks($pdo, $_POST['mt_flavor'],$_GET['barista_id']);

    if($query) {
        header("Location: ../viewdrinks.php?barista_id=". $_GET['barista_id']);
    }
    else {
        echo "Insertion failed";
    }
}

if (isset($_POST['editFlavorBtn'])) {
    $query = updateDrinks ($pdo, $_POST['mt_flavor'], $_GET['mtdrinks_id']);

    if($query) {
        header("Location: ../viewdrinks.php?barista_id=". $_GET['barista_id']);
    }
    else {
        echo "Update failed";
    }
}

if (isset($_POST['deleteFlavorBtn'])) {
    $query = deleteDrinks($pdo, $_GET['mtdrinks_id']);

    if($query) {
        header("Location: ../viewdrinks.php?barista_id=". $_GET['barista_id']);
    }
    else {
        echo "Deletion failed";
    }
}

?>