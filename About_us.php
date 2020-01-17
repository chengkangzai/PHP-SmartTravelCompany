<?php
session_start();
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = mysqli_real_escape_string($db, $_POST['Feedback']);
    if ($feedback!=""){
        $sql = "INSERT INTO Feedback (feedback) VALUES ('$feedback')";
        if (mysqli_query($db, $sql)) {
            echo("<script> alert('Thanks For your feedback');windows.location.href='../index.php'; </script>");
        } else {
            echo "Not really functioning well \nBelow are the error code\n" . mysqli_error($db);
        }
    }else {
        echo "<script>alert('You can not send an empty feedback'); </script>";
    }
}
mysqli_close($db);
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
        .newsletter-subscribe {
        color: #313437;
        background-color: #fff;
        padding: 50px 0;
    }

    .newsletter-subscribe p {
        color: #7d8285;
        line-height: 1.5;
    }

    .newsletter-subscribe h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 25px;
        line-height: 1.5;
        padding-top: 0;
        margin-top: 0;
        color: inherit;
    }

    .newsletter-subscribe .intro {
        font-size: 16px;
        max-width: 500px;
        margin: 0 auto 25px;
    }

    .newsletter-subscribe .intro p {
        margin-bottom: 35px;
    }

    .newsletter-subscribe form {
        justify-content: center;
    }

    .newsletter-subscribe form .form-control {
        background: #eff1f4;
        border: none;
        border-radius: 3px;
        box-shadow: none;
        outline: none;
        color: inherit;
        text-indent: 9px;
        height: 45px;
        margin-right: 10px;
        min-width: 250px;
    }

    .newsletter-subscribe form .btn {
        padding: 16px 32px;
        border: none;
        background: none;
        box-shadow: none;
        text-shadow: none;
        opacity: 0.9;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 13px;
        letter-spacing: 0.4px;
        line-height: 1;
    }

    .newsletter-subscribe form .btn:hover {
        opacity: 1;
    }

    .newsletter-subscribe form .btn:active {
        transform: translateY(1px);
    }

    .newsletter-subscribe form .btn-primary {
        background-color: #055ada !important;
        color: #fff;
        outline: none !important;
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
            <div class="newsletter-subscribe">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Feedback Form</h2>
                <p class="text-center">We are always happy recieve feedback from our users! Because that is that makes
                    us better!<br>Don't worry, Your Feedback will send anonymously!<br>Because we care about
                    your&nbsp;privacy!<br><br></p>
            </div>
            <form method="post">
                <div class="form-group">
                    <textarea name="Feedback" rows="10" class="form-control"placeholder="Enter your Feedback here :3"></textarea>
                    <input class="btn btn-primary mx-auto text-center mt-3" type="submit" value="submit"></div>
            </form>
        </div>
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