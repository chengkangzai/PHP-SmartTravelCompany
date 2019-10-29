<?php
//https://www.tutorialrepublic.com/php-tutorial/php-mysql-insert-query.php
include("config.php");
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
    $safepass=sha1($password);
    $FName = mysqli_real_escape_string($db, $_POST['FName']);
    $LName = mysqli_real_escape_string($db, $_POST['LName']);
    $Phone_num = mysqli_real_escape_string($db, $_POST['Phone_num']);
    $Email = mysqli_real_escape_string($db, $_POST['Email']);
    $Passport = mysqli_real_escape_string($db, $_POST['Passport']);

    if (empty($username)) {
        $usernameErr = "Name is required";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
        $usernameErr = "Only letters and white space allowed";
        }else {
            $userchk="1";
        }
    }
    if (empty($LName)) {
        $LnameErr = "Last Name is required";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/",$LName)) {
        $LnameErr = "Only letters and white space allowed";
        }else {
            $LNamechk="1";
        }
    }
    if (empty($FName)) {
        $FnameErr = "First Name is required";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/",$FName)) {
        $FnameErr = "Only letters and white space allowed";
        }else {
            $FNamechk="1";
        }
    }
    if ($password !== $cpassword) {
        $CPassErr="Password not match!";
    }else {
        $CPasschk="1";
    }
    //http://regexlib.com/Search.aspx?k=password&AspxAutoDetectCookieSupport=1
    if (empty($password)) {
        $PassErr = "Password shall not be Empty";
    } else {
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,16}$/i",$password)) {
        $PassErr = "Password must be at least 4 characters, no more than 16 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit.";
        }    
            else {
            $passwordchk="1";
        }
    }

    if (empty($Phone_num)) {
        $PhoneErr="Phone Number shall not be empty";
    }else {
        if (!preg_match("/^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/",$Phone_num)) {
            $PhoneErr="Please enter phone number with 60(Malaysia Phone Code)";
        }else {
            $Phonechk="1";
        }
    }

    if (empty($Passport)) {
        $PassportErr="Phone Number shall not be empty";
    }else {
        if (!preg_match("/^[A-Z0-9<]{9}[0-9]{1}[A-Z]{3}[0-9]{7}[A-Z]{1}[0-9]{7}[A-Z0-9<]{14}[0-9]{2}$/",$Passport)) {
            $PassportErr="who can remember their passport number? use this example instead '1234567890ABC1234567A1234567<<<<<<<<<<<<<<12' :P";
        }else {
            $Passportchk="1";
        }
    }

    echo $userchk,$LNamechk,$FNamechk,$CPasschk,$Phonechk,$Passportchk,$passwordchk;
    
    if ($userchk==1 && $LNamechk==1 && $FNamechk==1 && $CPasschk==1 && $Phonechk==1 && $Passportchk==1 && $passwordchk==1) {
        $sql = "INSERT INTO Customer (username,password,FName,LName,Phone_num,Email,Passport) VALUES ('$username','$safepass','$FName','$LName','$Phone_num','$Email','$Passport')";
        if (mysqli_query($db, $sql)) {
            echo "Successfully Register!";
            header("Location:jump/Login.html");
        } else {
            echo "Not really functioning well \nBelow are the error code\n" . mysqli_error($db);
        }
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
    <?php
    include_once("php_common/nav.php");
    main_CSSandIcon("0","1");
    ?>
    <title>Customer Register Page</title>
    <style>
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
</head>

<body class="text-center jumbotron p-0">
    <?php
    include_once("php_common/nav.php");
    navbar("0");
    ?>


    <div class="jumbotron mx-auto p-2">
        <img src="img/logo.png" alt="Company's Logo " class="my-2 img-fluid">
    </div>
    <h1 class="mb-3">
        Customer register Page
    </h1>
    <div class="border border-dark col-11 col-sm-11 col-md-9 col-lg-8 col-xl-8 mx-auto p-2">
        <form method="post" action="" class="form-signin p-2">
            <div class="my-3">
                <input type="text" name="username" placeholder="Desired username" class="form-control" autofocus required>
                <span class="text-danger"> <?php echo $usernameErr,$c_usernameErr;?></span>
            </div>
            <div class="my-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <span class="text-danger"> <?php echo $PassErr;?></span>
            </div>
            <div class="my-3">
                <input type="password" name="cpassword" class="form-control" placeholder="Confirm Your Password" required>
                <span class="text-danger"> <?php echo $CPassErr;?></span>
            </div>
            <div class="my-3">
                <input type="text" name="FName" class="form-control" placeholder="First Name" required>
                <span class="text-danger"> <?php echo $FnameErr;?></span>
            </div>
            <div class="my-3">
                <input type="text" name="LName" class="form-control" placeholder="Last Name" required>
                <span class="text-danger"> <?php echo $LnameErr;?></span>
            </div>
            <div class="my-3">
                <input type="text" name="Phone_num" placeholder="Your Active Handphone number" class="form-control" required>
                <span class="text-danger"> <?php echo $PhoneErr;?></span>
            </div>
            <div class="my-3">
                <input type="email" name="Email" placeholder="Your email" class="form-control" required>
                <span class="text-danger"> <?php echo $EmailErr;?></span>
            </div>
            <div class="my-3">
                <input type="text" name="Passport" placeholder="Your Passport number" class="form-control" required >    
                <span class="text-danger"> <?php echo $PassportErr;?></span>
            </div>
                       
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