<?php
// admin_register_logic.php
session_start();
include ("../database.php"); // Include your database connection file

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $name = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $department_name = $_POST['dname'];
    
    // Validate required fields
    if (empty($name) || empty($password) || empty($email) || empty($department_name) || empty($phone)) {
        $_SESSION['error'] = "Please fill in all required fields.";
        header("Location: admin_register.php");
        exit();
    }
    
    // Check if the username already exists
    $check_sql = "SELECT * FROM admin WHERE NAME = ? OR EMAIL=?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $name,$email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $existing_admin = $check_result->fetch_assoc();
        if($existing_admin['NAME'] === $name)
        $_SESSION['error'] = "Username already exists. Please choose a different username.";
        else if($existing_admin['EMAIL'] === $email)
        $_SESSION['error'] = "EMAIL already exists. Please choose a different EMAIL.";
       

        header("Location: admin_register.php");
        exit();
    }

    // Insert data into the admin table
    $sql = "INSERT INTO Admin (NAME, PASSWORD, EMAIL, PHONE, DNAME) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind and execute
    if ($stmt) {
        $stmt->bind_param("sssis", $name, $password, $email, $phone, $department_name);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Admin registered successfully!";
            header("Location: admin_login.php"); // Redirect to admin dashboard or login page
        } else {
            $_SESSION['error'] = "Error registering admin: " . $stmt->error;
            header("Location: admin_register.php");
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Failed to prepare statement.";
        header("Location: admin_register.php");
    }

    $conn->close(); // Close the connection
}
?>
