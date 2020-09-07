<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once($_SERVER['DOCUMENT_ROOT']."/test/php-assignment/"."config.php");
    $Trip_ID = mysqli_real_escape_string($db, $_POST['Trip_ID']);
    $sql = "SELECT COUNT(Booking_ID) AS Count from Booking WHERE `FK_Trip_ID`=$Trip_ID";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($query);
    $count = $row['Count'];

    if ($count == 0) {
        $sql = "DELETE FROM `Trip` WHERE `Trip_ID`='$Trip_ID' ";
        if (mysqli_query($db, $sql)) {
            echo "Success";
        } else {
            echo "Error";
        }

    } else {
        echo "There is someone booking this Trip, You cant delete this";
    }
}
mysqli_close($db);
