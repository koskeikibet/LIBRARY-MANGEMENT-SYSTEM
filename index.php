<?php 
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$user'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit();
        }
    }
    $error = "Invalid credentials";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Library System</title>
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
            text-align: center;
            flex-direction: column;
        }

        /* Container for the login form */
        form {
            background-color: white;
            border-radius: 15px; /* Rounded corners */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px; /* Set width of the login form */
            margin-bottom: 20px;
        }

        /* Login form header */
        h2 {
            color: #007bff; /* Blue color for the title */
            margin-bottom: 20px;
        }

        /* Input fields inside the login form */
        input {
            width: 100%; /* Full width for input fields */
            padding: 10px;
            margin: 10px 0; /* Space between fields */
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Submit button inside the login form */
        button {
            width: 100%; /* Full width for the button */
            padding: 10px;
            background-color: #007bff; /* Blue color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* Error message styling */
        .error {
            color: red;
            margin-top: 10px;
        }

        /* Footer styling */
        footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 0.9rem;
            color: #333;
        }
    </style>
</head>
<body>

    <h1>Welcome to Library Management System <br> (Here are your favourite books)</h1>

    <!-- Login Form -->
    <form method="post">
        <h2>Login</h2>
        <?php
        if (isset($error)) {
            echo '<div class="error">' . $error . '</div>';
        }
        ?>
        <input name="username" required placeholder="Username">
        <input name="password" type="password" required placeholder="Password">
        <button type="submit">Login</button>
    </form>

    <footer>
    <p><p>&copy; 2025 Created by Jacinta Nabiba</p></p>
    </footer>

</body>
</html>
