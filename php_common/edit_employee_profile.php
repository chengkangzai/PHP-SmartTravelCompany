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
    $IC_num=mysqli_real_escape_string($db,$_POST['IC']);
    $Position=mysqli_real_escape_string($db,$_POST['Position']);
    $Agency=mysqli_real_escape_string($db,$_POST['Agency']);

    
if ($real_shapass == $chk_password && $password==$C_password) {
    $sql="
    UPDATE Employee SET password='$securepass',FName='$FirstName',LName='$LastName',IC_num='$IC_num',Position='$Position',Agency='$Agency' WHERE username='$username'";    
    echo("<script> window.location.replace('http://chengkang.synology.me/test/php-assignment/welcome.php');
    </script>");
} elseif ($real_shapass !== $chk_password) {
    echo "Current Password Wrong! ";
} elseif ($password == $C_password) {
    echo "New Password wrong";
}


}
?>