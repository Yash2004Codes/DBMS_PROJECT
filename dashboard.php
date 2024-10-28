
<?php
session_start();
include("database.php"); // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['NAME'])) {
    header("Location: login.php");
    exit();
}

// Fetch past complaints for the logged-in user
$uid = $_SESSION['UID'];
$stmt = $conn->prepare("SELECT * FROM COMPLAINTS WHERE UID = ?");
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();
$complaints = $result->fetch_all(MYSQLI_ASSOC);

// Close the statement
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>User Dashboard</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>Swachh Bharat Online</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <h2>User Dashboard</h2>
        <section>
            <h3>File a Complaint</h3>
            <form action="submit_complaint.php" method="POST" enctype="multipart/form-data">
                <label for="location">Complaint Location:</label>
                <input type="text" id="location" name="location" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>

                <label for="media">Upload Photo/Video:</label>
                <input type="file" id="media" name="media" accept="image/*,video/*">

                <button type="submit">Submit Complaint</button>
            </form>
        </section>

        <section>
            <h3>Your Past Complaints</h3>
            <table>
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Description</th><td>
                        <th>Status</th><td>
                        <th>Date Filed</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($complaints as $complaint): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($complaint['LOCATION']); ?></td>
                            <td><?php echo htmlspecialchars($complaint['ISSUE']); ?></td><td>
                            <td><?php echo htmlspecialchars($complaint['STATUS']); ?></td></td>
                            <td>  <td><?php echo htmlspecialchars($complaint['FILED_DATETIME']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>



