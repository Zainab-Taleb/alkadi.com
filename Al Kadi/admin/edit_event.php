<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
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
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea,
        input[type="date"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
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
        .error {
            color: red;
            font-size: 0.9rem;
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
    <h2><i class="fas fa-calendar-edit"></i> Edit Event</h2>

    <?php
    // Include database connection
    include '../connect.php'; // Adjust path based on your file structure

    // Initialize variables
    $title = $description = $event_date = '';
    $title_err = $description_err = $event_date_err = '';

    // Check if event_id parameter exists
    if (isset($_GET['id'])) {
        // Prepare SQL query to fetch event details
        $sql = "SELECT * FROM events WHERE event_id = ?";
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $stmt->bind_param("i", $param_event_id);

            // Set parameters
            $param_event_id = $_GET['id'];

            // Execute statement
            if ($stmt->execute()) {
                // Store result
                $result = $stmt->get_result();

                // Fetch event data
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $title = $row['title'];
                    $description = $row['description'];
                    $event_date = $row['event_date'];
                } else {
                    echo "Event not found.";
                    exit();
                }
            } else {
                echo "Error fetching event details.";
                exit();
            }

            // Close statement
            $stmt->close();
        }
    } else {
        echo "Invalid request.";
        exit();
    }

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate title
        if (empty(trim($_POST['title']))) {
            $title_err = "Please enter event title.";
        } else {
            $title = trim($_POST['title']);
        }

        // Validate description
        if (empty(trim($_POST['description']))) {
            $description_err = "Please enter event description.";
        } else {
            $description = trim($_POST['description']);
        }

        // Validate event date
        if (empty(trim($_POST['event_date']))) {
            $event_date_err = "Please enter event date.";
        } else {
            $event_date = trim($_POST['event_date']);
        }

        // Check input errors before updating into database
        if (empty($title_err) && empty($description_err) && empty($event_date_err)) {
            // Prepare SQL update statement
            $sql = "UPDATE events SET title = ?, description = ?, event_date = ? WHERE event_id = ?";

            if ($stmt = $conn->prepare($sql)) {
                // Bind parameters
                $stmt->bind_param("sssi", $param_title, $param_description, $param_event_date, $param_event_id);

                // Set parameters
                $param_title = $title;
                $param_description = $description;
                $param_event_date = $event_date;
                $param_event_id = $_GET['id']; // Event ID from GET parameter

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Redirect to manage_events.php upon successful update
                    header("location: manage_events.php");
                    exit();
                } else {
                    echo "Something went wrong. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
        }

        // Close connection
        $conn->close();
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $_GET['id']; ?>" method="post">
        <div>
            <label for="title">Event Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $title; ?>">
            <span class="error"><?php echo $title_err; ?></span>
        </div>
        <div>
            <label for="description">Event Description:</label>
            <textarea id="description" name="description"><?php echo $description; ?></textarea>
            <span class="error"><?php echo $description_err; ?></span>
        </div>
        <div>
            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" value="<?php echo $event_date; ?>">
            <span class="error"><?php echo $event_date_err; ?></span>
        </div>
        <div>
            <input type="submit" value="Update Event">
        </div>
    </form>

    <div class="back-links">
        <p><a href="manage_events.php"><i class="fas fa-arrow-left"></i> Cancel</a></p>
        <p><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Back to Dashboard</a></p>
    </div>
</body>
</html>
