<?php
$host = 'localhost';
$db   = 'dmsoghwg_hatnhem';
$user = 'dmsoghwg_trongtin';
$pass = 'Mizuki#21063';

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $pass, $db);
    // Force UTF-8 for Vietnamese characters
    $conn->set_charset("utf8mb4");
} catch (Exception $e) {
    header('Content-Type: application/json');
    // If this fails, it sends the exact error back to the Map
    http_response_code(500);
    echo json_encode(["error" => "Connection failed: " . $e->getMessage()]);
    exit;
}
?>