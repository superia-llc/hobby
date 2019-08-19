<?php
class UserClass{
		public $FirstName;
		public $LastName;
		public $MiddleName;
		public $Birthdate;
		public $birthMonth;
		public $birthDay;
		public $birthYear;
		public $Gender;
		public $Address;
		public $EmailAddress;
		public $ContactNumber;
		public $PasswordHash;
		public $Username;
		public $suffix;
		public $UserID;
		public $UserType;
		public $UserPhoto;
		public $oldPass;
		public $newPass;
		public $pass2;
		public $numberOfPeople; //new

		
		private $conn;
		private $tableName = "useraccount";

		function __construct($db){
		$this->conn = $db;
		}
		
		public function readAllUser(){
			$query = "SELECT * FROM userAccount";
			$statement = $this->conn->prepare($query);
			$statement->execute();
			return $statement;
		}
		
		function createUser(){
			$query = "INSERT INTO useraccount SET FirstName=?, MiddleName=?, LastName=?, Birthdate=?, Gender=?, EmailAddress=?,  PasswordHash=?, Username=?, Address=?, ContactNumber=?, UserType=?";
			
			$statement = $this->conn->prepare($query);
			$statement->bindparam(1, $this->FirstName);
			$statement->bindparam(2, $this->MiddleName);
			$statement->bindparam(3, $this->LastName);
			$statement->bindparam(4, $this->Birthdate);
			$statement->bindparam(5, $this->Gender);
			$statement->bindparam(6, $this->EmailAddress);
			$statement->bindparam(7, $this->pass2);
			$statement->bindparam(8, $this->UserName);
			$statement->bindparam(9, $this->Address);
			$statement->bindparam(10, $this->ContactNumber);
			//$statement->bindParam(11, $this->UserPhoto);
			$statement->bindParam(11, $this->UserType);
			
			if($statement->execute())
				return true;
			else
				return false;
			
			return $statement;
		}
		function birthdate(){
			$query = "SELECT MONTH(dateOfBirth) AS birthMonth, DAY(dateOfBirth) AS birthDay, YEAR(dateOfBirth) AS birthYear FROM " . $this->tableName . " WHERE UserID = ? LIMIT 0,1";

				$st = $this->conn->prepare($query);	
				$st->bindParam(1, $this->UserID);
				$st->execute();

				$row = $st->fetch(PDO::FETCH_ASSOC);
				$this->birthMonth = $row['birthMonth'];
				$this->birthDay = $row['birthDay'];
				$this->birthYear = $row['birthYear'];
		}
		
		//new
		function updateUser(){
			$query = "UPDATE useraccount SET FirstName=?, LastName=?, MiddleName=?, Gender=?, Birthdate = ?, EmailAddress=?, Username = ?, ContactNumber= ?, PasswordHash = ?, Address=? WHERE UserID=?";
			
			$statement = $this->conn->prepare($query);
			
			$statement->bindparam(1, $this->FirstName);
			$statement->bindparam(2, $this->LastName);
			$statement->bindparam(3, $this->MiddleName);
			$statement->bindparam(4, $this->Gender);
			$statement->bindparam(5, $this->Birthdate);
			$statement->bindparam(6, $this->EmailAddress);
			$statement->bindparam(7, $this->Username);
			$statement->bindparam(8, $this->ContactNumber);
			$statement->bindparam(9, $this->newPass);
			$statement->bindparam(10, $this->Address);
			$statement->bindparam(11, $this->UserID);
			if($statement->execute())
				return true;
			else
				return false;
		}
		
		//new
		function readOneUser(){
			$query = "SELECT * FROM useraccount WHERE Username = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $_SESSION['username']);
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$this->FirstName=$row['FirstName'];
			$this->LastName=$row['LastName'];
			$this->MiddleName=$row['MiddleName'];
			$this->suffix=$row['Suffix'];
			$this->Address=$row['Address'];
			$this->EmailAddress=$row['EmailAddress'];
			$this->ContactNumber=$row['ContactNumber'];
			$this->Birthdate=$row['Birthdate'];
			$this->Gender=$row['Gender'];
			$this->Username=$row['Username'];
			$this->UserType=$row['UserType'];
			$this->UserPhoto=$row['userPhoto'];
			$this->UserID=$row['UserID'];
			$this->PasswordHash=$row['PasswordHash'];
			return $stmt;
		}
		
