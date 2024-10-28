<?php
$notFound=null;
$failure=null;
// Database connection (replace with your database credentials)
$host = 'localhost';
$name = 'root';
$password = '';
$database = 'shoping_cart';
try{
    $mysqli = new mysqli($host, $name, $password, $database);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
    
        // Retrieve user data based on the provided username
        $query = "SELECT * FROM admin WHERE Email = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Compare the provided password with the stored password
            if ($password===$user['pass']) {
                
                header("Location:../html/AdminTab.php");
                // You can set session variables or redirect to a secure page here.
            } else {
                $failure= "Incorrect password. Please try again.";
            }
        } else {
            $notFound= "User not found. Please check your username.";
        }
    }
    
    $mysqli->close();
}
catch(Error $e){
    echo "Something wrong happened";
}

?>
