<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Articles</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        th, td, a {
            font-size: 16px;
        }
        a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s;
        }
        a:hover {
            color: #555;
        }
        .action-links a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h2><i class="fas fa-newspaper"></i> Manage Articles</h2>

    <table id="articlesTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Existing articles will be dynamically populated here -->
        </tbody>
    </table>

    <p><a href="add_article.php"><i class="fas fa-plus-circle"></i> Add New Article</a></p>

    <p><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Back to Dashboard</a></p>

    <script>
        function loadArticles() {
            fetch('get_articles.php') // Assuming you have a PHP file that returns all articles in JSON format
                .then(response => response.json())
                .then(data => {
                    const tbody = document.querySelector('#articlesTable tbody');
                    tbody.innerHTML = '';
                    data.forEach(article => {
                        const row = `<tr>
                            <td>${article.article_id}</td>
                            <td>${article.title}</td>
                            <td>${article.author}</td>
                            <td class="action-links">
                                <a href="edit_article.php?id=${article.article_id}"><i class="fas fa-edit"></i> Edit</a>
                                <a href="delete_article.php?id=${article.article_id}"><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>`;
                        tbody.innerHTML += row;
                    });
                })
                .catch(error => console.error('Error loading articles:', error));
        }

        document.addEventListener('DOMContentLoaded', loadArticles);
    </script>
</body>
</html>
