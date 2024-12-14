<?php
// Database connection parameters
$host = "localhost"; // Replace with your database host
$dbname = "FundBridge"; // Replace with your database name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password

try {
    // Create a PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    die("Database connection failed: " . $e->getMessage());
}
?>

