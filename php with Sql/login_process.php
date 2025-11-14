<?php
session_start();
include("connect.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = $conn->real_escape_string(trim($_POST['password']));

    $sql = "SELECT * FROM registration WHERE username='$username' AND password='$password' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        
        $_SESSION['username'] = $username;  
        header("Location: home.php");       
        exit;
    } else {
        
        $_SESSION['login_error'] = "Invalid username or password";
        header("Location: login.php");     
        exit;
    }
}
?>
