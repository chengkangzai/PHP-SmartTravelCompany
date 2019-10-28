<?php
   session_start();
   
   $_SESSION['role']="";
   if(session_destroy()) {
      header("Location: Login/index.php");
   }
?>