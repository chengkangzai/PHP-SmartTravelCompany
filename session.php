<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select * from Employee where username = '$user_check' ");
   
   //$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $row=mysqli_fetch_assoc($ses_sql);
   
   $login_session = $row['username'];
   $password=$row['password'];
   $FName=$row['FName'];
   $LName=$row['LName'];
   $IC=$row['IC_num'];
   $position=$row['Position'];
   $Agency=$row['Agency'];

   if(!isset($_SESSION['login_user'])){
      header("location:jump/Login.html");
      die();
   }

?>