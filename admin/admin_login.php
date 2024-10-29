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
    <link rel="stylesheet" href="../register/register.css"> <!-- Link to your CSS file for styling -->
</head>
<body>
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
</body>
</html>
