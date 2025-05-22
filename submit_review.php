<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "taxi_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$name = $_POST['name'] ?? '';
$comment = $_POST['comment'] ?? '';
$rating = $_POST['rating'] ?? 0;

if ($name && $comment && $rating) {
    $stmt = $conn->prepare("INSERT INTO reviews (name, comment, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $comment, $rating);
    $stmt->execute();
    echo "success";
    $stmt->close();
} else {
    echo "error";
}

$conn->close();
