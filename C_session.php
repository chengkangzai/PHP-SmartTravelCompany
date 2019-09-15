<?php
   include('config.php');
   session_start();
   

   //Check if the user logged in 
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select * from Customer where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   // Get the user name, Their Name
   $login_session = $row['username'];
   $FName = $row['FName'];
   $LName = $row['LName'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:C_Login.php");
      die();
   }


?>