<?php

    $host ="localhost";
    $username ="root";
    $password ="";
    $database ="e_com";

    $connection = mysqli_connect($host,$username,$password,$database);

    if (!$connection) {
        die("connection failed: " . mysqli_connect_error());
    }
    else{
        // echo"successfully connected";
        }

?>