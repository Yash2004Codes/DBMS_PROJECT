<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    <div class="dashboard">
        <header class="header">
            <h1>Swachh Bharat Admin Dashboard</h1>
            <nav>
                <a href="#">Profile</a>
                <a href="../Logout/logout.php">Logout</a>
            </nav>
        </header>
        
        <aside class="sidebar">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Manage Users</a></li>
                <li><a href="admin_complaint_view.php">View Complaints</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </aside>
        
        <main class="main-content">
            <h2>Dashboard Overview</h2>
            
            <section class="statistics">
                <div class="stat-box">
                    <h3>Total Users</h3>
                    <p>150</p>
                </div>
                <div class="stat-box">
                    <h3>Total Complaints</h3>
                    <p>75</p>
                </div>
                <div class="stat-box">
                    <h3>Pending Complaints</h3>
                    <p>20</p>
                </div>
            </section>

            <section class="recent-activity">
                <h3>Recent Activity</h3>
                <ul>
                    <li>User "JohnDoe" registered.</li>
                    <li>New complaint received: "Garbage not collected."</li>
                    <li>User "JaneSmith" updated their profile.</li>
                </ul>
            </section>
        </main>
    </div>
</body>
</html>
