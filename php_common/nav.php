<?php
 include('host.php');



 echo "
 <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <a class='navbar-brand' href='$host/index.html'>Smart Holidays</a>

        <!-- only shows with small screen (powered by javascipt and bootstrap CSS class) -->
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
            <!--The icon itself-->
            <span class='navbar-toggler-icon'></span>
        </button>
        <!--Real nav start here-->
        <div class='collapse navbar-collapse' id='navbarNavDropdown'>
            <ul class='navbar-nav'>
                <li class='nav-item active'>
                    <a class='nav-link' href='$host/index.html'>Home <span class='sr-only'>(current)</span></a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='$host/trips/index.php'>Trips</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='$host/About_us.php'>About Us</a>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Login system
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='$host/C_Login.php'>Customer</a>
                        <a class='dropdown-item' href='$host/Login.php'>Staff</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
 "
 
 

?>