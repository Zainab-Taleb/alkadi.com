<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link rel="stylesheet" href="../styles.css"> <!-- Adjust path based on your file structure -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-links a {
            text-decoration: none;
            margin-right: 10px;
            color: #333;
            transition: color 0.3s;
        }
        .action-links a:hover {
            color: #555;
        }
    </style>
</head>
<body>
    <h2><i class="fas fa-calendar-alt"></i> Manage Events</h2>

    <?php
    // Include database connection
    include '../connect.php'; // Adjust path based on your file structure

    // Check if connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch events
    $sql = "SELECT * FROM events";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead><tr><th>Event ID</th><th>Title</th><th>Description</th><th>Date</th><th>Actions</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['event_id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['event_date'] . "</td>";
            echo "<td class='action-links'>";
            echo "<a href='edit_event.php?id=" . $row['event_id'] . "'><i class='fas fa-edit'></i> Edit</a>";
            echo " | ";
            echo "<a href='delete_event.php?id=" . $row['event_id'] . "' onclick='return confirm(\"Are you sure you want to delete this event?\")'><i class='fas fa-trash-alt'></i> Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No events found.";
    }

    $conn->close();
    ?>

    <br>
    <a href="add_event.php"><i class="fas fa-calendar-plus"></i> Add New Event</a>
    <p><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Back to Dashboard</a></p>
</body>
</html>
