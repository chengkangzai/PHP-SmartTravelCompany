<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sucessfully logged in </title>
</head>
<body>
    <?php
    session_start();
    if (!isset(($_SESSION['logged_in']) || $_SESSION['logged_in'] == FALSE)) {
        header("Location:index.php");
    }
    ?>

    <h2>logged_in</h2>
</body>
</html>