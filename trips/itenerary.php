<?php
include('../config.php');

$itenerary_sql="SELECT * FROM Tour Inner join Trip On Trip.FK_TourCode=Tour.TourCode";

$itenerary_query=mysqli_query($db,$itenerary_sql);

$itenerary_row=mysqli_fetch_array($itenerary_sql,MYSQLI_ASSOC);




?>