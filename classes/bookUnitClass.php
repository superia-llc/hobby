<?php
class Reservation{

	public $tableName = "reservations";

	//public $unitNo;
	//public $capacity;
	//public $price;

	
	private $conn;
	
	public $CheckInDate;
	public $CheckOutDate;
	public $NoOfPeople;
	public $TransactionType;
	public $dateDay;
	public $dateMonth;
	public $dateYear;
	public $bdate_year;
	public $amountDue;
	public $FirstName;
	public $LastName;
	//public $currentDate = date();
	
	
	function __construct($db){
		$this->conn = $db;

	}

	/*function readAll(){
		$query = "SELECT * FROM fooditems";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}*/

	function createReservation(){
			$query = "INSERT INTO reservations SET CheckInDate=?, CheckOutDate=?, NoOfPeople=?,TotalAmountDue=?, UnitNo = ?, GuestName = ?, PaymentStatus='UNPAID'";
			
			$statement = $this->conn->prepare($query);
			$statement->bindparam(1, $_SESSION['CheckInDate']);
			$statement->bindparam(2, $_SESSION['CheckOutDate']);
			$statement->bindparam(3, $_SESSION['NoOfPeople']);
			$statement->bindparam(4, $_SESSION['TotalAmountDue']);
			$statement->bindparam(5, $_SESSION['UnitNo']);
			$statement->bindparam(6, $_SESSION['Username']);
			
			if($statement->execute())
				return true;
			else
				return false;
			
			return $statement;
		}
		
	function createReservationPromo(){
			$query = "INSERT INTO reservations SET CheckInDate=?, CheckOutDate=?, NoOfPeople=?, FirstName=?, LastName=?, TotalAmountDue=?, UnitNo = ?, PaymentStatus='UNPAID'";
			
			$statement = $this->conn->prepare($query);
			$statement->bindparam(1, $_SESSION['CheckInDate']);
			$statement->bindparam(2, $_SESSION['CheckOutDate']);
			$statement->bindparam(3, $_SESSION['NoOfPeople']);
			$statement->bindparam(4, $_SESSION['firstname']);
			$statement->bindparam(5, $_SESSION['lastname']);
			$statement->bindparam(6, $_SESSION['TotalAmountDue']);
			$statement->bindparam(7, $_SESSION['UnitNo']);
			
			if($statement->execute())
				return true;
			else
				return false;
		}
	
	function seeCheckInAvailability(){
			$query = "SELECT * FROM reservations WHERE (`CheckInDate` BETWEEN ? AND ?)
			OR (`CheckOutDate` BETWEEN ? AND ?) AND UnitNo=?";
			
			$statement = $this->conn->prepare($query);
			
			$statement->bindparam(1, $_SESSION['CheckInDate']);
			$statement->bindparam(2, $_SESSION['CheckOutDate']);
			$statement->bindparam(3, $_SESSION['CheckInDate']);
			$statement->bindparam(4, $_SESSION['CheckOutDate']);
			$statement->bindparam(5, $_SESSION['UnitNo']);
			$statement->execute();
			
			$num = $statement->rowCount();
			
			if($num>0)
				return true;
			else
				return false;
		}
	
	function seeCheckOutAvailability(){
			$query = "SELECT * FROM reservations WHERE CheckInDate=? AND UnitNo=5";
			
			$statement = $this->conn->prepare($query);
			$statement->bindparam(1, $this->CheckOutDate);

			
			if($statement->execute())
				return true;
			else
				return false;
		}
}
?>