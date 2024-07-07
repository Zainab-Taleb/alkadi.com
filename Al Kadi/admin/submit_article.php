<?php
include '../connect.php'; // Adjust path based on your file structure

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // SQL query to insert data into articles table
    $sql = "INSERT INTO articles (title, author, content) VALUES ('$title', '$author', '$content')";

    if ($conn->query($sql) === TRUE) {
        $article_id = $conn->insert_id; // Get the ID of the newly inserted article
        $response = [
            'status' => 'success',
            'article_id' => $article_id,
            'title' => $title,
            'author' => $author
        ];
        echo json_encode($response);
    } else {
        $response = ['status' => 'error', 'message' => $conn->error];
        echo json_encode($response);
    }

    $conn->close();
} else {
    $response = ['status' => 'error', 'message' => 'Invalid request method'];
    echo json_encode($response);
}
?>
