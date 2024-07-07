<?php
// Include database connection
include '../connect.php'; // Adjust path based on your file structure

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $article_id = $_GET['id'];

    // SQL query to delete article
    $sql = "DELETE FROM articles WHERE article_id='$article_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Article deleted successfully";
    } else {
        echo "Error deleting article: " . $conn->error;
    }

    $conn->close();
}
?>
