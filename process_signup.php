<?php
require 'database_connection.php'; // Ensure this file contains a valid database connection

// Retrieve form data
$userName = $_POST['userName'];
$password = $_POST['password'];
$contactNumber = $_POST['contactNumber'];
$email = $_POST['email'];
$userAccountNumber = $_POST['userAccountNumber'];
$userType = $_POST['userType']; // Retrieve userType
$nidOrGovtApproval = $_POST['nidOrGovtApproval']; // For NID or Govt Approval Number

// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

try {
    $conn = new PDO("mysql:host=localhost;dbname=FundBridge", "root", ""); // Update with your database credentials
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert data into the Users table
    $query = $conn->prepare("
        INSERT INTO Users (userName, password, contactNumber, email, userAccountNumber, userType, nbg) 
        VALUES (:userName, :password, :contactNumber, :email, :userAccountNumber, :userType, :nidOrGovtApproval)
    ");

    // Bind parameters to the query
    $query->bindParam(':userName', $userName);
    $query->bindParam(':password', $hashedPassword);
    $query->bindParam(':contactNumber', $contactNumber);
    $query->bindParam(':email', $email);
    $query->bindParam(':userAccountNumber', $userAccountNumber);
    $query->bindParam(':userType', $userType); // Bind userType
    $query->bindParam(':nidOrGovtApproval', $nidOrGovtApproval);

    // Execute the query
    if ($query->execute()) {
        echo "Account successfully created! Redirecting to Dashboard...";
        header("refresh:3;url=sign_in.php");
        exit();
    } else {
        echo "Failed to create account. Please try again.";
        header("refresh:3;url=signup.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>

