<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $guests = $_POST["guests"];

    // Validate form data (You can add more validation as needed)
    if (empty($name) || empty($email) || empty($phone) || empty($date) || empty($time) || empty($guests)) {
        // Handle validation errors (e.g., display error messages)
        echo "All fields are required.";
    } else {
        // Store reservation data in a database or send it via email, etc.
        // For demonstration purposes, let's just display the reservation details
        echo "<h2>Reservation Details:</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Phone: $phone</p>";
        echo "<p>Date: $date</p>";
        echo "<p>Time: $time</p>";
        echo "<p>Number of Guests: $guests</p>";
    }
} else {
    // Redirect to the reservation page if the form is not submitted
    header("Location: reservation.html");
    exit;
}
?>
