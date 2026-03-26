<?php
include 'db.php';
header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);
$action = $input['action'];
$email = $input['email'];
$password = $input['password'];

if ($action == 'login') {
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();
    if ($user && $password === $user['password']) {
        echo json_encode(["status" => "success", "user_id" => $user['id']]);
    } else {
        echo json_encode(["status" => "error", "message" => "Wrong email or password"]);
    }
} else {
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);
    if($stmt->execute()) echo json_encode(["status" => "success", "user_id" => $conn->insert_id]);
    else echo json_encode(["status" => "error", "message" => "User exists"]);
}
?>