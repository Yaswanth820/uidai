<?php 
  error_reporting(0);
  session_start(); 
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="attach_to_main.css">
</head>
<body>
    <div class="welcome-message">
        <?php echo "<h1>Hello, " .$_SESSION['username']."</h1>"; ?>
    </div>
    <div class="ip-field">
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>