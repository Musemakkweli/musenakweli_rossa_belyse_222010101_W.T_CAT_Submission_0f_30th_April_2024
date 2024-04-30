<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */
session_start();

// Include database connection file
require_once "config.php";



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$role = $_POST['role'];
$password = $_POST['password'];


$sql = "INSERT INTO admin (Name, Email, Role, Password)
        VALUES ('$name', '$email', '$role', '$password')";

if ($conn->query($sql) === TRUE) {
    // Display personalized success message
    echo "<script>alert('Hello $name, your registration was successfully submitted');</script>";
    // Redirect to login page after displaying the notification
    echo "<script>window.location.href = 'admin_login.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
