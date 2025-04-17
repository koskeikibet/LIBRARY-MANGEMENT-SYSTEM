<?php include 'includes/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Books</title>
    <style>
        /* Set the background color to silver */
        body {
            background-color: silver;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        /* Style the page title (Available Books) */
        h2 {
            font-size: 2rem;
            color: #2f8f2f; /* Green color for the title */
            margin-top: 50px;
            margin-bottom: 30px;
        }

        /* Style the list of books */
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Center the books */
        }

        /* Style each book in the list */
        ul li {
            background-color: #ffffff; /* White background for each book */
            color: #1f3a5f; /* Dark blue color for book text */
            border-radius: 8px;
            padding: 15px 20px;
            margin: 10px;
            width: 250px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Add hover effect for each book */
        ul li:hover {
            transform: translateY(-5px); /* Slight upward movement on hover */
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        }

        /* Style the links to the PDF files */
        ul li a {
            color: #0066cc; /* Blue color for the book links */
            text-decoration: none;
            font-size: 1rem;
            display: block;
            text-align: center;
        }

        /* Add a hover effect to the links */
        ul li a:hover {
            color: #ff6600; /* Change to orange color on hover */
        }

        /* Style the 'Back to Dashboard' link */
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50; /* Green background */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        /* Hover effect for the 'Back to Dashboard' link */
        .back-link:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        /* Responsive design for small screens */
        @media (max-width: 600px) {
            ul {
                flex-direction: column;
            }

            ul li {
                width: 90%; /* Make each book item wider on small screens */
                margin: 10px auto;
            }
        }
    </style>
</head>
<body>

<h2>Available Books</h2>

<!-- Back to Dashboard link -->
<a href="dashboard.php" class="back-link">Back to Dashboard</a>

<ul>
<?php
$books = [
    "Computer Basics" => "books/computer_basics.pdf",
    "Python Programming" => "books/python_programming.pdf",
    "Networking Essentials" => "books/networking_essentials.pdf",
    "Cybersecurity Guide" => "books/cybersecurity_guide.pdf",
    "Data Structures" => "books/data_structures.pdf",
    "HTML & CSS" => "books/html_css.pdf",
    "JavaScript Essentials" => "books/javascript_essentials.pdf",
    "Database Concepts" => "books/database_concepts.pdf",
    "Linux Basics" => "books/linux_basics.pdf",
    "Cloud Computing" => "books/cloud_computing.pdf"
];

foreach ($books as $title => $file) {
    echo "<li><a href='$file' download>$title (PDF)</a></li>";
}
?>
</ul>

</body>
</html>
