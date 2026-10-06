<?php
$host   = getenv('DB_HOST') ?: "localhost";
$user   = getenv('DB_USER') ?: "root";
$pass   = getenv('DB_PASS') ?: "";
$dbname = getenv('DB_NAME') ?: "zcoer_lab_db";
$port   = getenv('DB_PORT') ?: 3306;

$conn = new mysqli($host, $user, $pass, $dbname, (int)$port);

if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode(["status" => "error", "message" => "Database Connection Failed: " . $conn->connect_error]));
}
?>