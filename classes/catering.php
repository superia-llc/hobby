<?php
	class Catering{
		public $cateringID;
		public $cateringReferenceNo;
		public $guestName;
		public $dateOfTransaction;
		public $dateAndTimeOfService;
		public $foodItems;
		public $quantity;
		public $comments;
		public $paymentStatus;
		public $amountPaid;
		public $totalAmountDue;
		public $searchText;

		private $conn;
		private $tableName = "cateringService";
		public $tableTitle1 = "Catering Transactions";
		public $tableTitle2 = "Archived Transactions";
	
		function __construct($db){
			$this->conn=$db;
		}

		function getCatering(){
			$query = "SELECT * FROM " . $this->tableName;
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

		function getArchivedCatering(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE IsArchived = 1 LIMIT 0,1";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

		function getSelectedCatering(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE CateringReferenceNo = ? LIMIT 0,1";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->cateringReferenceNo);
			$stmt ->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->cateringReferenceNo = $row['CateringReferenceNo'];
			$this->guestName = $row['GuestName'];
			$this->dateOfTransaction = $row['DateOfTransaction'];
			$this->dateAndTimeOfService = $row['DateAndTimeOfService'];
			$this->foodItems = $row['FoodItems'];
			$this->quantity = $row['Quantity'];
			$this->comments = $row['Comments'];
			$this->paymentStatus = $row['PaymentStatus'];
			$this->amountPaid = $row['AmountPaid'];
			$this->totalAmountDue = $row['TotalAmountDue'];

			return $stmt;
		}

		function addCatering(){
			$query = "INSERT INTO ". $this->tableName ." SET CateringReferenceNo = ?, GuestName = ?, DateOfTransaction = ?, DateAndTimeOfService = ?, FoodItems = ?, Quantity = ?, Comments = ?, PaymentStatus = ?, AmountPaid = ?, TotalAmountDue = ?";

			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1, $this->cateringReferenceNo);
			$stmt->bindparam(2, $this->guestName);
			$stmt->bindparam(3, $this->dateOfTransaction);
			$stmt->bindparam(4, $this->dateAndTimeOfService);
			$stmt->bindparam(5, $this->foodItems);
			$stmt->bindparam(6, $this->quantity);
			$stmt->bindparam(7, $this->comments);
			$stmt->bindparam(8, $this->paymentStatus);
			$stmt->bindparam(9, $this->amountPaid);
			$stmt->bindparam(10, $this->totalAmountDue);

			if($stmt->execute())
				return true;
			else
				return false;
			
			return $stmt;
		}

		function updateCatering(){
			$query = "UPDATE " . $this->tableName . " SET cateringReferenceNo = ?, guestName = ?, dateOfTransaction = ?, dateAndTimeOfService = ?, foodItems = ?, quantity = ?, comments = ?, paymentStatus = ?, amountPaid = ?, totalAmountDue = ? WHERE cateringID = ?";
			
			$stmt = $this->conn->prepare($query);
			
			$stmt->bindparam(1, $this->firstName);
			$stmt->bindparam(2, $this->middleName);
			$stmt->bindparam(3, $this->lastName);
			$stmt->bindparam(4, $this->suffix);
			$stmt->bindparam(5, $this->birthdate);
			$stmt->bindparam(6, $this->gender);
			$stmt->bindparam(7, $this->civilStatus);
			$stmt->bindparam(8, $this->address);
			$stmt->bindparam(9, $this->contactNumber);
			$stmt->bindparam(10, $this->employeeType);
			$stmt->bindParam(11, $this->cateringID);
			
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}

		function search(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE CateringReferenceNo LIKE '".$this->searchText."%' OR DateOfTransaction LIKE '".$this->searchText."%' OR GuestName LIKE '".$this->searchText."%' OR DateAndTimeOfService LIKE '".$this->searchText."%' OR FoodItems LIKE '".$this->searchText."%' OR Quantity LIKE '".$this->searchText."%' OR Comments LIKE '".$this->searchText."%' OR PaymentStatus LIKE '".$this->searchText."%'  OR AmountPaid LIKE '".$this->searchText."%' OR TotalAmountDue LIKE '".$this->searchText."%' ";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

	}
?>