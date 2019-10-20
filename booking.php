<?php
//check if user logged in and redirect
include_once('C_session.php');

?>

<!--Put to 2 seperate file and by using session, get the tour code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    include_once("php_common/nav.php");
    navbar();
    ?>

    <div class="border border-dark col-11 col-sm-11 col-md-9 col-lg-8 col-xl-8 mx-auto jumbotron">
        <form method="post" action="" class="form-signin p-2">
            <h2 class="text-center mb-3">Book Your Trips Now !</h2>
            <div>
                <div class="form-group row bg-white">
                    <label for="username" class="col-sm-2 col-form-label">User Name :</label>
                    <div class="col-sm-10 border-left">
                        <input type="text" readonly class="form-control-plaintext" id="username" value="
                    <?php
                    include_once('session.php');
                    echo $login_session;
                    ?>
                    ">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="input-group mb-3">
                        <select class="custom-select" id="TourCode">
                            <option selected hidden>Choose your Trips</option>
                            <?php
                            include('itenerary.php');
                            CallTour();
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="Submit !" class="btn btn-lg btn-primary btn-block">
        </form>

    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>