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

// Retrieve email and password from form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute SQL statement to select admin by email and password
$stmt = $conn->prepare("SELECT name FROM admin WHERE email=? AND password=?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// If admin found, start session and redirect to admin home page
if ($result->num_rows > 0) {
    session_start();
    $_SESSION['email'] = $email; 
    header("Location: admin_home.html"); 
    exit();
} else {
    // If admin not found, show error message and redirect to admin login page
    echo "<script>alert('Wrong Email or Password, Please Verify Credentials');</script>";
    echo "<script>window.location.href = 'admin_login.html';</script>";
}

// Close statement and database connection
$stmt->close();
$conn->close();

?>
