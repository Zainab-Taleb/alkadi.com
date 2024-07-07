<?php
include 'connect.php';

$email = $_POST['newsletter-email'];

$sql = "INSERT INTO newsletter_subscribers (email) VALUES ('$email')";

if ($conn->query($sql) === TRUE) {
    echo "Subscription successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
