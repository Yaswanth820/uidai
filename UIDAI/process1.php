<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>process</title>
</head>
<body>
    <?php
        $f_name = $_POST["f_name"];
        $l_name = $_POST["l_name"];
        $email = $_POST["email"];
        $full_name = $f_name.$l_name;
        echo "Hello".$full_name;
    ?>
</body>
</html>

