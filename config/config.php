<?php 
$db_host= 'localhost';
$db_name= 'php_shop';
$db_user= 'root';
$db_pass= '';

try {
    $pdo = new PDO ("mysql:host={$db_host}; dbname={$db_name}", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// define('BASE_URL','http://localhost:8080/project/');
// define('ADMIN_URL', BASE_URL.'admin/');

define('SMTP_HOST', 'sandbox.smtp.mailtrap.io');
define('SMTP_PORT', '587');
define('SMTP_USERNAME', 'adec5c968238ad');
define('SMTP_PASSWORD', '3fba3d9a65e926');
define('SMTP_ENCRYPTION', 'tls');
define('SMTP_FROM', 'lanzu@gmail.com');