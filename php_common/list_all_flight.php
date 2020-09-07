<?php
include($_SERVER['DOCUMENT_ROOT']."/test/php-assignment/"."config.php");
$type = $_POST['type'];

if ($type == "update") {
    listAllFLight();
} elseif ($type == "add") {
    echo returnListAllFlight();
}

function listAllFLight()
{
    $sql = "SELECT DISTINCT `Airline` from Trip";
    $query = mysqli_query($GLOBALS['db'], $sql);
    $id = $_POST['id'];

    echo "<td id='Airline_$id'><select type='Airline' required id='selectAirline$id' class='custom-select' required>";
    while ($row = mysqli_fetch_assoc($query)) {
        $airline = $row['Airline'];
        if ($row['Airline'] == $_POST['Airline']) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        $dom = "onclick=this.attr('selected','selected')";
        echo "<option  value='$airline' $dom $selected> $airline </option>";
    }
    echo "</select></td>";
}

function returnListAllFlight()
{
    $sql = "SELECT DISTINCT `Airline` from Trip";
    $query = mysqli_query($GLOBALS['db'], $sql);

    $domReturn = "<select required class='custom-select' id='selectAirline' name='Airline' ><option disabled selected value='' >Select an Airline or Click Add Airline to add an Airline</option><option value='' disabled>---------------------------------- </option>";
    while ($row = mysqli_fetch_assoc($query)) {
        $airline = $row['Airline'];
        $domReturn = $domReturn . "<option value='" . $airline . "'> $airline </option>";
    }
    $domReturn .= "</select>";

    return $domReturn;
}

mysqli_close($db);
