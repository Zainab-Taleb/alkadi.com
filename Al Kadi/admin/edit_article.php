<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link rel="stylesheet" href="../styles.css"> <!-- Adjust path based on your file structure -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        .back-links {
            text-align: center;
            margin-top: 20px;
        }
        .back-links a {
            text-decoration: none;
            color: #333;
            margin-right: 10px;
            transition: color 0.3s;
        }
        .back-links a:hover {
            color: #555;
        }
    </style>
</head>
<body>
    <h2><i class="fas fa-edit"></i> Edit Article</h2>

    <?php
    // Include database connection
    include '../connect.php'; // Adjust path based on your file structure

    // Check if article ID is provided via GET parameter
    if (isset($_GET['id'])) {
        $article_id = $_GET['id'];

        // SQL query to fetch article details
        $sql = "SELECT * FROM articles WHERE article_id = '$article_id'";
        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
    ?>
            <form action="update_article.php" method="post">
                <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">

                <label for="title"><i class="fas fa-heading"></i> Title:</label><br>
                <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required><br><br>

                <label for="author"><i class="fas fa-user"></i> Author:</label><br>
                <input type="text" id="author" name="author" value="<?php echo $row['author']; ?>" required><br><br>

                <label for="content"><i class="fas fa-file-alt"></i> Content:</label><br>
                <textarea id="content" name="content" rows="5" required><?php echo $row['content']; ?></textarea><br><br>

                <input type="submit" value="Update Article">
            </form>
    <?php
        } else {
            echo "Article not found.";
        }
    } else {
        echo "Article ID not specified.";
    }

    $conn->close();
    ?>

    <div class="back-links">
        <p><a href="manage_articles.php"><i class="fas fa-arrow-left"></i> Back to Manage Articles</a></p>
        <p><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Back to Dashboard</a></p>
    </div>
</body>
</html>
