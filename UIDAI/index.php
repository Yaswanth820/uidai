<?php
    include('config.php');
    session_start();
    error_reporting(0);
    if (isset($_SESSION['username'])) {
        header('location: main.php');
    }
    if(isset($_POST['submit'])){
        
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            // echo "<script>alert('Hello user')</script>";
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header('Location: main.php');
        }else{
            echo "<script>alert('Invalid credentials')</script>";
        }
    }
?>    

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
                    <input type="password" name="password" class="ip" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="ip-field">
                    <button name="submit" class="ip submit">Submit</button>
                </div>   
            </form>
        </div>
        <div class="log-in-issues item">
            <p>Did'nt register? <a href="reg.php">Register here</a></p>
        </div>
    </div>
</body>
</html>