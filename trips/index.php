<?php
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.html">Smart Holidays</a>

        <!-- only shows with small screen (powered by javascipt and bootstrap CSS class) -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <!--The icon itself-->
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--Real nav start here-->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Trips</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../About_us.html">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login system
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../C_Login.php">Customer</a>
                        <a class="dropdown-item" href="../Login.php">Staff</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron col-lg-10 mx-auto">
        <h1 class="text-center mb-3">Most Popular Trips!</h1>
        <div class="row">
            <div class="col-lg-4 border py-2">
                <h3>
                    <img src="<?php

                                $tcode = "10XII";
                                include('itenerary.php');
                                echo $thumbnail;
                                ?>" alt="" class="img-fluid py-1">
                    <?php
                    $tcode = "10XII";
                    include('itenerary.php');
                    echo $Tour_name;
                    ?>
                    <span class="badge badge-secondary"> New</span>
                </h3>
                <div>
                    Tour Code: <?php
                                $tcode = "10XII";
                                include('itenerary.php');
                                echo $tcode;
                                ?>
                </div>
                <ul id="10XII_intro" class="intro">
                    <li>
                        Local 4 Star Hotel Accommodation
                    </li>
                    <li>
                        Excursion Bosphorus Cruise along Istanbul’s famous waterway dividing Europe and Asia 2 continents
                    </li>
                    <li>
                        Visit Turkey Treasury Palace ~ Topkapi Palace.
                    </li>
                    <li>
                        visit HIPPODROME is the scene of chariot races and the center of Byzantine civic life
                    </li>
                    <li>
                        visit EPHESUS ANCIENT CITY
                    </li>
                    <li>
                        Pamukkale (Cotton Castle) - surreal, brilliant white travertine terraces and warm, limpid pools of Pamukkale hang, recognize – by UNESCO World Heritage in 1988.
                    </li>
                </ul>

                <div class=" ">
                    <a onclick="hidden_10XII()" class="btn btn-dark mx-auto text-light" id="10XII_hide">
                        Expand
                    </a>
                    <script>
                        function hidden_10XII() {
                            var x = document.getElementById("10XII_intro");
                            var y = document.getElementById("10XII_hide");
                            if (x.style.display === "block") {
                                x.style.display = "none"
                                y.innerHTML = "Expand";
                            } else {
                                x.style.display = "block"
                                y.innerHTML = "Hide";
                            }
                        }
                    </script>
                    <a href=" 
                    <?php
                    $tcode = "10XII";
                    $sql = "select * from Tour where Tourcode = '$tcode'";
                    $query = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    $itenerary = $row['itinerary_url'];
                    $Tour_name = $row['Name'];
                    echo $itenerary;
                    ?>
                " class="btn btn-dark mx-auto">Itinerary </a>
                    <a href="../Booking.php" class="btn btn-dark mx-auto">Book now ! </a>
                </div>
            </div>
            <div class="col-lg-4 border py-2">
                <h3>
                    <img src="<?php
                                $tcode = "11ELPS";
                                include('itenerary.php');
                                echo $thumbnail;
                                ?>" alt="" class="img-fluid py-1">
                    <?php
                    $tcode = "11ELPS";
                    $sql = "select * from Tour where Tourcode = '$tcode'";
                    $query = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    $itenerary = $row['itinerary_url'];
                    $Tour_name = $row['Name'];
                    $thumbnail = $row['thumbnail_url'];
                    echo $Tour_name;
                    ?>
                    <span class="badge badge-danger"> Promo!</span>
                </h3>
                <div>Tour Code:
                    <?php
                    $tcode = "11ELPS";
                    include('itenerary.php');
                    echo $tcode;
                    ?>
                </div>
                <ul id="11ELPS_intro" class="intro">
                    <li>
                        <b> England,London</b> – Panoramic views of St Paul’s Cathedral, Tower Bridge, London Bridge, London Tower, Parliament House
                    </li>
                    <li>
                        <b> Eurostar</b> – by high speed train – London to Brussels,Belgium
                    </li>
                    <li>
                        <b> Belgium, Brussels</b> – View the Atomium, Grand Place, MannekenPis
                    </li>
                    <li>
                        <b> Holland, Amsterdam </b>– Enjoy Canal Cruise, Visit ZaanseSchaan – typical Dutch Village, Cheese Farm, Clog Factory, Windmills, Diamond Factory, Red Light District.
                    </li>
                    <li>
                        <b> Germany </b>– Local Germany Lunch + Black Forest Cake Dessert, travel thru the Romantic Black Forest Region, visit Lake Titi, Clock Factory, Heidelberg,
                    </li>
                    <li>
                        <b> Rhine fall</b> - View Europe’s biggest waterfall
                    </li>
                </ul>
                <div class=" ">
                    <a onclick="hidden_11ELPS()" class="btn btn-dark mx-auto text-light" id="11ELPS_hide">
                        Expand
                    </a>
                    <script>
                        function hidden_11ELPS() {
                            var x = document.getElementById("11ELPS_intro");
                            var y = document.getElementById("11ELPS_hide");
                            if (x.style.display === "block") {
                                x.style.display = "none"
                                y.innerHTML = "Expand";
                            } else {
                                x.style.display = "block"
                                y.innerHTML = "Hide";
                            }
                        }
                    </script>
                    <a href=" 
                    <?php
                    $tcode = "11ELPS";
                    $sql = "select * from Tour where Tourcode = '$tcode'";
                    $query = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    $itenerary = $row['itinerary_url'];
                    echo $itenerary;
                    ?>
                " class="btn btn-dark mx-auto">Itinerary </a>
                    <a href="../Booking.php" class="btn btn-dark mx-auto">Book now ! </a>
                </div>
            </div>
            <div class="col-lg-4 border py-2">
                <h3>
                    <img src="<?php
                                $tcode = "6TPE";
                                include('itenerary.php');
                                echo $thumbnail;
                                ?>" alt="" class="img-fluid py-1">

                    <?php
                    $tcode = "6TPE";
                    include('itenerary.php');
                    echo $Tour_name;
                    ?>
                    <span class="badge badge-primary"> Classic</span>
                </h3>
                <div>Tour Code:
                    <?php
                    $tcode = "6TPE";
                    include('itenerary.php');
                    echo $tcode;
                    ?>
                </div>
                <ul id="6TPE_intro" class="intro">
                    <li>
                        <b> Shilin Night Market </b> is a night market in the Shilin District of Taipei, Taiwan, and is often considered to be the largest and most famous night market in the city
                    </li>
                    <li>
                        <b>Sun Moon Lake</b> is in the foothills of Taiwan’s Central Mountain Range. It’s surrounded by forested peaks and has foot trails. Aboriginal Culture Village is a theme park with a section devoted to re-created indigenous villages
                    </li>
                    <li>
                        <b> Sun Moon Lake Wen Wu Temple</b> is a Wen Wu temple located on the perimeter of Sun Moon Lake in Yuchi Township, Nantou County, Taiwan
                    </li>
                    <li>
                        <b>Jiufen old street</b> is known for the narrow alleyways of its old town, packed with teahouses, streetfood shacks and souvenir shops. Near central Old Street is the Shengping Theater, established in the 1900s and since restored.
                    </li>
                </ul>
                <div class=" ">
                    <a onclick="hidden_6TPE()" class="btn btn-dark mx-auto text-light" id="6TPE_hide">
                        Expand
                    </a>
                    <script>
                        function hidden_6TPE() {
                            var x = document.getElementById("6TPE_intro");
                            var y = document.getElementById("6TPE_hide");
                            if (x.style.display === "block") {
                                x.style.display = "none"
                                y.innerHTML = "Expand";
                            } else {
                                x.style.display = "block"
                                y.innerHTML = "Hide";
                            }
                        }
                    </script>
                    <a href=" 
                    <?php
                    $tcode = "6TPE";
                    $sql = "select * from Tour where Tourcode = '$tcode'";
                    $query = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    $itenerary = $row['itinerary_url'];
                    echo $itenerary;
                    ?>
                " class="btn btn-dark mx-auto">Itinerary </a>
                    <a href="../Booking.php" class="btn btn-dark mx-auto">Book now ! </a>
                </div>
            </div>
        </div>


    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>