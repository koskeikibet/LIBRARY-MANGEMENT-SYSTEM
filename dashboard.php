<?php include 'includes/auth.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <style>
        /* General page settings */
        body {
            background-color: silver; /* Set the background color to silver */
            font-family: Arial, sans-serif; /* Set the font for the page */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Center-align content horizontally */
            align-items: center; /* Center-align content vertically */
            height: 100vh; /* Take up full viewport height */
        }

        /* Container for the dashboard */
        .dashboard-container {
            background-color: white;
            border-radius: 15px; /* Rounded corners */
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 350px; /* Set width of the dashboard */
            text-align: center; /* Center the text inside the container */
        }

        /* Dashboard header */
        h1 {
            color: #007bff; /* Blue color for the title */
            margin-bottom: 20px;
        }

        /* Links styling */
        a {
            display: inline-block;
            text-decoration: none;
            color: #007bff;
            font-size: 18px;
            margin: 10px 0;
            padding: 10px;
            background-color: #f0f8ff;
            border-radius: 5px;
            width: 100%;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #007bff;
            color: white;
        }

        /* Optional logout styling (if needed) */
        .logout {
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <h1>Home Dashboard</h1>
        
        <!-- Links for navigation -->
        <a href="books.php">View Books</a><br>
        <a href="register_users.php">Add New User</a><br> <!-- Add User link -->
        <a href="logs.php">View Logs</a><br> <!-- Logs link -->
        <a href="profile.php">Go to Your Profile</a>

        <a href="logout.php" class="logout">Logout</a> <!-- Logout link -->
    </div>

</body>
</html>
