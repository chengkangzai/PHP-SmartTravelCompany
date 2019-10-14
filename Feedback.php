<?php
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = mysqli_real_escape_string($db, $_POST['Feedback']);
    $sql = "INSERT INTO Feedback (feedback) VALUES ('$feedback')";
    if (mysqli_query($db, $sql)) {
        header("Location:jump/Feedback.html");
    } else {
        echo "Not really functioning well \nBelow are the error code\n" . mysqli_error($db);
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
    <title>Feedback</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="jumbotron">
    <?php
    include_once("/php_common/nav.php");
    navbar();
    ?>

    <div>
        <h2 class="text-center">
            Feedback
        </h2>
    </div>
    <div class="border border-dark col-11 col-sm-11 col-md-9 col-lg-8 col-xl-8 mx-auto p-2">
        <form method="post" action="" class="form-signin p-2">

            <textarea name="Feedback" id="" cols="30" rows="10" class="form-control" placeholder="Enter your Feedback here :3"></textarea>
            <input type="submit" value="Submit !" class="btn btn-lg btn-primary btn-block my-2">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>