<?php

function renderTourSelection(){
    include('config.php');
    $sql="SELECT * FROM Tour";
    $query_sql= mysqli_query($db,$sql);
    
    while ($row=mysqli_fetch_assoc($query_sql)) 
    {
        $TourCode=$row['TourCode'];                  
        $TourName=$row['Name'];
    echo "
    <option value='$TourCode'>$TourName</option>
    ";
    }
}

function returnTourSelection(){
    include('config.php');
    $sql="SELECT * FROM Tour";
    $query_sql= mysqli_query($db,$sql);
    $return .="\n";
    while ($row = mysqli_fetch_assoc($query_sql)) 
    {
        $TourCode = $row['TourCode'];                  
        $TourName = $row['Name'];
    $return .= "<option value='$TourCode' > $TourName </option> \n";
    }
    return $return;
}

function renderAvailableTripByTour($login_session) {
    include('config.php');
    //Get the Tour that selected by customer
    $Tour_sql="SELECT * FROM C_selected_Tour where FK_C_username='$login_session' order by id desc limit 1";
    $Tour_query_sql=mysqli_query($db,$Tour_sql);
    $Tour_row=mysqli_fetch_assoc($Tour_query_sql);
    //Customer's selected Tour
    $TourCode=$Tour_row['FK_TourCode'];
    
    $date=date("Y-m-d");
    //Check the Trip by Tour
    $Trip_sql="SELECT * FROM Trip WHERE FK_TourCode='$TourCode' AND Departure_date >='$date' ";
    $option .= $Trip_sql;
    $Trip_query_sql= mysqli_query($db,$Trip_sql);      
        while ($row=mysqli_fetch_assoc($Trip_query_sql)) 
        {
            $Trip_id=$row['Trip_ID'];
            $Depart_date=$row['Departure_date'];                  
            $Fee=$row['Fee'];
            $Airline=$row['Airline'];
        $option .= "
        <option value='$Trip_id'> $Depart_date, RM$Fee/pax, $Airline</option>
        ";
        }
        if($option == ""){
            $option ="<option selected disabled> Currently there is no Trip </option>";
        }
        echo $option;
    mysqli_close($db);
}

function renderSelectedTrip($login_session) {
    include('config.php');
    //Get the Tour that selected by customer
    $Tour_sql="SELECT * FROM C_selected_Tour where FK_C_username='$login_session' order by id desc limit 1";
    $Tour_query_sql=mysqli_query($db,$Tour_sql);
    $Tour_row=mysqli_fetch_assoc($Tour_query_sql);
    //Customer's selected Tour
    $TourCode=$Tour_row['FK_TourCode'];
    //Tour Name
    $Name_sql="SELECT * FROM Tour where TourCode='$TourCode'";
    $Name_query=mysqli_query($db,$Name_sql);
    $Name_row=mysqli_fetch_assoc($Name_query);
    $TourName=$Name_row['Name'];
    echo $TourName ;
}

function renderSelectedTour($TourCode){
    include('config.php');
    $sql="SELECT * FROM Tour where TourCode='$TourCode'";
    $query_sql= mysqli_query($db,$sql);
    while ($row=mysqli_fetch_assoc($query_sql)){
        $TourCode=$row['TourCode'];                  
        $TourName=$row['Name'];
    echo "<option value='$TourCode' selected >$TourName</option>";
    echo "<option value='' disable>-------------------- </option>";
    }
}

function returnSelectedTour($TourCode){
    include('config.php');
    $sql="SELECT * FROM Tour where TourCode='$TourCode'";
    $query_sql= mysqli_query($db,$sql);
    while ($row=mysqli_fetch_assoc($query_sql)){
        $TourCode=$row['TourCode'];                  
        $TourName=$row['Name'];
    $dom.= "<option value='$TourCode' selected >$TourName</option>";
    $dom.= "<option value='' disable>-------------------- </option>";
}
return $dom;
}
?>
    

