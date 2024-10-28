<?php
session_start();
include("database.php"); // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['UID'])) {
    header("Location: login.php");
    exit();
}

// Handle the complaint submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_SESSION['UID'];
    $location = trim($_POST['location']);
    $description = trim($_POST['description']);
    $status = "Pending"; // Default status

    /*
    // Handle file upload
    $media = null;
    if (!empty($_FILES['media']['name'])) {
        $target_dir = "uploads/"; // Ensure this directory exists and is writable
        $target_file = $target_dir . basename($_FILES["media"]["name"]);
        move_uploaded_file($_FILES["media"]["tmp_name"], $target_file);
        $media = $target_file; // Store the file path in the database
    }*/

    // Insert complaint into the database
    $stmt = $conn->prepare("INSERT INTO complaints (LOCATION,ISSUE,FILED_DATETIME,UID) VALUES (?, ?, NOW(),?)");
    $stmt->bind_param("sss",$location, $description,$uid);
    $stmt->execute();

    // Check for success
    if ($stmt->affected_rows > 0) {
        $_SESSION['success'] = "Complaint filed successfully!";
        echo "$_SESSION";
    } else {
        $_SESSION['error'] = "Failed to file complaint.";
        echo "$_SESSION";

    }

    // Redirect back to the dashboard
    header("Location: dashboard.php");
    exit();
}
