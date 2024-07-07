<?php
session_start();
include '../connect.php'; // Database connection

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

$title = mysqli_real_escape_string($conn, $_POST['title']);
$content = mysqli_real_escape_string($conn, $_POST['content']);
$date = date("Y-m-d");

$sql = "INSERT INTO articles (title, content, date_published) VALUES ('$title', '$content', '$date')";

?>

