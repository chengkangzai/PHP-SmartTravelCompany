<?php
include_once("../config.php");
include_once("../session.php");
$type = $_GET['type'];
$role= $_SESSION['role'];


function authenticate(){
    //See Authenticate if the password is correct
    //Return true if password is correct
    echo"shut-up";
}

function changePassword(){
    authenticate();
    /*
    TODO 
    0. Authenticate 
    1.Get information 
    1.1 Data Validation 
    
    2. Prepare sql statement
    
    */
}

function changeProfile(){
    authenticate();
    /*
    TODO
    0. Authenticate 
    1. Get information 
        1.1 Data Validation
    2. prepare SQL
    3. Execute SQL
    */
}

function returnAgency() { 
    $sql = "SELECT DISTINCT `Agency` FROM Employee";
    $result = mysqli_query($GLOBALS['db'], $sql);
    $domReturn = "<select required class='custom-select' id='selectAgency' name='Agency'> \n";
    
    while ($row = mysqli_fetch_assoc($result)) {
        $agent = $row['Agency'];
        if ($agent == $GLOBALS['Agency']) {
            $selected="selected";
        }else {
            $selected="";
        }
        $dom="onclick=this.attr('selected','selected')";
        $domReturn .= "\t <option value='$agent'$selected $dom>$agent </option> \n";
    }
    $domReturn .= "</select>";
    return $domReturn;
    /*
    TODO
    1. Query Data from db
    2. Arrange the data for select
    3. return data 
    */
}

function returnPosition(){
    $sql = "SELECT DISTINCT `Position` FROM Employee";
    $result = mysqli_query($GLOBALS['db'], $sql);
    $domReturn = "<select required class='custom-select' id='selectAgency' name='Agency'> \n";
    
    while ($row = mysqli_fetch_assoc($result)) {
        $position = $row['Position'];
        if ($position == $GLOBALS['position']) {
            $selected="selected";
        }else {
            $selected="";
        }
        $dom="onclick=this.attr('selected','selected')";
        $domReturn .= "\t <option value='$position'$selected $dom>$position </option> \n";
    }
    $domReturn .= "</select>";
    return $domReturn;
    /*
    TODO
    1. Query Data from db
    2. Arrange the data for select
    3. return data 
    */
}


//Main AJAX
switch ($type) {
    case 'changePassword':
        changePassword();
        break;
    
    case 'changeProfile':
        changeProfile();
        break;    

    case 'getAgency':
        echo returnAgency();
        break;

    case 'getPosition':
        echo returnPosition();
        break;
};
