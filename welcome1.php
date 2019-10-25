<?php
include('session.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard -
        <?php echo $login_session ?>
    </title>
    <?php
    include_once("php_common/nav.php");
    main_CSSandIcon("0", "1");
    ?>
</head>

<body>
    <?php
    include_once("php_common/nav.php");
    navbar("0");
    ?>
    <div class="row m-3">
        <div class="list-group col-lg-2">
            <a class="list-group-item list-group-item-action">Profile</a>
            <a class="list-group-item list-group-item-action">View Managed Trip</a>
            <a class="list-group-item list-group-item-action">Update Trip</a>
            <a class="list-group-item list-group-item-action">Delete Trip</a>
            <a class="list-group-item list-group-item-action">Add Tour</a>
        </div>
        <div class="col-lg-10" id="Profile">
            <form action="php_common/edit_employee_profile" method="post">
                <table class="table table-dark table-striped table-hover table-bordered">
                    <tr>
                        <td>UserName</td>
                        <td><input class="form-control" type="text" value="<?php echo $login_session; ?>" name="username" disable></td>
                    </tr>
                    <tr>
                        <td>
                            Current Password
                        </td>
                        <td>
                            <input type="password" name="chk_password" id="" class="form-control">
                            <input type="password" name="real_pass" hidden value="<?php echo $password; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>New Password</td>
                        <td><input type="password" class="form-control" name="password" id="" value="" required></td>
                    </tr>
                    <tr>
                        <td>Confirm New Password</td>
                        <td><input type="password" class="form-control" name="C_password" id="" value="" required>
                    </td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" class="form-control" name="FirstName" value="<?php echo $FName; ?>"></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="LastName" class="form-control" value="<?php echo $LName; ?>"></td>
                    </tr>
                    <tr>
                        <td>IC Number</td>
                        <td><input type="number" name="IC" id="" class="form-control disabled" value="<?php echo $IC; ?>"  hidden><?php echo "<input class='form-control' value='$IC' disabled>" ?> </td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td><input type="text" name="Position" id="" class="form-control disabled" value="<?php echo $position; ?>" hidden> <?php echo "<input class='form-control' value='$position' disabled> " ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Belonging Agency</td>
                        <td>
                            <select name="Agency" id="" class="form-control">
                                <option value="" disabled hidden> Your Company</option>
                                <option value="RT" <?php if ($Agency == "RT") {
                                                        echo "selected";
                                                    } ?>>Roystar Travel and Tours Sdn Bhd</option>
                                <option value="HT" <?php if ($Agency == "HT") {
                                                        echo "selected";
                                                    } ?>>Hong Thai Travel and Tours Sdn Bhd </option>
                                <option value="MWH" <?php if ($Agency == "MWH") {
                                                        echo "selected";
                                                    } ?>>Pelancongan Mewah Sdn Bhd</option>
                                <option value="BTT" <?php if ($Agency == "BTT") {
                                                        echo "selected";
                                                    } ?>>BTT Travel Services Sdn Bhd</option>
                            </select>
                        </td>
                    </tr>
                    <td colspan="2">
                        <input type="submit" value="Update" class="btn btn-lg btn-primary text-center mx-auto">
                    </td>
                </table>
            </form>
        </div>
        <div class="col-lg-10 d-none" id="managed-trip">
            <table border='1' class='table table-striped table-dark table-hover '>";
                <thead>
                    <tr>
                        <th scope='col'> Customer Name </th>
                        <th scope='col'> Customer Phone </th>
                        <th scope='col'> Trip ID </th>
                        <th scope='col'> Tour Code </th>
                        <th scope='col'> Trip Name </th>
                        <th scope='col'> Destination </th>
                        <th scope='col'> Departure date </th>
                        <th scope='col'> Fee </th>
                        <th scope='col'> Airline </th>
                        <th scope='col'> Itinerary </th>
                    </tr>
                </thead>
                <?php
                $query_sql = mysqli_query($db, "SELECT B.Booking_ID,
                        C.FName,
                        C.LName,
                        Trip.Trip_ID,
                        T.TourCode,
                        C.Phone_num,
                        T.Name,
                        T.Destination,
                        Trip.Departure_date,
                        Trip.Fee,
                        Trip.Airline,
                        E.username ,
                        T.itinerary_url
                        FROM Booking B
                        INNER JOIN Customer C ON B.FK_C_username=C.username
                        INNER JOIN Trip on Trip.Trip_ID=B.FK_Trip_ID
                        INNER join Tour T on Trip.FK_TourCode=T.TourCode
                        INNER JOIN Employee E on T.FK_E_username=E.username
                        WHERE E.username='$login_session'");;

                while ($row = mysqli_fetch_assoc($query_sql)) {
                    echo "
                        <tbody>    
                        <tr>
                        <td>        {$row['FName']} {$row['LName']}     </td>
                        <td>        {$row['Phone_num']}                 </td>
                        <td>        {$row['Trip_ID']}                   </td>
                        <td>        {$row['TourCode']}                  </td>
                        <td>        {$row['Name']}                      </td>
                        <td>        {$row['Destination']}               </td>
                        <td>        {$row['Departure_date']}            </td>
                        <td>        RM {$row['Fee']}                       </td>
                        <td>        {$row['Airline']}                   </td>
                        <td>        <a href='{$row['itinerary_url']}'><img src='img/itenerary.png'/></a></td>

                        </tr>
                        </tbody>";
                }
                echo "</table>";
                ?>
        </div>
        <div class="col-lg-10" id="Update-Trip">
        </div>
        <div class="col-lg-10" id="Delete-Trip">
        </div>
        <div class="col-lg-10" id="Add-Tour">
        </div>
    </div>
</body>

</html>