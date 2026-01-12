<?php
// Simplified for Docker: 'database' is the service name from docker-compose.yml
$dsn = "mysql:host=database;dbname=ouareddb";
$user = "admin";
$pass = "securePass123";

try {
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->exec("SET NAMES UTF8");
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
    header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
    
    include "functions.php";

    if (!isset($notAuth)) {
        // checkAuthenticate();
    }
    
    // For testing: echo success message
    echo json_encode(array("status" => "success", "message" => "Connected to database"));
    
} catch (PDOException $e) {
    echo json_encode(array("status" => "error", "message" => "Connection failed: " . $e->getMessage()));
}
