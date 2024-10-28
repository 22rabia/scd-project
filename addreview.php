<?php
// Assuming you have a database connection established
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "Chutki Mai Shopping.com";

// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
require_once("DatabaseConnection.php");

//singelton pattern applied on instance is created and can create now multiple connection using it 
$databaseConnection = DatabaseConnection::getInstance();
$connection = $databaseConnection->getConnection();
if($databaseConnection->isConnected()){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $country = $_POST["country"];
        $rating = $_POST["rating"];
        $suggestions = $_POST["suggestions"];
    
        // Insert data into the database
        $sql = "INSERT INTO reviews (name, gender, country, rating, suggestions) VALUES ('$name', '$gender', '$country', '$rating', '$suggestions')";
    
        if ($connection->query($sql) === TRUE) {
            echo "Review submitted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }

}


// Close the database connection
$connection->close();
?>
