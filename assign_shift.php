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

    // Prepare data for assigning shifts
    $staff_id = $_POST['staff_id'];
    $shift_date = $_POST['shift_date'];

    // SQL statement to assign shift in 'shifts' table
    $sql = "INSERT INTO shifts (staff_id, shift_date) VALUES ('$staff_id', '$shift_date')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Shift assigned successfully";
    } else {
        echo "Error assigning shift: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
