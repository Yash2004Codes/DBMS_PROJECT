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

    
    // Handle file upload
    $targetDir = "media/";
    $filePath = null;
    
    if (isset($_FILES['media']) && $_FILES['media']['error'] == 0) {
        $fileName = basename($_FILES['media']['name']);
        $filePath = $targetDir . time() . "_" . $fileName;
    
        // Move file to the target directory
        if (!move_uploaded_file($_FILES['media']['tmp_name'], $filePath)) {
            echo "File upload failed.";
            exit();
        }
    }

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
