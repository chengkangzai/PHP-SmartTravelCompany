<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'YES');
   define('DB_DATABASE', 'PHP');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if (!$db) {
      echo "<script> alert('Database not connected ! check the configuration file !'); </script>";
   }
?>