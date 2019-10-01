<?php 
   include('session.php');
   
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Welcome! <?php echo $login_session ?> </title>
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

    
        <h2 class="text-center">Welcome
            <?php echo $login_session; ?>, the <?php echo $position; ?> of Smart Travel!
        </h2>
<div class="jumbotron">
    <h1 class="text-center">
    Below are the trip that managed by you
    </h1>
        <?php
        //https://www.youtube.com/watch?v=pc0otVM80Sk

 $query_sql= mysqli_query($db,"SELECT B.Booking_ID,
 C.FName,
 C.LName,
 Trip.Trip_ID,
 T.TourCode,
 C.Phone_num,
 T.Name,
 T.Destination,
 Trip.Departure_date,
 Trip.Fee,
 Trip.Airline,
 E.username ,
 T.itinerary_url
 FROM Booking B
 INNER JOIN Customer C ON B.FK_C_username=C.username
 INNER JOIN Trip on Trip.Trip_ID=B.FK_Trip_ID
 INNER join Tour T on Trip.FK_TourCode=T.TourCode
 INNER JOIN Employee E on T.FK_E_username=E.username
 WHERE E.username = '$login_session'");

echo "<table border='1' class='table table-striped table-dark table-hover '>";
echo "    
<thead> 
    <tr>
        <th scope='col'>            Customer Name           </th>
        <th scope='col'>            Customer Phone          </th>
        <th scope='col'>            Trip ID                 </th>
        <th scope='col'>            Tour Code               </th>
        <th scope='col'>            Trip Name               </th>
        <th scope='col'>            Destination             </th>
        <th scope='col'>            Departure date          </th>
        <th scope='col'>            Fee                     </th>
        <th scope='col'>            Airline                 </th>
        <th scope='col'>            Itinerary               </th>
    </tr>
</thead>";
    
while ($row=mysqli_fetch_assoc($query_sql)) {
    echo "
<tbody>    
    <tr>
        <td>        {$row['FName']} {$row['LName']}     </td>
        <td>        {$row['Phone_num']}                 </td>
        <td>        {$row['Trip_ID']}                   </td>
        <td>        {$row['TourCode']}                  </td>
        <td>        {$row['Name']}                      </td>
        <td>        {$row['Destination']}               </td>
        <td>        {$row['Departure_date']}            </td>
        <td>        {$row['Fee']}                       </td>
        <td>        {$row['Airline']}                   </td>
        <td>        <a href='{$row['itinerary_url']}'><img src='img/itenerary.png'/></a></td>

    </tr>
</tbody>";
}      
    echo "</table>";
    //Only Manager can register user
    if ($position == "Manager") {
        echo $position;
        echo "<div class='text-center jumbotron'>";
        echo "<a href='register.php'>Register  </a>" ;
        echo "</div";
    }
  
?>

</div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>