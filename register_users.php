<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username already exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        // Username already exists
        echo "Username already taken. Please choose another one.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')");

        echo "User '$username' has been successfully registered.";
        echo "<br><br><a href='dashboard.php'>Back to Dashboard</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <style>
        body {
            background-color: silver;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        
        h1 {
            color: #2f8f2f;
        }

        form {
            margin-top: 20px;
        }

        input, button {
            padding: 10px;
            margin: 5px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2f8f2f;
            font-size: 1rem;
        }

        a:hover {
            color: #45a049;
        }
    </style>
</head>
<body>

<h1>Register User</h1>

<!-- Form to specify username and password -->
<form method="POST">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Register</button>
</form>

</body>
</html>
