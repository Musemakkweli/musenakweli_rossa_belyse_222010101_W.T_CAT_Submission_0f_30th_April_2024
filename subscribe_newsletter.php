<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */


// Database Configuration
require_once "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if(isset($_POST['subscribe'])) {
    // Get the email from the form
    $email = $_POST['email'];

    // Prepare SQL statement to insert the email into the database
    $sql = "INSERT INTO newsletter (email) VALUES ('$email')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // Redirect back to index.php with success message
        header("Location: index.html?success=1");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */
?>
