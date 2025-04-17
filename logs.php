<?php
// Include database connection
include 'includes/db.php';
include 'includes/auth.php';

// Fetch logs from the database
$sql = "SELECT logs.id, users.username, logs.action, logs.timestamp
        FROM logs
        JOIN users ON logs.user_id = users.id
        ORDER BY logs.timestamp DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs - Admin Dashboard</title>
    <style>
        /* General page styling */
        body {
            background-color: silver;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for the log table */
        .logs-container {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 900px;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Links for navigation */
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
    </style>
</head>
<body>

    <div class="logs-container">
        <h1>Action Logs</h1>

        <!-- Link back to dashboard -->
        <a href="dashboard.php">Back to Dashboard</a>

        <!-- Table displaying logs -->
        <table>
            <thead>
                <tr>
                    <th>Log ID</th>
                    <th>Username</th>
                    <th>Action</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any logs and display them
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['action']}</td>
                                <td>{$row['timestamp']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No logs found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
