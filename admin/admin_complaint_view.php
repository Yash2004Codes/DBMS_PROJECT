<?php
session_start();
include ("../database.php"); // Include your database connection file

// Fetch all complaints
$query = "SELECT * FROM complaints";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaints</title>
    <link rel="stylesheet" href="admin_dashboard.css"> <!-- Link to your CSS -->
</head>
<body>
    <header>
        <h1>Complaints Management</h1>
        <nav>
            <a href="admin_dashboard.php">Dashboard</a>
            <a href="../Logout/logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <h2>All Complaints</h2>
        <table>
            <thead>
                <tr>
                    <th>Complaint ID</th>
                    <th>User ID</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody>

                <?php while ($complaint = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $complaint['CID']; ?></td>
                        <td><?php echo $complaint['UID']; ?></td>
                        <td><?php echo $complaint['LOCATION']; ?></td>
                        <td><?php echo $complaint['ISSUE']; ?></td>
                        <td>

                            <form action="admin_complaint_update.php" method="POST">
                                <input type="hidden" name="CID" value="<?php echo $complaint['CID']; ?>">
                                <select name="STATUS" onchange="this.form.submit()">
                                    <option value="Pending" <?php if($complaint['STATUS'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                    <option value="In Progress" <?php if($complaint['STATUS'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
                                    <option value="Resolved" <?php if($complaint['STATUS'] == 'Resolved') echo 'selected'; ?>>Resolved</option>
                                    <option value="Closed" <?php if($complaint['STATUS'] == 'Closed') echo 'selected'; ?>>Closed</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
  
<?php
//Check and display session messages
if (isset($_SESSION['success'])) {
    echo "<p style='color: green;'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>
</body>
</html>
