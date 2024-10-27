session_start();

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div class="container">
        <h2>Login</h2>
        
        <?php if (isset($_SESSION['success'])): ?>
    <div class="success-message">
        <?php
        echo $_SESSION['success'];
        //unset($_SESSION['success']); // Clear the message after displaying
        ?>
    </div>
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
        </form>
        <p>Not registered? <a href="../register/register.php">Create an account</a></p>

    </div>
   
   <?php include("../common/footer.php")  ?>
</body>
</html>