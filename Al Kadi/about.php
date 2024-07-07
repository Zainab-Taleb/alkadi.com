<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Al Kadi Organization</title>
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
        .team-member {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .team-member img {
            border-radius: 50%;
            margin-right: 20px;
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

<h1>About Us</h1>    <nav>
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
        <section id="history">
            <h2><i class="fas fa-history icon"></i>Our History</h2>
            <p>Al Kadi Organization was founded in [Year] with the goal of ...</p>
        </section>
        <section id="team">
            <h2><i class="fas fa-users icon"></i>Meet Our Team</h2>
            <div class="team-member">
                <img src="images/team1.jpg" alt="Team Member 1" width="100" height="100">
                <div>
                    <h3>Member Name 1</h3>
                    <p>Position and description...</p>
                </div>
            </div>
            <div class="team-member">
                <img src="images/team2.jpg" alt="Team Member 2" width="100" height="100">
                <div>
                    <h3>Member Name 2</h3>
                    <p>Position and description...</p>
                </div>
            </div>
            <!-- Add more team members as needed -->
        </section>
    </main>
    <footer class="footer">
        <p>&copy; 2024 Al Kadi Organization</p>
    </footer>
</body>
</html>
