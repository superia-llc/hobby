<?php
	class Transactions{
		public $referenceNo;
		public $transactionType;

		private $conn;
		public $tableTitle1 = "Current Transactions";
		public $tableTitle2 = "Transactions";
		public $tableTitle3 = "Archived Transactions";

		public $searchText;
	
	function __construct($db){
		$this->conn=$db;
	}

	function getCurrentTransactions(){
		$query = "(SELECT CateringReferenceNo AS \"ReferenceNo\", GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM cateringservice WHERE IsFinished = 0) UNION (SELECT ReservationReferenceNo, GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM reservations WHERE IsFinished = 0) UNION (SELECT TourReferenceNo, GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM tourguideservice WHERE IsFinished = 0)";
		$stmt = $this->conn->prepare($query);
		$stmt ->execute();
		return $stmt;
	}

	function getFinishedransactions(){
		$query = "(SELECT CateringReferenceNo AS \"ReferenceNo\", GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM cateringservice WHERE IsFinished = 1) UNION (SELECT ReservationReferenceNo, GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM reservations WHERE IsFinished = 1) UNION (SELECT TourReferenceNo, GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM tourguideservice WHERE IsFinished = 1)";
		$stmt = $this->conn->prepare($query);
		$stmt ->execute();
		return $stmt;
	}

	function getTotalRevenue(){
			$query = "SELECT SUM(cateringservice.AmountPaid) + SUM(tourguideservice.AmountPaid) + SUM(reservations.AmountPaid) AS \"revenue\" FROM cateringservice, tourguideservice, reservations";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
	}

	function getSelectedTransaction(){
		$query = "SELECT * FROM((SELECT CateringReferenceNo AS \"ReferenceNo\", GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM cateringservice WHERE IsFinished = 0) UNION (SELECT ReservationReferenceNo, GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM reservations WHERE IsFinished = 0) UNION (SELECT TourReferenceNo, GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM tourguideservice WHERE IsFinished = 0)) AS Transactions WHERE ReferenceNo=? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1, $this->referenceNo);
		$stmt ->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->transactionType = $row['TransactionType'];
	
		return $stmt;
	}

	function searchCurrentTransactions(){
		$query = "SELECT * FROM((SELECT CateringReferenceNo AS \"ReferenceNo\", GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM cateringservice WHERE IsFinished = 0) UNION (SELECT ReservationReferenceNo, GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM reservations WHERE IsFinished = 0) UNION (SELECT TourReferenceNo, GuestName, DateOfTransaction, TransactionType, TotalAmountDue, AmountPaid, PaymentStatus FROM tourguideservice WHERE IsFinished = 0)) AS Transactions WHERE ReferenceNo LIKE \'5%\'";

		$stmt = $this->conn->prepare($query);
		$stmt ->execute();
		return $stmt;
	}
}
?>