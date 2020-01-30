<?php
include("../config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $phoneNum = mysqli_real_escape_string($db, $_POST['phoneNumber']);
    $username = mysqli_real_escape_string($db, $_POST['id']);

    

    if (empty($phoneNum)) {
        echo "Phone Number shall not be empty";
    } else {
        if (!preg_match("/^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/", $phoneNum)) {
            echo "Please enter phone number with 60(Exp:60121234567)";
        } else {
            $phoneCheck = "1";
        }
    }
    

    if ($phoneCheck == "1") {
        $sql = "UPDATE Customer SET Phone_num=? WHERE username=?";
        if ($stmt = mysqli_prepare($db, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $phoneNum, $username);
            if (mysqli_stmt_execute($stmt)) {
                echo "success";
            }else {
                echo "error";
            }
        }
    }

}
