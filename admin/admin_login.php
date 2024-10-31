<?php
session_start();

// Check if there's an error message in the session
if (isset($_SESSION['error'])) {
    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../Login/login.css"> <!-- Link to your CSS file for styling -->
</head>
<body>
<header class="login-header">
    <h1>Welcome to Swachh Bharat Online Complaint Management Portal</h1>
    <p>Your Voice for a Cleaner India. Log in to Join the Mission!</p>
</header> 
    <div class="container">
        <h2>Admin Login</h2>
        <form action="admin_login_logic.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Login</button>
        </form>
        <p>Not registered? <a href="../admin/admin_register.php">Create an account</a></p>

    </div>
    <!-- Footer -->
<footer>
        <div class="footer-container">
            <p>&copy; 2024 Swachh Bharat Online. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
