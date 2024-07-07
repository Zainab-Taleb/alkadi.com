<?php
include 'connect.php'; // Database connection

$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h3>{$row['event_name']}</h3>";
        echo "<p>Date: {$row['event_date']}</p>";
        echo "<p>{$row['event_description']}</p>";
    }
} else {
    echo "No events found";
}

$conn->close();
?>
