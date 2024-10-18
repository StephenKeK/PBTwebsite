<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <h1>Register</h1>
    
    <div class="registration-container">
        <form action="process_register.php" method="POST">
            <label for="parent_name">Parent Name:</label>
            <input type="text" id="parent_name" name="parent_name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="child_name">Child Name:</label>
            <input type="text" id="child_name" name="child_name" required>
            
            <label for="child_age">Child Age:</label>
            <input type="number" id="child_age" name="child_age" required>
            
            <label for="child_school">Child School:</label>
            <input type="text" id="child_school" name="child_school" required>
            
            <input type="submit" value="Register">
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
