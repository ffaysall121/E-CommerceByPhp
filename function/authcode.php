<?php
session_start();
include("../config/connectDB.php");
include('function.php');

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
            redirect("Email address are already registered","../register.php");
        }

        else
        {
                  
        if($password==$confirm_password)
        {

            $sql="INSERT INTO user (name,username,phone,email,password,confirmpassword) VALUES('$name','$username','$phone','$email','$password','$confirm_password')";
            $sql_insert =mysqli_query($connection,$sql);
            if ($sql_insert) {
                header('Location:../login.php');   
            }
            else{
                $_SESSION['message'] ="something went wrong";
                header('Location:../register.php');
                // redirect(" Something Wrong ","../register.php");
            }

        }

        else
        {
            redirect("password are not Match with confirm password","../register.php");
     
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
        $uemail=$userData['email'];
        $role=$userData['role'];
        $_SESSION['auth']= true;
        $_SESSION['user_details']= [
            'name' => $uname,
            'email' => $uemail,    
        ];

        $_SESSION['role'] = $role;

        if($role==1)
        {
            // redirect("Welcome to dashboard","../admin/index.php");
            header('Location:../admin/index.php');
        }
        else
        {
            redirect("Successfully Logged in","../index.php");
            // header('Location:../index.php');  
        }

    }
  }
else
    {
        redirect("Invalid email or password","Location:../login.php");
        //  header('../login.php'); catagories
    }
 
