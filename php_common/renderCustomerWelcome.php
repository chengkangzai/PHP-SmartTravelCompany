<?php
session_start();

include("config.php");
include("nav.php");
include("../C_session.php");
include("../itenerary.php");
$welcomeText = "<h1 class='text-center welcomeText' >Welcome! $GLOBALS[login_session] </h1>";
$type = $_GET['type'];

function renderChangeProfilePasswordForm()
{
    $dom = "            
    <div class='mt-2' id='changeProfilePasswordForm' style='display:none'>
    <form action='php_common/edit_customer_profile.php?type=changePassword' method='POST'>
        <table class='table table-active table-striped border '>
            <thead>
                <tr>
                    <td colspan=2 class='text-center'>
                        <h2>Change Password</h2>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> Current Password</td>
                    <td> <input type='password' name='currPassword' id='currPassword' placeholder='Current Password'
                            class='form-control' required> </td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td> <input type='password' name='password1' id='password1' placeholder='Type Your New Password'
                            class='form-control' required> </td>
                </tr>
                <tr>
                    <td>Retype New Password</td>
                    <td> <input type='password' name='password2' id='password2' placeholder='Retype Your New Password'
                            class='form-control' required> </td>
                </tr>
                <tr>
                    <td colspan='2' class='text-center'> <input class='btn btn-primary' role='button' type='submit'> <a
                            class='btn btn-danger' href='#' role='button'
                            onclick='hideChangeProfilePasswordForm()'>Cancel </a> </td>
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
    $email = $GLOBALS['Email'];
    $Passport = $GLOBALS['Passport'];
    $phoneNumber = $GLOBALS['phone_number'];


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
                    <td> <input type='text' name='username' id='username' placeholder='$username' class='form-control'
                            disabled value='$username'> </td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td> <input type='text' name='fname' id='fname' placeholder='Type Your First Name'
                            class='form-control' value='$FName' required> </td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td> <input type='text' name='lname' id='lname' placeholder='Type Your Last Name'
                            class='form-control' value='$LName' required> </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td> <input type='text' name='email' id='email' placeholder='Type Your Email'
                    class='form-control' value='$email' required> </td>
                </tr>
                <tr>
                    <td>Passport</td>
                    <td> <input type='text' name='passport' id='passport' placeholder='Type Your passport'
                    class='form-control' value='$Passport'> </td>
                </tr>
                <tr>
                    <td>Phone Number </td>
                    <td> <input type='text' name='phoneNumber' id='phoneNumber' placeholder='Type Your phoneNumber'
                    class='form-control' value='$phoneNumber' required> </td>
                </tr>
                <tr>
                    <td colspan='2' class='text-center'> <a class='btn btn-primary' href='#' role='button'
                            onclick='showAuthenticateEditEmployeeProfile()'>Next</a> <a class='btn btn-danger' href='#'
                            role='button' onclick='hideChangeProfileInfoForm()'>Cancel </a> </td>
                </tr>
            </tbody>
        </table>
        <div id='authenticateEditEmployeeProfile'>
            <table class='table table-danger table-striped m-0 '>
                <tr>
                    <td colspan='2' class='text-center'>Authenticate </td>
                </tr>
                <tr>
                    <td>Current Password</td>
                    <td> <input name='currPassword' type='password'
                            placeholder='Type Your Current Password to Authenticate' class='form-control' required>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' class='text-center'> <input class='btn btn-primary' type='submit' value='Submit'> <a
                            class='btn btn-danger' href='#' role='button'
                            onclick='hideAuthenticateEditEmployeeProfile()'>Cancel </a> </td>
                </tr>
            </table>
        </div>
    </form>
</div>";
    echo $dom;
}

