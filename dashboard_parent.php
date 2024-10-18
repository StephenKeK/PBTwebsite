<?php
session_start();
include 'db_connection.php'; // Include the database connection

// Parent authentication
if (!isset($_SESSION['parent_logged_in'])) {
    header("Location: login.php"); // Redirect to login if not logged in as parent
    exit();
}

// Fetch parent data
$parent_email = $_SESSION['parent_email'];
$result = $conn->query("SELECT * FROM parents WHERE email = '$parent_email'");
$parent = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Parent Dashboard</h1>
    <p>Welcome, <?= htmlspecialchars($parent['parent_name']) ?>!</p>
    <h2>Your Child's Information</h2>
    <p>Child Name: <?= htmlspecialchars($parent['child_name']) ?></p>
    <p>Child Age: <?= htmlspecialchars($parent['child_age']) ?></p>
    <p>Child School: <?= htmlspecialchars($parent['child_school']) ?></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
