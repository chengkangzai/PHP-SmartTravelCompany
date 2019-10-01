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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Smart Holidays</a>

        <!-- only shows with small screen (powered by javascipt and bootstrap CSS class) -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <!--The icon itself-->
        <span class="navbar-toggler-icon"></span>
    </button>
        <!--Real nav start here-->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trips/index.php">Trips</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="About_us.html">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Login system
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="C_Login.php">Customer</a>
                        <a class="dropdown-item" href="Login.php">Staff</a>
                    </div>
                </li>
            </ul>
            <span>
            <a href="logout.php" class="px-2 btn btn-outline-danger ">Sign Out</a>
            </span>
        </div>
    </nav>
<h2>
Welcome ! our beloved Customer <?php echo $FName.' '.$LName ?>
</h2>
<div class="jumbotron">
    <h2 class="text-center">Below Are the Trip that you booked</h2>
<?php
//https://www.youtube.com/watch?v=pc0otVM80Sk

 $query_sql= mysqli_query($db,"SELECT
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
    
while ($row=mysqli_fetch_assoc($query_sql)) {
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