<?php
include 'connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
