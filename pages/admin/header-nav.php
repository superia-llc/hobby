<?php
    include_once "../util/requireLogin.php";
?>

<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='utf-8'>

            <!--Bootstrap Stylesheet-->
            <link rel='stylesheet' href='../../assets/bootstrap/4.0.0/css/bootstrap.min.css'>

            <!--Custom Stylesheets-->
            <link rel='stylesheet' href='../../assets/styles/navigation.css'>
            <link rel='stylesheet' href='../../assets/styles/page.css'>

            <!--Flat Icons-->            
            <link rel="stylesheet" href="../../assets/styles/icons/flaticon.css">

            <!--Datatable Stylesheet-->          
            <link rel="stylesheet" type="text/css" href="../../assets/datatables/datatables.bootstrap4.min.css" />

            <!--DatePicker Stylesheet-->          
            <link rel='stylesheet' href='../../assets/styles/datepicker.css'>
        </head>

        <body>
            <header class = "site-header push">
                <button class='menu-btn'><img src='../../assets/images/hamburger2.png' class='menu-btn-img'/></button>
                FIRMD Vacation House
            </header>

            <nav class='pushy pushy-left' >
                <div class='pushy-content'>
                    <ul class='sideNav-main'>

                        <?php
                            if(isset($_GET['dashboard'])){
                                echo "<li class='active pushy-link' id='first-link'><a class='active' href='index.php?dashboard'><i class='flaticon-home'></i>Dashboard</a></li>";
                            }
                            else{
                                echo "<li class='pushy-link' id='first-link'><a href='index.php?dashboard'><i class='flaticon-home'></i>Dashboard</a></li>";
                            }
 
                            if(isset($_GET['check-in'])||isset($_GET['reservations'])){
                                echo "<li class='pushy-submenu'>
                                        <button class = 'active'><i class='flaticon-reception'></i>Bookings & Reservations</button>
                                        <ul>
                                            <li class='pushy-link'><a href='index.php?check-in'>Check-in & Check-out</a></li>
                                            <li id='lastLink' class='pushy-link'><a href='index.php?reservations'>Reservations</a></li>
                                        </ul>
                                    </li>";
                            }
                            else{
                                echo "<li class='pushy-submenu'>
                                        <button><i class='flaticon-reception'></i>Bookings & Reservations</button>
                                        <ul>
                                            <li class='pushy-link'><a href='index.php?check-in'>Check-in & Check-out</a></li>
                                            <li id='lastLink' class='pushy-link'><a href='index.php?reservations'>Reservations</a></li>
                                        </ul>
                                    </li>";
                            }

                            if(isset($_GET['catering'])){
                                echo "<li class='pushy-submenu'>
                                        <button class='active'><i class='flaticon-reception-bell'></i>Services</button>
                                        <ul>
                                            <li id='lastLink' class='pushy-link'><a href='index.php?catering'>Catering</a></li>
                                        </ul>
                                    </li>";
                            }
                            else{
                                echo "<li class='pushy-submenu'>
                                        <button><i class='flaticon-reception-bell'></i>Services</button>
                                        <ul>
                                            <li id='lastLink' class='pushy-link'><a href='index.php?catering'>Catering</a></li>
                                        </ul>
                                    </li>";
                            }
    
                            if(isset($_GET['users'])||isset($_GET['adminUsers'])){
                                echo " <li class='pushy-submenu'>
                                            <button class = 'active'><i class='flaticon-social'></i>User Management</button>
                                            <ul>
                                                <li class='pushy-link'><a href='index.php?users'>Users</a></li>
                                                <li class='pushy-link' id='lastLink'><a href='index.php?adminUsers'>Administrator Accounts</a></li>
                                            </ul>
                                        </li>";
                            }
                            else{
                                echo "<li class='pushy-submenu'>
                                            <button><i class='flaticon-social'></i>User Management</button>
                                            <ul>
                                                <li class='pushy-link'><a href='index.php?users'>Users</a></li>
                                                <li class='pushy-link' id='lastLink'><a href='index.php?adminUsers'>Administrator Accounts</a></li>
                                            </ul>
                                        </li>";
                            }

                            if(isset($_GET['employees'])||isset($_GET['commissions'])){
                                echo "<li class='pushy-submenu'>
                                            <button class = 'active'><i class='flaticon-businessman'></i>Employee Management</button>
                                            <ul>
                                                <li class='pushy-link'><a href='index.php?employees'>Employee Records</a></li>
                                                <li class='pushy-link' id='lastLink'><a href='index.php?commissions'>Commissions</a></li>
                                            </ul>
                                        </li>";
                            }
                            else{
                                echo "<li class='pushy-submenu'>
                                            <button><i class='flaticon-businessman'></i>Employee Management</button>
                                            <ul>
                                                <li class='pushy-link'><a href='index.php?employees'>Employee Records</a></li>
                                                <li class='pushy-link' id='lastLink'><a href='index.php?commissions'>Commissions</a></li>
                                            </ul>
                                        </li>";
                            }

                            if(isset($_GET['units'])||isset($_GET['menu'])||isset($_GET['promo'])){
                                echo "<li class='pushy-submenu'>
                                        <button class='active'><i class='flaticon-food'></i>Content Management</button>
                                        <ul>                     
                                            <li class='pushy-link'><a href='index.php?units'>Units</a></li>
                                            <li class='pushy-link'><a href='index.php?menu'>Menu</a></li>
                                            <li class='pushy-link' id='lastLink'><a href='index.php?promo'>Promos and Rates</a></li>
                                        </ul>
                                    </li>";
                            }
                            else{
                                echo "<li class='pushy-submenu'>
                                        <button><i class='flaticon-food'></i>Content Management</button>
                                        <ul>                     
                                            <li class='pushy-link'><a href='index.php?units'>Units</a></li>
                                            <li class='pushy-link'><a href='index.php?menu'>Menu</a></li>
                                            <li class='pushy-link' id='lastLink'><a href='index.php?promo'>Promos and Rates</a></li>
                                        </ul>
                                    </li>";
                            }

                            if(isset($_GET['currentTransactions'])||isset($_GET['allTransactions'])){
                                echo "<li class='pushy-submenu'>
                                            <button class = 'active'><i class='flaticon-business'></i>Reports</button>
                                            <ul>
                                                <li class='pushy-link'><a href='index.php?currentTransactions'>Current Transactions</a></li>
                                                <li class='pushy-link' id='lastLink'><a href='index.php?allTransactions'>Transaction History</a></li>
                                            </ul>
                                        </li>";
                            }
                            else{
                                echo "<li class='pushy-submenu'>
                                            <button><i class='flaticon-business'></i>Reports</button>
                                            <ul>
                                                <li class='pushy-link'><a href='index.php?currentTransactions'>Current Transactions</a></li>
                                                <li class='pushy-link' id='lastLink'><a href='index.php?allTransactions'>Transaction History</a></li>
                                            </ul>
                                        </li>";
                            }
                        ?>
                    </ul>
                </div>
            </nav>

        <div class='site-overlay'></div> <!-- Overlay when side nav is active -->

<!--Page Created By L.B. for FIRMD Vacation House; 2018-->