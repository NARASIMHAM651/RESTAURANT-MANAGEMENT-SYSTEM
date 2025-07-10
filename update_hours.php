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

    // Prepare data for updating working hours
    $staff_id = $_POST['staff_id'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // SQL statement to update working hours in 'working_hours' table
    $sql = "UPDATE working_hours SET start_time = '$start_time', end_time = '$end_time' WHERE staff_id = $staff_id";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Working hours updated successfully";
    } else {
        echo "Error updating working hours: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
