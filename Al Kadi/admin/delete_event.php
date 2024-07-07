<?php
// Include database connection
include '../connect.php'; // Adjust path based on your file structure

// Check if event_id parameter exists
if (isset($_GET['id'])) {
    // Prepare SQL delete statement
    $sql = "DELETE FROM events WHERE event_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("i", $param_event_id);

        // Set parameters
        $param_event_id = $_GET['id'];

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to manage_events.php upon successful deletion
            header("location: manage_events.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
} else {
    echo "Invalid request.";
}

// Close connection
$conn->close();
?>
