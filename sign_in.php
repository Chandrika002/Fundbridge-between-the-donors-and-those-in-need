<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="in_style.css">
</head>
<body>
    <div class="container">
        <h1>Sign In</h1>
        <form action="pr_signin.php" method="POST" class="sign-in-form">
            <label for="role">Select Role:</label>
            <select name="role" id="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>

            <button type="submit">Sign In</button>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>
</body>
</html>

