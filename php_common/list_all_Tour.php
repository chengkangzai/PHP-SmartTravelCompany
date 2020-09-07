<?php
include($_SERVER['DOCUMENT_ROOT']."/test/php-assignment/"."config.php");

function returnAllTourName()
{
    $sql = "SELECT * From Tour";
    $query = mysqli_query($GLOBALS['db'], $sql);
    $domReturn = "<select class='custom-select' name='TourCode' required><option selected value='' disabled>Select an TourCode</option><option value='' disabled>-------------------------------- </option>";
    while ($row = mysqli_fetch_assoc($query)) {
        $tourCode = $row['TourCode'];
        $tourName = $row['Name'];
        $domReturn = $domReturn . "<option value='$tourCode'> $tourName</option>";
    }
    $domReturn .= "</select>";

    return $domReturn;
}

mysqli_close($db);
