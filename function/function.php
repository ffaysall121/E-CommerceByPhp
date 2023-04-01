<?php
    include('../config/connectDB.php');
    function redirect($message,$url)
    {
        $_SESSION['message'] = $message;
        header('Location:'.$url);
        exit();

    }

    function getById($table,$id)
    {
        global $connection;
        $sql = "SELECT * FROM $table WHERE id ='$id'";
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