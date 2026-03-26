<?php
include 'db.php';
header('Content-Type: application/json');

try {
    // 1. Check if table exists (Prevents crashing if SQL hasn't been run)
    $val = $conn->query("SHOW TABLES LIKE 'cafes'");
    if($val->num_rows == 0) {
        throw new Error("Table 'cafes' does not exist. Please run the SQL setup in phpMyAdmin.");
    }

    // 2. Fetch Data
    $result = $conn->query("SELECT * FROM cafes");
    $data = [];
    
    while($row = $result->fetch_assoc()) {
        // Force coordinates to be numbers
        $row['lat'] = (float)$row['lat'];
        $row['lng'] = (float)$row['lng'];
        $data[] = $row;
    }
    
    // 3. Always return an array
    echo json_encode($data);

} catch (Throwable $e) {
    // If anything fails, send a JSON error that the map can read
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}
?>