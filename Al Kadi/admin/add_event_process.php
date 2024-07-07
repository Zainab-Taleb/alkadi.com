<?php
session_start();
include '../connect.php'; // Database connection

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

$event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
$event_date = $_POST['event_date'];
$event_description = mysqli_real_escape_string($conn, $_POST['event_description']);

$sql = "INSERT INTO events (event_name, event_date, event_description) VALUES ('$event_name', '$event_date', '$event_description')";

if ($conn->query($sql) === TRUE) {
    echo "Event added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
