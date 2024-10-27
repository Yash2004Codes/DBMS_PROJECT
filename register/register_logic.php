<?php

include("../register/register.php");
include("../database.php"); // Database connection


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
   
    echo"username={$username} <br>";
    echo"password={$password} <br>";

    // Validate inputs
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../register/register.php");
        exit();
    }

    // Check if the username exists
    $stmt = $conn->prepare("SELECT * FROM USER WHERE NAME = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Username already exists.";
        header("Location: ../register/register.php");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password,PASSWORD_BCRYPT);

    // Insert the new user
    $stmt = $conn->prepare("INSERT INTO USER (NAME, PASSWORD)
                           VALUES (?,?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful! You can log in now.";
        //header("Location: ../Login/login.php");
    } else {
        $_SESSION['error'] = "Registration failed.";
        header("Location: ../register/register.php");
    }

    // Close statements and connection
    $stmt->close();
    $conn->close();
}

?>
