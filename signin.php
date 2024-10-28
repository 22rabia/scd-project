<?php
$notFound=null;
$failure=null;
// Database connection (replace with your database credentials)
// $host = 'localhost';
// $name = 'root';
// $password = '';
// $database = 'shoping_cart';
// // for building connection with database

require_once("DatabaseConnection.php");

//singelton pattern applied on instance is created and can create now multiple connection using it 
$databaseConnection = DatabaseConnection::getInstance();
$connection = $databaseConnection->getConnection();
// $mysqli = new mysqli($host, $name, $password, $database);

 // if ($mysqli->connect_error) {
//     die("Connection failed: " . $mysqli->connect_error);
// }
if($databaseConnection->isConnected()){
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
    
        // Retrieve user data based on the provided username
        $query= "SELECT * FROM signup WHERE username = ?";
        $stmt = $connection->prepare($query);
        //bata raha ha kay aik sring value chahiyay email ki 
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Compare the provided password with the stored password
            if ($password===$user['password']) {
    
                session_start(); // Start a session
                $_SESSION['username'] = $username; // Store the username in a session variable
                header("Location:homepage.php");
                exit();
                // You can set session variables or redirect to a secure page here.
            } else {
                $failure= "Incorrect password. Please try again.";
            }
        } else {
            $notFound= "User not found. Please check your username.";
        }
}


}
else{
    die("Connection failed: ");
}


?>