<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
    include_once("../config.php");

    $Trip_ID = mysqli_real_escape_string($db, $_POST['Trip_ID']);
    $Departure_date = mysqli_real_escape_string($db, $_POST['Departure_date']);
    $Fee = mysqli_real_escape_string($db, $_POST['Fee']);
    $Airline = mysqli_real_escape_string($db, $_POST['Airline']);
    $FK_TourCode = mysqli_real_escape_string($db, $_POST['FK_TourCode']);


    $sql = "UPDATE `Trip` SET `Departure_date`='$Departure_date',`Fee`='$Fee',`Airline`='$Airline',`FK_TourCode`='$FK_TourCode' WHERE `Trip_ID`='$Trip_ID'";

    //echo $sql;


    if (mysqli_query($db, $sql)) {
        echo ("<script> alert('Edit Sucess!'); </script>");
        echo ("<script> window.location.replace('http://chengkang.synology.me/test/php-assignment/welcome.php');
    </script>");
    } else {
        echo ("Error happen! Whyyyy");
    }
}else {
    echo "There is some error (●ˇ∀ˇ●)";
}
