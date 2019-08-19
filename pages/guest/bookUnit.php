<?php
	$page_title = "Book Unit No.";
	include_once "../../config/database.php";
	include_once "../../classes/bookUnitClass.php";


	$database = new Database();
	$db = $database->getConnection();



	if($_POST){
    	
	$reservation = new Reservation($db);

		$reservation->CheckInDate = $_SESSION['CheckInDate'];
		$reservation->CheckOutDate = $_SESSION['CheckOutDate'];
		$reservation->NoOfPeople = $_SESSION['NoOfPeople'];
		$reservation->TotalAmountDue = $_SESSION['TotalAmountDue'];
		$reservation->UnitNo = $_SESSION['UnitNo'];
	

		$reservation->createReservation();
	}

?>
