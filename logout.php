<?php
session_start();

$_SESSION['role'] = NULL;
$_SESSION['login_user'] = NULL;
if (session_destroy()) {
    header("Location: Login/index.php");
}
?>