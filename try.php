<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection details
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "targetclient";

    // Create a connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize user input to prevent SQL injection (you should use prepared statements)
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Query to check user credentials (replace 'users' and 'password' with your actual table and column names)
    $sql = "SELECT * FROM client WHERE user = '$username' AND pass = '$password'";
    $result = $conn->query($sql);

    // Check if the query returned exactly one row
    if ($result->num_rows == 1) {
        // Set session variable
        $_SESSION['user'] = $username;

        // Redirect to a welcome page or dashboard
        header('Location: index.html');
        exit;
    } else {
        // Display an error message
        $error_message = "Invalid username or password";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<p>Login</p>
        <form method="post">
          <div class="user-box">
            <input required type="text" name="username">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input required placeholder="" type="password" name="password">
            <label>Password</label>
          </div>
          <a href="#"><button class="submit" name ="submit"><p>S U B M I T</p></button>
            <span></span>
            <span></span>
            <span></span>
            <span></span>   
            </a>
        <input type="submit" value="Login">
    
    </form>
        <p>Don't have an account? <a href="register.php" class="a2">Sign up!</a></p>
      </div>
      <link rel="stylesheet" href="style.css">
</body>
</html>