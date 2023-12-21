<!DOCTYPE html>
<html>

<head>
    <body>
    <div class="login-box">
        <p>Login</p>
        <form method="post" action="login.php">
          <div class="user-box">
            <input required type="text" name="user">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input required placeholder="" type="password" name="pass">
            <label>Password</label>
          </div>
          
          <center><a href="#"><button class="submit" name ="submit"><p>S U B M I T</p></button>
            <span></span>
            <span></span>
            <span></span>
            <span></span>   
            </a></center>
          <?php
              $conn = mysqli_connect(
                'localhost','root','','targetclient'
              );
            
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);
            
                $sql = "SELECT * FROM client WHERE user='$user' AND pass='$pass'";
                $result = $conn->query($sql);
            
                if ($result->num_rows == 1) {
                    // User is authenticated, redirect to a secure page
                    session_start();
                    $_SESSION['user'] = $email;
                    header("Location:index.html");
                } else {
                    echo "Invalid username or password";
                }
            }
?>
        </form>
        <p>Don't have an account? <a href="register.php" class="a2">Sign up!</a></p>
      </div>
      <link rel="stylesheet" href="style.css">
      
</body>

</html>
