<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    include_once("../config.php");
    include_once("nav.php");

    $departure_date = mysqli_real_escape_string($db, $_POST['departure_date']);
    $newDate = date("Y-m-d", strtotime($departure_date));
    $Fee = mysqli_real_escape_string($db, $_POST['Fee']);
    $Airline = mysqli_real_escape_string($db, $_POST['Airline']);
    $TourCode = mysqli_real_escape_string($db, $_POST['TourCode']);
    $err="";
    if (!empty($departure_date)) {
        $departure_date_check = 1;
    } else {
        $err = $err . "Departure Date cannot be empty \n ";
    }

    if (!empty($Fee)) {
        $Fee_check = 1;
    } else {
        $err = $err . "Fee cannot be empty \n";
    }

    if (!empty($Airline)) {
        $Airline_check = 1;
    } else {
        $err = $err . "Airline cannot be empty \n";
    }

    if (!empty($TourCode)) {
        $TourCode_check = 1;
    } else {
        $err = $err . "TourCode cannot be empty \n";
    }

    if ($Fee_check = 1 && $Airline_check = 1 && $TourCode_check == 1 && $departure_date_check = 1) {
        $sql = "INSERT INTO `Trip`(`Departure_date`, `Fee`, `Airline`, `FK_TourCode`) VALUES ('$newDate',' $Fee','$Airline','$TourCode')";
    } else {
        echo $err;
    }


    if (mysqli_query($db, $sql)) {
        renderAlertInJs("Add Success!");
        renderGoBackInJs();
    } else {
        renderAlertInJs("Error happen:3! Here is the error \n $err");
        renderGoBackInJs();
    }
    mysqli_close($db);
}
