<?php
include('config.php');

$sql="SELECT * FROM Tour";

$query_sql= mysqli_query($db,$sql);

    
while ($row=mysqli_fetch_assoc($query_sql)) {
    $TourCode=$row['TourCode'];                  
    $TourName=$row['Name'];
echo "
<option input='$TourCode'>$TourName</option>
";
}

mysqli_close($db);
