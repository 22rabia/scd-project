<?php
$sucess = null;
$failure = null;
$invalid = null;

require_once("DatabaseConnection.php");

$databaseConnection = DatabaseConnection::getInstance();
$connection = $databaseConnection->getConnection();

if ($databaseConnection->isConnected()) {
    if (isset($_POST["submit"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confpass = $_POST['confpwd'];

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $invalid = "Please enter a valid email address.";
        } else {
            if ($password != $confpass) {
                $invalid = "Password and confirm password do not match";
            } else {
                // Insert new user
                $insertQuery = "INSERT INTO signup (username, password) VALUES (?, ?)";
                $insertStmt = $connection->prepare($insertQuery);
                $insertStmt->bind_param('ss', $email, $password);

                try {
                    if ($insertStmt->execute()) {
                        $sucess = "User Registered Successfully";
                    } else {
                        echo "Something wrong occurred";
                    }

                    // Close database connections and statements
                    $insertStmt->close();
                    $connection->close();
                } catch (mysqli_sql_exception $ex) {
                    if ($ex->getCode() == 1062) {
                        $failure = "This email address is already in use.";
                    } else {
                        echo "Error: " . $ex->getMessage();
                    }
                }
            }
        }
    }
}
?>
