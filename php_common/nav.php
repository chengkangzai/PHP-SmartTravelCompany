<?php
session_start();
function navbar()
{
    include('host.php');

    if ($_SESSION['login_user'] !== NULL && $_SESSION['role'] == "Employee") {
        //User Logged in
        echo "
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
            <a class='navbar-brand active font-weight-bold' href='$host/index.php'>Smart Holidays</a>
                  <!-- only shows with small screen (powered by javascipt and bootstrap CSS class) -->
               <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                   <!--The icon itself-->
                   <span class='navbar-toggler-icon'></span>
               </button>
               <!--Real nav start here-->
               <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                   <ul class='navbar-nav'>
                       <li class='nav-item'>
                           <a class='nav-link' href='$host/index.php'>Home <span class='sr-only'>(current)</span></a>
                       </li>
                       <li class='nav-item'>
                           <a class='nav-link' href='$host/trips/index.php'>Trips</a>
                       </li>
                       <li class='nav-item'>
                           <a class='nav-link' href='$host/About_us.php'>About Us</a>
                       </li>
                       <li class='nav-item'>
                       <a class='nav-link' href='$host/welcome'>Dashboard</a>
                        </li>
                       <li class='nav-item'>
                       <a href='$host/logout.php' class='btn btn-outline-primary nav-link text-right float-right ' title='Log out'>Log out </a>
                       </li>
                   </ul>
               </div>
           </nav>
        ";
    } elseif ($_SESSION['login_user'] !== NULL && $_SESSION['role'] == "Customer") {
        //User Logged in
        echo "
            <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
                <a class='navbar-brand font-weight-bold' href='$host/index.php'>Smart Holidays</a>
                      <!-- only shows with small screen (powered by javascipt and bootstrap CSS class) -->
                   <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                       <!--The icon itself-->
                       <span class='navbar-toggler-icon'></span>
                   </button>
                   <!--Real nav start here-->
                   <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                       <ul class='navbar-nav'>
                           <li class='nav-item '>
                               <a class='nav-link' href='$host/index.php'>Home <span class='sr-only'>(current)</span></a>
                           </li>
                           <li class='nav-item'>
                               <a class='nav-link' href='$host/trips/index.php'>Trips</a>
                           </li>
                           <li class='nav-item'>
                               <a class='nav-link' href='$host/About_us.php'>About Us</a>
                           </li>
                           <li class='nav-item'>
                           <a class='nav-link' href='$host/C_welcome'>Dashboard</a>
                            </li>
                           <li class='nav-item'>
                           <a href='$host/logout.php' class='btn btn-outline-primary nav-link text-right float-right ' title='Log out'>Log out </a>
                           </li>
                       </ul>
                   </div>
               </nav>
            ";
    } else {
        echo "
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
            <a class='navbar-brand font-weight-bold' href='$host/index.php'>Smart Holidays</a>
                  <!-- only shows with small screen (powered by javascipt and bootstrap CSS class) -->
               <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                   <!--The icon itself-->
                   <span class='navbar-toggler-icon'></span>
               </button>
               <!--Real nav start here-->
               <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                   <ul class='navbar-nav'>
                       <li class='nav-item '>
                           <a class='nav-link' href='$host/index.php'>Home <span class='sr-only'>(current)</span></a>
                       </li>
                       <li class='nav-item'>
                           <a class='nav-link' href='$host/trips/index.php'>Trips</a>
                       </li>
                       <li class='nav-item'>
                           <a class='nav-link' href='$host/About_us.php'>About Us</a>
                       </li>
                       <li class='nav-item'>
                       <a class='nav-link' href='$host/Login/index.php'>Login</a>
                        </li>
                   </ul>
               </div>
           </nav>
        ";
    }
}


function CallAllTour()
{
    include("../config.php");
    $sql = "SELECT TourCode FROM Tour";
    $sql_query = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($sql_query)) {
        $TourCode = $row['TourCode'];
        trip_info($TourCode);
    }
    mysqli_close($db);
}

