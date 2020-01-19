<?php
session_start();
include("../session.php");
include("../config.php");
include("../php_common/nav.php");


function renderManagedTrip(){
    $table = "
    <table class='table table-hover table-white' id='managedTrip'>
    <thead>
        <tr>
            <th scope='col'> Customer Name </th>
            <th scope='col'> Customer Phone </th>
            <th scope='col'> Tour Code </th>
            <th scope='col'> Tour Name </th>
            <th scope='col'> Destination </th>
            <th scope='col'> Departure date </th>
            <th scope='col'> Fee </th>
            <th scope='col'> Airline </th>
            <th scope='col'> Itenerary </th>
            <th scope='col'> Update </th>
        </tr>
    </thead>
    <tbody>";
    
    $today = date("Y-m-d");
    echo "<h1 class='text-center welcomeText' >Welcome! $GLOBALS[position], $GLOBALS[login_session] </h1>";
    switch ($GLOBALS['position']) {
        case 'Manager':
            echo $table;
            $query_sql = mysqli_query($GLOBALS['db'], "SELECT B.Booking_ID,C.FName,C.LName,Trip.Trip_ID,T.TourCode,C.Phone_num,T.Name,T.Destination,Trip.Departure_date,Trip.Fee,Trip.Airline,E.username ,T.itinerary_url,C.username FROM Booking B INNER JOIN Customer C ON B.FK_C_username=C.username INNER JOIN Trip on Trip.Trip_ID=B.FK_Trip_ID INNER join Tour T on Trip.FK_TourCode=T.TourCode INNER JOIN Employee E on T.FK_E_username=E.username WHERE Trip.Departure_date <= '$today' ");
            while ($row = mysqli_fetch_assoc($query_sql)) {
                $ran=rand();
            echo "<tr ><td >{$row['FName']} {$row['LName']}</td><td id='customerPhone$ran' data-id='{$row['username']}'>{$row['Phone_num']}</td><td>{$row['TourCode']}</td><td>{$row['Name']}</td><td>{$row['Destination']}</td><td>{$row['Departure_date']}</td><td>RM {$row['Fee']}</td><td>{$row['Airline']}</td><td><a href='{$row[' itinerary_url']}'><img src='img/itenerary-dark.png' /></a> </td><td><a class='btn btn-primary text-white' role='button' onclick='makeUpdate(\"$ran\")' id='btn_$ran'>Update</a></td></tr>";
            }
            echo "</tbody></table>";
            break;

        case NULL:
            notpremit();
            break;

        default:
            $login_session = $GLOBALS['login_session'];
            echo $GLOBALS['table'];
            $query_sql = mysqli_query($GLOBALS['db'], "SELECT B.Booking_ID, C.FName, C.LName, Trip.Trip_ID, T.TourCode, C.Phone_num, T.Name, T.Destination, Trip.Departure_date, Trip.Fee, Trip.Airline, E.username , T.itinerary_url, C.username FROM Booking B INNER JOIN Customer C ON B.FK_C_username=C.username INNER JOIN Trip on Trip.Trip_ID=B.FK_Trip_ID INNER join Tour T on Trip.FK_TourCode=T.TourCode INNER JOIN Employee E on T.FK_E_username=E.username WHERE (E.username='$login_session') AND (Trip.Departure_date <= '$today') ");
            while ($row = mysqli_fetch_assoc($query_sql)) {
                $ran=rand();
                echo "<tr ><td >{$row['FName']} {$row['LName']}</td><td id='customerPhone$ran' data-id='{$row['username']}'>{$row['Phone_num']}</td><td>{$row['TourCode']}</td><td>{$row['Name']}</td><td>{$row['Destination']}</td><td>{$row['Departure_date']}</td><td>RM {$row['Fee']}</td><td>{$row['Airline']}</td><td><a href='{$row[' itinerary_url']}'><img src='img/itenerary-dark.png' /></a> </td><td><a class='btn btn-primary text-white' role='button' onclick='makeUpdate(\"$ran\")' id='btn_$ran'>Update</a></td></tr>
            ";
            }
            echo "</tbody></table>";
            break;
    }
}

function renderManagedTour(){
    switch ($GLOBALS['Position']) {
        case 'Manager':
            # code...
            break;
        
        case 'Tour Manager of Europe':
            # code...
            break;
        
        case 'Tour Manager of Asia':
            # code...
            break;

        case 'Tour Manager of Exotic':
            # code...
            break;    

        default:
            # code...
            break;
    }
}