<?php
    include('config.php');
    error_reporting(0);
    
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $aadhar = $_POST['aadhar-1'];
        $phone = $_POST['phone'];
            if(empty($_POST['aadhar-1'])){
                $aadhar = $_POST['aadhar-2'];
            }
        
          if(empty($aadhar)){
              echo '<script>alert("Aadhar Number field Empty!");</script>';
            }else if(!preg_match("/^[0-9]*$/", $aadhar)){
          
              echo '<script>alert("Only Numbers allowed");</script>';
            }else if(strlen ($aadhar) != 12){
                echo '<script>alert("Aadhar number consists of 12 digits");</script>';
            }else if(!preg_match("/^[0-9]*$/", $phone)){
                echo '<script>alert("Only Numbers allowed");</script>';
            }else if(strlen ($phone) != 10){
                echo '<script>alert("Phone number should contain 10 digits");</script>';
            }
            else{
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
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="attach_to_reg.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                    Aadhar Number: 
                        <input type="radio" name="aadhar" value="aadhar-no-val" />
                    <input style="display:none;" type="text" name="aadhar-1" class="ip" id="aadhar-no" />
                    <br><br> UID: <input type="radio" name="aadhar" value="uid-val" />
                        <input style="display:none;" type="text" class="ip" name="aadhar-2" id="uid" />
                </div> 
                <div class="ip-field">
                    <label for="">Phone No.</label>
                    <input type="tel" name="phone" class="ip" value="<?php echo $phone; ?>" required>
                </div>  
                <div class="ip-field">
                    <label for="agreement" class="agreement">
                        <input type="checkbox" name="chk-box" class="chkbox" required/>
                        I hereby agree to share my Aadhar card details
                    </label>
                </div>  
                <div class="ip-field">
                    <button name="submit" class="ip submit">Register</button>
                    <!-- <input type="submit" class="ip submit" > -->
                </div>   
            </form>
        </div>
        <div class="log-in-issues item">
            <p>Already registered? <a href="index.php">Log In here</a></p>
        </div>
    </div>
    </script>
    <script>
        $(document).ready(function() {
            $("input[type='radio']").change(function() {
                if ($(this).val() == "aadhar-no-val") {
                    $("#aadhar-no").show();
				  $("#uid").hide();
                } else if ($(this).val() == "uid-val") {
					$("#uid").show();
				  $("#aadhar-no").hide();
				}
			  	else {
                    $("#aadhar-no").hide();
				    $("#uid").hide();
                }
            });
        });
    </script>
</body>
</html>