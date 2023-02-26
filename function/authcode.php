<?php
session_start();

include("../config/connectDB.php");

    if (isset($_POST['register_btn']))
 {
        $name= mysqli_real_escape_string($connection,$_POST['name']);
        $username= mysqli_real_escape_string($connection,$_POST['username']);
        $phone= mysqli_real_escape_string($connection,$_POST['phone']);
        $email= mysqli_real_escape_string($connection,$_POST['email']);
        $password= mysqli_real_escape_string($connection,$_POST['password']);
        $confirm_password= mysqli_real_escape_string($connection,$_POST['confirm_password']);

        $checkMailSql = "SELECT email FROM user WHERE  email='$email'";
        $runSql = mysqli_query($connection,$checkMailSql);

        if (mysqli_num_rows($runSql)>0)
        {
            $_SESSION['message']="Email address are already registered. ! try again with another email address";
            header('Location:../register.php');
        }

        else
        {
                  
        if($password==$confirm_password)
        {

            $sql="INSERT INTO user (name,username,phone,email,password,confirmpassword) VALUES('$name','$username','$phone','$email','$password','$confirm_password')";
            $sql_insert =mysqli_query($connection,$sql);
            if ($sql_insert) {
                $_SESSION ['message'] ='Successfully registered';
                header('Location:../login.php');
                
            }
            else{
                $_SESSION ['message'] ='can not successfully registered';
                header('Location:../register.php');
            }

        }

        else
        {
            $_SESSION['message']="password are not Match with confirm password";
            header('Location:./register.php');
        }
    }
}
elseif (isset($_POST['login_btn']))
 {
    $email= mysqli_real_escape_string($connection,$_POST['email']);
    $password= mysqli_real_escape_string($connection,$_POST['password']);

    $loginSql="SELECT * FROM user WHERE email='$email' AND password='$password'";
    $runLoginSql=mysqli_query($connection,$loginSql);
    if(mysqli_num_rows($runLoginSql)>0)
    {
        $userData = mysqli_fetch_array($runLoginSql);
        $uname=$userData['name'];
        $uemail=$userData['name'];
        $_SESSION['auth']= true;
        $_SESSION['user_details']= [
            'name' => $uname,
            'email' => $uemail,
        ];

        $_SESSION['message']="Successfully Logged in";
        header('Location:../index.php');
    }
    else
    {
        $_SESSION['message']="Invalid email or password";
        header('Location:../login.php');
    }

 }
