<?php
include($_SERVER['DOCUMENT_ROOT'] . "/test/php-assignment/php_common/" . "nav.php");
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
            background-image: radial-gradient(white, rgba(255, 255, 255, .2) 2px, transparent 40px),
            radial-gradient(white, rgba(255, 255, 255, .15) 1px, transparent 30px),
            radial-gradient(white, rgba(255, 255, 255, .1) 2px, transparent 40px),
            radial-gradient(rgba(255, 255, 255, .4), rgba(255, 255, 255, .1) 2px, transparent 30px);
            background-size: 550px 550px, 350px 350px, 250px 250px, 150px 150px;
            background-position: 0 0, 40px 60px, 130px 270px, 70px 100px;
        }

        .carousel {
            position: relative;
        }
    </style>
    <?php
        main_CSSandIcon("1", "1");
    ?>
</head>

<body class="bg-secondary">
<?php
navbar("1");
// preloader();

?>
<iframe width="100%" height="0" frameBorder="0" src="https://botmake.io/tour-chat?preview=yes"></iframe>
<div id="carouselId" class="carousel slide col-lg-6 mx-auto " data-ride="carousel">
    <div class="carousel-inner" role="listbox" id="carousel-inner">
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<form class="input-group my-3 p-3 input-group-lg col-lg-10 mx-auto " method="POST"
      action="https://chengkang.synology.me/test/php-assignment/trips/index.php?type=TourCode" id="formID">
    <div class="input-group-prepend">
        <span class="input-group-text bg-info text-white" id="trigger" onclick="changeToName()"
              title='Click me to change search Method !'>Tour Code</span>
    </div>
    <input type="text" class="form-control" placeholder="Type specific TourCode" required name="TourCode" id="Input">
    <div class="input-group-append">
        <input class="btn btn-light border" type="submit" id="button-addon2" value="Search">
    </div>
</form>

<div class="jumbotron col-lg-10 mx-auto">
    <div class="row">
        <?php
        include_once($_SERVER['DOCUMENT_ROOT'] . "/test/php-assignment/" . "config.php");
        $type = $_GET['type'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $Tour_Code = mysqli_real_escape_string($db, $_POST['TourCode']);
            $Tour_Name = mysqli_real_escape_string($db, $_POST['TourName']);
            $Category = mysqli_real_escape_string($db, $_POST['Category']);
            switch ($type) {
                case 'TourCode':
                    trip_info($Tour_Code);
                    break;

                case 'TourName':
                    $sql = "SELECT * from Tour WHERE Name LIKE '%$Tour_Name%'";
                    $query = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $tourCode = $row['TourCode'];
                        trip_info($tourCode);
                    }
                    mysqli_close($db);
                    break;

                case 'Category':
                    $sql = "SELECT * from Tour WHERE Category LIKE '%$Category%'";
                    $query = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $tourCode = $row['TourCode'];
                        trip_info($tourCode);
                    }
                    mysqli_close($db);
                    break;

                default:
                    CallAllTour();
                    break;
            }
        } else {
            //if the user is open by a "GET" method
            $Tour_Code = $_GET['TourCode'];
            $Tour_Name = $_GET['TourName'];
            $Category = $_GET['Category'];
            switch ($type) {
                case 'TourCode':
                    trip_info($Tour_Code);
                    break;

                case 'TourName':
                    $sql = "SELECT * from Tour WHERE Name LIKE '%$Tour_Name%'";
                    $query = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $tourCode = $row['TourCode'];
                        trip_info($tourCode);
                    }
                    mysqli_close($db);
                    break;

                case 'Category':
                    $sql = "SELECT * from Tour WHERE Category LIKE '%$Category%'";
                    $query = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $tourCode = $row['TourCode'];
                        trip_info($tourCode);
                    }
                    mysqli_close($db);
                    break;

                default:
                    CallAllTour();
                    break;
            }
        }
        ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="app.js"></script>

</html>