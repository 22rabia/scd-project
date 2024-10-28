<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve JSON data from the request body
    $jsonData = file_get_contents("php://input");

    // Decode JSON data into PHP array
    $purchaseData = json_decode($jsonData, true);

    // Extract data
    $quantity = $purchaseData['quantity'];
    $totalPrice = $purchaseData['totalPrice'];
    // Add more fields as needed

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "your_password";
    $dbname = "shoping_cart";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO purchases (quantity, total_price) VALUES ('$quantity', '$totalPrice')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Purchase data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle other request methods if needed
    echo "Invalid request method.";
}

?>
