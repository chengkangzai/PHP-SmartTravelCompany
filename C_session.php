<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select * from Customer where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $position = $row['Position'];
   $FName = $row['FName'];
   $LName = $row['LName'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:C_Login.php");
      die();
   }


   $query_sql= mysqli_query($db,"SELECT 	C.FName  ,
   C.LName ,
     B.Booking_ID ,
     B.FK_Trip_ID ,
     Tour.TourCode ,
     Tour.Name ,
     T.Departure_date 
FROM Customer C
INNER join Booking B on C.username=B.FK_C_username 
inner JOIN Trip T on T.Trip_ID=B.FK_Trip_ID
INNER JOIN Tour ON T.FK_TourCode=Tour.TourCode");

   



?>