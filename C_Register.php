<?php
//https://www.tutorialrepublic.com/php-tutorial/php-mysql-insert-query.php
include("config.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $safepass=sha1($password);
    $FName = mysqli_real_escape_string($db, $_POST['FName']);
    $LName = mysqli_real_escape_string($db, $_POST['LName']);
    $Phone_num = mysqli_real_escape_string($db, $_POST['Phone_num']);
    $Email = mysqli_real_escape_string($db, $_POST['Email']);
    $Passport = mysqli_real_escape_string($db, $_POST['Passport']);



    $sql = "INSERT INTO Customer (username,password,FName,LName,Phone_num,Email,Passport) VALUES ('$username','$safepass','$FName','$LName','$Phone_num','$Email','$Passport')";

    if (mysqli_query($db, $sql)) {
        echo "Successfully Register!";
        header("Location:jump/Login.html");
    } else {
        echo "Not really functioning well \nBelow are the error code\n" . mysqli_error($db);
    };
}
mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once("php_common/nav.php");
    main_CSSandIcon("0","1");
    ?>
    <title>Customer Register Page</title>
</head>

<body class="text-center jumbotron p-0">
    <?php
    include_once("php_common/nav.php");
    navbar();
    ?>


    <div class="jumbotron mx-auto p-2">
        <img src="img/logo.png" alt="Company's Logo " class="my-2 img-fluid">
    </div>
    <h1 class="mb-3">
        Customer register Page
    </h1>
    <div class="border border-dark col-11 col-sm-11 col-md-9 col-lg-8 col-xl-8 mx-auto p-2">
        <form method="post" action="" class="form-signin p-2">

            <input type="text" name="username" placeholder="Desired username" class="form-control" autofocus required>
            <br>
            <input type="password" name="password" placeholder="Your Password " class="form-control" required>
            <br>
            <input type="text" name="FName" id="" placeholder="Your First Name" class="form-control" required>
            <br>
            <input type="text" name="LName" placeholder="Your Last Name" class="form-control" required>
            <br>
            <input type="text" name="Phone_num" placeholder="Your Active Handphone number" class="form-control" required min="9" max="11">
            <br>
            <input type="email" name="Email" placeholder="Your email" class="form-control" required>
            <br>
            <input type="text" name="Passport" placeholder="Your Passport number" class="form-control" required>
            <br>

            <br>
            <input type="submit" value="Submit !" class="btn btn-lg btn-primary btn-block">
        </form>

        <a href="Login.php">
            Have an Account?
        </a>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>