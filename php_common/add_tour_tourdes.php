<?php
$type = $_GET['type'];
include("../config.php");

function addTourAndTourDes()
{
    $TourCode = mysqli_real_escape_string($GLOBALS['db'], $_POST['TourCode']);
    $TourName = mysqli_real_escape_string($GLOBALS['db'], $_POST['TourName']);
    $Category = mysqli_real_escape_string($GLOBALS['db'], $_POST['Category']);
    $Destination = mysqli_real_escape_string($GLOBALS['db'], $_POST['Destination']);

    $TourCodeSql = "SELECT * FROM Tour Where TourCode='$TourCode'";
    $TourQuery = mysqli_query($GLOBALS['db'], $TourCodeSql);
    $TourCount = mysqli_num_rows($TourQuery);

    if ($TourCount == "0") {
        //Upload itinerary and tour code
        $pic_file = $_FILES['pic'];
        $pic_fileName = $pic_file['name'];
        $pic_fileTempName = $pic_file['tmp_name'];
        $pic_fileError = $pic_file['error'];

        $pic_fileExt = explode('.', $pic_fileName);
        $pic_FileActualExt = strtolower(end($pic_fileExt));
        $pic_allowed = array('jpg', 'jpeg', 'png');
        if (in_array($pic_FileActualExt, $pic_allowed)) {
            if ($pic_fileError === 0) {
                $pic_FileNameNEW = "$TourCode.$pic_FileActualExt";
                $pic_fileDestination = "/volume1/web/test/php-assignment/itinerary/$Category/$pic_FileNameNEW";
                move_uploaded_file($pic_fileTempName, $pic_fileDestination);
            } else {
                echo "Error happen when upload";
            }
        } else {
            echo "Pic File type not permit";
            die();
        }

        $pdf_file = $_FILES['itinerary'];
        $pdf_fileName = $pdf_file['name'];
        $pdf_fileTempName = $pdf_file['tmp_name'];
        $pdf_fileError = $pdf_file['error'];

        $pdf_fileExt = explode('.', $pdf_fileName);
        $pdf_FileActualExt = strtolower(end($pdf_fileExt));
        $pdf_allowed = array('pdf');
        if (in_array($pdf_FileActualExt, $pdf_allowed)) {
            if ($pdf_fileError === 0) {
                $pdf_FileNameNEW = "$TourCode.$pdf_FileActualExt";
                $pdf_fileDestination = "/volume1/web/test/php-assignment/itinerary/$Category/$pdf_FileNameNEW";
                move_uploaded_file($pdf_fileTempName, $pdf_fileDestination);
            } else {
                echo "Error happen when upload";
            }
        } else {
            echo "PDF File type not permit";
            die();
        }

        // Declare value for Manager of The Area
        switch ($Category) {
            case "Asia":
                $FK_E_username = "jmoen";
                break;
            case "Europe":
                $FK_E_username = "ljones";
                break;
            case "Exotic":
                $FK_E_username = "nicholaus06";
                break;
            default:
                $FK_E_username = "cheng.kang";
                break;

        }

        $pdf_httpAccess = "https://chengkang.synology.me/test/php-assignment/itinerary/$Category/$pdf_FileNameNEW";
        $pic_httpAccess = "https://chengkang.synology.me/test/php-assignment/itinerary/$Category/$pic_FileNameNEW";

        $addTourSql = /** @lang text */
            "INSERT INTO `Tour`(`TourCode`, `Name`, `Destination`, `Category`, `FK_E_username`, `itinerary_url`, `thumbnail_url`) VALUES ('$TourCode','$TourName','$Destination','$Category','$FK_E_username','$pdf_httpAccess','$pic_httpAccess');";

        if (mysqli_query($GLOBALS['db'], $addTourSql)) {
            $P1 = mysqli_real_escape_string($GLOBALS['db'], $_POST['Point_1']);
            $D1 = mysqli_real_escape_string($GLOBALS['db'], $_POST['Des_1']);
            $P2 = mysqli_real_escape_string($GLOBALS['db'], $_POST['Point_2']);
            $D2 = mysqli_real_escape_string($GLOBALS['db'], $_POST['Des_2']);
            $P3 = mysqli_real_escape_string($GLOBALS['db'], $_POST['Point_3']);
            $D3 = mysqli_real_escape_string($GLOBALS['db'], $_POST['Des_3']);
            $P4 = mysqli_real_escape_string($GLOBALS['db'], $_POST['Point_4']);
            $D4 = mysqli_real_escape_string($GLOBALS['db'], $_POST['Des_4']);

            $addTourDesSql = "INSERT INTO `Tour_des`(`FK_TourCode`, `Point_1`, `Des_1`, `Point_2`, `Des_2`, `Point_3`, `Des_3`, `Point_4`, `Des_4`) VALUES ('$TourCode','<b>$P1</b> -','$D1','<b>$P2</b> -','$D2','<b>$P3</b> -','$D3','<b>$P4</b> -','$D4');";
            if (mysqli_query($GLOBALS['db'], $addTourDesSql)) {
                echo /** @lang text */ "<script> alert('Insert Success!'); </script>";
                echo/** @lang text */ ("<script> window.history.go(-1);</script>");
            } else {
                echo "sth wrong again bro";
            }
        } else {
            echo "Sth Wrong la bro ";
        }
    } else {
        echo "Duplicate entry for Tour Code :)";
    }
}

