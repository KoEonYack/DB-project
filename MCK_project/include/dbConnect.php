<?php
    $host = 'localhost';
    $user = 'root';
    $passWord = 'gritYCDA';
    $dbName = 'watcha_project';

    $conn = mysqli_connect($host, $user, $passWord, $dbName);

    if (mysqli_connect_errno($conn)){
        echo "Database connection failed: ".mysqli_connect_error();
    }else{
        echo "Database connection Success <br>";
    }
?>