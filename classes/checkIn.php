<?php
	class CheckIn{
		public $bookingID;
		public $userID;
		public $unitID;
		public $reservationID;
		public $actualCheckInDate;
		public $actualCheckOutDate;

		private $conn;
		private $tableName = "checkIn";
	
		function __construct($db){
			$this->conn=$db;
		}

		function getBooking(){
			$query = "SELECT * FROM " . $this->tableName;
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

		function search(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE UnitName LIKE '".$this->searchText."%' OR Description LIKE '".$this->searchText."%' OR Capacity LIKE '".$this->searchText."%' OR Price LIKE '".$this->searchText."%' OR Status LIKE '".$this->searchText."%' ";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}
	}
?>