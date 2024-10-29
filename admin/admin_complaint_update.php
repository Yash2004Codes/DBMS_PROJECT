<?php
session_start();
include ("../database.php"); // Include your database connection file


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $complaint_id = $_POST['CID'];
    $new_status = $_POST['STATUS'];

    // Debugging: Check values received
    if (empty($complaint_id) || empty($new_status)) {
        $_SESSION['error'] = "Complaint ID or status cannot be empty.";
        header("Location: admin_complaint_view.php");
        exit();
    }
    // Update the status in the database
    $update_sql = "UPDATE COMPLAINTS SET STATUS = ? WHERE CID = ?";
    $stmt = $conn->prepare($update_sql);

    // Check if statement preparation was successful
    if (!$stmt) {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        header("Location: admin_complaint_view.php");
        exit();
    }

    $stmt->bind_param("si", $new_status, $complaint_id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Complaint status updated successfully.";
    } else {
        $_SESSION['error'] = "Error updating status: " . $conn->error;
    }

    $stmt->close();
    header("Location: admin_complaint_view.php");
    exit();
}

?>
