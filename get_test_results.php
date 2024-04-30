<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */

session_start();

// Include config file
require_once "config.php";

// Fetch test results for the logged-in user
$userEmail = $_SESSION["email"];
$userID = getUserIdByEmail($userEmail);

$query = "SELECT * FROM tests WHERE UserID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Display test results
    echo "<table>";
    echo "<tr><th>TestID</th><th>UserID</th><th>TestDate</th><th>Result</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["TestID"] . "</td>";
        echo "<td>" . $row["UserID"] . "</td>";
        echo "<td>" . $row["TestDate"] . "</td>";
        echo "<td>" . $row["Result"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No test results found</p>";
}

// Close statement
$stmt->close();

// Function to get UserID by email
function getUserIdByEmail($email) {
    global $conn;
    $query = "SELECT UserID FROM user WHERE Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["UserID"];
    } else {
        return 0;
    }
}

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */
?>
