<?php

/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */
// Database configuration
define('DB_SERVER', 'localhost');                        // Dabase location
define('DB_USERNAME', 'belyse');                        // User with privileges
define('DB_PASSWORD', '222010101');                    // Pasword
define('DB_NAME', 'online_pregnancy_test_system');    // Database name 
define('DB_PORT', '5306');                           // Port used by mysql

// connect to the database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
