<?php
header('Content-Type: application/json');
http_response_code(410);
echo json_encode([
    "error" => "Legacy PHP endpoint. GitHub Pages does not execute PHP.",
    "status" => "deprecated"
]);
?>
