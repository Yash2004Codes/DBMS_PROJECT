<?php

session_start();
include("../database.php"); // Include your database connection file

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the POST request
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    /*
    echo"username={$username}<br>";
    echo"password={$password}<br>";
*/
    // Validate input
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username/password are required.";
        header("Location: ../Login/login.php");
        exit();
    }

    // Prepare a SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM USER WHERE NAME = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        //echo "a record exists,veryfing password now <brr>";

        // Verify the password (assuming you are storing hashed passwords)
        if (password_verify($password, $user['PASSWORD'])) {
            // Password is correct, set session variables
            $_SESSION['NAME'] = $username;
            $_SESSION['UID'] = $user['UID'];
            echo "Logined Successfully !<br>";
            header("Location: ../dashboard.php"); // Redirect to home page
            exit();
        } else {
            $_SESSION['error'] = "Invalid username or password.<br>";
            header("Location: ../Login/login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid username or password <br>";
        header("Location: ../Login/login.php");
        exit();
    }

    // Close the statement
    $stmt->close();
}
else
 echo"erro";

// Close the database connection
$conn->close();
?>


