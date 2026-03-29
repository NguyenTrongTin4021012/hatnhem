<?php
header('Content-Type: application/json');
http_response_code(410);
echo json_encode([
    "error" => "Legacy PHP database config removed for static GitHub Pages deployment.",
    "status" => "deprecated"
]);
exit;
?>
