<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    echo "<h2>Your Submitted Information</h2>";
    echo "Full Name: " . htmlspecialchars($fullname) . "<br>";
    echo "Email: " . htmlspecialchars($email);
}
?>
