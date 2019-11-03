<?php
include("config.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
    $safepass = sha1($password);
    $FName = mysqli_real_escape_string($db, $_POST['FName']);
    $LName = mysqli_real_escape_string($db, $_POST['LName']);
    $IC_num = mysqli_real_escape_string($db, $_POST['IC']);
    $Position = mysqli_real_escape_string($db, $_POST['Position']);
    $Agency = mysqli_real_escape_string($db, $_POST['Agency']);

    if (empty($username)) {$usernameErr = "Name is required";}
     else {
        if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
        $usernameErr = "Only letters and white space allowed";
        }else {$userchk="1";}
    }
    if (empty($LName)) {$LnameErr = "Last Name is required";}
     else {
        if (!preg_match("/^[a-zA-Z ]*$/",$LName)) {
        $LnameErr = "Only letters and white space allowed";
        }else {$LNamechk="1";}
    }

    if (empty($FName)) {$FnameErr = "First Name is required";} else {
        if (!preg_match("/^[a-zA-Z ]*$/",$FName)) {
        $FnameErr = "Only letters and white space allowed";
        }else {$FNamechk="1";}
    }

    //https://www.regextester.com/109947
    if (empty($IC_num)) {
        $ICErr = "IC shall not be empty";
    } else {
        if (!preg_match("/(([[0-9]{2})(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01]))-([0-9]{2})-([0-9]{4})/",$IC_num)) {
        $ICErr = "Please Enter proper Malaysian IC with dash(-) Exp:700529-01-3007";
        }else {$IC_numchk="1";}
    }
  
    if ($password !== $cpassword) {
        $CPassErr="Password not match!";
    }else {
        $CPasschk="1";
    }

    //http://regexlib.com/Search.aspx?k=password&AspxAutoDetectCookieSupport=1
    if (empty($password)) {$PassErr = "Password shall not be Empty";}
    else {
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,16}$/i",$password)) {
        $PassErr = "Password must be at least 4 characters, no more than 16 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit. Exp:ASDasd123";
        }else {$passwordchk="1";}
    }

    if (empty($Position)) {$PositionErr ="Please choose a position";} 
    else {$Positionchk="1";}
    
    if (empty($Agency)) {$AgencyErr ="Please choose a Agency";
    }else {$Agencychk="1";}
    
    $c_Sql="Select username FROM Customer WHERE username='$username'";
    $c_query=mysqli_query($db,$c_Sql);
    $c_row=mysqli_num_rows($c_query);

    if ($c_row=="1") {$c_usernameErr="Duplicate Username, please choose another username";
    }else {$c_userchk="1";}
    
    if ($Agencychk==1 and $FNamechk==1 and $LNamechk==1 and $passwordchk==1 and $Positionchk==1 and $IC_numchk==1 and $userchk==1 and $c_userchk==1 and $CPasschk =="1") {
        $sql = "INSERT INTO Employee (username,password,FName,LName,IC_num,Position,Agency) VALUES ('$username','$safepass','$FName','$LName','$IC_num','$Position','$Agency')";
        if (mysqli_query($db, $sql)) {header("Location:welcome.php");
        } elseif(mysqli_error($db)) {echo "<script> alert('Please choose another Username'); </script> ";}
    }
}
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
    <title>Register</title>
</head>

<body class="text-center jumbotron p-0">
    <?php
    include_once("php_common/nav.php");
    navbar("0");
    preloader();
    ?>
    <div class="jumbotron mx-auto p-2">
        <img src="img/logo.png" alt="Company's Logo " class="my-2 img-fluid">
    </div>
    <h1 class="mb-3">
        Staff register Page
    </h1>
    <div class="border border-dark col-11 col-sm-11 col-md-9 col-lg-6 col-xl-8 mx-auto p">
<form method="post" class="form-signin p-2">
    <div class="my-3">
        <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
        <span class="text-danger"> <?php echo $usernameErr,$c_usernameErr;?></span>
    </div>
    <div class="my-3">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="text-danger"> <?php echo $PassErr;?></span>
    </div>
    <div class="my-3">
        <input type="password" name="cpassword" class="form-control" placeholder="Confirm Your Password">
        <span class="text-danger"> <?php echo $CPassErr;?></span>
    </div>
    <div class="my-3">
        <input type="text" name="FName" class="form-control" placeholder="First Name">
        <span class="text-danger"> <?php echo $FnameErr;?></span>
    </div>
    <div class="my-3">
        <input type="text" name="LName" class="form-control" placeholder="Last Name">
        <span class="text-danger"> <?php echo $LnameErr;?></span>
    </div>
    <div class="my-3">
        <input type="text" name="IC" class="form-control" placeholder="IC Number">
        <span class="text-danger"> <?php echo $ICErr;?></span>
    </div>
    <div class="my-3">
        <select name="Position" class="form-control" required>
            <option value="" disabled selected hidden> Position</option>
            <option value="Manager">Manager</option>
            <option value="Tour Manager of Asia">Tour Manager of Asia</option>
            <option value="Tour Manager of Exotic">Tour Manager of Exotic</option>
            <option value="Tour Manager of Europe">Tour Manager of Europe</option>
            <option value="Senior Sales">Senior Sales </option>
            <option value="Junior Sales">Junior Sales</option>
            <option value="Account Executive">Account Executive</option>
        </select>
        <span class="text-danger"> <?php echo $PositionErr; ?> </span>
    </div>
    <div class="my-3">
        <select name="Agency" class="form-control" required>
            <option value="" disabled selected hidden> Your Company</option>
            <option value="RT">Roystar Travel and Tours Sdn Bhd</option>
            <option value="HT">Hong Thai Travel and Tours Sdn Bhd </option>
            <option value="MWH">Pelancongan Mewah Sdn Bhd</option>
            <option value="BTT">BTT Travel Services Sdn Bhd</option>
        </select>
        <span class="text-danger"> <?php echo $AgencyErr ;?></span>
    </div>
    <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary">
</form>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>