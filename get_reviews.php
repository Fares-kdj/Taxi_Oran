<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "taxi_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$result = $conn->query("SELECT id, name, comment, rating, created_at FROM reviews ORDER BY created_at DESC");

$reviews = [];
while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

echo json_encode($reviews);
$conn->close();
