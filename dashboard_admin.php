<?php
session_start();
include 'db_connection.php'; // Include the database connection

// Admin authentication
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php"); // Redirect to login if not logged in as admin
    exit();
}

// Fetch all parents
$result = $conn->query("SELECT * FROM parents");

// Handle form submission for updating scheduled date and time
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['parent_id'])) {
    $parent_id = $_POST['parent_id'];
    $scheduled_date = $_POST['scheduled_date'];
    $scheduled_time = $_POST['scheduled_time'];

    // Update the parent's scheduled date and time
    $update_query = "UPDATE parents SET scheduled_date = ?, scheduled_time = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssi", $scheduled_date, $scheduled_time, $parent_id);

    if ($stmt->execute()) {
        $success_message = "Scheduled date and time updated successfully.";
    } else {
        $error_message = "Error updating schedule: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="dashboard-container">
    <h1>Admin Dashboard</h1>
    <p>Welcome, Admin!!!</p>

    <?php if (isset($success_message)): ?>
        <div class="success-message"><?= $success_message ?></div>
    <?php elseif (isset($error_message)): ?>
        <div class="error-message"><?= $error_message ?></div>
    <?php endif; ?>

    <h2>Registered Parents</h2>
    <div class="table-container">
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Parent Name</th>
                    <th>Email</th>
                    <th>Child Name</th>
                    <th>Child Age</th>
                    <th>Child School</th>
                    <th>Scheduled Date</th>
                    <th>Scheduled Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['parent_name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['child_name'] ?></td>
                    <td><?= $row['child_age'] ?></td>
                    <td><?= $row['child_school'] ?></td>
                    <td><?= $row['scheduled_date'] ? date('D M Y', strtotime($row['scheduled_date'])) : 'Not Set' ?></td>
                    <td><?= $row['scheduled_time'] ? date('h:i A', strtotime($row['scheduled_time'])) : 'Not Set' ?></td>
                    <td>
                        <form action="dashboard_admin.php" method="post" class="schedule-form">
                            <input type="hidden" name="parent_id" value="<?= $row['id'] ?>">
                            <label for="scheduled_date">Set Date:</label>
                            <input type="date" name="scheduled_date" value="<?= $row['scheduled_date'] ?>">
                            <label for="scheduled_time">Set Time:</label>
                            <input type="time" name="scheduled_time" value="<?= $row['scheduled_time'] ?>">
                            <button type="submit" class="btn">Update Schedule</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <p><a href="logout.php" class="logout-link">Logout</a></p>
</div>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
