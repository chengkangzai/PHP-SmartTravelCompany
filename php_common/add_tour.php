<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
    
    include_once("../config.php");

    $departure_date = mysqli_real_escape_string($db, $_POST['departure_date']);
    $newDate = date("Y-m-d", strtotime($departure_date));
    $Fee = mysqli_real_escape_string($db, $_POST['Fee']);
    $Airline = mysqli_real_escape_string($db, $_POST['Airline']);
    $TourCode = mysqli_real_escape_string($db, $_POST['TourCode']);

    $sql = "INSERT INTO `Trip`(`Departure_date`, `Fee`, `Airline`, `FK_TourCode`) VALUES ('$newDate',' $Fee','$Airline','$TourCode')";

    if (mysqli_query($db, $sql)) {
        echo ("<script> alert('Add Sucess!'); </script>");
        echo ("<script> window.history.go(-1)');</script>");
    } else {
        echo ("<script> alert('Something wrong :3'); </script>");
        echo ("<script> window.history.go(-1)');</script>");
    }

}
?>