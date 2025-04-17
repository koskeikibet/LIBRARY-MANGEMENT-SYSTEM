<?php
session_start();
include 'includes/db.php'; // Database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the user's current profile data
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_bio = $_POST['bio'];

    // Update the user's bio in the database
    $update_sql = "UPDATE users SET bio = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("si", $new_bio, $user_id);
    $update_stmt->execute();

    // Redirect to the profile page after updating
    header("Location: profile.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            background-color: silver;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .profile-details {
            margin-top: 20px;
        }

        .profile-details p {
            font-size: 18px;
        }

        .profile-edit-form input,
        .profile-edit-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .profile-edit-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .profile-edit-form button:hover {
            background-color: #0056b3;
        }

        .profile-action {
            margin-top: 20px;
            text-align: center;
        }

        .profile-action a {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .profile-action a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Your Profile</h1>

    <!-- Profile Details Section -->
    <div class="profile-details">
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></p>
        <p><strong>Bio:</strong> <?php echo htmlspecialchars($user['bio']); ?></p>

        <!-- Profile Edit Form Section -->
        <h2>Edit Profile</h2>
        <form class="profile-edit-form" method="POST">
            <label for="bio">Update Bio:</label>
            <textarea name="bio" id="bio" rows="4" required><?php echo htmlspecialchars($user['bio']); ?></textarea>
            <button type="submit">Save Changes</button>
        </form>
        
        <div class="profile-action">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</div>

</body>
</html>
