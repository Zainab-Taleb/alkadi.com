<?php
// Include database connection
include '../connect.php'; // Adjust path based on your file structure

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $article_id = $_POST['article_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // SQL query to update data in articles table
    $sql = "UPDATE articles SET title='$title', author='$author', content='$content' WHERE id='$article_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Article updated successfully";
    } else {
        echo "Error updating article: " . $conn->error;
    }

    $conn->close();
}
?>
