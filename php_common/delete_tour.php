<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once("../config.php");
    $TourCode = mysqli_real_escape_string($db, $_POST['TourCode']);

    $d_tour_sql = "DELETE FROM `Tour` WHERE`TourCode`='$TourCode'";
    $d_tourdes_sql = "DELETE FROM `Tour_des` WHERE`FK_TourCode`='$TourCode'";
    $d_selected_tour_sql = "DELETE FROM `C_selected_Tour` WHERE`FK_TourCode`='$TourCode'";

    
    if (mysqli_query($db, $d_tourdes_sql)) {
        if (mysqli_query($db, $d_selected_tour_sql)) {
            if (mysqli_query($db, $d_tour_sql)) {
                echo ("<script> alert('Delete Sucess!');");
                echo ("window.history.go(-1)');</script>");
            }else {
                header("Location:../jump/reject_delete_tour.html");
            }
        }else {
            echo ("<script> alert('unable to delete C_Selected_Tour'); </script>");
            echo ("<script> window.history.go(-1);</script>");
        }
    } else {
        echo ("<script> alert('unable to delete Tour_des'); </script>");
        echo ("<script> window.history.go(-1);</script>");
    }
}
?>