<?php
class Venue{

	public $tableName = "reservations";

	//public $unitNo;
	//public $capacity;
	//public $price;

	
	private $conn;
	
	public $CheckInDate;
	public $CheckOutDate;
	public $NoOfPeople;
	public $BookType;
	public $dateDay;
	public $dateMonth;
	public $dateYear;
	public $bdate_year;
	public $venue;
	
	function __construct($db){
		$this->conn = $db;

	}

	function readAll(){
		$query = "SELECT * FROM reservations";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}
	
	function createVenue(){
			$query = "INSERT INTO reservations SET CheckInDate=?, CheckOutDate=?, NoOfPeople=?, GuestName = ?";
			
			$venue = $this->conn->prepare($query);
			$venue->bindparam(1, $this->CheckInDate);
			$venue->bindparam(2, $this->CheckOutDate);
			$venue->bindparam(3, $this->NoOfPeople);
			$venue->bindparam(4	,$this->GuestName);

			
			if($venue->execute())
				return true;
			else
				return false;
			
			return $venue;
		}
}
?>