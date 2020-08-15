<?php
include('../config.php');
session_start();
$itenerary_sql = "SELECT 
    T.TourCode,
    T.Name,
    T.Destination,
    T.itinerary_url,
    T.thumbnail_url,
    Tr.Fee,
    Inner join Trip Tr On Tr.FK_TourCode=T.TourCode
    Where T.TourCode='$tcode'
    ";

// Query it --> Its for all
$itenerary_query = mysqli_query($db, $itenerary_sql);
$itenerary_row = mysqli_fetch_array($itenerary_query, MYSQLI_ASSOC);
$active = $itenerary_row['active'];

//Trip
$itenerary = $itenerary_row['itinerary_url'];
$Tour_name = $itenerary_row['Name'];
$thumbnail = $itenerary_row['thumbnail_url'];


mysqli_close($db);
?>