function deleteTour()
{
    $TourCode = mysqli_real_escape_string($GLOBALS['db'], $_POST['TourCode']);
    $TourCode = str_replace(" ", "", $TourCode);

    $deleteTourSQL = "DELETE FROM `Tour` WHERE`TourCode`='$TourCode'";
    $deleteTourDesSQL = "DELETE FROM `Tour_des` WHERE`FK_TourCode`='$TourCode'";
    $deleteSelectedTour = "DELETE FROM `C_selected_Tour` WHERE`FK_TourCode`='$TourCode'";


    if (mysqli_query($GLOBALS['db'], $deleteTourDesSQL)) {
        if (mysqli_query($GLOBALS['db'], $deleteSelectedTour)) {
            if (mysqli_query($GLOBALS['db'], $deleteTourSQL)) {
                echo("Success");
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

function returnDestinationSelection()
{
    $sql = "SELECT DISTINCT `Destination` from Tour";
    $query = mysqli_query($GLOBALS['db'], $sql);

    $domReturn = "<select required class='custom-select' name='Destination' id='destinationInAddTourForm'>\n<option disabled selected>Please select an Destination</option>\n<option value='' disabled>---------------------------------- </option>";
    while ($row = mysqli_fetch_assoc($query)) {
        $destination = $row['Destination'];
        $domReturn .= "<option value='$destination'>$destination</option>\n";
    }

    $domReturn .= "</select>";
    return $domReturn;
}

function returnCategorySelection()
{
    $sql = "SELECT DISTINCT `Category` from Tour";
    $query = mysqli_query($GLOBALS['db'], $sql);

    $domReturn = "<select required class='custom-select' name='Category' id='categoryInAddTourForm'>\n<option disabled selected>Please select an Category</option>\n<option value='' disabled>---------------------------------- </option>";
    while ($row = mysqli_fetch_assoc($query)) {
        $Category = $row['Category'];
        $domReturn .= "<option value='$Category'>$Category</option>\n";
    }

    $domReturn .= "</select>";
    return $domReturn;
}

switch ($type) {
    case 'addTourAndTourDes':
        addTourAndTourDes();
        break;

    case 'deleteTour':
        deleteTour();
        break;

    case 'returnCategorySelection':
        returnCategorySelection();
        break;

    case 'echoCategorySelection':
        $return = returnCategorySelection();
        echo $return;
        break;

    case 'returnDestinationSelection':
        returnDestinationSelection();
        break;

    case 'echoDestinationSelection':
        $return = returnDestinationSelection();
        echo $return;
        break;


    default:

        break;
}
