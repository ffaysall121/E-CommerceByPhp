<?php

include('../function/function.php');

if(isset($_SESSION['auth']))
{
   
   if ($_SESSION['role'] != 1) {

    redirect("Access denied","../index.php");
    // $_SESSION['message'] = "Access denied";
    // header('Location:../index.php');

   }
}
else{

    redirect("Login to Admin","../login.php");

}

?>