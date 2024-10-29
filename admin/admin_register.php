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
    <link rel="stylesheet" href="../register/register.css">
</head>

<body>
<div class="header-container">
            <h1>Swachh Bharat Online</h1>
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../Login/login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>



<div class="container">
    <h2>Registration for Admins</h2>
    <form action="admin_registerlogic.php" method="POST">
        
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" name="phone_number" id="phone_number">
            </div>
            <div class="form-group">
                <label for="Department Name">Department Name:</label>
                <input type="text" name="dname" id="dname" required>
            </div>    
            
        <button type="submit">Register</button>
        
    </form>
    <p>Already have an account? <a href="../admin/admin_login.php">Login here</a>.</p>
</div>

<!-- Footer -->
<footer>
        <div class="footer-container">
            <p>&copy; 2024 Swachh Bharat Online. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>





