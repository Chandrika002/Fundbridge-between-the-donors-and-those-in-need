<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard</title>
    <link rel="stylesheet" href="UDstyle.css">
</head>
<body>
    <header>
        <h1>Your Dashboard</h1>
        <p>Choose an action:</p>
    </header>
    <nav>
        <ul>
            <li><a href="userAccount.php">Your Account</a></li>
            <li id="donateBox">
                <a href="javascript:void(0)" id="donateButton" onclick="showDonateForm()">Donate</a>
                <div id="donateForm" style="display:none;">
                    <form id="donateAmountForm" action="process_donation.php" method="POST">
                        <label for="donationAmount">Amount</label>
                        <input type="number" id="donationAmount" name="donationAmount" required>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </li>
            <li><a href="requestFundForm.php">Request Fund</a></li><br>
            <li><a href="notificationForm.php">Notification</a></li>
            <li><a href="contributionForm.php">Your Contributions</a></li>
            <li><a href="index.php">Log Out</a></li>
        </ul>
    </nav>

    <script>
        function showDonateForm() {
            document.getElementById("donateButton").style.display = 'none';  // Hide Donate button
            document.getElementById("donateForm").style.display = 'block';   // Show donation form
        }
    </script>
</body>
</html>

