<?php
session_start(); 
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user is trying to log in as admin using the parent login
    if ($email === 'admin@braintraining.com' && $password == "admin123") {

        $_SESSION['admin_logged_in'] = true;

        // Redirect to the admin dashboard
        header('Location: dashboard_admin.php');
        exit();
    }

    $login_stmt = $conn->prepare("SELECT * FROM parents WHERE email = ?");
    $login_stmt->bind_param("s", $email);
    $login_stmt->execute();
    $result = $login_stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables for the logged-in user
        $_SESSION['user_email'] = $user['email'];

        // Redirect to the parent dashboard
        echo "<h1>Welcome, Parent!</h1>";
        echo "<p>Email: $email</p>";
        exit();
    } else {
        header('Location: login.php?error=invalid_credentials');
        exit();
    }

    // In a real application, check the parent's credentials against a database.
    // Assuming successful login for demonstration purposes:
    
    // Here, you could redirect to the parent dashboard (e.g., `header('Location: parent_dashboard.php')`);
}
?>