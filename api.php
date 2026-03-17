<?php
include 'db.php';

$action = $_GET['action'] ?? '';

if ($action == 'save_quiz') {
    $profile = $_POST['profile'];
    $notes = $_POST['notes'];
    $stmt = $conn->prepare("INSERT INTO quiz_results (taste_profile, preferred_notes) VALUES (?, ?)");
    $stmt->bind_param("ss", $profile, $notes);
    $stmt->execute();
    echo json_encode(["status" => "success"]);
}

if ($action == 'get_cafes') {
    $profile = $_GET['profile'] ?? '';
    $sql = "SELECT * FROM cafes WHERE profile_match = '$profile'";
    $result = $conn->query($sql);
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}
?>