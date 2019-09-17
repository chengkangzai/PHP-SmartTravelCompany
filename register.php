<?php
//https://www.tutorialrepublic.com/php-tutorial/php-mysql-insert-query.php
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $FName = mysqli_real_escape_string($db,$_POST['FName']);
    $LName = mysqli_real_escape_string($db,$_POST['LName']);
    $IC_num=mysqli_real_escape_string($db,$_POST['IC']);
    $Position = mysqli_real_escape_string($db,$_POST['Position']);

$sql="INSERT INTO Employee (username,password,FName,LName,IC_num,Position) VALUES ('$username','$password','$FName','$LName','$IC_num','$Position')";

if (mysqli_query($db,$sql)) {
    echo "Successfully Register!";
    header("Location:Login.php");
}else {
    echo "Not really functioning well \nBelow are the error code\n". mysqli_error($db);
};
    
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Register</title>
    </head>

    <body class="text-center jumbotron p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Smart Holidays</a>

            <!-- only shows with small screen (powered by javascipt and bootstrap CSS class) -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <!--The icon itself-->
                  <span class="navbar-toggler-icon"></span>
                </button>
            <!--Real nav start here-->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trips/index.html">Trips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="About_us.html">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login system
                      </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="C_Login.php">Customer</a>
                            <a class="dropdown-item" href="Login.php">Staff</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="jumbotron mx-auto p-2">
            <img src="img/logo.png" alt="Company's Logo " class="my-2 img-fluid">
        </div>
        <h1 class="mb-3">
            Staff register Page
        </h1>
        <div class="border border-dark col-11 col-sm-11 col-md-9 col-lg-8 col-xl-8 mx-auto p-2">
            <form method="post" action="" class="form-signin p-2">

                <input type="text" name="username" placeholder="Desired username" class="form-control" autofocus>
                <br>
                <input type="password" name="password" placeholder="Your Password " class="form-control">
                <br>
                <input type="text" name="FName" id="" placeholder="Your First Name" class="form-control">
                <br>
                <input type="text" name="LName" placeholder="Your Last Name" class="form-control">
                <br>
                <input type="number" name="IC" id="" placeholder="Your Idenditication Card Number" class="form-control" min=12 max=12>
                <br>
                <select name="Position" id="" class="form-control">
                    <option value="" disabled selected hidden> Your Position</option>
                    <option value="Manager">Manager</option>
                    <option value="Senior Sales">Senior Sales </option>
                    <option value="Junior Sales">Junior Sales</option>
                    <option value="Account Executive">Account Executive</option>
                </select>
                <br>
                <select name="Agency" id="" class="form-control">
                    <option value="" disabled selected hidden> Your Company</option>
                    <option value="RT">Roystar Travel and Tours Sdn Bhd</option>
                    <option value="HT">Hong Thai Travel and Tours Sdn Bhd </option>
                    <option value="MWH">Pelancongan Mewah Sdn Bhd</option>
                    <option value="BTT">BTT Travel Services Sdn Bhd</option>
                </select>
                <input type="submit" value="Submit !" class="btn btn-lg btn-primary btn-block">
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

    </html>