<?php
include("C_session.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome <?php echo $login_session ?> </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    include("php_common/nav.php");
    ?>
    <h2>
        Welcome ! our beloved Customer <?php echo $FName . ' ' . $LName ?>
    </h2>
    <div class="jumbotron">
        <h2 class="text-center">Below Are the Trip that you booked</h2>
        <?php
        //https://www.youtube.com/watch?v=pc0otVM80Sk

        $query_sql = mysqli_query($db, "SELECT
 B.Booking_ID ,
 B.FK_Trip_ID ,
 B.FK_C_username,
 Tour.TourCode ,
 Tour.Name ,
 T.Departure_date,
 T.Fee,
 Tour.itinerary_url
FROM Booking B 
inner JOIN Trip T on T.Trip_ID=B.FK_Trip_ID
INNER JOIN Tour ON T.FK_TourCode=Tour.TourCode
where B.FK_C_username='$login_session'");

        echo "<table border='1' class='table table-striped table-dark table-hover '>";
        echo "    <thead> 
    <tr>
        <td>            Booking ID          </td>
        <td>            Trip ID             </td>
        <td>            Tour Code           </td>
        <td>            Tour Name           </td>
        <td>            Departure Date      </td>
        <td>            Fee                 </td>
        <td>            Itinerary           </td>
    </tr>
    </thead>";

        while ($row = mysqli_fetch_assoc($query_sql)) {
            echo "
    <tr>
        <td>        {$row['Booking_ID']}            </td>
        <td>        {$row['FK_Trip_ID']}            </td>
        <td>        {$row['TourCode']}              </td>
        <td>        {$row['Name']}                  </td>
        <td>        {$row['Departure_date']}        </td>
        <td>RM        {$row['Fee']}.00              </td>
        <td><a href='{$row['itinerary_url']}'>
            <img src='img/itenerary.png' />
        </a>                                        </td>

    </tr>";
        }
        echo "</table>";
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>