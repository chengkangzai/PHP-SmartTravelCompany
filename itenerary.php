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

function renderAvailableTripByTour($login_session) {
    include('config.php');
    //Get the Tour that selected by customer
    $Tour_sql="SELECT * FROM C_selected_Tour where FK_C_username='$login_session' order by id desc limit 1";
    $Tour_query_sql=mysqli_query($db,$Tour_sql);
    $Tour_row=mysqli_fetch_assoc($Tour_query_sql);
    //Customer's selected Tour
    $TourCode=$Tour_row['FK_TourCode'];
    
    //Check the Trip by Tour
    $Trip_sql="SELECT * FROM Trip where FK_TourCode='$TourCode' ";
    $Trip_query_sql= mysqli_query($db,$Trip_sql);      
        while ($row=mysqli_fetch_assoc($Trip_query_sql)) 
        {
            $Trip_id=$row['Trip_ID'];
            $Depart_date=$row['Departure_date'];                  
            $Fee=$row['Fee'];
            $Airline=$row['Airline'];
        echo "
        <option value='$Trip_id'> $Depart_date, RM$Fee/pax, $Airline</option>
        ";
        }
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
?>
    

