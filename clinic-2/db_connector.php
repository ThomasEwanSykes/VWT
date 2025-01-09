<?php
// Database connection settings
$host = "localhost";
$dbname = "vet_waiting_times";
$username = "root";
$password = "";
$table = "clinic 1";

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;table=$table;charset=utf8mb4", $username, $password);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    die("Database connection failed: " . $e->getMessage());
}
?>
