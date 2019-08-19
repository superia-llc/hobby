<?php
	class Reservation{
		public $reservationID;
		public $reservationReferenceNo;
		public $guestName;
		public $dateOfTransaction;
		public $unitNo;
		public $checkInDate;
		public $checkOutDate;
		public $noOfPeople;
		public $total;
		public $amountPaid;
		public $paymentStatus;
		public $searchText;

		private $conn;
		private $tableName = "reservations";
		public $tableTitle1 = "Reservations";
		public $tableTitle2 = "Reservation Requests";
	
		function __construct($db){
			$this->conn=$db;
		}

		function getReservations(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE ApprovalStatus = 1 AND IsArchived = 0";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

		function getReservationRequests(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE ApprovalStatus = 0";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

		function getSelectedReservation(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE 	ReservationReferenceNo = ? LIMIT 0,1";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->reservationReferenceNo);
			$stmt ->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->reservationReferenceNo = $row['ReservationReferenceNo'];
			$this->guestName = $row['GuestName'];
			$this->dateOfTransaction = $row['DateOfTransaction'];
			$this->unitNo = $row['UnitNo'];
			$this->checkInDate = $row['CheckInDate'];
			$this->checkOutDate = $row['CheckOutDate'];
			$this->noOfPeople = $row['NoOfPeople'];
			$this->total = $row['TotalAmountDue'];
			$this->amountPaid = $row['AmountPaid'];
			$this->paymentStatus = $row['PaymentStatus'];
			$this->isArchive = $row['IsArchived'];
			$this->transactionType = $row['TransactionType'];
			$this->isFinished = $row['IsFinished'];

			return $stmt;
		}

		function search(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE (ReservationReferenceNo LIKE '".$this->searchText."%' OR GuestName LIKE '".$this->searchText."%' OR DateOfTransaction LIKE '".$this->searchText."%' OR UnitNo LIKE '".$this->searchText."%' OR CheckInDate LIKE '".$this->searchText."%' OR CheckOutDate LIKE '".$this->searchText."%' OR NoOfPeople LIKE '".$this->searchText."%' OR TotalAmountDue LIKE '".$this->searchText."%'  OR AmountPaid LIKE '".$this->searchText."%' OR PaymentStatus LIKE '".$this->searchText."%') AND ApprovalStatus = 1 AND IsArchived = 0";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}
	}
?>