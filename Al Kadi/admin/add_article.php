<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Article</title>
    <link rel="stylesheet" href="../styles.css"> <!-- Adjust path based on your file structure -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
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
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
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
    <h2><i class="fas fa-plus-circle"></i> Add New Article</h2>

    <form id="articleForm">
        <label for="title"><i class="fas fa-heading"></i> Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="author"><i class="fas fa-user"></i> Author:</label><br>
        <input type="text" id="author" name="author" required><br><br>

        <label for="content"><i class="fas fa-file-alt"></i> Content:</label><br>
        <textarea id="content" name="content" rows="5" required></textarea><br><br>

        <input type="submit" value="Add Article">
    </form>

    <div class="back-links">
        <p><a href="manage_articles.php"><i class="fas fa-arrow-left"></i> Back to Manage Articles</a></p>
        <p><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Back to Dashboard</a></p>
    </div>

    <script>
        document.getElementById('articleForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form from submitting normally

            var formData = new FormData(this);

            fetch('submit_article.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Debugging line
                if (data.status === 'success') {
                    alert('Article added successfully');
                    document.getElementById('articleForm').reset(); // Clear the form

                    // Add the new article to the articles table
                    const tbody = window.opener.document.querySelector('tbody');
                    const newRow = `<tr>
                        <td>${data.article_id}</td>
                        <td>${data.title}</td>
                        <td>${data.author}</td>
                        <td class="action-links">
                            <a href="edit_article.php?id=${data.article_id}"><i class="fas fa-edit"></i> Edit</a>
                            <a href="delete_article.php?id=${data.article_id}"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>`;
                    tbody.innerHTML += newRow;
                    window.close(); // Close the form window
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while submitting the form.');
            });
        });
    </script>
</body>
</html>
