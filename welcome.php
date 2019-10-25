<?php
include('session.php');
session_start();

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once("php_common/nav.php");
    main_CSSandIcon("0", "1");
    ?>
    <title>Welcome! <?php echo $login_session ?> </title>
</head>

<body>
    <?php
    include_once("php_common/nav.php");
    navbar("0");
    ?>


    <div class="row">
        <h2 class="text-center col-lg-8">Welcome
            <?php echo $login_session; ?>, the <?php echo $position; ?> of Smart Travel!
        </h2>
        <div class="col-lg-4 ">
            <a href="logout.php" class="btn btn-lg btn-outline-danger" title="Log out">Log out </a>
        </div>

    </div>


    <div class="jumbotron">
        <h1 class="text-center">
            Below are the trip that managed by you
        </h1>
        <?php
        //https://www.youtube.com/watch?v=pc0otVM80Sk

        
        //Only Manager can register user
        if ($position == "Manager") {
            echo "<div class='text-center jumbotron'>";
            echo "<a href='register.php'>Add Employee Account  </a>";
            echo "</div";
        }

        ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>