<?php
<<<<<<< HEAD
include_once("../config.php");
include("nav.php");
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

    $sql = "UPDATE `Tour` SET `Name`='$TourName',`Destination`='$Destination',`Category`='$category',`FK_E_username`='$FK_E_username',`itinerary_url`='$itinerary_url',`thumbnail_url`='$thumbnail_url' WHERE`TourCode`='$TourCode'";

    if (mysqli_query($GLOBALS['db'], $sql)) {
        echo ("<script> alert('Edit Success!'); </script>");
        echo ("<script> window.history.go(-1);</script>");
    } else {
        echo "There is some error (●ˇ∀ˇ●) \n";
        echo error_log(E_ALL);
    }
}

function updateTourName()
{
    $tourName = $_POST['TourName'];
    $tourCode = $_POST['TourCode'];

    if ($tourCode == "" || $tourName == "") {
        echo "Tour Name and Tour Code is required\n ";
    } else {
        $stmt = "UPDATE `Tour` SET `Name`=? WHERE `TourCode`=?";
        if ($stmt=mysqli_prepare($GLOBALS['db'], $stmt)) {
            mysqli_stmt_bind_param($stmt, "ss", $tourName, $tourCode);
            mysqli_stmt_execute($stmt);
            if (mysqli_stmt_affected_rows($stmt) == 1) {
                echo "success";
            }elseif(mysqli_stmt_affected_rows($stmt) == 0){
                echo "success";
            }else{
                echo "Error When getting affected row";
            }
        }else {
            echo "Error happen when prepare statement";
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
=======
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once("../config.php");

    $TourCode = mysqli_real_escape_string($db, $_POST['TourCode']);
    $TourName = mysqli_real_escape_string($db, $_POST['TourName']);
    $category = mysqli_real_escape_string($db, $_POST['Category']);
    $itenerary = mysqli_real_escape_string($db, $_POST['itenerary']);
    $Destination = mysqli_real_escape_string($db, $_POST['Destination']);
    $FK_E_username = mysqli_real_escape_string($db, $_POST['FK_E_username']);
    $thumbnail_url = mysqli_real_escape_string($db, $_POST['thumbnail_url']);
    $itinerary_url = mysqli_real_escape_string($db, $_POST['itenerary']);

    $sql = "UPDATE `Tour` SET `Name`='$TourName',`Destination`='$Destination',`Category`='$category',`FK_E_username`='$FK_E_username',`itinerary_url`='$itinerary_url',`thumbnail_url`='$thumbnail_url' WHERE`TourCode`='$TourCode'";

    if (mysqli_query($db, $sql)) {
        echo ("<script> alert('Edit Success!'); </script>");
        echo ("<script> window.history.go(-1);</script>");
    } else {
        echo "There is some error (●ˇ∀ˇ●)";
    }
}
mysqli_close($db);
>>>>>>> 14c1d397de1a0fc9bbea2fd851ed01593902fcec
