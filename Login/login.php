<?php
session_start(); // Start the session at the very beginning
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
<header class="login-header">
    <h1>Welcome to Swachh Bharat Online Complaint Management Portal</h1>
    <p>Your Voice for a Cleaner India. Log in to Join the Mission!</p>
</header> 
<div class="container">
        <h2>Login</h2>
        
        <?php if (isset($_SESSION['success'])): ?>
    
<?php endif; ?>

        <!-- Display error messages if any -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']); // Clear the error message after displaying
                ?>
            </div>
        <?php endif; ?>

        <form action="login_logic.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
            <p>Not registered? <a href="../register/register.php">Create an account</a></p>
        </form>
       
<!-- Admin Login Option -->
<p>Are you an admin? <a href="../admin/admin_login.php">Login as admin</a>.</p>
    </div>
   
  
   <!-- Footer -->
<footer>
        <div class="footer-container">
            <p>&copy; 2024 Swachh Bharat Online. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>