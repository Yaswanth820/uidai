<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){

            $mobile=$_POST['mobile'];
        
        
          if(empty($mobile)){
              echo '<script>alert("Mobile Number field Empty!");</script>';
            }elseif(!preg_match("/^[0-9]*$/", $mobile)){
          
              echo '<script>alert("Only Numbers allowed");</script>';
            }else if(strlen ($mobile) != 4){
                echo '<script>alert("OTP consists of 4 digits");</script>';
            }else{
                // echo "<script>alert('$mobile');</script>";
                // $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $row['username'];
                header('Location: main.php');
            }
        
        }
    ?>
    <form action="otp_sec.php" method="POST">
                    <input type="password" name="mobile" placeholder="Enter OTP">
                    <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>