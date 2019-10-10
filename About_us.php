<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    </style>
</head>

<body>
    <?php
include("php_common/nav.php");
   ?>
    <div class="jumbotron py-3 m-0 text-center bg-white col-lg-12 Opacity-7">
        <h1>Contact Us !</h1>
        For futher infomation, please do not hesitate to contact us by using below infomation.

    </div>

    <div class="row m-0 ">
        <div class="col-lg-6 jumbotron">
            <h2>Asia Pacific University of Technology & Innovation</h2>
            <p> Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p>
            <hr />
            <p> <b>Traning Point: </b>Ground Floor, Beside Auditorium 5 </p>
            <p>
                <b>Contact Number:</b> +60 12 333 6666
            </p>
            <p>
                <b>Email : </b> aputaekwondofamily@gmail.com
            </p>
            <p class="break_word">
                <b>Facebook : </b>
                <a href="https://www.facebook.com/APUTaekwondoClub/">https://www.facebook.com/APUTaekwondoClub/</a>
            </p>
            <a href="Feedback.php">
                <button class="Contact_button btn btn-lg btn-outline-dark">
                    Submit Feedback
                </button>
            </a>

        </div>
        <div class="col-lg-6 jumbotron bg-info">
            <h2> Where are we?</h2>
            <div id="map">

            </div>

        </div>
    </div>

    <script>
    function initMap() {
        var options = {
            zoom: 15,
            center: {
                lat: 3.0551,
                lng: 101.7008
            }

        }
        var map = new google.maps.Map(document.getElementById('map'), options);
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4ynZXNBtkssLgCnHqiduKpVtzUOJd7tw&callback=initMap"
        async defer></script>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>