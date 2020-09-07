<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once($_SERVER['DOCUMENT_ROOT']."/test/php-assignment/"."config.php");
    $Trip_ID = mysqli_real_escape_string($db, $_POST['Trip_ID']);
    $Departure_date = mysqli_real_escape_string($db, $_POST['Departure_date']);
    $Fee = mysqli_real_escape_string($db, $_POST['Fee']);
    $Airline = mysqli_real_escape_string($db, $_POST['Airline']);

    if ($Trip_ID !== "") {
        if ($Departure_date !== "") {
            if ($Fee !== "") {
                if ($Airline !== "") {
                    $allCheck = "true";
                }
            }
        }
    }

    if ($allCheck !== "true") {
        echo "All field are required";
        die();
    } else {

        $sql = "UPDATE `Trip` SET `Departure_date`='$Departure_date',`Fee`='$Fee',`Airline`='$Airline' WHERE `Trip_ID`='$Trip_ID'";
        if (mysqli_query($db, $sql)) {
            echo("Success");
        } else {
            echo "Error happen! Whyyyy";
        }
    }

}
mysqli_close($db);
