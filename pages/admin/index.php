<?php
	include_once "../util/requireLogin.php";
	
	$pageTitle = "Home";
	include_once "header-nav.php";
	
	if (isset($_GET['dashboard'])){
		$pageTitle = "Home";
		include_once "dashboard.php";		
	}

    else if (isset($_GET['check-in'])){
    	$pageTitle = "Booking Management";
    	include_once "checkInAndOut.php";
    }

    else if (isset($_GET['reservations'])){
    	$pageTitle = "Reservations";
    	include_once "reservations.php";
    }

    else if (isset($_GET['catering'])){
    	$pageTitle = "Catering";
    	include_once "catering.php";
    }

    else if (isset($_GET['users'])){
    	$pageTitle = "Users";
    	include_once "users.php";
    }

    else if (isset($_GET['adminUsers'])){
    	$pageTitle = "Admin Accounts";
    	include_once "admin_users.php";
    }

    else if (isset($_GET['employees'])){
    	$pageTitle = "Employees";
    	include_once "employeeRecords.php";
    }

    else if (isset($_GET['commissions'])){
    	$pageTitle = "Commissions";
    	include_once "commissions.php";
    }

    else if (isset($_GET['units'])){
    	$pageTitle = "Unit Management";
    	include_once "unitManagement.php";
    }

    else if (isset($_GET['menu'])){
    	$pageTitle = "Menu Food Items";
    	include_once "menuManagement.php";
    }

    else if (isset($_GET['promo'])){
    	$pageTitle = "Promos & Rates";
    	include_once "promosAndRates.php";
    }

    else if (isset($_GET['currentTransactions'])){
    	$pageTitle = "Current Transaction";
    	include_once "currentTransactions.php";
    }

    else if (isset($_GET['transactionHistory'])){
    	$pageTitle = "Transaction History";
    	include_once "transactionHistory.php";
    }

    echo "<title>". $pageTitle . "</title>";

    include_once "../shared/footer.php";
?>