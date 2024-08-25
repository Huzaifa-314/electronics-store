<?php 

// Start session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Unset cookies
setcookie('user_id', '', time() - 3600, "/", "", false, true);
setcookie('user_email', '', time() - 3600, "/", "", false, true);
setcookie('user_role', '', time() - 3600, "/", "", false, true);

// Redirect to the homepage or another page
header('Location: ../index.php');
exit();
?>
