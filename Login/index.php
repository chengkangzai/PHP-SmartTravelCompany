<?php
include('../config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from POST form 

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $safepass=sha1($password);

    // Customer 
    $sql = "SELECT username FROM Customer WHERE username = '$username' and password = '$safepass'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);

    //Employee
    $sql1 = "SELECT username FROM Employee WHERE username = '$username' and password = '$safepass'";
    $result1 = mysqli_query($db, $sql1);
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $active1 = $row1['active'];
    $count1 = mysqli_num_rows($result1);

    if ($count == 1) {
        $_SESSION['login_user'] = $username ;
        header("Location:../C_welcome.php");
    } elseif ($count1 == 1 ) {
        $_SESSION['login_user']=$username;
        header("Location:../welcome.php");
    }else {
        echo "<script> alert('Your Credential is invalid!'); </script>";
        header("Location:index.php");
    }
}



mysqli_close($db);
?>

<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    include("../php_common/nav.php");
    navbar();
    ?>
    <div id="particles-js">
        <form action="" method="post">
            <div class="login">
                <div class="login-top">
                    Login
                </div>
                <div class="login-center clearfix">
                    <div class="login-center-img"><img src="img/name.png" /></div>
                    <div class="login-center-input">
                        <input type="text" name="username" value="" placeholder="Enter Your User Name" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your user name '" autofocus />
                        <div class="login-center-input-text">User Name</div>
                    </div>
                </div>
                <div class="login-center clearfix">
                    <div class="login-center-img"><img src="img/password.png" /></div>
                    <div class="login-center-input">
                        <input type="password" name="password" value="" placeholder="Enter Your password" onfocus="this.placeholder=''" onblur="this.placeholder='Enter Your Password'" />
                        <div class="login-center-input-text">Password</div>
                    </div>
                </div>
                <div class="btn btn-primary btn-block col-md-10 mx-auto ">
                    <input type="submit" value="Submit" class="btn btn-primary col-md-12">
                </div>
            </div>
        </form>
        <div class="sk-rotating-plane"></div>
    </div>

    <!-- scripts -->
    <script src="js/particles.min.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">
        function hasClass(elem, cls) {
            cls = cls || '';
            if (cls.replace(/\s/g, '').length == 0) return false; //When no cls para, return "false"
            return new RegExp(' ' + cls + ' ').test(' ' + elem.className + ' ');
        }

        function addClass(ele, cls) {
            if (!hasClass(ele, cls)) {
                ele.className = ele.className == '' ? cls : ele.className + ' ' + cls;
            }
        }

        function removeClass(ele, cls) {
            if (hasClass(ele, cls)) {
                var newClass = ' ' + ele.className.replace(/[\t\r\n]/g, '') + ' ';
                while (newClass.indexOf(' ' + cls + ' ') >= 0) {
                    newClass = newClass.replace(' ' + cls + ' ', ' ');
                }
                ele.className = newClass.replace(/^\s+|\s+$/g, '');
            }
        }
        document.querySelector(".login-button").onclick = function() {
            addClass(document.querySelector(".login"), "active")
            setTimeout(function() {
                addClass(document.querySelector(".sk-rotating-plane"), "active")
                document.querySelector(".login").style.display = "none"
            }, 800)
            setTimeout(function() {
                removeClass(document.querySelector(".login"), "active")
                removeClass(document.querySelector(".sk-rotating-plane"), "active")

            }, 5000)
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>