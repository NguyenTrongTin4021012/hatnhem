<?php
header('Content-Type: application/json');

// 1. Setup API Details
$apiKey = "AIzaSyAqIOHuCzo4WoYMPr5jBzPjKs2L_KBUYcs";
$input = json_decode(file_get_contents('php://input'), true);
$prompt = isset($input['prompt']) ? $input['prompt'] : "Hello, tell me a quick coffee fact.";

// These are the EXACT models confirmed to work with your key from your JSON list
$modelsToTry = [
    "gemini-2.0-flash", 
    "gemini-flash-latest", 
    "gemini-1.5-flash", 
    "gemini-2.0-flash-001"
];

$success = false;
$lastResponse = "";

foreach ($modelsToTry as $modelName) {
    // We use v1beta as confirmed by your successful model list fetch
    $url = "https://generativelanguage.googleapis.com/v1beta/models/{$modelName}:generateContent?key={$apiKey}";
    
    $data = [
        "contents" => [["parts" => [["text" => $prompt]]]]
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200) {
        echo $response;
        $success = true;
        break; // Stop once we find a working model
    } else {
        $lastResponse = $response;
    }
}

// If everything fails, show the last error
if (!$success) {
    http_response_code(404);
    echo $lastResponse;
}
?>