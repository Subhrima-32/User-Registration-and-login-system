<?php
include("connect.php");
session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $gender = $_POST['gender'] ?? '';
    $mobile = $_POST["mobile"];
    $country = $_POST["country"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    
    if (strlen($password) < 8) {
        $_SESSION['password_error'] = "Password must be at least 8 characters";
        header("Location: registration.php");
        exit;
    }

    
    if ($password !== $confirm_password) {
        $_SESSION['password_error'] = "Passwords do not match!";
        header("Location: registration.php");
        exit;
    }

    
    if (empty($username) || empty($email) || empty($gender) || empty($mobile) || empty($country) || empty($password) || empty($confirm_password)) {
        die("All fields are required!");
    }

    $result = $conn->query("SELECT MAX(id) AS max_id FROM registration");
    $row = $result->fetch_assoc();
    $new_id = $row['max_id'] + 1;

    $sql = "INSERT INTO registration (id, username, email, gender, mobile, country, password)
            VALUES ('$new_id', '$username', '$email', '$gender', '$mobile', '$country', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2 style='color:green;'> Registration Successful!</h2>";
        echo "<h3>Your Submitted Information:</h3>";
        echo "<p><b>ID:</b> $new_id</p>";
        echo "<p><b>Username:</b> $username</p>";
        echo "<p><b>Email:</b> $email</p>";
        echo "<p><b>Gender:</b> $gender</p>";
        echo "<p><b>Mobile:</b> $mobile</p>";
        echo "<p><b>Country:</b> $country</p>";
    } else {
        echo " Error: " . $conn->error;
    }

    $conn->close();
}
?>
