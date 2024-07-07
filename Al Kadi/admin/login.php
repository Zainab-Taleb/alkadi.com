<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming direct access to dashboard without authentication
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../styles.css"> <!-- Adjust path based on your file structure -->
</head>
<body>
    <h2>Admin Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="submit" value="Login">
    </form>
</body>
</html>
