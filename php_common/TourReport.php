<?php
include("../config");
$type = $_GET['type'];
date_default_timezone_set("Asia/Kuala_Lumpur");

function setSQL()
{
    $date = date('Y/m/d');

    $sql = "SELECT
        `TourCode`,
        `Name`,
        SUM(`Fee`) AS Total
    FROM
        `Booking`
        INNER JOIN `Trip` T ON FK_Trip_ID = T.Trip_ID
        INNER JOIN `Tour` TR ON FK_TourCode = TR.TourCode
    WHERE
        T.Departure_date >= '2019-1-1'
        AND T.Departure_date <= '$date'
    GROUP BY
        `TourCode`";

    return $sql;
}

function returnDataForMorris()
{
    $sql = setSQL();
    $result = mysqli_query($GLOBALS['db'], $sql);
    while ($row = mysqli_fetch_array($result)) {
        $data .= "
        {
            Price: '{$row["Total"]}',
            Tour: '{$row["Name"]}',
            Tcode:'{$row["TourCode"]}'
        },";
    }
    return $data;
}

function getMorris()
{
    $data = returnDataForMorris();
    $dom .= "
    <script id='MorrisBar'>
    mobar();
    function mobar(){
        new Morris.Bar({
            //https://morrisjs.github.io/morris.js/bars.html 
            element: 'TourReportInBar', 
            data: [$data], 
            ['Tcode'], 
            ykeys: ['Price'], 
            labels: ['Price'],
        })
    }

    </script>";
    return $dom;
}

function returnTourReportInBar()
{
    $morris = getMorris();
    $dom .= "    
    <div class='TourReportContainer'>
    
    
    <div id='TourReportInBarSection'>
        <h3 class='text-center'>Tour Sales</h3>
        <div id='TourReportInBarContainer'>
        <div id='TourReportInBar'></div>
        </div>
        
    </div> $morris
    </div>";
    return $dom;
}

switch ($type) {
    case 'filter':
        echo returnTourReportInBar();
        break;

    case 'getMorris':
        echo getMorris();
        break;

    default:
        # code...
        break;
}
