<?php
/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "config.php";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    // Prepare and execute SQL statement to insert data into the appointment table
    $sql = "INSERT INTO appointment (Name, Email, Mobile, Service, Message) VALUES ('$name', '$email', '$mobile', '$service', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "Appointment submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */

?>
