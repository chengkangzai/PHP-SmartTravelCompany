<?php
session_start();
include("../session.php");
include("../config.php");
include("../php_common/nav.php");
$welcomeText = "<h1 class='text-center welcomeText' >Welcome! $GLOBALS[position], $GLOBALS[login_session] </h1>";

function renderManagedTrip()
{
    $table = " <table class='table table-hover table-white' id='managedTrip'> <thead> <tr> <th scope='col'> Customer Name </th> <th scope='col'> Customer Phone </th> <th scope='col'> Tour Code </th> <th scope='col'> Tour Name </th> <th scope='col'> Destination </th> <th scope='col'> Departure date </th> <th scope='col'> Fee </th> <th scope='col'> Airline </th> <th scope='col'> Itenerary </th> <th scope='col'> Update </th> </tr> </thead> <tbody>";

    $today = date("Y-m-d");
    $sql="SELECT B.Booking_ID,C.FName,C.LName,Trip.Trip_ID,T.TourCode,C.Phone_num,T.Name,T.Destination,Trip.Departure_date,Trip.Fee,Trip.Airline,E.username ,T.itinerary_url,C.username FROM Booking B INNER JOIN Customer C ON B.FK_C_username=C.username INNER JOIN Trip on Trip.Trip_ID=B.FK_Trip_ID INNER join Tour T on Trip.FK_TourCode=T.TourCode INNER JOIN Employee E on T.FK_E_username=E.username ";

    $outputTable="<tr ><td >{$row['FName']} {$row['LName']}</td><td id='customerPhone$ran' data-id='{$row['username']}'>{$row['Phone_num']}</td><td>{$row['TourCode']}</td><td>{$row['Name']}</td><td>{$row['Destination']}</td><td>{$row['Departure_date']}</td><td>RM {$row['Fee']}</td><td>{$row['Airline']}</td><td><a href='{$row[' itinerary_url']}'><img src='img/itenerary-dark.png' /></a> </td><td><a class='btn btn-primary text-white' role='button' onclick='makeUpdate(\"$ran\")' id='btn_$ran'>Update</a></td></tr>";

    switch ($GLOBALS['position']) {
        case 'Manager':
            echo $table;
            $whereClause="WHERE Trip.Departure_date >= '$today'";
            break;

        case NULL:
            notpremit();
            break;

        default:
            $login_session = $GLOBALS['login_session'];
            $whereClause="WHERE (E.username='$login_session') AND (Trip.Departure_date >= '$today') ";
        break;
    }
    echo $GLOBALS['table'];
    $query_sql = mysqli_query($GLOBALS['db'], $sql.$whereClause);
    while ($row = mysqli_fetch_assoc($query_sql)) {
        $ran = rand();
        echo $outputTable;
    }
    echo "</tbody></table>";
}

function renderTripManagement()
{
    $table = " <table border='0' class='table table-striped table-hover' id='TripTable'> <thead> <tr> <th scope='col'> Trip ID </th> <th scope='col'> Departure Date </th> <th scope='col'> Fee(RM) </th> <th scope='col'> Airline </th> <th scope='col'> Tour Code</th> <th scope='col'> Tour Name</th> <th scope='col'> Update </th> <th scope='col'> Delete </th> </tr> </thead><tbody> ";
    switch ($GLOBALS['position']) {
        case 'Manager':
            $area = "";
            break;

        case 'Tour Manager of Europe':
            $area = "WHERE Category =\'Europe\'";
            break;

        case 'Tour Manager of Asia':
            $area = "WHERE Category =\'Asia\'";
            break;

        case 'Tour Manager of Exotic':
            $area = "WHERE Category =\'Exotic\'";
            break;

        default:
            $login_session = $GLOBALS['login_session'];
            $area = "WHERE FK_E_username='$login_session'";
            break;
    }

    $sql = "SELECT Tr.Trip_ID , Tr.Departure_date, Tr.Fee, Tr.Airline, Tr.FK_TourCode, T.Name from Trip Tr inner JOIN Tour T on Tr.FK_TourCode=T.TourCode $area ORDER BY Tr.Trip_ID ASC ";
    $sql_query = mysqli_query($GLOBALS['db'], $sql);
    echo $table;

    while ($row = mysqli_fetch_assoc($sql_query)) {
        $ran = rand();
        echo "
        <tr id='tr_$ran'>
            <td id='TripID_$ran'>{$row['Trip_ID']}</td>
            <td id='DeptTime_$ran'>{$row['Departure_date']}</td>
            <td id='Fee_$ran'>{$row['Fee']}</td>
            <td id='Airline_$ran'>{$row['Airline']}</td>
            <td>{$row['FK_TourCode']}</td>
            <td>{$row['Name']}</td>
            <td>
            <a class='btn btn-primary text-white' role='button' onclick='makeTripUpdate(\"$ran\")' id='btn_TripUpdate$ran'>Update</a>
            </td>
            <td>
            <a class='btn btn-danger text-white' role='button' onclick='sendTripDelete(\"{$row['Trip_ID']}\",\"$ran\")'id='btn_TripDelete$ran'>Delete</a>
            </td>
        </tr>
        ";
    }
    echo "</tbody></table>";


}

function renderTripManagementForm(){
    include("list_all_flight.php");
    include("list_all_Tour.php");
    $airline=returnListAllFlight();
    $tourCode=returnAllTourName();
    $dom= "
    <table id='addTripForm' class='col-lg-8 modal table table-light '>
    <form method='post' action='php_common/add_trip.php'>
        <thead>
            <tr>
                <td colspan='2' class='text-center'> <h2>Add A trip</h2> </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Departure Date</td>
                <td>
                    <input type='date' name='departure_date' id='departure_date' class='form-control'  required />
                </td>
            </tr>
            <tr>
                <td>Fee (RM) </td>
                <td>
                    <input type='number' name='Fee' id='Fee' class='form-control' required>
                </td>
            </tr>
            <tr>
                <td>Airline</td>
                <td>$airline <a class='btn btn-primary mt-1' href='#' role='button' id='btn_AddTrip' onclick='addAirlineForTrip()'>Add Airline </a> </td>
            </tr>
            <tr>
                <td>Tour Name</td>
                <td>$tourCode</td>
            </tr>
            <tr>
                <td colspan='2' class='text-center'>
                    <input class='btn btn-success' type='submit' id='btn_AddTrip' >
                    <input class='btn btn-danger' type='reset'>
                    <a class='btn btn-danger' href='#' role='button' id='btn_CancelAddTrip' onclick='hideAddTripForm()'>Cancel</a>
                    </td>
            </tr>
        </tbody>
        </form>
    </table>
    ";
echo $dom;

}