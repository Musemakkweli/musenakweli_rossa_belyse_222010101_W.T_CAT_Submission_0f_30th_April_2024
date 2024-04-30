<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */

 //connection file
require_once "config.php";

// table
$tableName = $_POST['tableName'];


// connection handler
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//selectin row
$tableData = "";
$result = $conn->query("SELECT * FROM $tableName");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tableData .= implode(", ", $row) . "\n";
    }
} else {
    $tableData = "No data found in the table.";
}

$conn->close();
echo $tableData;

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */
?>
