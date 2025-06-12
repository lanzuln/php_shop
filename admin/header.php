<?php
ob_start();
session_start();
include "../config/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

//এটা current file এর নাম বলে দিবে extension সহ।
$page_name = basename($_SERVER['PHP_SELF']);

$body_class = ($page_name == 'login.php' || $page_name == 'reset-password.php' ||  $page_name == 'forget-password.php') ? 'body-login' : " ";

if($page_name != 'login.php' && $page_name != 'forget-password.php' && $page_name != 'reset-password.php') {
    if(!isset($_SESSION['admin'])) {
        header("location: ".ADMIN_URL."login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="icon" type="image/png" href="../<?php echo BASE_URL;?>assets/img/favicon.png">

    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/css/spacing.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL;?>dist/css/custom.css">

    <link href="<?php echo ADMIN_URL;?>https://fonts.googleapis.com/css2?family=Sen:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet">

</head>

<body class="<?php echo $body_class; ?>">

