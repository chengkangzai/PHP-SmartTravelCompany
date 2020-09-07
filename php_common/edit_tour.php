<?php
include($_SERVER['DOCUMENT_ROOT']."/test/php-assignment/"."config.php");
include($_SERVER['DOCUMENT_ROOT']."/test/php-assignment/php_common/"."nav.php");
$type = $_GET['type'];
function updateAll()
{
    $TourCode = mysqli_real_escape_string($GLOBALS['db'], $_POST['TourCode']);
    $TourName = mysqli_real_escape_string($GLOBALS['db'], $_POST['TourName']);
    $category = mysqli_real_escape_string($GLOBALS['db'], $_POST['Category']);
    $Destination = mysqli_real_escape_string($GLOBALS['db'], $_POST['Destination']);
    $FK_E_username = mysqli_real_escape_string($GLOBALS['db'], $_POST['FK_E_username']);
    $thumbnail_url = mysqli_real_escape_string($GLOBALS['db'], $_POST['thumbnail_url']);
    $itinerary_url = mysqli_real_escape_string($GLOBALS['db'], $_POST['itenerary']);
    $allCheck = false;
    if ($TourCode !== "") {
        if ($TourName !== "") {
            if ($category !== "") {
                if ($Destination !== "") {
                    if ($FK_E_username !== "") {
                        if ($thumbnail_url !== "") {
                            if ($itinerary_url !== "") {
                                $allCheck == true;
                            }
                        }
                    }
                }
            }
        }
    }

    if ($allCheck !== true) {
        echo "All field are required";
        die();
    }
    $sql = "UPDATE `Tour` SET `Name`='$TourName',`Destination`='$Destination',`Category`='$category',`FK_E_username`='$FK_E_username',`itinerary_url`='$itinerary_url',`thumbnail_url`='$thumbnail_url' WHERE`TourCode`='$TourCode'";

    if (mysqli_query($GLOBALS['db'], $sql)) {
        echo("<script> alert('Edit Success!'); </script>");
        echo("<script> window.history.go(-1);</script>");
    } else {
        echo "There is some error (●ˇ∀ˇ●) \n";
    }
}

function updateTourName()
{
    $tourName = $_POST['TourName'];
    $tourCode = $_POST['TourCode'];
    if ($tourCode == "" || $tourName == "") {
        echo "Tour Name and Tour Code is required\n ";
    } else {
        $tourCode = str_replace(" ", "", $tourCode);
        $sql = "UPDATE `Tour` SET `Name`='$tourName' WHERE `TourCode`='$tourCode'";
        if (mysqli_query($GLOBALS['db'], $sql)) {
            echo "success";
        } else {
            echo "Sth Wrong";
        }
    }
}

function updateItinerary()
{
    echo "Under Development";
}


switch ($type) {
    case 'updateTourName':
        updateTourName();
        break;

    case 'updateItinerary':
        updateItinerary();
        break;
    default:
        updateAll();
        break;
}
