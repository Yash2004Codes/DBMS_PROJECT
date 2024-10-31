<?php
session_start();
 // Include the header

// Check if there are any error messages in the session
if (isset($_SESSION['error'])) {
    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>

<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>

<header class="login-header">
    <h1>Welcome to Swachh Bharat Online Complaint Management Portal</h1>
    <p>Your Voice for a Cleaner India. Log in to Join the Mission!</p>
</header> 



<div class="container">
    <h2>Registration for Users</h2>
    <form action="register_logic.php" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="Phone Number">Phone Number:</label>
                <input type="tel" name="phone" id="phone">
            </div>
        <button type="submit">Register</button>
        
    </form>
    <p>Already have an account? <a href="../Login/login.php">Login here</a>.</p>
</div>

<!-- Footer -->
<footer>
        <div class="footer-container">
            <p>&copy; 2024 Swachh Bharat Online. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>





