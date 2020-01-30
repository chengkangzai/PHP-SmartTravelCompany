<?php
include('session.php');
include('config.php');
include("php_common/renderWelcome.php");
session_start();
if ($_SESSION['role'] == "Customer") {
    echo "<script> alert('You seem Lost... Redirecting...'); window.history.go(-1);;</script>";
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
    <?php
    include_once("php_common/nav.php");
    main_CSSandIcon("0", "1");
    ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" />
    <style>
        .activePanel {
            background-color: blue;
            color: aliceblue
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 25%;
            top: 25%;
            width: 100%;
            /* Full width */
            height: 25%;
            overflow: hidden;
            background-color: whitesmoke;
        }

        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <?php
    include_once("php_common/nav.php");
    navbar("0");
    preloader();
    ?>
    <div class="row">
        <div class="list-group col-lg-2 p-3">
            <div class="row ">
                <div class="col-lg-10 m-0 pl-3 pr-0" id="sidePanel">
                    <a class="list-group-item list-group-item-action btn btn-primary" href='#' onclick="showFirstPanel()" id="profile-btn"> Profile </a>
                    <a class="list-group-item list-group-item-action btn btn-primary" href='#' onclick="showSecondPanel()" id="manage-trip-btn"> View Ongoing Trip</a>
                    <a class="list-group-item list-group-item-action btn btn-primary" href='#' onclick="showThirdPanel()" id="update-trip-btn"> Manage Trip</a>
                    <a class="list-group-item list-group-item-action btn btn-primary" href='#' onclick="showForthPanel()" id="delete-trip-btn"> Manage Tour</a>
                    <a class="list-group-item list-group-item-action btn btn-primary" href='welcome-old.php' onclick="showFifthPanel()" id="add-trip-btn"> (Old Page...)</a>
                    <a class="list-group-item list-group-item-action btn btn-primary" href='#' onclick="showSixthPanel()" id="add-tour-btn"> Add Tour(Deprecating) </a>
                    <a class="list-group-item list-group-item-action btn btn-primary" href='#' onclick="showSeventhPanel()" id="update-tour-btn"> Update Tour(Deprecating) </a>
                    <a class="list-group-item list-group-item-action btn btn-primary" href='#' onclick="showEighthPanel()" id="delete-tour-btn"> Delete Tour(Deprecating) </a>
                    <?php
                    if ($position == "Manager" || $position == "Assistant Manager") {
                        echo "<a class='list-group-item list-group-item-action' onclick='showFeedback()' id='feedback-btn'> Feedback</a>";
                        echo "<a class='list-group-item list-group-item-action' href='register.php' >Register Employee </a>";
                    }
                    ?>
                </div>
                <div class="col-lg-2 p-0 m-0 ">
                    <a id="hideShowSideBtn" value='hide/show' class="btn btn-primary hsbtn" role="button" onclick="hideSidePanel()" title="Click to close side panel">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-10" id="contentPanel1">
            <?php echo $GLOBALS['welcomeText']
            ?>
            <div id="switchProfilePanel">
                <a id="btnToggleProfilePasswordForm" class="btn btn-primary text-white" role="button" onclick="showChangeProfilePasswordForm()">Change Password</a>

                <a id="btnToggleProfileInfoForm" class="btn btn-primary text-white" role="button" onclick="showChangeProfileInfoForm()">Change Profile</a>
            </div>

            <?php   
            renderChangeProfileInfoForm();
            renderChangeProfilePasswordForm();
            ?>
        </div>
        <div class="col-lg-10" id="contentPanel2">
            <?php
            echo $GLOBALS['welcomeText'];
            renderManagedTrip();
            ?>
        </div>
        <div class="col-lg-10" id="contentPanel3">
            <?php
            echo $GLOBALS['welcomeText'];
            renderTripManagement();
            renderTripManagementForm();
            ?>

        </div>

        <div class="col-lg-10" id="contentPanel4">
            <?php
            echo $GLOBALS['welcomeText'];
            //renderTourManagement();

            ?>
        </div>
        <div class="col-lg-10" id="contentPanel5">
        </div>
        <div class="col-lg-10" id="contentPanel6">
            <?php
            echo $GLOBALS['welcomeText'];
            ?>
            <form action="php_common/add_tour_tourdes.php" method="post" enctype="multipart/form-data">
                <table class="table table-hover">
                    <tr>
                        <td>Tour Code</td>
                        <td><input type="text" name="TourCode" class="form-control " placeholder="Tour Code"></td>
                    </tr>
                    <tr>
                        <td>Tour Name</td>
                        <td><input type="text" name="TourName" class="form-control " placeholder="Tour Name"></td>
                    </tr>
                    <tr>
                        <td>Thumbnail Picture (jpg,jpeg,png)</td>
                        <td>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="pic" accept="image/*">
                                    <label class=" custom-file-label " for="pic">Choose picture</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Itenerary PDF</td>
                        <td>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input " name="itenerary" accept="application/pdf">
                                    <label class="custom-file-label " for="itenerary">Choose itenerary in pdf</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>
                            <select name="Category" class="custom-select">
                                <option value="Asia"> Asia</option>
                                <option value="Asia"> Exotic</option>
                                <option value="Asia"> Europe</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Destination</td>
                        <td>
                            <select name="Destination" class="custom-select">
                                <option value="Malaysia">Malaysia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Europe">Europe</option>
                                <option value="Italy">Italy</option>
                                <option value="Cairo">Cairo</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Arfica">Arfica</option>
                                <option value="China">China</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Tour Hightlight 1</td>
                        <td><textarea row="3" col="50" class="form-control" name="Point_1"></textarea></td>
                    </tr>
                    <tr>
                        <td>Tour Hightlight 1 Description</td>
                        <td><textarea row="3" col="50" class="form-control" name="Des_1"></textarea></td>
                    </tr>
                    <tr>
                        <td>Tour Hightlight 2</td>
                        <td><textarea row="3" col="50" class="form-control" name="Point_2"></textarea></td>
                    </tr>
                    <tr>
                        <td>Tour Hightlight 2 Description</td>
                        <td><textarea row="3" col="50" class="form-control" name="Des_2"></textarea></td>
                    </tr>
                    <tr>
                        <td>Tour Hightlight 3</td>
                        <td><textarea row="3" col="50" class="form-control" name="Point_3"></textarea></td>
                    </tr>
                    <tr>
                        <td>Tour Hightlight 3 Description</td>
                        <td><textarea row="3" col="50" class="form-control" name="Des_3"></textarea></td>
                    </tr>
                    <tr>
                        <td>Tour Hightlight 4</td>
                        <td><textarea row="3" col="50" class="form-control" name="Point_4"></textarea></td>
                    </tr>
                    <tr>
                        <td>Tour Hightlight 4 Description</td>
                        <td><textarea row="3" col="50" class="form-control" name="Des_4"></textarea></td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-center mx-auto">
                            <input type="submit" value="Add Tour" class="btn btn-lg btn-primary">
                        </td>
                    </tr>
                </table>
            </form>

        </div>
        <div class="col-lg-10" id="contentPanel7">
            <?php
            include("list_all_flight.php");
            returnListAllFlight();
            ?>
        </div>
        <div class="col-lg-10" id="contentPanel8">
        </div>
        <div class="col-lg-10" id="contentPanel9">
        </div>












        <div class="col-lg-10 " id="welcome" id="activePanel">

            <div class='embed-responsive embed-responsive-21by9 welcomeText'>
                <img src='img/E_welcome.jpg' class='img-fluid embed-responsive-item' />
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
    <script src="js/welcomeApp.js"></script>
    <script>
        function dconfirm() {
            var r = confirm("You are about to delete a record ! \n Are you sure ?");
            if (r == FALSE) {
                location.reload();
            }
        }

        var TripForm = $("#addTripForm").hide();

        function showAddTripForm() {
            TripForm.show();
        }
    </script>
</body>

</html>