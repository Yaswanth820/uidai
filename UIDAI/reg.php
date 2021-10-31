<?php
    include('config.php');
    error_reporting(0);
    
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $aadhar = $_POST['aadhar'];
        $phone = $_POST['phone'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            echo "<script>alert('Email already exists.')</script>";
        }
        else{
            $sql = "INSERT INTO users (username, email, password, aadhar, phone)
                VALUES('$username', '$email', '$password', '$aadhar', '$phone') ";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>alert('Registration successful.')</script>";
            } else{
                echo "<script>alert('Registration unsuccessful.')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="attach_to_reg.css">
    <title>Auth Re-imagined</title>
</head>
<body>
    <div class="container">
        <div class="form-head item">
            <h1>Register here</h1>
        </div>
        <div class="the-form item">
            <form action="reg.php" method="post">
                <div class="ip-field">
                    <label for="">Username</label>
                    <input type="text" name="username" class="ip" value="<?php echo $username; ?>" required>
                </div>
                <div class="ip-field">
                    <label for="">Email</label>
                    <input type="email" name="email" class="ip" value="<?php echo $email; ?>" required>
                </div>  
                <div class="ip-field">
                    <label for="">Password</label>
                    <input type="password" name="password" class="ip" value="<?php echo $_POST['password']; ?>" required>
                </div>  
                <div class="ip-field">
                    <label for="">Aadhar Number</label>
                    <input type="text" name="aadhar" class="ip" value="<?php echo $aadhar; ?>" required>
                </div>
                <div class="ip-field">
                    <label for="">Phone No.</label>
                    <input type="tel" name="phone" class="ip" value="<?php echo $phone; ?>" required>
                </div>  
                <div class="ip-field">
                    <button name="submit" class="ip submit">Submit</button>
                    <!-- <input type="submit" class="ip submit" > -->
                </div>   
            </form>
        </div>
        <div class="log-in-issues item">
            <p>Already registered? <a href="index.php">LogIn here</a></p>
        </div>
    </div>
</body>
</html>