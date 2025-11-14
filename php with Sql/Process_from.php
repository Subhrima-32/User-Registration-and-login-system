<?php
include("connect.php");
session_start(); 

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
        header("Location: registration_from.php");
        exit;
    }


    if ($password !== $confirm_password) {
        $_SESSION['password_error'] = "Passwords do not match!";
        header("Location: registration_from.php");
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
        
        header("Location: login.php");
        exit;
    } else {
        
        $_SESSION['password_error'] = "Error: " . $conn->error;
        header("Location: registration_from.php");
        exit;
    }

    $conn->close();
}
?>
