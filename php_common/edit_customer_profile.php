<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
include_once("../config.php");

    $real_shapass=mysqli_real_escape_string($db,$_POST['real_pass']);
    $chk_password=sha1(mysqli_real_escape_string($db,$_POST['chk_password']));

    $password=mysqli_real_escape_string($db,$_POST['password']);
    $C_password=mysqli_real_escape_string($db,$_POST['C_password']);
    $securepass=sha1($password);

    $username=mysqli_real_escape_string($db,$_POST['username']);
    $FirstName=mysqli_real_escape_string($db,$_POST['FirstName']);
    $LastName=mysqli_real_escape_string($db,$_POST['LastName']);
    $Passport=mysqli_real_escape_string($db,$_POST['Passport']);
    $email=mysqli_real_escape_string($db,$_POST['email']);

    if (empty($password) && empty($C_password)) {
        $securepass=$real_shapass;
    }
if ($real_shapass == $chk_password && $password==$C_password ) {
    $sql="
    UPDATE `Customer` SET `password`='$securepass',`FName`='$FirstName',`LName`='$LastName',`Phone_num`='$Phone_num',`Email`='$email',`Passport`='$Passport' WHERE `username`='$username'";    
    if (mysqli_query($db,$sql)) {
        echo("<script> alert('Update Sucess!'); window.history.go(-1);</script>");    
    } 
} elseif ($real_shapass !== $chk_password) {
    echo ("<script> alert('Current Password Wrong!'); </script>");
    echo("<script> window.history.go(-1);</script>");
} elseif ($password !== $C_password) {
    echo ("<script> alert('New Password Wrong!'); </script>");
    echo("<script> window.history.go(-1);</script>");
}


}
?>