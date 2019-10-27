<?php
include('session.php');
include('config.php');
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
        <!-- Select function -->
        <div class="list-group col-lg-2">
            <a class="list-group-item list-group-item-action" onclick="showprofile()"> Profile </a>
            <a class="list-group-item list-group-item-action disabled">------Trip--------</a>
            <a class="list-group-item list-group-item-action" onclick="showManageTrip()"> Managed Trip </a>
            <a class="list-group-item list-group-item-action" onclick="showUpdateTrip()"> Update Trip </a>
            <a class="list-group-item list-group-item-action" onclick="showdeletetrip()"> Delete Trip </a>
            <a class="list-group-item list-group-item-action disabled">------Tour--------</a>
            <a class="list-group-item list-group-item-action" onclick="showAddTour()"> Add Tour </a>
            <a class="list-group-item list-group-item-action" onclick="showUpdateTour()"> Update Tour </a>
            <a class="list-group-item list-group-item-action" onclick="showDeleteTour()"> Delete Tour </a>

        </div>

        <!-- Profile -->
        <div class="col-lg-10 d-none" id="Profile">
            <form action="php_common/edit_employee_profile" method="post">
                <table class="table table-dark table-striped table-hover table-bordered">
                    <tr>
                        <td>UserName</td>
                        <td><input class="form-control" type="text" value="<?php echo $login_session; ?>" name="username" disabled></td>
                    </tr>
                    <tr>
                        <td>
                            Current Password
                        </td>
                        <td>
                            <input type="password" name="chk_password" class="form-control">
                            <input type="password" name="real_pass" hidden value="<?php echo $password; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>New Password</td>
                        <td><input type="password" class="form-control" name="password" value="" required></td>
                    </tr>
                    <tr>
                        <td>Confirm New Password</td>
                        <td><input type="password" class="form-control" name="C_password" value="" required>
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
                        <td><input type="number" name="IC" class="form-control disabled" value="<?php echo $IC; ?>" hidden><?php echo "<input class='form-control' value='$IC' disabled>" ?> </td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td><input type="text" name="Position" class="form-control disabled" value="<?php echo $position; ?>" hidden>
                            <?php echo "<input class='form-control' value='$position' disabled> " ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Belonging Agency</td>
                        <td>
                            <select name="Agency" class="form-control">
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
        <!--Manage Trip -->
        <div class="col-lg-10 d-none" id="managed-trip">
            <table border='1' class='table table-striped table-dark table-hover '>
                <thead>
                    <tr>
                        <th scope='col'> Customer Name </th>
                        <th scope='col'> Customer Phone </th>
                        <th scope='col'> Trip ID </th>
                        <th scope='col'> Tour Code </th>
                        <th scope='col'> Tour Name </th>
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
                        WHERE E.username='$login_session'");

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
                        <td>        RM {$row['Fee']}                    </td>
                        <td>        {$row['Airline']}                   </td>
                        <td>        <a href='{$row['itinerary_url']}'>
                                    <img src='img/itenerary.png'/></a>  </td>

                        </tr>
                        </tbody>";
                }
                echo "</table>";
                ?>
        </div>
        <!-- Update Trip -->
        <div class="col-lg-10 d-block" id="Update-Trip">
            <!--GET managed trip -->

            <?php
            //iNNERJOIN, gET Tour Category, IF position and Tour Destination
            if ($position == "Tour Manager of Asia") {
                echo "<h1 class='text-center'>Welcome! $position, $login_session </h1>";

                //header of the table

                echo ("
                    <table border='0' class='table table-striped table-dark table-hover'>
                        <tr>
                            <th scope='col'> Trip ID </th>
                            <th scope='col'> Departure Date </th>
                            <th scope='col'> Fee(RM) </th>
                            <th scope='col'> Airline </th>
                            <th scope='col'> Tour Code</th>
                            <th scope='col'> Tour Name</th>
                            <th scope='col'> Update </th>
                        </tr>
                    ");

                //Select and edit the Trip
                $trip_asia_JOINED_sql = "SELECT  
                Tr.Trip_ID ,
                Tr.Departure_date,
                Tr.Fee,
                Tr.Airline,
                Tr.FK_TourCode,
                T.Name
                from Trip Tr inner JOIN Tour T on Tr.FK_TourCode=T.TourCode
                WHERE Category='Asia'
                ORDER BY Tr.Trip_ID ASC
";
                $trip_asia_JOINED_query = mysqli_query($db, $trip_asia_JOINED_sql);

                while ($trip_asia_row = mysqli_fetch_assoc($trip_asia_JOINED_query)) {
                    echo "
                    <form method='POST' action='php_common/edit_trip.php'>
                    <tbody>    
                    <tr>
                        <td>
                            <input value='{$trip_asia_row['Trip_ID']}' name='Trip_ID' hidden>
                            <input value='{$trip_asia_row['Trip_ID']}' class='form-control' disabled >
                        </td>
                        <td>        
                            <input value='{$trip_asia_row['Departure_date']}' name='Departure_date' class='form-control' type='date'>
                        </td>
                        <td>        
                            <input value='{$trip_asia_row['Fee']}' name='Fee' class='form-control' type='number'>
                        </td>
                        <td>        
                            <input value='{$trip_asia_row['Airline']}' name='Airline' class='form-control' type='text'>
                        </td>
                        <td>        
                            <input value='{$trip_asia_row['FK_TourCode']}' name='FK_TourCode' hidden>
                            <input value='{$trip_asia_row['FK_TourCode']}' class='form-control' disabled >
                        </td>
                        <td>        
                            <input value='{$trip_asia_row['Name']}' class='form-control' disabled>
                        </td>
                        <td>
                            <input type='submit' value='Update' class='btn btn-primary'>
                        </td>

                    </tr>
                    </tbody>
                    ";
                    echo ("</form>");
                }
                echo "</table>";
            } elseif ($position == "Tour Manager of Europe") {
                echo "<h1 class='text-center'>Welcome! $position, $login_session </h1>";

                //header of the table
                echo ("
                    <table border='0' class='table table-striped table-dark table-hover'>
                        <tr>
                            <th scope='col'> Trip ID </th>
                            <th scope='col'> Departure Date </th>
                            <th scope='col'> Fee(RM) </th>
                            <th scope='col'> Airline </th>
                            <th scope='col'> Tour Code</th>
                            <th scope='col'> Tour Name</th>
                            <th scope='col'> Update </th>
                        </tr>
                    ");

                //Select and edit the Trip
                $trip_Europe_JOINED_sql = "SELECT  
                        Tr.Trip_ID ,
                        Tr.Departure_date,
                        Tr.Fee,
                        Tr.Airline,
                        Tr.FK_TourCode,
                        T.Name
                        from Trip Tr inner JOIN Tour T on Tr.FK_TourCode=T.TourCode
                        WHERE Category='Europe'
                        ORDER BY Tr.Trip_ID ASC
                        ";
                $trip_Europe_JOINED_query = mysqli_query($db, $trip_Europe_JOINED_sql);

                while ($trip_Europe_row = mysqli_fetch_assoc($trip_Europe_JOINED_query)) {

                    echo "
                        <form method='POST' action='php_common/edit_trip.php'>
                        <tbody>    
                        <tr>
                            <td>
                                <input value='{$trip_Europe_row['Trip_ID']}' name='Trip_ID' hidden>
                                <input value='{$trip_Europe_row['Trip_ID']}' class='form-control' disabled >
                            </td>
                            <td>        
                                <input value='{$trip_Europe_row['Departure_date']}' name='Departure_date' class='form-control' type='date'>
                            </td>
                            <td>        
                                <input value='{$trip_Europe_row['Fee']}' name='Fee' class='form-control' type='number'>
                            </td>
                            <td>        
                                <input value='{$trip_Europe_row['Airline']}' name='Airline' class='form-control' type='text'>
                            </td>
                            <td>        
                                <input value='{$trip_Europe_row['FK_TourCode']}' name='FK_TourCode' hidden>
                                <input value='{$trip_Europe_row['FK_TourCode']}' class='form-control' disabled >                            
                            </td>
                            <td>        
                                <input value='{$trip_Europe_row['Name']}' class='form-control' disabled>
                            </td>
                            <td>
                                <input type='submit' value='Update' class='btn btn-primary'>
                            </td>

                        </tr>
                        </tbody>
                        ";
                    echo ("</form>");
                }
                echo "</table>";
            } elseif ($position == "Tour Manager of Exotic") {
                echo "<h1 class='text-center'>Welcome! $position, $login_session </h1>";

                //header of the table
                echo ("
                <table border='0' class='table table-striped table-dark table-hover'>
                    <tr>
                        <th scope='col'> Trip ID </th>
                        <th scope='col'> Departure Date </th>
                        <th scope='col'> Fee(RM) </th>
                        <th scope='col'> Airline </th>
                        <th scope='col'> Tour Code</th>
                        <th scope='col'> Tour Name</th>
                        <th scope='col'> Update </th>
                    </tr>
                ");

                //Select and edit the Trip
                $trip_Exotic_JOINED_sql = "SELECT  
                    Tr.Trip_ID ,
                    Tr.Departure_date,
                    Tr.Fee,
                    Tr.Airline,
                    Tr.FK_TourCode,
                    T.Name
                    from Trip Tr inner JOIN Tour T on Tr.FK_TourCode=T.TourCode
                    WHERE Category='Exotic'
                    ORDER BY Tr.Trip_ID ASC
                    ";
                $trip_Exotic_JOINED_query = mysqli_query($db, $trip_Exotic_JOINED_sql);

                while ($trip_Exotic_row = mysqli_fetch_assoc($trip_Exotic_JOINED_query)) {
                    echo "
                    <form method='POST' action='php_common/edit_trip.php'>
                    <tbody>    
                    <tr>
                        <td>
                            <input value='{$trip_Exotic_row['Trip_ID']}' name='Trip_ID' hidden>
                            <input value='{$trip_Exotic_row['Trip_ID']}' class='form-control' disabled >
                        </td>
                        <td>        
                            <input value='{$trip_Exotic_row['Departure_date']}' name='Departure_date' class='form-control' type='date'>
                        </td>
                        <td>        
                            <input value='{$trip_Exotic_row['Fee']}' name='Fee' class='form-control' type='number'>
                        </td>
                        <td>        
                            <input value='{$trip_Exotic_row['Airline']}' name='Airline' class='form-control' type='text'>
                        </td>
                        <td>        
                            <input value='{$trip_Exotic_row['FK_TourCode']}' name='FK_TourCode' hidden>
                            <input value='{$trip_Exotic_row['FK_TourCode']}' class='form-control' disabled >                          
                        </td>
                        <td>        
                            <input value='{$trip_Exotic_row['Name']}' class='form-control' disabled>
                        </td>
                        <td>
                            <input type='submit' value='Update' class='btn btn-primary'>
                        </td>

                    </tr>
                    </tbody>
                    ";
                    echo ("</form>");
                }
                echo "</table>";
            } elseif ($position == "Manager" || $position == "Assistant Manager") {
                echo "<h1 class='text-center'>Welcome! $position, $login_session </h1>";

                //header of the table
                echo ("
                <table border='0' class='table table-striped table-dark table-hover'>
                    <tr>
                        <th scope='col'> Trip ID </th>
                        <th scope='col'> Departure Date </th>
                        <th scope='col'> Fee(RM) </th>
                        <th scope='col'> Airline </th>
                        <th scope='col'> Tour Code</th>
                        <th scope='col'> Tour Name</th>
                        <th scope='col'> Update </th>
                    </tr>
                ");

                //Select and edit the Trip
                $trip_ALL_JOINED_sql = "SELECT  
                    Tr.Trip_ID ,
                    Tr.Departure_date,
                    Tr.Fee,
                    Tr.Airline,
                    Tr.FK_TourCode,
                    T.Name
                    from Trip Tr inner JOIN Tour T on Tr.FK_TourCode=T.TourCode
                    ORDER BY Tr.Trip_ID ASC
                    ";
                $trip_ALL_JOINED_query = mysqli_query($db, $trip_ALL_JOINED_sql);

                while ($trip_ALL_row = mysqli_fetch_assoc($trip_ALL_JOINED_query)) {
                    echo "
                        <form method='POST' action='php_common/edit_trip.php'>
                        <tbody>    
                        <tr>
                            <td>
                                <input value='{$trip_ALL_row['Trip_ID']}' name='Trip_ID' hidden>
                                <input value='{$trip_ALL_row['Trip_ID']}' class='form-control' disabled >
                            </td>
                            <td>        
                                <input value='{$trip_ALL_row['Departure_date']}' name='Departure_date' class='form-control' type='date'>
                            </td>
                            <td>        
                                <input value='{$trip_ALL_row['Fee']}' name='Fee' class='form-control' type='number'>
                            </td>
                            <td>        
                                <input value='{$trip_ALL_row['Airline']}' name='Airline' class='form-control' type='text'>
                            </td>
                            <td>        
                                <input value='{$trip_ALL_row['FK_TourCode']}' name='FK_TourCode' hidden>
                                <input value='{$trip_ALL_row['FK_TourCode']}' class='form-control' disabled >                          
                            </td>
                            <td>        
                                <input value='{$trip_ALL_row['Name']}' class='form-control' disabled>
                            </td>
                            <td>
                                <input type='submit' value='Update' class='btn btn-primary'>
                            </td>

                        </tr>
                        </tbody>
                        ";
                    echo ("</form>");
                }
                echo "</table>";
            } else {
                include_once("php_common/nav.php");
                notpremit();
            }

            ?>
        </div>
        <div class="col-lg-10 d-none" id="Delete-Trip">
            <!--Only Can delete trip that no one book-->
        </div>
        <div class="col-lg-10 d-none" id="Add-Tour">
        </div>
        <div class="col-lg-10 d-none" id="Update-Tour">
            <?php
            if ($position == "Tour Manager of Asia") {
                //Simple Welcome 
                echo "<h1 class='text-center'>Welcome! $position, $login_session </h1>";

                $sql_Asia = "SELECT * from Tour where category='Asia'";
                $query_Asia = mysqli_query($db, $sql_Asia);
                echo ("
                    <table border='0' class='table table-striped table-dark table-hover' id='Update_tour_table'>
                    <thead>
                        <tr>
                            <th scope='col'> Tour Code </th>
                            <th scope='col'> Tour Name </th>
                            <th scope='col'> Destination </th>
                            <th scope='col'> Itinerary </th>
                            <th scope='col'> Update </th>
                        </tr>
                    </thead>
                    ");
                while ($row_asia = mysqli_fetch_assoc($query_Asia)) {
                    echo "
                    <form method='POST' action='php_common/edit_tour.php'>
                    <tbody>    
                    <tr>
                        <td>
                            <input value='{$row_asia['TourCode']}' name='TourCode' hidden>
                            <input value='{$row_asia['TourCode']}' class='form-control' disabled>
                        </td>
                        <td>        
                            <input value='{$row_asia['Name']}' name='TourName' class='form-control'>
                        </td>
                        <td>        
                            <input value='{$row_asia['Destination']}' name='Destination' class='form-control'>
                        </td>
                        <td>        <a href='{$row_asia['itinerary_url']}'>
                                    <img src='img/itenerary.png'/></a>  
                            <input value='{$row_asia['itinerary_url']}' hidden name='itenerary'>
                        </td>
                        <td>
                            <input type='submit' value='Update' class='btn btn-primary'>
                        </td>

                    </tr>
                    </tbody>
                    ";
                    echo ("
                    <input value='{$row_asia['Category']}' name='Category' class='form-control' hidden>
                    <input value='{$row_asia['FK_E_username']}' name='FK_E_username' class='form-control' hidden>
                    <input value='{$row_asia['thumbnail_url']}' name='thumbnail_url' class='form-control' hidden>
                    ");
                    echo ("</form>");
                }
                echo "</table>";
            } elseif ($position == "Tour Manager of Europe") {
                echo "<h1 class='text-center'>Welcome! $position, $login_session </h1>";

                $sql_Europe = "SELECT * from Tour where category='Europe' ";
                $query_Europe = mysqli_query($db, $sql_Europe);
                echo ("
                    <table border='0' class='table table-striped table-dark table-hover '>
                    <thead>
                        <tr>
                            <th scope='col'> Tour Code </th>
                            <th scope='col'> Tour Name </th>
                            <th scope='col'> Destination </th>
                            <th scope='col'> Itinerary </th>
                            <th scope='col'> Update </th>
                        </tr>
                    </thead>
                    ");
                while ($row_Europe = mysqli_fetch_assoc($query_Europe)) {
                    echo "
                    <form method='POST' action='php_common/edit_tour.php'>
                        <tbody>    
                        <tr>
                            <td>
                                <input value='{$row_Europe['TourCode']}' name='TourCode' hidden>
                                <input value='{$row_Europe['TourCode']}' class='form-control' disabled>
                            </td>
                            <td>        
                                <input value='{$row_Europe['Name']}' name='TourName' class='form-control'>
                            </td>
                            <td>        
                                <input value='{$row_Europe['Destination']}' name='Destination' class='form-control'>
                            </td>
                            <td>        <a href='{$row_Europe['itinerary_url']}'>
                                        <img src='img/itenerary.png'/></a>  
                                <input value='{$row_Europe['itinerary_url']}' hidden name='itenerary'>
                            </td>
                            <td>
                                <input type='submit' value='Update' class='btn btn-primary'>
                            </td>
    
                        </tr>
                        </tbody>
                        ";
                    echo ("
                    <input value='{$row_Europe['Category']}' name='Category' class='form-control' hidden>
                    <input value='{$row_Europe['FK_E_username']}' name='FK_E_username' class='form-control' hidden>
                    <input value='{$row_Europe['thumbnail_url']}' name='thumbnail_url' class='form-control' hidden>
                    ");
                    echo ("
                    </form>");
                }
                echo "</table>";
            } elseif ($position == "Tour Manager of Exotic") {
                echo "<h1 class='text-center'>Welcome! $position, $login_session </h1>";

                $sql_Exotic = "SELECT * from Tour where category='Exotic' ";
                $query_Exotic = mysqli_query($db, $sql_Exotic);
                echo ("
                    <table border='0' class='table table-striped table-dark table-hover '>
                    <thead>
                        <tr>
                            <th scope='col'> Tour Code </th>
                            <th scope='col'> Tour Name </th>
                            <th scope='col'> Destination </th>
                            <th scope='col'> Itinerary </th>
                            <th scope='col'> Update </th>
                        </tr>
                    </thead>
                    ");
                while ($row_Exotic = mysqli_fetch_assoc($query_Exotic)) {
                    echo "
                    <form method='POST' action='php_common/edit_tour.php'>
                        <tbody>    
                        <tr>
                            <td>
                                <input value='{$row_Exotic['TourCode']}' name='TourCode' hidden>
                                <input value='{$row_Exotic['TourCode']}' class='form-control' disabled>
                            </td>
                            <td>        
                                <input value='{$row_Exotic['Name']}' name='TourName' class='form-control'>
                            </td>
                            <td>        
                                <input value='{$row_Exotic['Destination']}' name='Destination' class='form-control'>
                            </td>     
                            <td>        <a href='{$row_Exotic['itinerary_url']}'>
                                        <img src='img/itenerary.png'/></a>  
                                <input value='{$row_Exotic['itinerary_url']}' hidden name='itenerary'>
                            </td>
                            <td>
                                <input type='submit' value='Update' class='btn btn-primary'>
                            </td>
    
                        </tr>
                        </tbody>
                        ";
                    echo ("
                    <input value='{$row_Exotic['Category']}' name='Category' class='form-control' hidden>
                    <input value='{$row_Exotic['FK_E_username']}' name='FK_E_username' class='form-control' hidden>
                    <input value='{$row_Exotic['thumbnail_url']}' name='thumbnail_url' class='form-control' hidden>
                    ");
                    echo ("
                    </form>");
                }
                echo "</table>";
            } elseif ($position == "Manager" || $position == "Assistant Manager") {
                echo "<h1 class='text-center'>Welcome! $position, $login_session </h1>";

                $sql_ALL = "SELECT * FROM Tour";
                $query_ALL = mysqli_query($db, $sql_ALL);
                //Only Manager can change Category
                echo ("
                    <table border='0' class='table table-striped table-dark table-hover '>
                    <thead>
                        <tr>
                            <th scope='col'> Tour Code </th>
                            <th scope='col'> Tour Name </th>
                            <th scope='col'> Destination </th>
                            <th scope='col'> Category </th>
                            <th scope='col'> Managed by</th>
                            <th scope='col'> Itinerary </th>
                            <th scope='col'> Update </th>
                        </tr>
                    </thead>
                    ");
                while ($row_ALL = mysqli_fetch_assoc($query_ALL)) {
                    echo "
                    <form method='POST' action='php_common/edit_tour.php'>
                        <tbody>    
                        <tr>
                            <td>
                                <input value='{$row_ALL['TourCode']}' name='TourCode' hidden>
                                <input value='{$row_ALL['TourCode']}' class='form-control' disabled>
                            </td>
                            <td>        
                                <input value='{$row_ALL['Name']}' name='TourName' class='form-control'>
                            </td>
                            <td>        
                                <input value='{$row_ALL['Destination']}' name='Destination' class='form-control'>
                            </td>
                            <td>        
                                <input   name='Category' value='{$row_ALL['Category']}'class='form-control'>
                            </td>
                            <td>        
                            <input value='{$row_ALL['FK_E_username']}' name='FK_E_username' class='form-control'>
                            </td>
                            <td>        <a href='{$row_ALL['itinerary_url']}'>
                                        <img src='img/itenerary.png'/></a>  
                                <input value='{$row_ALL['itinerary_url']}' hidden name='itenerary'>
                            </td>
                            <td>
                                <input type='submit' value='Update' class='btn btn-primary'>
                            </td>
    
                        </tr>
                        </tbody>
                        ";
                    echo ("
                        <input value='{$row_ALL['thumbnail_url']}' name='thumbnail_url' class='form-control' hidden>
                        ");
                    echo ("</form>");
                }

                echo "</table>";
            } else {
                include_once("php_common/nav.php");
                notpremit();
            }
            ?>
        </div>
        <div class="col-lg-10 d-none" id="Delete-Tour">
        </div>
    </div>
    <script>
        var close = document.getElementsByClassName('Update_tour_table');
        close.style.display = 'none';
    </script>
</body>

</html>