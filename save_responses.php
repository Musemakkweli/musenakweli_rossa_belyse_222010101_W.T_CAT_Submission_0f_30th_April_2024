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


// Check connection (same as before)
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data (same as before)
$userID = $_POST['userID'];
$responses = $_POST['responses'];
$questionIDs = $_POST['questionIDs'];

// Prepare and execute SQL statement to insert responses (same as before)
$stmt = $conn->prepare("INSERT INTO user_responses (UserID, question_id, response) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $userID, $questionID, $response);

foreach ($responses as $key => $response) {
    $questionID = $questionIDs[$key];
    if (!$stmt->execute()) {
        // Log any errors
        error_log("Error inserting data: " . $stmt->error);
    }
}

$stmt->close();

// Close connection (same as before)
$conn->close();

echo "Responses submitted successfully";

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */
?>
