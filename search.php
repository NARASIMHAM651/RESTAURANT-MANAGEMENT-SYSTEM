<?php
// Check if the order ID is provided in the URL
if (isset($_GET['orderId'])) {
    // Sanitize the input to prevent SQL injection
    $orderId = htmlspecialchars($_GET['orderId']);

    // Database connection settings
    $servername = "root@localhost:3306";
    $username = "root"; // Replace with your MySQL username
    $password = "student"; // Replace with your MySQL password
    $database = "firstproject"; // Replace with your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to search for order by ID
    $sql = "SELECT * FROM orders WHERE order_id = '$orderId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Order ID: " . $row["order_id"]. " - Customer Name: " . $row["customer_name"]. " - Order Date: " . $row["order_date"]. "<br>";
        }
    } else {
        echo "No orders found with the provided ID.";
    }

    // Close database connection
    $conn->close();
}
?>
