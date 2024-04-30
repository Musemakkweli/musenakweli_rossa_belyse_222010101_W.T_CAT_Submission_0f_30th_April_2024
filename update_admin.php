<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $column = filter_var($_POST['column'], FILTER_SANITIZE_STRING);
  $value = filter_var($_POST['value'], FILTER_SANITIZE_STRING);

  $servername = "localhost";
  $username = "belyse";
  $password = "222010101"; 
  $database = "online_pregnancy_test_system";
  $port = 5306; 

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database;port=$port", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $sql = "UPDATE admin SET $column = :value WHERE email = :email";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":value", $value, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);

    $stmt->execute();

    $rowsAffected = $stmt->rowCount();
    if ($rowsAffected > 0) {

      echo "<script>alert('User data updated successfully!'); window.location.href = 'admin_home.html';</script>";
    } else {

      echo "<script>alert('No changes were made.'); window.location.href = 'admin_home.html';</script>";
    }

  } catch(PDOException $e) {

    echo "Error updating user data: " . $e->getMessage();


    error_log("Update user data error: " . $e->getMessage() . "\n", 3, "/path/to/error.log");
  }

  $conn = null;
}

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */

?>
