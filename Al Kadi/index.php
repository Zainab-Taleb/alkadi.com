<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al Kadi Organization</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        header h1 {
            margin: 0;
            font-size: 2rem;
        }
        nav {
            margin-top: 10px;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin: 0 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: #ddd;
        }
        main {
            padding: 80px 20px 20px 20px;
            max-width: 1200px;
            margin: auto;
        }
        section {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        section h2 {
            margin-top: 0;
        }
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .btn {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #555;
        }
        .icon {
            margin-right: 8px;
        }
        .logo {
    display: flex;
    align-items: center;
}

.logo span {
    font-size: 2rem; /* Adjust font size */
    font-weight: bold;
    margin-right: 5px; /* Adjust spacing between letters */
}

.logo .white {
    color: white;
}

.logo .red {
    color: red;
}

.logo .green {
    color: green;
}

    </style>
</head>
<body>
<header>
    <div class="logo">
        <span class="white">Al</span>
        <span class="red">K</span>
        <span class="green">adi</span>
    </div>
    <h1>Welcome to Al Kadi Organization</h1>
    <nav>
        <ul>
            <li><a href="index.php"><i class="fas fa-home icon"></i>Home</a></li>
            <li><a href="about.php"><i class="fas fa-info-circle icon"></i>About Us</a></li>
            <li><a href="services.php"><i class="fas fa-concierge-bell icon"></i>Services</a></li>
            <li><a href="blog.php"><i class="fas fa-blog icon"></i>Blog</a></li>
            <li><a href="contact.php"><i class="fas fa-envelope icon"></i>Contact</a></li>
        </ul>
    </nav>
</header>

    <main>
        <section id="mission">
            <h2><i class="fas fa-bullseye icon"></i>Our Mission</h2>
            <p>Our mission is to provide excellent services and support to our community through dedicated efforts and innovation.</p>
        </section>
        <section id="services">
            <h2><i class="fas fa-concierge-bell icon"></i>Featured Services</h2>
            <ul>
                <li><i class="fas fa-check-circle icon"></i>Service 1</li>
                <li><i class="fas fa-check-circle icon"></i>Service 2</li>
                <li><i class="fas fa-check-circle icon"></i>Service 3</li>
            </ul>
        </section>
        <section id="news">
            <h2><i class="fas fa-newspaper icon"></i>Latest News</h2>
            <?php
include 'connect.php'; // Adjust path based on your file structure

$sql = "SELECT article_id, title, content FROM articles ORDER BY article_id DESC LIMIT 5"; // Fetch latest 5 articles
$result = $conn->query($sql);

if ($result === false) {
    // Error executing query
    echo "<p>Error fetching articles: " . $conn->error . "</p>";
} elseif ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<article>";
        echo "<h3><i class='fas fa-angle-right icon'></i>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<p>" . htmlspecialchars(substr($row['content'], 0, 100)) . "...</p>";
        echo "</article>";
    }
} else {
    echo "<p>No news articles available.</p>";
}

$conn->close();
?>

        </section>
        <section id="contact-form">
            <h2><i class="fas fa-envelope icon"></i>Contact Us</h2>
            <form action="submit_form.php" method="post">
                <label for="username"><i class="fas fa-user icon"></i>Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="email"><i class="fas fa-envelope icon"></i>Email:</label>
                <input type="email" id="email" name="email" required>
                <input type="submit" value="Submit" class="btn">
            </form>
        </section>
    </main>
    <footer class="footer">
        <p>&copy; 2024 Al Kadi Organization</p>
    </footer>
    <script src="scripts.js"></script>
</body>
</html>
