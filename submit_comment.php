<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */


require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $comments = $_POST["comments"];

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO testimony (Name, Comments) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $comments);

    if ($stmt->execute()) {
        // Return success response
        echo json_encode(["name" => $name]);
    } else {
        // Return error response
        http_response_code(500);
        echo json_encode(["error" => "Failed to submit comment."]);
    }

    $stmt->close();
    $conn->close();
}

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */
?>