function renderBookedTripInfo()
{
    $login_session = $GLOBALS['login_session'];
    $date = date("Y-m-d");
    $sql = "SELECT B.Booking_ID , B.FK_Trip_ID , B.FK_C_username, Tour.TourCode , Tour.Name , T.Departure_date, T.Fee, Tour.itinerary_url FROM Booking B  INNER JOIN Trip T ON T.Trip_ID=B.FK_Trip_ID INNER JOIN Tour ON T.FK_TourCode=Tour.TourCode WHERE B.FK_C_username='$login_session' AND T.Departure_date>='$date'";

    $query_sql = mysqli_query($GLOBALS['db'], $sql);

    $table .= "<div class='border border-secondary p-2'><h3 class='text-center'><u>On going booked Trip</u></h3><table id='BookedTrip' class='table table-hover table-white'> <thead> <tr> <th>Booking ID</th> <th>Trip ID</th> <th>Tour Code</th> <th>Tour Name</th> <th>Departure Date</th> <th>Fee</th> <th>Itinerary</th> </tr> </thead> <tbody>";

    while ($row = mysqli_fetch_assoc($query_sql)) {
        $table .= "<tr> <td>{$row['Booking_ID']}</td> <td>{$row['FK_Trip_ID']}</td> <td>{$row['TourCode']}</td> <td>{$row['Name']}</td> <td>{$row['Departure_date']}</td> <td>RM{$row['Fee']}.00</td> <td> <a href='{$row['itinerary_url']}'> <img src='img/itenerary-dark.png' /> </a> </td> </tr>";
    }

    $table .= "</tbody> </table> <h4> Once booked trip will not be refund, any cancellation must be contact by customer services </h4> </div>";

    echo $table;
}

function renderPassBookedTripInfo(){
    $login_session = $GLOBALS['login_session'];
    $date = date("Y-m-d");
    $sql = "SELECT B.Booking_ID , B.FK_Trip_ID , B.FK_C_username, Tour.TourCode , Tour.Name , T.Departure_date, T.Fee, Tour.itinerary_url FROM Booking B  INNER JOIN Trip T ON T.Trip_ID=B.FK_Trip_ID INNER JOIN Tour ON T.FK_TourCode=Tour.TourCode WHERE B.FK_C_username='$login_session' AND T.Departure_date<='$date'";

    $query_sql = mysqli_query($GLOBALS['db'], $sql);

    $table .= "<div class='border border-secondary mt-1 p-2'><h3 class='text-center'><u>Past booked Trip</u></h3><table id='PassBookedTrip' class='table table-hover table-white'> <thead> <tr> <th>Booking ID</th> <th>Trip ID</th> <th>Tour Code</th> <th>Tour Name</th> <th>Departure Date</th> <th>Fee</th> <th>Itinerary</th> </tr> </thead> <tbody>";

    while ($row = mysqli_fetch_assoc($query_sql)) {
        $table .= "<tr> <td>{$row['Booking_ID']}</td> <td>{$row['FK_Trip_ID']}</td> <td>{$row['TourCode']}</td> <td>{$row['Name']}</td> <td>{$row['Departure_date']}</td> <td>RM{$row['Fee']}.00</td> <td> <a href='{$row['itinerary_url']}'> <img src='img/itenerary-dark.png' /> </a> </td> </tr>";
    }

    $table .= "</tbody> </table> </div>";

    echo $table;
}

function renderBookTripTool()
{
    $selection = returnTourSelection();
    $login_session = $GLOBALS['login_session'];
    $dom .= "<form method='POST' class='form-signin p-2 ' action='booking.php'> <div class='border border-dark col-11 col-sm-11 col-md-9 col-lg-8 col-xl-8 mx-auto mt-5 jumbotron'>  <h2 class='text-center mb-3'>Book Your Trips Now !</h2> <div> <div class='form-group row bg-white'> <label for='username' class='col-sm-2 col-form-label'>User Name :</label> <div class='col-sm-10 border-left'> <input type='text' readonly class='form-control-plaintext' id='username' value='";
    if ($login_session !== NULL) {
        $dom .= $login_session;
    } else {
        $dom .= "Employee account detected! Bear in mind this is Booking Page for Customer used only !";
    }

    $dom .= "'/> </div>  </div> <div class='form-group row'> <div class='input-group mb-3'> <select class='custom-select' id='TourCode' name='TourCode'> <option selected hidden>Choose your Trips</option>";
    $dom .= $selection;
    $dom .= "</select> </div> </div> </div> <input type='submit' value='Submit !' class='btn btn-lg btn-primary btn-block'/> </div> </form> ";
    echo $dom;
}


switch ($type) {
    case 'renderChangeProfilePasswordForm':
        renderChangeProfilePasswordForm();
        break;

    case 'renderChangeProfileInfoForm':
        renderChangeProfileInfoForm();
        break;

    case 'renderBookedTripInfo':
        renderBookedTripInfo();
        break;

    case 'renderBookTripTool':
        renderBookTripTool();
        break;
}
