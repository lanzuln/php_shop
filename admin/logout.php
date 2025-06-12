<?php include_once('header.php'); 

// unset admin session only (optional)
unset($_SESSION['admin']);

$_SESSION['success_message'] = 'You have successfully logged out';
// redirect
header('Location: ' . ADMIN_URL . 'login.php');
exit;
