<?php
    include('config.php');
    session_start();
    
    error_reporting(0);
    if (isset($_SESSION['username'])) {
        session_start();
        // remove all session variables
        session_unset(); 
        // destroy the session 
        session_destroy();
        header('Location: index.php');
    }
    if(isset($_POST['submit'])){
        
        $email = $_POST['email'];
        $password = substr(md5($_POST['password']),0,25);
        $sql = "SELECT * FROM users WHERE password='$password' AND email='$email'";
        $result = mysqli_query($conn, $sql);
        // echo "<script>alert('$password')</script>";
        // echo "<script>alert('$result')</script>";
        if(mysqli_num_rows($result)){
            //echo "<script>alert('Hello user')</script>";
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header('Location: otp_sec.php');
        }else{
            echo "<script>alert('Invalid credentials')</script>";
        }
    }
?>    
<!-- 900150983cd24fb0d6963f7d28e17f72 -->
<!-- 900150983cd24fb0d6963f7d2 -->
<!-- 5d41402abc4b2a76b9719d911 -->
<!-- 5d41402abc4b2a76b9719d911017c592 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="attach_to_index.css">
</head>
<body>
    <div class="container">
        <div class="form-head item">
            <h1>Log-In here</h1>
        </div>
        <div class="the-form item">
            <form action="" method="post">
                <div class="ip-field">
                    <label for="">Email</label>
                    <input type="email" name="email" class="ip" value="<?php echo $email; ?>" required>
                </div>
                <div class="ip-field">
                    <label for="">Password</label>
                    <input type="password" name="password" class="ip" required>
                </div>
                <div class="ip-field">
                    <button name="submit" class="ip submit">Login</button>
                </div>   
            </form>
        </div>
        <div class="log-in-issues item">
            <p>Did'nt register? <a href="reg.php">Register here</a></p>
        </div>
    </div>
</body>
</html>