<?php
include("../config.php");


if ($_SERVER['REQUEST_METHOD']=="POST") {
    $id=$_POST['id'];
    $sql = "SELECT DISTINCT `Airline` from Trip";
    $query = mysqli_query($db, $sql);
    echo "<td id='Airline_$id'><select type='Airline' id='selectAirline$id'>";
    while ($row = mysqli_fetch_assoc($query)) {
        $airline = $row['Airline'];
        if($row['Airline'] == $_POST['Airline']){
            $selected="selected";
        }else{
            $selected="";
        }
        $dom="onclick=this.attr('selected','selected')";
        echo "<option value='$airline' $dom $selected> $airline </option>";
    }
    echo "</select></td>";    
}
