<?php
session_start();
include("../session.php");
include("../config.php");
include("nav.php");
$welcomeText = "<h1 class='text-center welcomeText' >Welcome! $GLOBALS[position], $GLOBALS[login_session] </h1>";

function renderChangeProfilePasswordForm()
{
    $dom = "            
    <div class='mt-2' id='changeProfilePasswordForm' style='display:none'>
    <form action='php_common/edit_employee_profile.php?type=changePassword' method='POST'>
    <table class='table table-active table-striped border '>
        <thead>
            <tr>
                <td colspan=2 class='text-center'> <h2>Change Password</h2></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> Current Password</td>
                <td><input type='password' name='currPassword' id='currPassword' placeholder='Current Password' class='form-control' required></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td>
                    <input type='password' name='password1' id='password1' placeholder='Type Your New Password' class='form-control' required>
                </td>
            </tr>
            <tr>
                <td>Retype New Password</td>
                <td>
                    <input type='password' name='password2' id='password2' placeholder='Retype Your New Password' class='form-control' required>
                </td>
            </tr>
            <tr>
                <td colspan='2' class='text-center'>
                    <input  class='btn btn-primary' role='button' type='submit'>
                    <a id='' class='btn btn-danger' href='#' role='button' onclick='hideChangeProfilePasswordForm()'>Cancel </a>
                </td>
            </tr>
        </tbody>
    </table>
    </form>
    </div>
    ";
    echo $dom;
}

function renderChangeProfileInfoForm()
{
    include_once("edit_employee_profile.php");
    $username = $GLOBALS['login_session'];
    $FName = $GLOBALS['FName'];
    $LName = $GLOBALS['LName'];
    $agency = returnAgency();
    $dom = "            
    <div class='mt-2' id='changeProfileInfoForm' style='display:none'>
    <form action='php_common/edit_employee_profile.php?type=changeProfile' method='POST'>
    <table class='table table-active table-striped border'>
        <thead>
            <tr>
                <td colspan='2' class='text-center'>
                    <h2>Change Profile Information </h2>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> User Name</td>
                <td><input type='text' name='username' id='username' placeholder='$username' class='form-control' disabled value='$username'></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td>
                    <input type='text' name='fname' id='fname' placeholder='Type Your First Name' class='form-control' value='$FName' required>
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>
                    <input type='text' name='lname' id='lname' placeholder='Type Your Last Name' class='form-control' value='$LName' required>
                </td>
            </tr>
            <tr>
                <td>Belonging Agency</td>
                <td>
                    $agency
                </td>
            </tr>
            <tr>
                <td colspan='2' class='text-center'>
                    <a id='' class='btn btn-primary' href='#' role='button' onclick='showAuthenticateEditEmployeeProfile()'>Next</a>
                    <a id='' class='btn btn-danger' href='#' role='button' onclick='hideChangeProfileInfoForm()'>Cancel </a>
                </td>
            </tr>
        </tbody>
    </table>
    <div id='authenticateEditEmployeeProfile' >
        <table class='table table-danger table-striped '> 
            <tr>
                <td colspan='2' class='text-center'>Authenticate </td>
            </tr>
            <tr>
                <td>Current Password</td>
                <td>
                    <input name='currPassword' type='password' placeholder='Type Your Current Password to Authenticate' class='form-control' required>  
                </td>
            </tr>
            <tr>
                <td colspan='2' class='text-center'>
                    <input class='btn btn-primary' type='submit' value='Submit'>
                    <a id='' class='btn btn-danger' href='#' role='button' onclick='hideAuthenticateEditEmployeeProfile()'>Cancel </a>
                </td>
            </tr>
        </table>
    </div>
    </form>
    </div>";
    echo $dom;
}
function renderManagedTrip()
{
    $table = " <table class='table table-hover table-white' id='managedTrip'> <thead> <tr> <th scope='col'> Customer Name </th> <th scope='col'> Customer Phone </th> <th scope='col'> Tour Code </th> <th scope='col'> Tour Name </th> <th scope='col'> Destination </th> <th scope='col'> Departure date </th> <th scope='col'> Fee </th> <th scope='col'> Airline </th> <th scope='col'> Itenerary </th> <th scope='col'> Update </th> </tr> </thead> <tbody>";

    $today = date("Y-m-d");
    $sql = "SELECT B.Booking_ID,C.FName,C.LName,Trip.Trip_ID,T.TourCode,C.Phone_num,T.Name,T.Destination,Trip.Departure_date,Trip.Fee,Trip.Airline,E.username ,T.itinerary_url,C.username FROM Booking B INNER JOIN Customer C ON B.FK_C_username=C.username INNER JOIN Trip on Trip.Trip_ID=B.FK_Trip_ID INNER join Tour T on Trip.FK_TourCode=T.TourCode INNER JOIN Employee E on T.FK_E_username=E.username ";


    switch ($GLOBALS['position']) {
        case 'Manager':
            $whereClause = "WHERE Trip.Departure_date >= '$today'";
            break;

        case NULL:
            notPermit();
            break;

        default:
            $login_session = $GLOBALS['login_session'];
            $whereClause = "WHERE (E.username='$login_session') AND (Trip.Departure_date >= '$today') ";
            break;
    }
    echo $table;
    $query_sql = mysqli_query($GLOBALS['db'], $sql . $whereClause);
    while ($row = mysqli_fetch_assoc($query_sql)) {
        $ran = rand();
        echo "<tr ><td >{$row['FName']} {$row['LName']}</td><td id='customerPhone$ran' data-id='{$row['username']}'>{$row['Phone_num']}</td><td>{$row['TourCode']}</td><td>{$row['Name']}</td><td>{$row['Destination']}</td><td>{$row['Departure_date']}</td><td>RM {$row['Fee']}</td><td>{$row['Airline']}</td><td><a href='{$row[' itinerary_url']}'><img src='img/itenerary-dark.png' /></a> </td><td><a class='btn btn-primary text-white' role='button' onclick='makeUpdate(\"$ran\")' id='btn_$ran'>Update</a></td></tr>";
    }
    echo "</tbody></table>";
}

function renderTripManagement()
{
    $date = date("Y-m-d");
    $table = " <table border='0' class='table table-striped table-hover' id='TripTable'> <thead> <tr> <th scope='col'> Trip ID </th> <th scope='col'> Departure Date </th> <th scope='col'> Fee(RM) </th> <th scope='col'> Airline </th> <th scope='col'> Tour Code</th> <th scope='col'> Tour Name</th> <th scope='col'> Update </th> <th scope='col'> Delete </th> </tr> </thead><tbody> ";
    switch ($GLOBALS['position']) {
        case 'Manager':
            $area = "WHERE Tr.Departure_date>='$date'";
            break;

        case 'Tour Manager of Europe':
            $area = "WHERE (Category ='Europe') AND (Tr.Departure_date >='$date')";
            break;

        case 'Tour Manager of Asia':
            $area = "WHERE (Category ='Asia') AND (Tr.Departure_date >='$date')";
            break;

        case 'Tour Manager of Exotic':
            $area = "WHERE (Category ='Exotic') AND (Tr.Departure_date >='$date')";
            break;

        default:
            $login_session = $GLOBALS['login_session'];
            $area = "WHERE (FK_E_username='$login_session') AND (Tr.Departure_date >='$date')";
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

function renderTripManagementForm()
{
    include("list_all_flight.php");
    include("list_all_Tour.php");
    $airline = returnListAllFlight();
    $tourCode = returnAllTourName();
    $dom = "
    <table id='addTripForm' class='col-lg-8 modal table table-light table-striped '>
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
mysqli_close($db);
