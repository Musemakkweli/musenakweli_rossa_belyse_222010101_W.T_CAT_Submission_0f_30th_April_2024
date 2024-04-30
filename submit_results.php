<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "config.php";

    $userID = $_POST['userID'];
    $testDate = $_POST['testDate'];
    $result = $_POST['result'];

    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tests (UserID, TestDate, Result) VALUES ('$userID', '$testDate', '$result')";

    if ($conn->query($sql) === TRUE) {
        echo "Result submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */
?>
