<?php
include("../config.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Trips</title>
    <style>
        .intro {
            display: none;
        }
        /*https://leaverou.github.io/css3patterns/# */
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
    <?php
    include_once("../php_common/nav.php");
    main_CSSandIcon("1", "1");
    ?>
    
</head>

<body class="bg-secondary">

    <?php
    include_once("../php_common/nav.php");
    navbar("1");
    ?>

    <form class="input-group my-3 p-3 input-group-lg col-lg-10 mx-auto" method="POST" action="search.php">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Tour Code</span>
        </div>
        <input type="text" class="form-control" placeholder="Type specific Tour Code" name="search_text">
        <div class="input-group-append">
            <input class="btn btn-light border" type="submit" id="button-addon2" value="Search">
        </div>
    </form>

    <div class="jumbotron col-lg-10 mx-auto">
        <h1 class="text-center mb-3">Most Popular Trips!</h1>

        <div class="row">
            <?php

            include_once("../php_common/nav.php");
            Trip_info('5BKK');
            Trip_info('5DPS');
            Trip_info('5HAN');
            Trip_info('5JBP');
            Trip_info('6TPE');
            Trip_info('7TPE');
            Trip_info('8EGNP');
            Trip_info('8ITL');
            Trip_info('11ELPS');
            Trip_info('14EGSA');
            Trip_info('14ESIMF');
            Trip_info('14EWP');
            Trip_info('8XSAB');
            Trip_info('9CAI');
            Trip_info('10XII');
            ?>

        </div>


    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</html>