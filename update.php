<?php
$conn = new mysqli('localhost', 'root', '', 'crud_app');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $stmt = $conn->prepare("UPDATE items SET name = ? WHERE id = ?");
    $stmt->bind_param("si", $name, $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header('Location: index.php');