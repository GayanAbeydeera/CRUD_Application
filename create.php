<?php
$conn = new mysqli('localhost', 'root', '', 'crud_app');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];   
    $stmt = $conn->prepare("INSERT INTO items (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header('Location: index.php');