		function setUserId(){
		$query = "SELECT * FROM useraccount WHERE EmailAddress=? AND userPass=?";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->UserID=$row['UserID'];

		return $stmt;
		}
		
		function confirmUsernameAndPass(){
			$query = "SELECT * FROM useraccount WHERE Username = ? AND PasswordHash=?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->Username);
			$stmt->bindParam(2, $this->PasswordHash );
			
			$stmt->execute();
	
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$this->UserID=$row['UserID'];
			
			$num = $stmt->rowCount();
			
			if($num>0){
				return true;
			}
			else{
				return false;
			}
		}
		
		function checkPass(){
			$query = "SELECT * FROM useraccount WHERE PasswordHash = ? AND Username=?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->oldPass);
			$stmt->bindParam(2, $_SESSION['username']);
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$num = $stmt->rowCount();
			
			if($num>0){
				return true;
			}
			else{
				return false;
			}
		}
		
		function changePass(){
			$query = "UPDATE useraccount SET PasswordHash = ? WHERE EmailAddress = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->newPass);
			$stmt->bindParam(2, $_SESSION['EmailAddress']);
			
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $stmt;
		}

		function extractUserTypeAdmin(){
			$query = "SELECT * FROM useraccount WHERE Username = ? AND UserType='administrator'";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->Username);
			
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$num = $stmt->rowCount();
			
			if($num>0){
				return true;
			}
			else{
				return false;
			}
		}
		
		function extractUserTypeGuest(){
			$query = "SELECT * FROM useraccount WHERE Username = ? AND UserType='guest'";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->Username);
			
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$num = $stmt->rowCount();
			
			if($num>0){
				return true;
			}
			else{
				return false;
			}
		}

		//new
		function extractNameWithUsername(){
			$query = "SELECT * FROM useraccount WHERE Username = ? ";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $_SESSION['Username']);
			
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$this->FirstName=$row['FirstName'];
			$this->LastName=$row['LastName'];
			
			$num = $stmt->rowCount();
			
			if($num>0){
				return true;
			}
			else{
				return false;
			}
		}
		
		//new
		function extractReservationInfo(){
			
			$query = "SELECT * FROM reservations WHERE FirstName = ? AND LastName = ? ";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->FirstName);
			$stmt->bindParam(2, $this->LastName);
			
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$_SESSION['firstname']=$row['FirstName'];
			$_SESSION['lastname']=$row['LastName'];
			$_SESSION['number']=$row['NoOfPeople'];
			$_SESSION['unit']=$row['UnitNo'];
			
			$num = $stmt->rowCount();
			
			if($num>0){
				return true;
			}
			else{
				return false;
			}
		}
		
		//new
		function addFoodItems(){
			$query = "INSERT INTO cateringservice SET GuestName = ?, 
			DateAndTimeOfService = ?, CateringPackage = ?, FoodItems = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $_SESSION['guestName']);
			$stmt->bindParam(2, $_SESSION['cateringDate']);
			$stmt->bindParam(3, $_SESSION['cateringPackage']);
			$stmt->bindParam(4, $_SESSION['reservationFoodItems']);
			$stmt->execute();
			return $stmt;
		}
		
		//new
		public function extractMonth(){
			$query = "SELECT EXTRACT(MONTH FROM Birthdate) AS userMonth FROM useraccount WHERE UserID = ? LIMIT 0,1";
			$statement = $this->conn->prepare($query);
			$statement->bindParam(1, $this->UserID);
			$statement->execute();
			return $statement;
		}
		
		//new
		public function extractDate(){
			$query = "SELECT EXTRACT(DAY FROM Birthdate) AS userDate FROM useraccount WHERE UserID = ? LIMIT 0,1";
			$statement = $this->conn->prepare($query);
			$statement->bindParam(1, $this->UserID);
			$statement->execute();
			return $statement;
		}
		
		//new
		public function extractYear(){
			$query = "SELECT EXTRACT(YEAR FROM Birthdate) AS userYear FROM useraccount WHERE UserID = ? LIMIT 0,1";
			$statement = $this->conn->prepare($query);
			$statement->bindParam(1, $this->UserID);
			$statement->execute();
			return $statement;
		}
		
		//new
		public function extractAddress(){
			$query = "SELECT * FROM useraccount WHERE UserID = ?";
			$statement = $this->conn->prepare($query);
			$statement->bindParam(1, $this->UserID);
			$statement->execute();
			return $statement;
		}
}

?>
