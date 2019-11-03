<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <style>
        body {
            background: url(itinerary/Exotic/10XII.jpg) no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            color: black;
            background-attachment: fixed;
        }

        .Opacity-7 {
            opacity: 0.7;
        }

        .map-clean {
            color: #313437;
            background-color: #fff;
        }

        .map-clean p {
            color: #7d8285;
        }

        .map-clean h2 {
            font-weight: bold;
            margin-bottom: 40px;
            padding-top: 40px;
            color: inherit;
        }

        @media (max-width:767px) {
            .map-clean h2 {
                margin-bottom: 25px;
                padding-top: 25px;
                font-size: 24px;
            }
        }

        .map-clean .intro {
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto 40px;
        }

        .map-clean iframe {
            background-color: #eee;
        }
    </style>
    <?php
    include_once("php_common/nav.php");
    main_CSSandIcon("0", "1");
    ?>
</head>

<body>
<?php
    include_once("php_common/nav.php");
    navbar("0");
    preloader();
    ?>
    <div class="jumbotron py-3 m-0 text-center bg-white col-lg-12 Opacity-7">
        <h1>Contact Us !</h1>
        For futher infomation, please do not hesitate to contact us by using below infomation.

    </div>

    <div class="row m-0">
        <div class="col-lg-6 map-clean text-center ">
            <h2 class="text-primary ">
                Submit Your Feedback here !
            </h2>
            <div>
                <a href="Feedback.php" class="btn btn-lg btn-outline-dark">Feedback </a>
            </div>
        </div>
        <div class="col-lg-6">
        <div class="map-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Location </h2>
                <p class="text-center">Feel free to come to our headquarter which locate at Pudu, Kuala Lumpur</p>
            </div>
        </div><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAmHPAyIIGU5EzeGOpVrWT43l3YbGAYaWk&amp;q=Roytstar&amp;zoom=15" width="100%" height="450"></iframe>
    </div>
        </div>
    </div>


    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>