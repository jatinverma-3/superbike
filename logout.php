<?php
session_start();

// Unset all of the session variables
$_SESSION['email'] = $email;

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: signin.php");
exit;
?>
