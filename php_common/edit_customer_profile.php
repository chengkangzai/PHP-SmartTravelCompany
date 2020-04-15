<?php
include_once("../config.php");
include_once("../session.php");
include_once("nav.php");
session_start();
$type = $_GET['type'];
$securePassword = sha1($_POST['currPassword']);
$username = $_SESSION['login_user'];



function authenticate()
{
    if ($GLOBALS['securePassword'] == $GLOBALS['password']) {
        $authenticated = true;
        //$username=$GLOBALS['username'];
        //echo "You are Authenticated  as $username ";
    } else {
        $authenticated = false;
        //echo "Your password is wrong! \n";
        renderAlertInJs("Your password is wrong!");
        renderGoBackInJs();
        die();
    }
    return $authenticated;
    //See Authenticate if the password is correct
    //Return true if password is correct

}

function changePassword()
{
    authenticate();
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password1 == $password2) {
        if ($password1 !== "" || $password2 !== "") {
            if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,16}$/i", $password1)) {
                $passwordMatch = true;
            } else {
                $error .= "Password must be at least 4 characters, no more than 16 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit. Exp:ASDasd123";
            }
        } else {
            $error .= "Password Shall Not be empty";
        }
    } else {
        $error .= "Password does not match";
    }
    if ($_POST['bypass'] == "on") {
        $passwordMatch = true;
    }
    if ($passwordMatch == true) {
        $password = sha1($password1);
        $username = $GLOBALS['username'];
        $sql = "UPDATE `Customer` SET `password`='$password' WHERE `username`='$username'";
        if (mysqli_query($GLOBALS['db'], $sql)) {
            renderAlertInJs("Update Success \n You will be logged out");
            renderRedirectionInJS("../logout.php");
        } else {
            renderAlertInJs("There is some error when updating your Password\n Contact your server administrator ASAP");
        }
    } else {
        renderAlertInJs($error);
        renderGoBackInJs();
        die();
    }
}

function changeProfile()
{
    authenticate();
    $username = $GLOBALS['username'];
    $fName = $_POST['fname'];
    $lName = $_POST['lname'];
    $email = $_POST['email'];
    $passport = $_POST['passport'];
    $phoneNum = $_POST['phoneNum'];

    if ($fName !== "") {
        if (preg_match("/^[a-zA-Z ]*$/", $fName)) {
            $fNameChk = true;
        } else {
            $error .= "Only Letter and white Space allowed in First Name \n";
        }
    } else {
        $error .= "First Name Shall not be empty. \n";
    }

    if ($lName !== "") {
        if (preg_match("/^[a-zA-Z ]*$/", $lName)) {
            $lNameChk = true;
        } else {
            $error .= "Only Letter and white Space allowed in Last Name \n";
        }
    } else {
        $error .= "Last Name Shall not be empty. \n";
    }

    if ($email !== "") {
        $emailChk = true;
    } else {
        $error .= "Email Shall not be empty. \n";
    }

    if ($phoneNum !== "") {
        if (preg_match("/^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/", $phoneNum)) {
            $phoneNumChk = true;
        } else {
            $error .= "Please enter a legit malaysia phone number \n";
        }
    } else {
        $error .= "Phone number Shall not be empty. \n";
    }
    



    if ($fNameChk == true && $lNameChk == true && $emailChk == true &&$phoneNumChk == true) {
        $allCheck = true;
    }

    if (!empty($error)) {
        renderAlertInJs($error);
        echo $error;
    }

    if ($allCheck == true) {
        $sql = "UPDATE `Customer` SET `FName`=?,`LName`=?,`Phone_num`=?,`Email`=?,`Passport`=? WHERE username=?";
        if ($stmt = mysqli_prepare($GLOBALS['db'], $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssss", $fName, $lName, $phoneNum,$email,$passport, $username);
            if (mysqli_stmt_execute($stmt)) {
                echo "Success!";
                renderAlertInJs("Update Success!");
            } else {
                echo "Error when Execute ";
            }
        } else {
            echo "Error when Prepare";
        }
    } else {
        echo "Fail All check";
    }
    renderGoBackInJs();


    /*
    TODO
    0. Authenticate 
    1. Get information 
        1.1 Data Validation
    2. prepare SQL
    3. Execute SQL
    */
}


//Main Switch
switch ($type) {
    case 'changePassword':
        changePassword();
        break;

    case 'changeProfile':
        changeProfile();
        break;

    default :
        changeProfile();
    break;
};
mysqli_close($db);
