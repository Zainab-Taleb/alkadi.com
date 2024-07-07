<?php
include '../connect.php'; // Adjust path based on your file structure

header('Content-Type: application/json');

$sql = "SELECT article_id, title, author FROM articles";
$result = $conn->query($sql);

$articles = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $articles[] = $row;
    }
}

echo json_encode($articles);

$conn->close();
?>
