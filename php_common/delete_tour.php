<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once("../config.php");
    include_once("nav.php");
    $TourCode = mysqli_real_escape_string($db, $_POST['TourCode']);

    $deleteTourSQL = "DELETE FROM `Tour` WHERE`TourCode`='$TourCode'";
    $deleteTourDesSQL = "DELETE FROM `Tour_des` WHERE`FK_TourCode`='$TourCode'";
    $deleteSelectedTour = "DELETE FROM `C_selected_Tour` WHERE`FK_TourCode`='$TourCode'";

<<<<<<< HEAD
    
    if (mysqli_query($db, $deleteTourDesSQL)) {
        if (mysqli_query($db, $deleteSelectedTour)) {
            if (mysqli_query($db, $deleteTourSQL)) {
                echo("Delete Success!");
            }else {
                echo("There is few trip/tour are going on !\nYou are not allowed to delete this tour/tour \nTry Again after delete relative trip first");
            }
        }else {
            echo("unable to delete C_Selected_Tour");
=======

    if (mysqli_query($db, $d_tourDes_sql)) {
        if (mysqli_query($db, $d_selected_tour_sql)) {
            if (mysqli_query($db, $d_tour_sql)) {
                renderAlertInJs("Delete Success!");
            } else {
                renderAlertInJs("There is few trip/tour are going on !\nYou are not allowed to delete this tour/tour \nTry Again after delete relative trip first");
            }
        } else {
            renderAlertInJs("unable to delete C_Selected_Tour");
>>>>>>> 14c1d397de1a0fc9bbea2fd851ed01593902fcec
        }
    } else {
        echo("unable to delete Tour_des");
    }
}
<<<<<<< HEAD


?>
=======
renderGoBackInJs();
mysqli_close($db);
>>>>>>> 14c1d397de1a0fc9bbea2fd851ed01593902fcec
