<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];

// SQL query to insert reservation into database
$sql = "INSERT INTO reservations (name, email, phone, reservation_date, reservation_time, guests)
        VALUES ('$name', '$email', '$phone', '$date', '$time', '$guests')";

if ($conn->query($sql) === TRUE) {
    echo "Reservation successfully submitted!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
