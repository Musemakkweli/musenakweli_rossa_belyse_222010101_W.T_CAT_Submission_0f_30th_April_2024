<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */


//connection file
require_once "config.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// selecting a table to have action in
$tableName = $_POST['tableName'];
$primaryKeyColumn = $_POST['primaryKeyColumn'];
$primaryKeyValue = $_POST['primaryKeyValue'];


//performing delete
$query = "DELETE FROM $tableName WHERE $primaryKeyColumn = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $primaryKeyValue);
$stmt->execute();

$rowsDeleted = $stmt->affected_rows;

$stmt->close();
$conn->close();

if ($rowsDeleted > 0) {
    echo "Row deleted successfully.";
} else {
    echo "No row found with the specified primary key.";
}
// close

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */
?>

