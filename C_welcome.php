<?php
include('C_session.php');
include('config.php');
session_start();

if ($_SESSION['role']=="Employee") {
    echo"<script> alert('You seem Lost... Redirecting...'); window.history.go(-1);</script>";
}
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
    <style>
        body {
            background-color: black;
            background-image:
                radial-gradient(white, rgba(255, 255, 255, .2) 2px, transparent 40px),
                radial-gradient(white, rgba(255, 255, 255, .15) 1px, transparent 30px),
                radial-gradient(white, rgba(255, 255, 255, .1) 2px, transparent 40px),
                radial-gradient(rgba(255, 255, 255, .4), rgba(255, 255, 255, .1) 2px, transparent 30px);
            background-size: 550px 550px, 350px 350px, 250px 250px, 150px 150px;
            background-position: 0 0, 40px 60px, 130px 270px, 70px 100px;
        }
    </style>

</head>

<body>
    <?php
    include_once("php_common/nav.php");
    navbar("0");
    ?>
    <div class="row m-3">
        <!-- Select function -->
        <div class="list-group col-lg-2">
            <a class="list-group-item list-group-item-action bg-dark text-white" onclick="showprofile()" id="profile-btn"> Profile </a>
            <a class="list-group-item list-group-item-action bg-dark text-white" onclick="showManageTrip()" id="manage-trip-btn"> Booked Trip</a>
            <a class="list-group-item list-group-item-action bg-dark text-white" onclick="showBookTrip()" id="Book-trip-btn"> Book Another Trip</a>
        </div>

        <!-- Profile -->
        <div class="col-lg-10 d-none" id="Profile">
            <?php echo "<h1 class='text-center text-white'>Welcome! $position, $login_session </h1>"; ?>

            <form action="php_common/edit_customer_profile" method="post">
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
                            <input type="password" name="chk_password" class="form-control" required>
                            <input type="password" name="real_pass" hidden value="<?php echo $password; ?> ">
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
                        <td>Passport Number</td>
                        <td><input type="number" name="Passport" class="form-control" value="<?php echo $Passport; ?>">
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="Position" class="form-control" value="<?php echo $Email; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-center mx-auto">
                            <input type="submit" value="Update" class="btn btn-lg btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <!--Manage Trip -->
        <div class="col-lg-10 d-none" id="managed-trip">

            <?php
            //https://www.youtube.com/watch?v=pc0otVM80Sk
            echo "<h1 class='text-center text-white'>Welcome! $position, $login_session </h1>";

            $query_sql = mysqli_query($db, "SELECT
                B.Booking_ID ,
                B.FK_Trip_ID ,
                B.FK_C_username,
                Tour.TourCode ,
                Tour.Name ,
                T.Departure_date,
                T.Fee,
                Tour.itinerary_url
            FROM Booking B 
            inner JOIN Trip T on T.Trip_ID=B.FK_Trip_ID
            INNER JOIN Tour ON T.FK_TourCode=Tour.TourCode
            where B.FK_C_username='$login_session'");

            echo "<table border='1' class='table table-striped table-dark table-hover '>";
            echo "    <thead> 
            <tr>
               <td>            Booking ID          </td>
               <td>            Trip ID             </td>
               <td>            Tour Code           </td>
               <td>            Tour Name           </td>
               <td>            Departure Date      </td>
               <td>            Fee                 </td>
               <td>            Itinerary           </td>
           </tr>
           </thead>";

            while ($row = mysqli_fetch_assoc($query_sql)) {
                echo "
           <tr>
               <td>        {$row['Booking_ID']}            </td>
               <td>        {$row['FK_Trip_ID']}            </td>
               <td>        {$row['TourCode']}              </td>
               <td>        {$row['Name']}                  </td>
               <td>        {$row['Departure_date']}        </td>
               <td>RM        {$row['Fee']}.00              </td>
               <td><a href='{$row['itinerary_url']}'>
                   <img src='img/itenerary.png' />
               </a>                                        </td>
       
           </tr>";
            }
            echo "</table>
            
            <h3 class='text-white'> Once booked trip will not be refund, any cancelation must be contact by customer services </h3>";

            ?>
        </div>
        <div class="col-lg-10 d-none" id="book-trip">
            <div class="border border-dark col-11 col-sm-11 col-md-9 col-lg-8 col-xl-8 mx-auto mt-5 jumbotron">
                <form method="POST" class="form-signin p-2 " action="booking.php">
                    <h2 class="text-center mb-3">Book Your Trips Now !</h2>
                    <div>
                        <div class="form-group row bg-white">
                            <label for="username" class="col-sm-2 col-form-label">User Name :</label>
                            <div class="col-sm-10 border-left">
                                <input type="text" readonly class="form-control-plaintext" id="username" value="
                        <?php
                        include_once('C_session.php');
                        echo $login_session;
                        if ($login_session == NULL) {
                            echo (" Employee account detected! Bear in mind this is Booking Page for Customer used only !");
                        }
                        ?>
                        ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="TourCode" name="TourCode">
                                    <option selected hidden>Choose your Trips</option>
                                    <?php

                                    $tcode = $_GET['tcode'];
                                    echo $_GET['tcode'];
                                    include_once('itenerary.php');
                                    selecttour($tcode);



                                    if ($tcode == NULL) {
                                        include_once('itenerary.php');
                                        CallTour();
                                    }


                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Submit !" class="btn btn-lg btn-primary btn-block">
                </form>
            </div>

        </div>
        <div class="col-lg-10 d-block" id="welcome">
            <img src="img/E_welcome.jpg" class="mx-auto text-center">
        </div>

    </div>
    <script>
        //Button
        var y = document.getElementById('profile-btn');
        var y1 = document.getElementById('manage-trip-btn');
        var y2 = document.getElementById('Book-trip-btn');



        //Hiiden 
        var Z = document.getElementById('Profile');
        var Z1 = document.getElementById('managed-trip');
        var Z2 = document.getElementById('book-trip');

        //Welcome Page
        var a = document.getElementById('welcome');



        function showprofile() {
            if (Z.style.display === 'block') {
                z.classList.remove("d-block");
                Z.classList.add("d-none");
                a.classList.remove("d-none");
                a.classList.add("d-block");

            } else {
                Z.classList.add("d-block");
                a.classList.remove("d-block");
                a.classList.add("d-none");

                //Others 
                Z1.classList.remove("d-block");
                Z1.classList.add("d-none");

                Z2.classList.remove("d-block");
                Z2.classList.add("d-none");
            }
        }

        function showManageTrip() {
            if (Z1.style.display === 'block') {
                Z1.classList.remove("d-block");
                Z1.classList.add("d-none");

                a.classList.remove("d-none");
                a.classList.add("d-block");

            } else {
                Z1.classList.add("d-block");

                a.classList.remove("d-block");
                a.classList.add("d-none");

                //Others 
                Z.classList.remove("d-block");
                Z.classList.add("d-none");

                Z2.classList.remove("d-block");
                Z2.classList.add("d-none");
            }
        }

        function showBookTrip() {
            if (Z2.style.display === 'block') {
                Z2.classList.remove("d-block");
                Z2.classList.add("d-none");

                a.classList.remove("d-none");
                a.classList.add("d-block");

            } else {
                Z2.classList.add("d-block");

                a.classList.remove("d-block");
                a.classList.add("d-none");

                //Others 
                Z.classList.remove("d-block");
                Z.classList.add("d-none");

                Z1.classList.remove("d-block");
                Z1.classList.add("d-none");
            }
        }
    </script>

    <script>
        function dconfirm() {
            var r = confirm("You are about to delete a record ! \n Are you sure ?");
            if (r == FALSE) {
                location.reload();
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>