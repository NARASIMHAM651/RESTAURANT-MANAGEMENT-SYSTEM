<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $customerName = htmlspecialchars($_POST['customerName']);
    $orderDetails = htmlspecialchars($_POST['orderDetails']);

    
    $servername = "root@localhost:3306";
    $username = "root"; 
    $password = "student"; 
    $database = "firstproject"; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert order into database
    $sql = "INSERT INTO orders (customer_name, order_details) VALUES ('$customerName', '$orderDetails')";

    if ($conn->query($sql) === TRUE) {
        echo "Order created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
