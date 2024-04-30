<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */



// Database connection parameters
require_once "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$dateofbirth = $_POST['dateofbirth'];
$address = $_POST['address'];
$password = $_POST['password'];
$insurance = $_POST['insurance'];

// Insert data into database without specifying UserID
$sql = "INSERT INTO user (Username, Phone, Email, DateOfBirth, Address, Password, Insurance)
        VALUES ('$name', '$phonenumber', '$email', '$dateofbirth', '$address', '$password', '$insurance')";

if ($conn->query($sql) === TRUE) {
    // Display personalized success message
    echo "<script>alert('Hello $name, your registration was successfully submitted');</script>";
    // Redirect to login page after displaying the notification
    echo "<script>window.location.href = 'login.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */

 
?>
