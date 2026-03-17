<?php
$servername = "localhost";
$username = "dmsoghwg_trongtin";
$password = "Mizuki#21063";
$dbname = "dmsoghwg_hatnhem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>