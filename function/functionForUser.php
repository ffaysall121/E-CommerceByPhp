<?php

session_start();
include('config/connectDB.php');

function redirect($message,$url)
{
    $_SESSION['message'] = $message;
    header('Location:'.$url);
    exit();

}

function getAllActive($table)
{
    global $connection;
    $sql = "SELECT * FROM $table WHERE status ='0'";
    $sqlRun=mysqli_query($connection,$sql);

    return $sqlRun;
}

function getAll($table)
{
    global $connection;
    $sql = "SELECT * FROM $table";
    $sqlRun=mysqli_query($connection,$sql);

    return $sqlRun;

}

?>