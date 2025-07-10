<?php
// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "restaurant_management";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare staff ID for deletion
    $staff_id = $_POST['staff_id'];

    // SQL statement to delete staff from 'staff' table
    $sql = "DELETE FROM staff WHERE id = $staff_id";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Staff with ID $staff_id deleted successfully";
    } else {
        echo "Error deleting staff: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
