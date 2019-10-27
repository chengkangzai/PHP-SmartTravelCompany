<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once("../config.php");

    $TourCode = mysqli_real_escape_string($db, $_POST['TourCode']);





    $d_tour_sql = "DELETE FROM `Tour` WHERE`TourCode`='$TourCode'";
    $d_tourdes_sql = "DELETE FROM `Tour_des` WHERE`TourCode`='$TourCode'";

    echo $d_tourdes_sql, "<br>", $d_tour_sql;


    if (mysqli_query($db, $d_tourdes_sql)) {
        if (mysqli_query($db, $d_tour_sql)) {
            echo ("<script> alert('Edit Sucess!'); </script>");
            echo ("<script> window.location.replace('http://chengkang.synology.me/test/php-assignment/welcome.php');
    </script>");
        }
    } else {
        header("Location:../jump/reject_delete_tour.html");
    }
}
