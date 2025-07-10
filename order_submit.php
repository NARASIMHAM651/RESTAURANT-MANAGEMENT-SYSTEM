<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $customerName = htmlspecialchars(trim($_POST['customerName']));
    $customerEmail = filter_var(trim($_POST['customerEmail']), FILTER_SANITIZE_EMAIL);
    $customerAddress = htmlspecialchars(trim($_POST['customerAddress']));
    $productName = htmlspecialchars(trim($_POST['productName']));
    $quantity = filter_var(trim($_POST['quantity']), FILTER_VALIDATE_INT);
    $price = filter_var(trim($_POST['price']), FILTER_VALIDATE_FLOAT);

    // Validate form data
    if (empty($customerName) || empty($customerEmail) || empty($customerAddress) || empty($productName) || !$quantity || !$price) {
        echo "All fields are required and must be valid.";
        exit;
    }

    // Calculate total price
    $totalPrice = $quantity * $price;

    // Output order summary
    echo "<h1>Order Summary</h1>";
    echo "<p><strong>Name:</strong> " . $customerName . "</p>";
    echo "<p><strong>Email:</strong> " . $customerEmail . "</p>";
    echo "<p><strong>Address:</strong> " . $customerAddress . "</p>";
    echo "<p><strong>Product:</strong> " . $productName . "</p>";
    echo "<p><strong>Quantity:</strong> " . $quantity . "</p>";
    echo "<p><strong>Price per Unit:</strong> $" . number_format($price, 2) . "</p>";
    echo "<p><strong>Total Price:</strong> $" . number_format($totalPrice, 2) . "</p>";
} else {
    echo "Invalid request.";
}
?>
