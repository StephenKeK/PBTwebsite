<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user is trying to log in as admin using the parent login
    if ($email === 'admin@braintraining.com') {
        echo "<h1>Admins must use the Admin Login.</h1>";
        echo '<a href="login.php">Go back to login</a>';
        exit();
    }

    // In a real application, check the parent's credentials against a database.
    // Assuming successful login for demonstration purposes:
    echo "<h1>Welcome, Parent!</h1>";
    echo "<p>Email: $email</p>";
    // Here, you could redirect to the parent dashboard (e.g., `header('Location: parent_dashboard.php')`);
}
?>
