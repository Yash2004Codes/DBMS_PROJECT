<?php
session_start();
include ("../database.php"); // Include your database connection file

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL query to find admin by username
    $sql = "SELECT * FROM Admin WHERE NAME = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if admin exists and verify password
        if ($result->num_rows == 1) {
            $admin = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $admin['PASSWORD'])) {
                // Password is correct, start the session
                $_SESSION['admin_id'] = $admin['AID'];
                $_SESSION['admin_username'] = $admin['NAME'];
                $_SESSION['loggedIn'] = true;

                // Redirect to admin dashboard
                header("Location: admin_dashboard.php");
                exit();
            } else {
                // Incorrect password
                $_SESSION['error'] = "Incorrect username or password.";
                header("Location: admin_login.php");
                exit();
            }
        } else {
            // Admin not found
            $_SESSION['error'] = "Incorrect username or password.";
            header("Location: admin_login.php");
            exit();
        }

        $stmt->close();
    } else {
        // Statement preparation failed
        $_SESSION['error'] = "Error preparing SQL statement.";
        header("Location: admin_login.php");
        exit();
    }

    $conn->close(); // Close the database connection
}
?>
