<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
    
    include_once("../config.php");

    $Trip_ID = mysqli_real_escape_string($db, $_POST['Trip_ID']);
    $sql = "DELETE FROM `Trip` WHERE `Trip_ID`='$Trip_ID' ";



    if (mysqli_query($db, $sql)) {
        echo ("<script> alert('Delete Sucess!'); </script>");
        echo ("<script> window.history.go(-1)');</script>");
    } else {
        echo ("<script> alert('You Are Deleting a trip that already booked!'); </script>");
        echo ("<script> window.history.go(-1)');</script>");
    }

}
?>