<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "taxi_db";
$adminPassword = "mohataxi31"; // 🔒 à changer !

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$id = $_POST['id'] ?? 0;
$password = $_POST['password'] ?? '';

if ($password === $adminPassword && $id) {
    $stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "deleted";
    $stmt->close();
} else {
    echo "error";
}

$conn->close();
