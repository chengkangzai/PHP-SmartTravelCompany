<?php
include('../config.php');


$itenerary_sql="SELECT 
T.TourCode,
T.Name,
T.Destination,
T.itinerary_url,
T.thumbnail_url,
Tr.Fee 
FROM Tour T 
Inner join Trip Tr On Tr.FK_TourCode=T.TourCode
Where T.TourCode='$tcode'
";

$itenerary_query=mysqli_query($db,$itenerary_sql);

$itenerary_row=mysqli_fetch_array($itenerary_query,MYSQLI_ASSOC);

$itenerary= $itenerary_row['itinerary_url'];
$Tour_name=$itenerary_row['Name'];
$thumbnail=$itenerary_row['thumbnail_url'];

mysqli_close($db);
?>