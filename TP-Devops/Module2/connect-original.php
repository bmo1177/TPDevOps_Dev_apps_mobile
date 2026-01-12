<?php
// Updated for Docker: 'database' is the service name from docker-compose.yml
$dsn = "mysql:host=database;dbname=ouareddb";
$user = "admin";
$pass = "securePass123";
// Removed PDO::MYSQL_ATTR_INIT_COMMAND as it doesn't exist
$option = array(
    // PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8", // This constant doesn't exist
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false  // For local dev
);
$countrowinpage = 9;

try {
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Set charset manually instead
    $con->exec("SET NAMES UTF8");
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
    header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
    
    include "functions.php";

    if (!isset($notAuth)) {
        // checkAuthenticate();
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
