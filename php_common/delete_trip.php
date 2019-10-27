<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
    
    include_once("../config.php");

    $Trip_ID = mysqli_real_escape_string($db, $_POST['Trip_ID']);
   

    $sql = "DELETE FROM `Trip` WHERE `Trip_ID`='$Trip_ID' ";

    echo $sql;


    if (mysqli_query($db, $sql)) {
        echo ("<script> alert('Delete Sucess!'); </script>");
        echo ("<script> window.location.replace('http://chengkang.synology.me/test/php-assignment/welcome.php');</script>");
    } else {
        echo ("<script> alert('You Are Deleting a trip that already booked!'); </script>");
        echo ("<script> window.location.replace('http://chengkang.synology.me/test/php-assignment/welcome.php');</script>");
    }

}
?>