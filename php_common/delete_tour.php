<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once("../config.php");
    include_once("nav.php");
    $TourCode = mysqli_real_escape_string($db, $_POST['TourCode']);

    $deleteTourSQL = "DELETE FROM `Tour` WHERE`TourCode`='$TourCode'";
    $deleteTourDesSQL = "DELETE FROM `Tour_des` WHERE`FK_TourCode`='$TourCode'";
    $deleteSelectedTour = "DELETE FROM `C_selected_Tour` WHERE`FK_TourCode`='$TourCode'";


    if (mysqli_query($db, $deleteTourDesSQL)) {
        if (mysqli_query($db, $deleteSelectedTour)) {
            if (mysqli_query($db, $deleteTourSQL)) {
                echo("Delete Success!");
            } else {
                echo("There is few trip/tour are going on !\nYou are not allowed to delete this tour/tour \nTry Again after delete relative trip first");
            }
        } else {
            echo("unable to delete C_Selected_Tour");
        }
    } else {
        echo("unable to delete Tour_des");
    }
}


?>
