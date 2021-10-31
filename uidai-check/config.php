<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'uidai';

    $conn = mysqli_connect($server, $username, $password, $database);
    if(!$conn){
        die('<script>alert(Connection establishment is unsuccessful.)</script>');
    }
?>