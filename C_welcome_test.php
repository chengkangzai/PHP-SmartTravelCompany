<?php
include('C_session.php');
include('config.php');
include("php_common/renderCustomerWelcome.php");
session_start();

if ($_SESSION['role'] == "Employee") {
    header("Location:Login/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard -
        <?php echo $login_session ?>
    </title>
        <!-- Data table START -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" />
    <!-- Data table END -->
    <?php
    include_once("php_common/nav.php");
    main_CSSandIcon("0", "1");
    ?>
    <style>
        body {
            overflow-x: hidden;
        }

        .hsbtn {
            height: 100%;
            max-height: 605px;
            position: relative;
            z-index: 1;
        }

        #authenticateEditEmployeeProfile {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 40%;
            top: 40%;
            width: auto;
            /* Full width */
            height: auto;
            margin: 0 auto;
            overflow: hidden;
            background-color: whitesmoke;
        }
    </style>

</head>

<body>
    <?php
    include_once("php_common/nav.php");
    navbar("0");
    preloader();
    ?>
    <div class="row ">
        <!-- Select function -->
        <div class="list-group col-lg-2 p-3">
            <div class="row ">
                <div class="col-lg-10 m-0 pl-3 pr-0" id="sidePanel">
                    <a class="list-group-item list-group-item-action btn btn-primary" href='#' onclick="showFirstPanel()" id="profile-btn"> Profile </a>
                    <a class="list-group-item list-group-item-action btn btn-primary" href='#' onclick="showSecondPanel()" id="manage-trip-btn"> View Ongoing Trip</a>
                    <a class="list-group-item list-group-item-action btn btn-primary" href='#' onclick="showThirdPanel()" id="update-trip-btn"> Book another Trip</a>
                    <a class="list-group-item list-group-item-action btn btn-primary" href='#' onclick="showForthPanel()" id="delete-trip-btn"> Manage Tour</a>

                </div>
                <div class="col-lg-2 p-0 m-0 ">
                    <a id="hideShowSideBtn" value='hide/show' class="btn btn-primary hsbtn" role="button" onclick="hideSidePanel()" title="Click to close side panel">
                    </a>
                </div>
            </div>
        </div>

        <!-- Profile -->
        <div class="col-lg-10" id="contentPanel1">
            <?php echo $GLOBALS['welcomeText'] ?>
            <div>
                <a id="btnToggleProfilePasswordForm" class="btn btn-primary text-white" role="button" onclick="showChangeProfilePasswordForm()">Change Password</a>

                <a id="btnToggleProfileInfoForm" class="btn btn-primary text-white" role="button" onclick="showChangeProfileInfoForm()">Change Profile</a>
            </div>

            <?php
            renderChangeProfilePasswordForm();
            renderChangeProfileInfoForm();
            ?>

        </div>
        <!--Manage Trip -->
        <div class="col-lg-10" id="contentPanel2">
            <?php echo $GLOBALS['welcomeText'];
            renderBookedTripInfo();
            ?>
        </div>
        <div class="col-lg-10" id="contentPanel3">
            <?php echo $GLOBALS['welcomeText'];?>
            <div id="bookTripContainer">

            </div>
        </div>
        <div class="col-lg-10 pl-0" id="welcome">
            <div class='embed-responsive embed-responsive-21by9'>
                <img src='img/E_welcome.jpg' class='embed-responsive-item' />
            </div>
        </div>
    </div>

        <!--BOOTSTRAP START -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!--BOOTSTRAP END -->    
    <!-- Data Table START -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>
    <!--Data Table END -->
    <script>
        //Flex with AJAX a bit XD
        $.ajax({
            type: "GET",
            url: "php_common/renderCustomerWelcome.php",
            data: {
                type: 'renderBookTripTool'
            },
            success: function (response) {
                $("#bookTripContainer").replaceWith(response);
            }
        });
    </script>
    <script src="js/C_welcomeApp.js"></script>

</body>

</html>