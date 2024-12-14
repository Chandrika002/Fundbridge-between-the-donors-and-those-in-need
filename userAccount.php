<?php
// Include database connection
include('database_connection.php');

// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) { // Use email to check login status
    echo "You must be logged in to view this page.";
    exit();
}

$email = $_SESSION['email']; // Get email from session

try {
    // Fetch user details from the database using email with PDO
    $query = "SELECT * FROM `FundBridge`.`Users` WHERE email = :email";
    $stmt = $conn->prepare($query);
    
    // Bind the email parameter using PDO
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
    // Execute the statement
    $stmt->execute();
    
    // Fetch user details
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check if user data is available
    if (!$user) {
        echo "No user found with the given email.";
        exit();
    }

    // Extract user details
    $username = htmlspecialchars($user['userName']);
    $usertype = htmlspecialchars($user['userType']);
    $nid_or_approval_number = htmlspecialchars($user['nbg']);
    $contactnumber = htmlspecialchars($user['contactNumber']);
} catch (PDOException $e) {
    // Handle potential PDO errors
    echo "Error: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <link rel="stylesheet" href="useraccountStyle.css">
</head>
<body>
    <div class="container">
        <h1>Your Account Details</h1>
        <div class="account-details">
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>User Type:</strong> <?php echo $usertype; ?></p>
            <p><strong>NID/Govt. Approval Number:</strong> <?php echo $nid_or_approval_number; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Contact Number:</strong> <?php echo $contactnumber; ?></p>
        </div>
    </div>
</body>
</html>

