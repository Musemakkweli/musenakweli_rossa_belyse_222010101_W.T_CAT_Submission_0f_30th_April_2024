<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */

 // connection file
require_once "config.php";

//connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tables = array();//diplaying tables
$result = $conn->query("SHOW TABLES");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($tables);

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */
?>