function trip_info($tour_code){
    include('../config.php');
    $itenerary_sql = "SELECT T.TourCode,T.Name,T.Destination,T.itinerary_url,T.thumbnail_url,td.Point_1,td.Point_2,td.Point_3,td.Point_4,td.Des_1,td.Des_2,td.Des_3,td.Des_4
            FROM Tour T INNER JOIN Tour_des td on td.FK_TourCode=T.TourCode
            Where T.TourCode='$tour_code'";
    // Query it --> Its for all
    $itenerary_query = mysqli_query($db, $itenerary_sql);
    $itenerary_row = mysqli_fetch_array($itenerary_query, MYSQLI_ASSOC);
    $count = mysqli_num_rows($itenerary_query);
        
    if ($count == "1") {
        //Trip
        $itenerary = $itenerary_row['itinerary_url'];
        $Tour_name = $itenerary_row['Name'];
        $thumbnail = $itenerary_row['thumbnail_url'];
        $category = $itenerary_row['Destination'];
        //Hightlight 
        $P1 = $itenerary_row['Point_1'];
        $D1 = $itenerary_row['Des_1'];
        $P2 = $itenerary_row['Point_2'];
        $D2 = $itenerary_row['Des_2'];
        $P3 = $itenerary_row['Point_3'];
        $D3 = $itenerary_row['Des_3'];
        $P4 = $itenerary_row['Point_4'];
        $D4 = $itenerary_row['Des_4'];
        //Javasciprt Naming 
        //Generate random number 
        $ran1 = rand();
        $ran2 = rand();
        $ran3 = rand();
        echo    "<div class='col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4 border py-2 mx-auto'>
        <div class='embed-responsive embed-responsive-16by9'>
        <img src= '$thumbnail' class='img-fluid embed-responsive-item' />
        </div>
            <h3 class='text-capitalize'>$Tour_name</h3>
        <div class='mx-auto text-center'>
        Tour Code: $tour_code
        </div>
        <div class='mx-auto text-center'>
        Category: $category
        </div>
        ";
        echo    "
            <ul id='$ran2' class='intro p-3 mx-auto'>
            <h2 class='text-primary text-center'>Hightlight</h2> 
        ";
        echo    "
        <li>$P1$D1</li>
        <li>$P2$D2</li>
        <li>$P3$D3</li>
        <li>$P4$D4</li>
        </ul>
        ";
        echo    "
            <div>
            <a onclick='sss$ran1()' class='btn btn-dark mx-auto text-light' id='$ran3'>Expand</a>
                <script>
                function sss$ran1() {
                var x = document.getElementById('$ran2');
                var y = document.getElementById('$ran3');
                if (x.style.display === 'block') {
                    x.style.display = 'none'
                    y.innerHTML = 'Expand';
                } else {
                    x.style.display = 'block'
                    y.innerHTML = 'Hide';
                }
                }
                </script>
            <a href='$itenerary' class='btn btn-dark x-auto'>Itinerary </a>
            <a href='../booking.php?tcode=$tour_code' class='btn btn-danger x-auto'>Book now ! </a>
        </div>
        </div>
        ";
    } else {
        echo"<h3>No Tour Found <br> Please Type valid Tour Code</h3>";
    }
    mysqli_close($db);
}

function preloader()
{
        echo "
    <div id='overlay' style='z-index:999999'>
        <div class='spinner'></div>
    </div>
        <script>
            var overlay = document.getElementById('overlay');
            window.addEventListener('load', function() {
            overlay.style.display = 'none';})
        </script>";
}

function main_CSSandIcon($dir_layer, $bootstrap)
{
    if ($dir_layer == "0") {
        echo ("    
        <link rel='stylesheet' href='css/style.css'>
        <link rel='icon' href='icon.gif' type='image/gif' sizes='16x16'>
        ");
    } elseif ($dir_layer == "1") {
        echo ("
            <link rel='stylesheet' href='../css/style.css'>
            <link rel='icon' href='../icon.gif' type='image/gif' sizes='16x16'>  
            ");
    }
    if ($bootstrap == "1") {
        echo ("
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
        ");
    }
}

function notpremit()
{
    $user = $_SESSION['login_user'];
    echo ("
    <h1 class='text-center text-white'> Hi! $user, This functionality is not yet premit to used for you. </h1>
    <h3 class='text-center text-white'> Contact your domain adminstrator to evaluate your premission. </h3>
    <img src='https://carrierubin.files.wordpress.com/2015/10/sad-cartoon-boy.png' class='text-center'>
    ");
}