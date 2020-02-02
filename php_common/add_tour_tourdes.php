<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once('../config.php');
    $TourCode = mysqli_real_escape_string($db, $_POST['TourCode']);
    $TourName = mysqli_real_escape_string($db, $_POST['TourName']);
    $Category = mysqli_real_escape_string($db, $_POST['Category']);
    $Destination = mysqli_real_escape_string($db, $_POST['Destination']);

    $TourCodeSql = "SELECT * FROM Tour Where TourCode='$TourCode'";
    $TourQuery = mysqli_query($db, $TourCodeSql);
    $TourRow = mysqli_fetch_array($TourQuery, MYSQLI_ASSOC);
    $TourCount = mysqli_num_rows($TourQuery);

    if ($TourCount == "0") {
        //Upload itinerary and tour code
        $pic_file = $_FILES['pic'];
        $pic_fileName = $pic_file['name'];
        $pic_fileTempName = $pic_file['tmp_name'];
        $pic_fileError = $pic_file['error'];
        $pic_filetype = $pic_file['type'];

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
            echo "File type not permit";
        }

        $pdf_file = $_FILES['itenerary'];
        $pdf_fileName = $pdf_file['name'];
        $pdf_fileTempName = $pdf_file['tmp_name'];
        $pdf_fileError = $pdf_file['error'];
        $pdf_filetype = $pdf_file['type'];

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
            echo "File type not premit";
        }

        // Declare value for Manager of The Area
        if ($Category == "Asia") {
            $FK_E_username = "jmoen";
        } elseif ($Category == "Europe") {
            $FK_E_username = "ljones";
        } elseif ($Category == "Exotic") {
            $FK_E_username = "nicholaus06";
        }


        $pdf_httpAccess = "http://chengkang.synology.me/test/php-assignment/itinerary/$Category/$pdf_FileNameNEW";
        $pic_httpAccess = "http://chengkang.synology.me/test/php-assignment/itinerary/$Category/$pic_FileNameNEW";

        $addTourSql = "INSERT INTO `Tour`(`TourCode`, `Name`, `Destination`, `Category`, `FK_E_username`, `itinerary_url`, `thumbnail_url`) VALUES ('$TourCode','$TourName','$Destination','$Category','$FK_E_username','$pdf_httpAccess','$pic_httpAccess');";
        if (mysqli_query($db, $addTourSql)) {
            $P1 = mysqli_real_escape_string($db, $_POST['Point_1']);
            $D1 = mysqli_real_escape_string($db, $_POST['Des_1']);
            $P2 = mysqli_real_escape_string($db, $_POST['Point_2']);
            $D2 = mysqli_real_escape_string($db, $_POST['Des_2']);
            $P3 = mysqli_real_escape_string($db, $_POST['Point_3']);
            $D3 = mysqli_real_escape_string($db, $_POST['Des_3']);
            $P4 = mysqli_real_escape_string($db, $_POST['Point_4']);
            $D4 = mysqli_real_escape_string($db, $_POST['Des_4']);

            $addTourDesSql = "INSERT INTO `Tour_des`(`FK_TourCode`, `Point_1`, `Des_1`, `Point_2`, `Des_2`, `Point_3`, `Des_3`, `Point_4`, `Des_4`) VALUES ('$TourCode','<b>$P1</b> -','$D1','<b>$P2</b> -','$D2','<b>$P3</b> -','$D3','<b>$P4</b> -','$D4');";
            if (mysqli_query($db, $addTourDesSql)) {
                echo "<script> alert('Insert Success!'); </script>";
                echo ("<script> window.history.go(-1);</script>");
            } else {
                echo "sth wrong again bro";
            }
        } else {
            echo "Sth Wrong la bro ";
        }
    } else {
        echo "Duplicate entry for Tour Code :)";
    }
    mysqli_close($db);
}
