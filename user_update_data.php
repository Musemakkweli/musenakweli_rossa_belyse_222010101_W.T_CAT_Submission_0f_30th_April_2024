<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data (sanitized for security)
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $column = filter_var($_POST['column'], FILTER_SANITIZE_STRING);
  $value = filter_var($_POST['value'], FILTER_SANITIZE_STRING);

  // Database connection parameters (consider storing these securely)
  $servername = "localhost";
  $username = "belyse";
  $password = "222010101"; // Assuming no password is set (change to secure method)
  $database = "online_pregnancy_test_system";
  $port = 5306; // Specify your MySQL port here

  try {
    // Create a PDO connection (improves security and error handling)
    $conn = new PDO("mysql:host=$servername;dbname=$database;port=$port", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement with parameterized query (prevents SQL injection)
    $sql = "UPDATE user SET $column = :value WHERE email = :email";
    $stmt = $conn->prepare($sql);

    // Bind parameters (improves security and efficiency)
    $stmt->bindParam(":value", $value, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);

    // Execute SQL statement
    $stmt->execute();

    // Check if any rows were affected
    $rowsAffected = $stmt->rowCount();
    if ($rowsAffected > 0) {
      // Success message and redirection
      echo "<script>alert('User data updated successfully!'); window.location.href = 'user_home.html';</script>";
    } else {
      // No rows updated
      echo "<script>alert('No changes were made.'); window.location.href = 'user_home.html';</script>";
    }

  } catch(PDOException $e) {
    // Error message
    echo "Error updating user data: " . $e->getMessage();

    // Optional: Log error details for debugging
    error_log("Update user data error: " . $e->getMessage() . "\n", 3, "/path/to/error.log");
  }

  // Close connection (not strictly necessary with PDO)
  $conn = null;
}

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */

?>
