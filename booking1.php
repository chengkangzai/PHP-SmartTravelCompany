<?php
//check if user logged in and redirect
include('C_session.php');
session_start();

//POST data

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $username1 = str_replace(' ', '', $username);
    $Trip_id = mysqli_real_escape_string($db, $_POST['Trip_id']);

    $sql = "INSERT INTO Booking(FK_Trip_ID,FK_C_username) VALUES ('$Trip_id','$username1');
    ";
    if (mysqli_query($db, $sql)) {
        header("Location:jump/fake_payment.html");
    } else {
        echo $sql;
        echo "Not really functioning well \nBelow are the error code\n" . mysqli_error($db);
    };
    mysqli_close($db);

}


?>

<!--Put to 2 separate file and by using session, get the tour code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Page</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/shopping.css">
    <?php
    include_once("php_common/nav.php");
    main_CSSandIcon("0", "1");
    ?>
    <style>
        body {
            background-color: black;
            background-image: radial-gradient(white, rgba(255, 255, 255, .2) 2px, transparent 40px),
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
preloader();
?>

<div class="border border-dark col-11 col-sm-11 col-md-9 col-lg-8 col-xl-8 mx-auto mt-5 jumbotron">
    <form method="post" action="" class="form-signin p-2">
        <h2 class="text-center mb-3">Book Your Trips Now !</h2>
        <div>
            <div class="form-group row bg-white">
                <label for="username" class="col-sm-2 col-form-label">User Name :</label>
                <div class="col-sm-10 border-left">
                    <input type="text" readonly class="form-control-plaintext" name="username"
                           value="<?php
                           echo $login_session;
                           ?>">
                </div>
            </div>
            <div class="form-group row bg-white">
                <label for="username" class="col-sm-2 col-form-label">Tour Code :</label>
                <div class="col-sm-10 border-left">
                    <input type="text" readonly class="form-control-plaintext" name="Tour Code" value="
                    <?php
                    include_once('itenerary.php');
                    renderSelectedTrip($login_session);
                    ?>
                    ">
                </div>
            </div>
            <div class="form-group row">
                <div class="input-group mb-5">
                    <select class="custom-select" id="Trip" name="Trip_id" required>
                        <option selected hidden>Choose your Trips</option>
                        <?php
                        include_once('itenerary.php');

                        renderAvailableTripByTour($login_session);
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <!--<input type="submit" value="Submit !" class="btn btn-lg btn-primary btn-block mt-5">-->
        <a name="" id="" class="btn btn-lg btn-primary text-white" onclick="showModal()" role="button">Next</a>


</div>
<div id="id01" class="modal">
    <div class="row">
        <div class="col-75">
            <div class="container1" id="miao">
                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Mohammad ALi Bin Abdul" required>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" id="email" name="email" placeholder="TP012345@mail.apu.edu.my" required>
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="78,Jalan Mewah Taman Mutiara " required>
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city" placeholder="Kuala Lumpur" required>

                        <div class="row">
                            <div class="col-50">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" placeholder="KL" required
                                       onblur="uppercase()">
                            </div>
                            <div class="col-50">
                                <label for="zip">Zip</label>
                                <input type="number" id="zip" name="zip" placeholder="57000" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-50">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <label for="cname">Name on Card</label>
                        <input type="text" id="cname" name="cardname" placeholder="Mohammad Ali Bin Abdul" required>
                        <label for="ccnum">Credit card number</label>
                        <input type="number" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                        <label for="expmonth">Exp Month</label>
                        <input type="month" id="expmonth" name="expmonth" placeholder="September" required>
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Exp Year</label>
                                <input type="number" id="expyear" name="expyear" placeholder="2018" required>
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input type="number" id="cvv" name="cvv" placeholder="352" required>
                            </div>
                        </div>
                    </div>

                </div>
                <label>
                    <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                </label>
                <div>
                        <span>
                                <input type="reset" value="Reset this transaction"
                                       class="btn btn-lg btn-danger text-white" style="width: 33%">
                                <input type="submit" value="Continue to checkout"
                                       class="btn btn-lg btn-success text-white" style="width: 33%;">
                                <input type="reset" value="Cancel this transaction"
                                       class="btn btn-lg btn-danger text-white" style="width: 33%"
                                       onclick="hideModal()">
                            </span>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>
    function showModal() {
        $(".modal").show();
    }

    function hideModal() {
        $(".modal").hide();
    }
</script>
</body>

</html>