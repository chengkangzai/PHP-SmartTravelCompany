<!DOCTYPE html>

<?php
//reference code for searching: https://www.youtube.com/watch?v=2XuxFi85GTw&t=381s
include "config.php";
date_default_timezone_set("Asia/Kuala_Lumpur");
$date= date('Y/m/d');

if(isset($_POST['Filter'])){
    $Start_Date=$_POST['Start_Date'];
    $End_Date=$_POST['End_Date'];
    $sql ="SELECT `TourCode`, `Name`, SUM(`Fee`) AS Total FROM `Booking` INNER JOIN `Trip` T ON FK_Trip_ID = T.Trip_ID INNER JOIN `Tour` TR ON FK_TourCode = TR.TourCode 
    WHERE T.Departure_date BETWEEN '$Start_Date' AND '$End_Date' GROUP BY `TourCode`";
    $result = mysqli_query($db, $sql);
    
    while ($row = mysqli_fetch_array($result)) {
        $test.="{
            Price: '{$row["Total"]}',
            Tour: '{$row["Name"]}',
            Tcode:'{$row["TourCode"]}'
        },";
    };
}else{
    $sql = "SELECT `TourCode`, `Name`, SUM(`Fee`) AS Total FROM `Booking` INNER JOIN `Trip` T ON FK_Trip_ID = T.Trip_ID INNER JOIN `Tour` TR ON FK_TourCode = TR.TourCode WHERE T.Departure_date >= '2019-1-1' AND T.Departure_date <= '$date' GROUP BY `TourCode`";
    $result = mysqli_query($db, $sql);
    
    while ($row = mysqli_fetch_array($result)) {
        $test.="{
            Price: '{$row["Total"]}',
            Tour: '{$row["Name"]}',
            Tcode:'{$row["TourCode"]}'
        },";
    }
}
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Chart Tester</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>

<body>
    <h1>Filtering:</h1>
    <form method="post">
        <input type="date" id="Start_Date" name="Start_Date" placeholder="Start_Date" required>
        <input type="date" id="End_Date" name="End_Date" placeholder="End_Date" required>
        <input type="submit" name="Filter" value="Filter">
    </form>

    <div class="firstChart">
        <h1 class="text-center">Tour Overall Sales</h1>
        <div id="chart"></div>
    </div>

    <script>
        new Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [<?php echo $test ?>],
            // The name of the data record attribute that contains x-values.
            xkey: ['Tcode'],
            // A list of names of data record attributes that contain y-values.
            ykeys: ['Price'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Price'],
        });
    </script>
</body>

</html>