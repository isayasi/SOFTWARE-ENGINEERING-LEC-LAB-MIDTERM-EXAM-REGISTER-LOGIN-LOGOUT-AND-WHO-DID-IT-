<?php  

require_once 'dbConfig.php';

function insertNewUser($pdo, $username, $hashedPassword) {
    $checkUserSql = "SELECT * FROM user_passwords WHERE username = ?";
    $checkUserSqlStmt = $pdo->prepare($checkUserSql);
    $checkUserSqlStmt->execute([$username]);

    if ($checkUserSqlStmt->rowCount() == 0) {
        $sql = "INSERT INTO user_passwords (username, password) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$username, $hashedPassword]);

        if ($executeQuery) {
            $_SESSION['message'] = "User successfully inserted!";
            return true;
        } else {
            $_SESSION['message'] = "An error occurred with the query";
        }
    } else {
        $_SESSION['message'] = "User already exists";
    }
}

function loginUser($pdo, $username, $password) {
    $sql = "SELECT * FROM user_passwords WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);

    if ($stmt->rowCount() == 1) {
        $userInfoRow = $stmt->fetch();
        $usernameFromDB = $userInfoRow['username'];
        $hashedPasswordFromDB = $userInfoRow['password'];

       
        if (password_verify($password, $hashedPasswordFromDB)) {
            $_SESSION['username'] = $usernameFromDB;
            $_SESSION['message'] = "Login Successful!";
            return true;
        } else {
            $_SESSION['message'] = "Username/Password invalid!";
        }
    } else {
        $_SESSION['message'] = "Username/Password invalid!";
    }
}

function getAllUsers($pdo) {
    $sql = "SELECT * FROM user_passwords";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getUserByID($pdo, $user_id) {
    $sql = "SELECT * FROM user_passwords WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$user_id]);
    
    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function insertBarista($pdo, $username, $first_name, $last_name) {
    $sql = "INSERT INTO barista (username, first_name, last_name) VALUES(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$username, $first_name, $last_name]);

    if ($executeQuery) {
        return true;
    }
}

function updateBarista($pdo, $first_name, $last_name, $barista_id) {
    $sql = "UPDATE barista SET first_name = ?, last_name = ? WHERE barista_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $barista_id]);

    if ($executeQuery) {
        return true;
    }
}

function deleteBarista($pdo, $barista_id){
    $deletemtdrinks = "DELETE FROM mtdrinks WHERE barista_id = ?";
    $deleteStmt = $pdo->prepare($deletemtdrinks);
    $executeDeleteQuery = $deleteStmt->execute([$barista_id]);

    if($executeDeleteQuery) {
        $sql = "DELETE FROM barista WHERE barista_id = ?";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$barista_id]);

        if ($executeQuery){
            return true;
        }
    }
}

function getAllBarista($pdo) {
    $sql = "SELECT * FROM barista";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getBaristaByID($pdo, $barista_id) {
    $sql = "SELECT * FROM barista WHERE barista_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$barista_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function getDrinksByBarista($pdo, $barista_id) {
    $sql = "SELECT
            mtdrinks.mtdrinks_id AS mtdrinks_id,
            mtdrinks.mt_flavor AS mt_flavor,
            mtdrinks.date_added AS date_added,
            mtdrinks.date_updated AS date_updated, 
            CONCAT(barista.first_name, ' ', barista.last_name) AS maker
            FROM mtdrinks
            JOIN barista ON mtdrinks.barista_id = barista.barista_id
            WHERE mtdrinks.barista_id = ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$barista_id]);
    if ($executeQuery) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    return []; 
}

function insertDrinks($pdo, $mt_flavor, $barista_id) {
    $sql = "INSERT INTO mtdrinks (mt_flavor, barista_id) VALUES (?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$mt_flavor, $barista_id]);
    if ($executeQuery) {
        return true;
    }
}

function getDrinksByID($pdo, $mtdrinks_id) {
    $sql = "SELECT
        mtdrinks.mtdrinks_id AS mtdrinks_id,
        mtdrinks.mt_flavor AS mt_flavor,
        mtdrinks.date_added AS date_added,
        CONCAT(barista.first_name,' ', barista.last_name) AS maker
        FROM mtdrinks
        JOIN barista ON mtdrinks.barista_id = barista.barista_id
        WHERE mtdrinks.mtdrinks_id = ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$mtdrinks_id]);
    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function updateDrinks($pdo, $mt_flavor, $mtdrinks_id) {
    $sql = "UPDATE mtdrinks SET mt_flavor = ? WHERE mtdrinks_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$mt_flavor, $mtdrinks_id]);

    if ($executeQuery) {
        return true;
    }
}

function deleteDrinks($pdo, $mtdrinks_id){
    $sql = "DELETE FROM mtdrinks WHERE mtdrinks_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$mtdrinks_id]);
    if ($executeQuery) {
        return true;
    }
}

function editDrinks($pdo, $mt_flavor, $mtdrinks_id) {
    return updateDrinks($pdo, $mt_flavor, $mtdrinks_id);
}

?>
