<?php
	class User{
		public $userID;
		public $username;
		public $emailAddress;
		public $firstName;
		public $middleName;
		public $lastName;
		public $suffix;
		public $birthdate;
		public $gender;
		public $address;
		public $contactNumber;
		public $userType;
		public $searchText;

		private $conn;
		private $tableName = "useraccount";
		public $tableTitle1 = "User Accounts";
		public $tableTitle2 = "Archived User Accounts";
	
	function __construct($db){
		$this->conn=$db;
	}

	function getUsers(){
		$query = "SELECT * FROM " . $this->tableName . " WHERE IsArchived = 0";
		$stmt = $this->conn->prepare($query);
		$stmt ->execute();
		return $stmt;
	}

	function getSelectedUser(){
		$query = "SELECT * FROM " . $this->tableName . " WHERE UserID = ? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1, $this->userID);
		$stmt ->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->username = $row['Username'];
		$this->emailAddress = $row['EmailAddress'];
		$this->firstName = $row['FirstName'];
		$this->middleName = $row['MiddleName'];
		$this->lastName = $row['LastName'];
		$this->suffix = $row['Suffix'];
		$this->birthdate = $row['Birthdate'];
		$this->gender = $row['Gender'];
		$this->address = $row['Address'];
		$this->contactNumber = $row['ContactNumber'];
		$this->userType = $row['UserType'];
		$this->userPhoto = $row['UserPhoto'];

		return $stmt;
	}

	function getSelectedArchivedUser(){
		$query = "SELECT * FROM " . $this->tableName . " WHERE UserID = ? AND IsArchived = 1 LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1, $this->userID);
		$stmt ->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->username = $row['Username'];
		$this->emailAddress = $row['EmailAddress'];
		$this->firstName = $row['FirstName'];
		$this->middleName = $row['MiddleName'];
		$this->lastName = $row['LastName'];
		$this->suffix = $row['Suffix'];
		$this->birthdate = $row['Birthdate'];
		$this->gender = $row['Gender'];
		$this->address = $row['Address'];
		$this->contactNumber = $row['ContactNumber'];
		$this->userType = $row['UserType'];
		$this->userPhoto = $row['UserPhoto'];

		return $stmt;
	}

	function getArchivedUsers(){
		$query = "SELECT * FROM " . $this->tableName . " WHERE IsArchived = 1";
		$stmt = $this->conn->prepare($query);
		$stmt ->execute();
		return $stmt;
	}

	function search(){
		$query = "SELECT * FROM " . $this->tableName . " WHERE FirstName LIKE '".$this->searchText."%' OR MiddleName LIKE '".$this->searchText."%' OR LastName LIKE '".$this->searchText."%' OR Suffix LIKE '".$this->searchText."%' OR Birthdate LIKE '".$this->searchText."%' OR Gender LIKE '".$this->searchText."%' OR Address LIKE '".$this->searchText."%'  OR ContactNumber LIKE '".$this->searchText."%' OR UserName LIKE '".$this->searchText."%' OR EmailAddress LIKE '".$this->searchText."%' OR UserType LIKE '".$this->searchText."%' ";

		$stmt = $this->conn->prepare($query);
		$stmt ->execute();
		return $stmt;
	}

	function searchArchived(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE (FirstName LIKE '".$this->searchText."%' OR MiddleName LIKE '".$this->searchText."%' OR LastName LIKE '".$this->searchText."%' OR Suffix LIKE '".$this->searchText."%' OR Birthdate LIKE '".$this->searchText."%' OR Gender LIKE '".$this->searchText."%' OR Address LIKE '".$this->searchText."%'  OR ContactNumber LIKE '".$this->searchText."%' OR UserName LIKE '".$this->searchText."%' OR EmailAddress LIKE '".$this->searchText."%' OR UserType LIKE '".$this->searchText."%') AND IsArchived = 1 ";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
	}

	function login(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE Username = ? AND Password = ?";
			$stmt = $this->conn->prepare($query);

			$stmt->bindParam(1, $this->username);
			$stmt->bindParam(2, $this->password);

			$stmt->execute();
			$num = $stmt->rowCount();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if($num > 0){
				session_start();
				$_SESSION['UserID'] = $row['UserID'];
				$_SESSION['Username'] = $row['Username'];
				$_SESSION['UserType'] = $row['UserType'];
				return true;
			}
			else
				return false;
	}
}
?>