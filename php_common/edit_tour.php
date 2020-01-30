<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
include_once("../config.php");

$TourCode= mysqli_real_escape_string($db,$_POST['TourCode']);
$TourName= mysqli_real_escape_string($db,$_POST['TourName']);
$category= mysqli_real_escape_string($db,$_POST['Category']);
$itenerary=mysqli_real_escape_string($db,$_POST['itenerary']);
$Destination=mysqli_real_escape_string($db,$_POST['Destination']);
$FK_E_username=mysqli_real_escape_string($db,$_POST['FK_E_username']);
$thumbnail_url=mysqli_real_escape_string($db,$_POST['thumbnail_url']);
$itinerary_url=mysqli_real_escape_string($db,$_POST['itenerary']);

$sql="UPDATE `Tour` SET `Name`='$TourName',`Destination`='$Destination',`Category`='$category',`FK_E_username`='$FK_E_username',`itinerary_url`='$itinerary_url',`thumbnail_url`='$thumbnail_url' WHERE`TourCode`='$TourCode'"   ;

if (mysqli_query($db,$sql)) {
    echo("<script> alert('Edit Success!'); </script>");
    echo("<script> window.history.go(-1);</script>");
}else {
    echo "There is some error (●ˇ∀ˇ●)";
}


}
?>
