<?php
/**
*Created by: MUSEMAKWELI Belyse Rossa Arlande 
* Registration Number: 222010101 
*School Department: Year 2 in BIT (Business Information Technology)
*Project: Online Pregnancy Test System
 
 */


 
// Start session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to index page
header("location: index.html");
exit;
?>
