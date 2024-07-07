<?php
// Example: Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "al_kadi_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example: Retrieve data from database
$totalUsers = 0; // Placeholder
$totalArticles = 0; // Placeholder
$totalEvents = 0; // Placeholder

// Example queries to fetch data
$sqlUsers = "SELECT COUNT(*) as totalUsers FROM users";
$resultUsers = $conn->query($sqlUsers);
if ($resultUsers->num_rows > 0) {
    $rowUsers = $resultUsers->fetch_assoc();
    $totalUsers = $rowUsers['totalUsers'];
}

$sqlArticles = "SELECT COUNT(*) as totalArticles FROM articles";
$resultArticles = $conn->query($sqlArticles);
if ($resultArticles->num_rows > 0) {
    $rowArticles = $resultArticles->fetch_assoc();
    $totalArticles = $rowArticles['totalArticles'];
}

$sqlEvents = "SELECT COUNT(*) as totalEvents FROM events";
$resultEvents = $conn->query($sqlEvents);
if ($resultEvents->num_rows > 0) {
    $rowEvents = $resultEvents->fetch_assoc();
    $totalEvents = $rowEvents['totalEvents'];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Adjust path based on your file structure -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* Light gray background */
        }

        /* Sidebar styling */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            color: #fff;
            padding-top: 20px;
            overflow-y: auto; /* Enable scrolling if content exceeds sidebar height */
        }
        .sidebar a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #555;
        }
        
        /* Content area styling */
        .content {
            margin-left: 250px; /* Adjust based on sidebar width */
            padding: 20px;
        }
        .content h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }
        .content .section {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .content .section h3 {
            margin-top: 0;
            font-size: 20px;
            color: #333;
        }
        .content .section p {
            color: #666;
            line-height: 1.6;
        }
        .content .section .icon {
            font-size: 30px;
            margin-bottom: 10px;
            color: #333;
        }
        
        /* Footer styling */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="dashboard.php">Home</a>
        <a href="add_article.php">Add Article</a>
        <a href="manage_articles.php">Manage Articles</a>
        <a href="add_event.php">Add Event</a>
        <a href="manage_events.php">Manage Events</a>
        <!-- Add more sidebar links as needed -->
    </div>

    <!-- Content area -->
    <div class="content">
        <h2>Welcome to the Admin Dashboard</h2>

        <!-- Example content sections with dynamic data -->
        <div class="section">
            <i class="fas fa-users icon"></i>
            <h3>Total Users</h3>
            <p><?php echo $totalUsers; ?></p>
        </div>

        <div class="section">
            <i class="fas fa-newspaper icon"></i>
            <h3>Total Articles</h3>
            <p><?php echo $totalArticles; ?></p>
        </div>

        <div class="section">
            <i class="fas fa-calendar-alt icon"></i>
            <h3>Total Events</h3>
            <p><?php echo $totalEvents; ?></p>
        </div>

        <!-- Additional sections can be added as needed -->

    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?php echo date("Y"); ?> Al Kadi. All rights reserved.</p>
    </div>
</body>
</html>
