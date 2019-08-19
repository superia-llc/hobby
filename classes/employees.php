<?php
	class Employee{
		public $employeeID;
		public $employeeIDNumber;
		public $firstName;
		public $middleName;
		public $lastName;
		public $suffix;
		public $birthdate;
		public $birthMonth;
		public $birthDay;
		public $birthYear;
		public $gender;
		public $civilStatus;
		public $address;
		public $contactNumber;
		public $employeeType;
		public $searchText;

		private $conn;
		private $tableName = "employee";
		public $tableTitle = "Employees";
		public $tableTitle2 = "Archived Employees";
	
		function __construct($db){
			$this->conn=$db;
		}

		function getEmployees(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE IsArchived = 0";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

		function getSelectedEmployee(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE employeeID = ? LIMIT 0,1";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->employeeID);
			$stmt ->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->firstName = $row['FirstName'];
			$this->middleName = $row['MiddleName'];
			$this->lastName = $row['LastName'];
			$this->suffix = $row['Suffix'];
			$this->birthdate = $row['Birthdate'];
			$this->gender = $row['Gender'];
			$this->civilStatus = $row['CivilStatus'];
			$this->address = $row['Address'];
			$this->contactNumber = $row['ContactNumber'];
			$this->employeeType = $row['EmployeeType'];

			return $stmt;
		}

		function getArchivedEmployees(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE IsArchived = 1";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

		function getBirthdate(){
				$query = "SELECT MONTH(Birthdate) AS birthMonth, DAY(Birthdate) AS birthDay, YEAR(Birthdate) AS birthYear FROM " . $this->tableName . " WHERE employeeID = ? LIMIT 0,1";

				$stmt = $this->conn->prepare($query);	
				$stmt->bindParam(1, $this->employeeID);
				$stmt->execute();

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$this->birthMonth = $row['birthMonth'];
				$this->birthDay = $row['birthDay'];
				$this->birthYear = $row['birthYear'];

				return $stmt;
		}

		function addEmployee(){
			$query = "INSERT INTO ". $this->tableName ." SET FirstName = ?, MiddleName = ?, LastName = ?, Suffix = ?, Birthdate = ?, Gender = ?, CivilStatus = ?, Address = ?, ContactNumber = ?, EmployeeType = ?";

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

			if($stmt->execute())
				return true;
			else
				return false;
			
			return $stmt;
		}


		function updateEmployee(){
			$query = "UPDATE " . $this->tableName . " SET FirstName = ?, MiddleName = ?, LastName = ?, Suffix = ?, Birthdate = ?, Gender = ?, CivilStatus = ?, Address = ?, ContactNumber = ?, EmployeeType = ? WHERE employeeID = ?";
			
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
			$stmt->bindParam(11, $this->employeeID);
			
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}

		function archiveEmployee(){
			$query = "UPDATE " . $this->tableName . " SET IsArchived = 1 WHERE employeeID = ?";
			
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->employeeID);
			
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}
	}
?>